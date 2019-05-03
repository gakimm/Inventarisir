<?php

namespace app\controllers;

use Yii;
use app\models\AppPeminjaman;
use app\models\AppPeminjamanSearch;
use app\models\AppPegawai;
use app\models\AppDetailPeminjaman;
use app\models\AppPetugas;
use app\models\AppInventaris;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AppPeminjamanController implements the CRUD actions for AppPeminjaman model.
 */
class AppPeminjamanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->layout = 'new_layout';
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all AppPeminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppPeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $petugas = AppPetugas::find()->orderBy(['nama' => SORT_ASC])->all();
        $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        $pegawai = AppPegawai::find()->orderBy(['nama' => SORT_ASC])->all();
        $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
         $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listPegawai' => $listPegawai,
            'listPetugas' => $listPetugas,
            'listInventaris' => $listInventaris,
            // 'listStatus' => $listStatus,
        ]);
    }

    /**
     * Displays a single AppPeminjaman model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        // $Model = new AppPeminjamanSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $petugas = AppPetugas::find()->orderBy(['nama' => SORT_ASC])->all();
        $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        $pegawai = AppPegawai::find()->orderBy(['nama' => SORT_ASC])->all();
        $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
         $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');
        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'listPegawai' => $listPegawai,
            'listPetugas' => $listPetugas,
            'listInventaris' => $listInventaris,
        ]);
    }

    /**
     * Creates a new AppPeminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppPeminjaman();
        // $detailPinjamModel = new AppDetailPeminjaman();
        $model->date_borrow=date('Y-m-d:h:m:s');
        $model->status = '1';
        Yii::$app->session['myPage'] = Yii::$app->request->get('page');
         

        $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');

        $listPetugas = '';
        if (isset(Yii::$app->user->identity->id_petugas)) {
            $petugas = AppPetugas::find()->where('id_petugas = '. Yii::$app->user->identity->id_petugas)->all();
            $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        }else{
            $petugas = AppPetugas::find()->orderBy(['nama' => SORT_ASC])->all();
            $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        }
        
        $listPegawai = '';
        if (isset(Yii::$app->user->identity->id_pegawai)) {
            $pegawai = AppPegawai::find()->where('id_pegawai = '. Yii::$app->user->identity->id_pegawai)->all();
            $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
        }else{
            $pegawai = AppPegawai::find()->orderBy(['nama' => SORT_ASC])->all();
            $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
        }
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_peminjaman]);
        }

        return $this->render('create', [
            'model' => $model,
            // 'detailPinjamModel' => $detailPinjamModel,
            'listPegawai' => $listPegawai,
            'listPetugas' => $listPetugas,
            'listInventaris' => $listInventaris,
        ]);
    }

    /**
     * Updates an existing AppPeminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_return=date('Y-m-d:h:m:s');
        $model->status = '2';

        $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');

        $listPetugas = '';
        if (isset(Yii::$app->user->identity->id_petugas)) {
            $petugas = AppPetugas::find()->where('id_petugas = '. Yii::$app->user->identity->id_petugas)->all();
            $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        }else{
            $petugas = AppPetugas::find()->orderBy(['nama' => SORT_ASC])->all();
            $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        }
        
        $listPegawai = '';
        if (isset(Yii::$app->user->identity->id_pegawai)) {
            $pegawai = AppPegawai::find()->where('id_pegawai = '. Yii::$app->user->identity->id_pegawai)->all();
            $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
        }else{
            $pegawai = AppPegawai::find()->orderBy(['nama' => SORT_ASC])->all();
            $listPegawai = ArrayHelper::map($pegawai,'id_pegawai','nama');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_peminjaman]);
        }

        return $this->render('update', [
            'model' => $model,
            'listPegawai' => $listPegawai,
            'listPetugas' => $listPetugas,
            'listInventaris' => $listInventaris,

        ]);
    }

    /**
     * Deletes an existing AppPeminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppPeminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppPeminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppPeminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
