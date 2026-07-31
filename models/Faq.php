<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_faq".
 *
 * @property int $id
 * @property string|null $pertanyaan
 * @property string|null $jawaban
 * @property int|null $status
 * @property string|null $timestamp
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jawaban'], 'string'],
            [['status'], 'integer'],
            [['timestamp'], 'safe'],
            [['pertanyaan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pertanyaan' => 'Pertanyaan',
            'jawaban' => 'Jawaban',
            'status' => 'Status',
            'timestamp' => 'Tanggal',
        ];
    }
}
