<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_level".
 *
 * @property int $id_level
 * @property string $nama
 */
class AppLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Id Level',
            'nama' => 'Nama',
        ];
    }
}
