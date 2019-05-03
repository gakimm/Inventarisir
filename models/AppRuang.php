<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_ruang".
 *
 * @property int $id_ruang
 * @property string $nama
 * @property string $keterangan
 */
class AppRuang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_ruang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['keterangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ruang' => 'Id Ruang',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
        ];
    }
}
