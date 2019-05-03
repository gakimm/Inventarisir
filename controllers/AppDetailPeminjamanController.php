<?php

namespace app\controllers;

use Yii;
use app\models\AppDetailPeminjaman;
use app\models\AppDetailPeminjamanSearch;
use app\models\AppPeminjaman;
use app\models\AppInventaris;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
/**
 * AppDetailPeminjamanController implements the CRUD actions for AppDetailPeminjaman model.
 */
class AppDetailPeminjamanController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AppDetailPeminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppDetailPeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppDetailPeminjaman model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppDetailPeminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppDetailPeminjaman();
        $model2 = new AppPeminjaman();
        Yii::$app->session['myPage'] = Yii::$app->request->get('page');
         

        $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');

        $peminjaman = AppPeminjaman::find()->orderBy(['id_peminjaman' => SORT_ASC])->all();
        $listPeminjaman = ArrayHelper::map($peminjaman,'id_peminjaman','id_peminjaman');

       
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id_detail_peminjaman]);
        }

        return $this->render('create', [
            'model' => $model,
            'listInventaris' => $listInventaris,
            'listPeminjaman' => $listPeminjaman,
            
        ]);
    }

    /**
     * Updates an existing AppDetailPeminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $inventaris = AppInventaris::find()->orderBy(['nama' => SORT_ASC])->all();
        $listInventaris = ArrayHelper::map($inventaris,'id_inventaris','nama');

        $peminjaman = AppPeminjaman::find()->orderBy(['id_peminjaman' => SORT_ASC])->all();
        $listPeminjaman = ArrayHelper::map($peminjaman,'id_peminjaman','id_peminjaman');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detail_peminjaman]);
        }

        return $this->render('update', [
            'model' => $model,
            'listInventaris' => $listInventaris,
            'listPeminjaman' => $listPeminjaman,
        ]);
    }

    /**
     * Deletes an existing AppDetailPeminjaman model.
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
     * Finds the AppDetailPeminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppDetailPeminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppDetailPeminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
