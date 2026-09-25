<?php

namespace app\models;

use yii\db\ActiveRecord;

class KbgAnswer extends ActiveRecord
{
    public static function tableName()
    {
        return 'kbg_answer';
    }

    public function rules()
    {
        return [
            [['assessment_id', 'section_step'], 'integer'],
            [['assessment_id', 'question_key', 'question_code'], 'required'],
            [['question_text', 'answer_value', 'answer_json'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['question_key', 'question_code'], 'string', 'max' => 60],
            [['answer_type'], 'string', 'max' => 30],
            [['assessment_id', 'question_key'], 'unique',
                'targetAttribute' => ['assessment_id', 'question_key']],
        ];
    }

    public function beforeSave($insert)
    {
        $now = date('Y-m-d H:i:s');

        if ($insert && empty($this->created_at)) {
            $this->created_at = $now;
        }

        $this->updated_at = $now;

        return parent::beforeSave($insert);
    }

    public function getAssessment()
    {
        return $this->hasOne(KbgAssessment::className(), [
            'id' => 'assessment_id',
        ]);
    }

    public function setEncodedValue($value)
    {
        if (is_array($value)) {
            $this->answer_json = json_encode(
                array_values($value),
                JSON_UNESCAPED_UNICODE
            );
            $this->answer_value = null;

            return;
        }

        $this->answer_json = null;
        $this->answer_value = $value === null
            ? null
            : (string) $value;
    }

    public function getDecodedValue()
    {
        if ($this->answer_json !== null
            && $this->answer_json !== '') {
            $decoded = json_decode($this->answer_json, true);

            if (is_array($decoded)) {
                return $decoded;
            }
        }

        return $this->answer_value;
    }
}
