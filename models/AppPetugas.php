<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_petugas".
 *
 * @property int $id_petugas
 * @property string $nama
 * @property string $email
 * @property string $date_created
 */
class AppPetugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'date_created'], 'required'],
            [['date_created'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_petugas' => 'Id Petugas',
            'nama' => 'Nama',
            'email' => 'Email',
            'date_created' => 'Date Created',
        ];
    }
}
