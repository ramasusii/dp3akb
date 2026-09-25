<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $kode
 * @property int|null $enumerator_id
 * @property string $status
 * @property int $current_step
 * @property int $progress_percent
 * @property string|null $assessment_datetime
 * @property string|null $enumerator_name
 * @property string|null $respondent_category
 * @property string|null $respondent_name
 * @property string|null $respondent_gender
 * @property int|null $respondent_age
 * @property string|null $respondent_role
 * @property string|null $site_name
 * @property string|null $village
 * @property string|null $district
 * @property string|null $regency
 * @property string|null $province
 * @property float|null $latitude
 * @property float|null $longitude
 * @property float|null $altitude
 * @property float|null $accuracy
 * @property string|null $settlement_type
 * @property string|null $settlement_size
 * @property int $attention_count
 * @property int $critical_count
 * @property string $risk_level
 * @property string|null $submitted_at
 * @property int|null $verified_by
 * @property string|null $verified_at
 * @property string $verification_status
 * @property string|null $verification_note
 * @property string $created_at
 * @property string $updated_at
 */
class KbgAssessment extends ActiveRecord
{
    const STATUS_DRAFT = 'draft';
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_REVISION = 'revision';
    const STATUS_VERIFIED = 'verified';

    public static function tableName()
    {
        return 'kbg_assessment';
    }

    public function rules()
    {
        return [
            [['kode'], 'required'],
            [[
                'enumerator_id',
                'current_step',
                'progress_percent',
                'respondent_age',
                'attention_count',
                'critical_count',
                'verified_by',
            ], 'integer'],
            [[
                'latitude',
                'longitude',
                'altitude',
                'accuracy',
            ], 'number'],
            [[
                'assessment_datetime',
                'submitted_at',
                'verified_at',
                'created_at',
                'updated_at',
            ], 'safe'],
            [['verification_note'], 'string'],
            [['kode'], 'string', 'max' => 40],
            [[
                'status',
                'respondent_gender',
                'settlement_type',
                'settlement_size',
                'verification_status',
            ], 'string', 'max' => 40],
            [[
                'enumerator_name',
                'respondent_category',
                'respondent_name',
                'village',
                'district',
                'regency',
                'province',
            ], 'string', 'max' => 180],
            [['respondent_role', 'site_name'], 'string', 'max' => 255],
            [['risk_level'], 'string', 'max' => 60],
            [['kode'], 'unique'],
            [['status'], 'in', 'range' => [
                self::STATUS_DRAFT,
                self::STATUS_SUBMITTED,
                self::STATUS_REVISION,
                self::STATUS_VERIFIED,
            ]],
        ];
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord && empty($this->kode)) {
            $this->kode = $this->generateCode();
        }

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        $now = date('Y-m-d H:i:s');

        if ($insert) {
            if (empty($this->created_at)) {
                $this->created_at = $now;
            }

            if (empty($this->status)) {
                $this->status = self::STATUS_DRAFT;
            }

            if (empty($this->verification_status)) {
                $this->verification_status = 'belum';
            }

            if (empty($this->risk_level)) {
                $this->risk_level = 'Belum Ada Flag';
            }
        }

        $this->updated_at = $now;

        return parent::beforeSave($insert);
    }

    public function getAnswers()
    {
        return $this->hasMany(KbgAnswer::className(), [
            'assessment_id' => 'id',
        ])->orderBy(['id' => SORT_ASC]);
    }

    public function getLogs()
    {
        return $this->hasMany(KbgAssessmentLog::className(), [
            'assessment_id' => 'id',
        ])->orderBy(['id' => SORT_DESC]);
    }

    public function getEnumerator()
    {
        return $this->hasOne(User::className(), [
            'id' => 'enumerator_id',
        ]);
    }

    public function getVerifier()
    {
        return $this->hasOne(User::className(), [
            'id' => 'verified_by',
        ]);
    }

    public function getAnswerMap()
    {
        $map = [];

        foreach ($this->answers as $answer) {
            $map[$answer->question_key] = $answer->getDecodedValue();
        }

        return $map;
    }

    public function recalculateMetrics(array $answerMap = null)
    {
        if ($answerMap === null) {
            $answerMap = $this->getAnswerMap();
        }

        $this->progress_percent = KbgQuestionnaire::progress($answerMap);

        $summary = KbgQuestionnaire::attentionSummary($answerMap);

        $this->attention_count = (int) $summary['attention'];
        $this->critical_count = (int) $summary['critical'];
        $this->risk_level = $summary['level'];
    }

    public function syncMetadataFromAnswers(array $answers)
    {
        $map = [
            'q1_0' => 'respondent_category',
            'q1_2' => 'enumerator_name',
            'q1_3' => 'respondent_name',
            'q1_4' => 'respondent_gender',
            'q1_5' => 'respondent_age',
            'q1_6' => 'respondent_role',
            'q2_1' => 'site_name',
            'q2_2' => 'village',
            'q2_3' => 'district',
            'q2_4' => 'regency',
            'q2_5' => 'province',
            'q2_6_lat' => 'latitude',
            'q2_6_lng' => 'longitude',
            'q2_6_alt' => 'altitude',
            'q2_6_acc' => 'accuracy',
            'q2_7' => 'settlement_type',
            'q2_8' => 'settlement_size',
        ];

        foreach ($map as $questionKey => $attribute) {
            if (!array_key_exists($questionKey, $answers)) {
                continue;
            }

            $value = $answers[$questionKey];

            if (is_array($value)) {
                continue;
            }

            if ($value === '') {
                $value = null;
            }

            $this->$attribute = $value;
        }

        if (isset($answers['q1_1']) && $answers['q1_1'] !== '') {
            $raw = str_replace('T', ' ', (string) $answers['q1_1']);

            if (strlen($raw) === 16) {
                $raw .= ':00';
            }

            $this->assessment_datetime = $raw;
        }
    }

    public function getStatusLabel()
    {
        $labels = [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_SUBMITTED => 'Dikirim',
            self::STATUS_REVISION => 'Perlu Revisi',
            self::STATUS_VERIFIED => 'Terverifikasi',
        ];

        return isset($labels[$this->status])
            ? $labels[$this->status]
            : ucfirst((string) $this->status);
    }

    public function getStatusClass()
    {
        $classes = [
            self::STATUS_DRAFT => 'default',
            self::STATUS_SUBMITTED => 'warning',
            self::STATUS_REVISION => 'danger',
            self::STATUS_VERIFIED => 'success',
        ];

        return isset($classes[$this->status])
            ? $classes[$this->status]
            : 'default';
    }

    public function getRiskClass()
    {
        if ($this->risk_level === 'Perlu Tindak Lanjut') {
            return 'danger';
        }

        if ($this->risk_level === 'Perlu Perhatian') {
            return 'warning';
        }

        if ($this->risk_level === 'Terpantau') {
            return 'info';
        }

        return 'default';
    }

    public function canEdit()
    {
        return in_array($this->status, [
            self::STATUS_DRAFT,
            self::STATUS_REVISION,
        ], true);
    }

    private function generateCode()
    {
        $date = date('Ymd');
        $prefix = 'KBG-' . $date . '-';

        $latest = static::find()
            ->where(['like', 'kode', $prefix . '%', false])
            ->orderBy(['id' => SORT_DESC])
            ->one();

        $number = 1;

        if ($latest !== null
            && preg_match('/(\d+)$/', $latest->kode, $matches)) {
            $number = ((int) $matches[1]) + 1;
        }

        return $prefix . str_pad(
            (string) $number,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
}
