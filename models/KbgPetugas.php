<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Registry akun Petugas KBG berbasis master tbl_pegawai.
 *
 * @property int $id
 * @property int $pegawai_id
 * @property int|null $user_id
 * @property int $account_owned
 * @property int $is_active
 * @property int $must_change_password
 * @property string|null $activated_at
 * @property int|null $activated_by
 * @property string|null $deactivated_at
 * @property string|null $password_changed_at
 * @property string $created_at
 * @property string $updated_at
 */
class KbgPetugas extends ActiveRecord
{
    public static function tableName()
    {
        return 'kbg_petugas';
    }

    public function rules()
    {
        return [
            [['pegawai_id'], 'required'],
            [[
                'pegawai_id',
                'user_id',
                'account_owned',
                'is_active',
                'must_change_password',
                'activated_by',
            ], 'integer'],
            [[
                'activated_at',
                'deactivated_at',
                'password_changed_at',
                'created_at',
                'updated_at',
            ], 'safe'],
            [['pegawai_id'], 'unique'],
            [['user_id'], 'unique', 'skipOnEmpty' => true],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $now = date('Y-m-d H:i:s');

        if ($insert && empty($this->created_at)) {
            $this->created_at = $now;
        }

        $this->updated_at = $now;

        return true;
    }

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), [
            'id' => 'pegawai_id',
        ]);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), [
            'id' => 'user_id',
        ]);
    }

    public function getActivator()
    {
        return $this->hasOne(User::className(), [
            'id' => 'activated_by',
        ]);
    }

    public static function current()
    {
        if (Yii::$app->user->isGuest) {
            return null;
        }

        return static::find()
            ->with('pegawai')
            ->where([
                'user_id' => (int) Yii::$app->user->id,
            ])
            ->one();
    }

    public function getDisplayName()
    {
        if ($this->pegawai !== null
            && trim((string) $this->pegawai->nama) !== '') {
            return trim((string) $this->pegawai->nama);
        }

        if ($this->user !== null) {
            return (string) $this->user->username;
        }

        return 'Petugas KBG';
    }

    public function getNip()
    {
        return $this->pegawai !== null
            ? trim((string) $this->pegawai->nip)
            : '';
    }
}
