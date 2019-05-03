<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AppPeminjaman;

/**
 * AppPeminjamanSearch represents the model behind the search form of `app\models\AppPeminjaman`.
 */
class AppPeminjamanSearch extends AppPeminjaman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_peminjaman', 'status', 'id_pegawai', 'id_petugas','id_inventaris','jumlah','barang_rusak'], 'integer'],
            [['date_borrow', 'date_return'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AppPeminjaman::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_peminjaman' => $this->id_peminjaman,
            'date_borrow' => $this->date_borrow,
            'date_return' => $this->date_return,
            'status' => $this->status,
            'id_pegawai' => $this->id_pegawai,
            'id_petugas' => $this->id_petugas,
            'id_inventaris' => $this->id_inventaris,
            'jumlah' => $this->jumlah,
            'barang_rusak' => $this->barang_rusak,
        ]);

        return $dataProvider;
    }
}
