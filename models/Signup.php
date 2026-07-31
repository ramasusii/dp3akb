<?php
namespace app\models;

use mdm\admin\components\UserStatus;
use mdm\admin\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Signup form
 */
class Signup extends Model
{
    public $username;
    public $role;
    public $nama;
    public $email;
    public $password;
    public $retypePassword;
    public $foto;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $class = Yii::$app->getUser()->identityClass ? : 'mdm\admin\models\User';
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => $class, 'message' => 'This username has already been taken.'],
            [['username', 'role'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => $class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['retypePassword', 'required'],
            ['retypePassword', 'compare', 'compareAttribute' => 'password'],

            [['foto'], 'required'],
            [['nama', 'foto'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'role' => Yii::t('app', 'Role'),
            'retypePassword' => Yii::t('app', 'Ulangi Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $class = Yii::$app->getUser()->identityClass ? : 'app\models\User';
            $user = new $class();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->status = ArrayHelper::getValue(Yii::$app->params, 'user.defaultStatus', UserStatus::ACTIVE);
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function signup_admin()
    {
        $this->username = $this->email;
        if ($this->validate()) {
            $class = Yii::$app->getUser()->identityClass ? : 'app\models\User';
            $user = new $class();
            $user->username     = $this->username;
            $user->email        = $this->email;
            $user->role         = $this->role;
            $user->nama         = $this->nama;
            $user->foto = $this->foto;
            
            $user->status = ArrayHelper::getValue(Yii::$app->params, 'user.defaultStatus', UserStatus::ACTIVE);
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $time        = time();
                $query       = "INSERT INTO auth_assignment VALUES('{$user->role}', '{$user->id}', $time);";
                $connection  = \Yii::$app->db;
                $command     = $connection->createCommand($query);           
                $command->execute(); 
                return $user;
            }
        }

        return null;
    }
    
}
