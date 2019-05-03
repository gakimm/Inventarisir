<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AppInventaris;

/**
 * AppInventarisSearch represents the model behind the search form of `app\models\AppInventaris`.
 */
class AppInventarisSearch extends AppInventaris
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inventaris', 'kondisi_baik', 'kondisi_buruk', 'jumlah', 'id_jenis', 'id_ruang', 'id_petugas'], 'integer'],
            [['nama', 'keterangan', 'date_created', 'date_updated', 'gambar'], 'safe'],
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
        $query = AppInventaris::find();

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
            'id_inventaris' => $this->id_inventaris,
            'kondisi_baik' => $this->kondisi_baik,
            'kondisi_buruk' => $this->kondisi_buruk,
            'jumlah' => $this->jumlah,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'id_jenis' => $this->id_jenis,
            'id_ruang' => $this->id_ruang,
            'id_petugas' => $this->id_petugas,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
