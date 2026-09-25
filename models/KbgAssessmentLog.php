<?php

namespace app\models;

use yii\db\ActiveRecord;

class KbgAssessmentLog extends ActiveRecord
{
    public static function tableName()
    {
        return 'kbg_assessment_log';
    }

    public function rules()
    {
        return [
            [['assessment_id'], 'required'],
            [['assessment_id', 'user_id'], 'integer'],
            [['note'], 'string'],
            [['created_at'], 'safe'],
            [['action'], 'string', 'max' => 60],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert && empty($this->created_at)) {
            $this->created_at = date('Y-m-d H:i:s');
        }

        return parent::beforeSave($insert);
    }

    public function getAssessment()
    {
        return $this->hasOne(KbgAssessment::className(), [
            'id' => 'assessment_id',
        ]);
    }
}
