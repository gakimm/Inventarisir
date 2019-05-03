<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_jenis".
 *
 * @property int $id_jenis
 * @property string $nama
 * @property string $keterangan
 */
class AppJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_jenis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['keterangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis' => 'Id Jenis',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
        ];
    }
}
