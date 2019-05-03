<?php

namespace app\models;

use Yii;
use app\models\AppInventaris;
use Yii\helpers\ArrayHelper;
/**
 * This is the model class for table "app_detail_peminjaman".
 *
 * @property int $id_detail_peminjaman
 * @property int $id_peminjaman
 * @property int $id_inventaris
 * @property int $jumlah
 */
class AppDetailPeminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_detail_peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_peminjaman', 'id_inventaris', 'jumlah'], 'required'],
            [['id_peminjaman', 'id_inventaris', 'jumlah','barang_rusak'], 'integer'],
            
        ];  
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detail_peminjaman' => 'Id Detail Peminjaman',
            'id_peminjaman' => 'Id Peminjaman',
            'id_inventaris' => 'Id Inventaris',
            'jumlah' => 'Jumlah',
            'barang_rusak' => 'Barang Rusak',
        ];
    }
}
