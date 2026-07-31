<?php

namespace app\models;

use yii\helpers\Inflector;

/**
 * Model untuk tabel "tbl_kategori_edukasi".
 *
 * @property int $id
 * @property string $nama_kategori
 * @property string $slug
 * @property string|null $deskripsi
 * @property string|null $ikon
 * @property int $urutan
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property KontenEdukasi[] $kontenEdukasi
 */
class KategoriEdukasi extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_kategori_edukasi';
    }

    public function rules()
    {
        return [
            [
                [
                    'nama_kategori',
                ],
                'required',
            ],

            [
                [
                    'deskripsi',
                ],
                'string',
            ],

            [
                [
                    'urutan',
                    'status',
                ],
                'integer',
            ],

            [
                [
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],

            [
                [
                    'nama_kategori',
                ],
                'string',
                'max' => 150,
            ],

            [
                [
                    'slug',
                ],
                'string',
                'max' => 170,
            ],

            [
                [
                    'ikon',
                ],
                'string',
                'max' => 100,
            ],

            [
                [
                    'nama_kategori',
                ],
                'trim',
            ],

            [
                [
                    'slug',
                ],
                'trim',
            ],

            [
                [
                    'slug',
                ],
                'unique',
                'message' => 'Slug kategori sudah digunakan.',
            ],

            [
                [
                    'urutan',
                ],
                'default',
                'value' => 0,
            ],

            [
                [
                    'status',
                ],
                'default',
                'value' => 1,
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
            'slug' => 'Slug',
            'deskripsi' => 'Deskripsi',
            'ikon' => 'Ikon Bootstrap',
            'urutan' => 'Urutan',
            'status' => 'Status',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diperbarui Pada',
        ];
    }

    public function beforeValidate()
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        if (!empty($this->nama_kategori)) {
            $baseSlug = Inflector::slug(
                strtolower(
                    trim($this->nama_kategori)
                )
            );

            $this->slug = $this->generateUniqueSlug(
                $baseSlug
            );
        }

        return true;
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $currentDateTime = date('Y-m-d H:i:s');

        if ($insert && empty($this->created_at)) {
            $this->created_at = $currentDateTime;
        }

        $this->updated_at = $currentDateTime;

        return true;
    }

    protected function generateUniqueSlug($baseSlug)
    {
        if (empty($baseSlug)) {
            $baseSlug = 'kategori-edukasi';
        }

        $slug = $baseSlug;
        $counter = 2;

        while ($this->slugExists($slug)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function slugExists($slug)
    {
        $query = self::find()->where([
            'slug' => $slug,
        ]);

        if (!$this->isNewRecord) {
            $query->andWhere([
                '<>',
                'id',
                $this->id,
            ]);
        }

        return $query->exists();
    }

    public function getKontenEdukasi()
    {
        return $this->hasMany(
            KontenEdukasi::className(),
            [
                'kategori_id' => 'id',
            ]
        );
    }

    public function getStatusLabel()
    {
        return (int) $this->status === 1
            ? 'Aktif'
            : 'Tidak Aktif';
    }

    public function getNamaDenganIkon()
    {
        $ikon = !empty($this->ikon)
            ? $this->ikon
            : 'bi-book';

        return '<i class="bi '
            . $ikon
            . '"></i> '
            . $this->nama_kategori;
    }
}