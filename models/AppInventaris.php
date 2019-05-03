<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_inventaris".
 *
 * @property int $id_inventaris
 * @property string $nama
 * @property int $kondisi_baik
 * @property int $kondisi_buruk
 * @property int $jumlah
 * @property string $keterangan
 * @property string $date_created
 * @property string $date_updated
 * @property int $id_jenis
 * @property int $id_ruang
 * @property int $id_petugas
 * @property string $gambar
 */
class AppInventaris extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_inventaris';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jumlah','id_jenis', 'id_ruang', 'id_petugas'], 'required'],
            [['kondisi_baik', 'kondisi_buruk', 'jumlah', 'id_jenis', 'id_ruang', 'id_petugas'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['nama'], 'string', 'max' => 30],
            [['keterangan', 'gambar'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_inventaris' => 'Id Inventaris',
            'nama' => 'Nama',
            'kondisi_baik' => 'Kondisi Baik',
            'kondisi_buruk' => 'Kondisi Buruk',
            'jumlah' => 'Jumlah',
            'keterangan' => 'Keterangan',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'id_jenis' => 'Id Jenis',
            'id_ruang' => 'Id Ruang',
            'id_petugas' => 'Id Petugas',
            'gambar' => 'Gambar',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_created = date('Y-m-d h:m:s');
        }
        return true;
    }
}
