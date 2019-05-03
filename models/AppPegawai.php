<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_pegawai".
 *
 * @property int $id_pegawai
 * @property string $nama
 * @property int $nip
 * @property string $alamat
 * @property string $date_created
 */
class AppPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nip', 'alamat', 'date_created'], 'required'],
            [['nip'], 'integer'],
            [['date_created'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nama' => 'Nama',
            'nip' => 'Nip',
            'alamat' => 'Alamat',
            'date_created' => 'Date Created',
        ];
    }
}
