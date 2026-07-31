<?php

namespace app\models;

use mdm\admin\components\Configs;
use mdm\admin\components\UserStatus;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property UserProfile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->userTable;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'in', 'range' => [UserStatus::ACTIVE, UserStatus::INACTIVE]],
            [['nama' ,'role', 'email','foto'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => UserStatus::ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    
     public static function findIdentityByAccessToken($token, $type = null)
     {
         // jika ingin login set dari Object User dari database (resiko: banyak akses ke database)
         // return static::findOne($token->getClaim('uid'));
 
         // sebenarnya tidak terlalu penting diverifikasi disini karena, 
         // sewaktu request dicontroller sudah otomatis diperiksa oleh class sizeg\jwt\JwtHttpBearerAuth
         // ini untuk keamanan berlapis saja.
         $signer = new \Lcobucci\JWT\Signer\Hmac\Sha256();
         if($token->verify($signer, Yii::$app->jwt->key))
         {
             return new static([
                 'id' => $token->getClaim('uid'),
                 'username' => $token->getClaim('username'),
                 //'password' => 'demo',
                 //'authKey' => 'test101key',
                 //'accessToken' => '101-token',
             ]);
         }
         return null;
     }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => UserStatus::ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                'password_reset_token' => $token,
                'status' => UserStatus::ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function getDb()
    {
        return Configs::userDb();
    }

    public function getRole(){
        return \Yii::$app->authManager->getRolesByUser($this->id);
    }
    
    public function setPasswordCadangan($password)
    {
        $this->password_cadangan = Yii::$app->security->generatePasswordHash($password);
    }

    public function adminResetPassword()
    {
        $user = User::findOne($this->id);
        $user->setPassword($user->username);
        $user->generateAuthKey();
        $user->save(false);
    }
}
