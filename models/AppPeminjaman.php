<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_peminjaman".
 *
 * @property int $id_peminjaman
 * @property string $date_borrow
 * @property string $date_return
 * @property int $status
 * @property int $id_pegawai
 * @property int $id_petugas
 */
class AppPeminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_borrow','id_pegawai', 'id_petugas'], 'required'],
            [['date_borrow', 'date_return'], 'safe'],
            [['status', 'id_pegawai', 'id_petugas','id_inventaris','jumlah','barang_rusak'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_peminjaman' => 'ID Peminjaman',
            'date_borrow' => 'Date Borrow',
            'date_return' => 'Date Return',
            'status' => 'Status',
            'id_pegawai' => 'Pegawai',
            'id_petugas' => 'Petugas',
            'id_inventaris' => 'Inventaris',
            'jumlah' => 'Jumlah',
            'barang_rusak' => 'Barang Rusak',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_borrow = date('Y-m-d h:m:s');
            $this->barang_rusak = '0';
        }
        return true;
    }

    // public function beforeUpdate($insert)
    // {
    //     if (parent::beforeUpdate($insert)) {
    //         // $this->date_returned = date('Y-m-d h:m:s');
          
    //     }
    //     return true;
    // }
}
