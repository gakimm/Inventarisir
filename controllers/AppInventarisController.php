<?php

namespace app\controllers;

use Yii;
use app\models\AppInventaris;
use app\models\AppInventarisSearch;
use app\models\AppJenis;
use app\models\AppPetugas;
use app\models\AppRuang;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AppInventarisController implements the CRUD actions for AppInventaris model.
 */
class AppInventarisController extends Controller
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
     * Lists all AppInventaris models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppInventarisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         $jenis = AppJenis::find()->all();
        $listJenis = ArrayHelper::map($jenis,'id_jenis','nama');

        $ruang = AppRuang::find()->all();
        $listRuang = ArrayHelper::map($ruang,'id_ruang','nama');

        $petugas = AppPetugas::find()->all();
        $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listJenis' => $listJenis,
            'listRuang' => $listRuang,
            'listPetugas' => $listPetugas,
        ]);
    }

    /**
     * Displays a single AppInventaris model.
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
     * Creates a new AppInventaris model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppInventaris();
        $jenis = AppJenis::find()->all();
        $listJenis = ArrayHelper::map($jenis,'id_jenis','nama');

        $ruang = AppRuang::find()->all();
        $listRuang = ArrayHelper::map($ruang,'id_ruang','nama');

        $petugas = AppPetugas::find()->all();
        $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');
        $model->date_created = date('Y-m-d:h:m:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_inventaris]);
        }

        return $this->render('create', [
            'model' => $model,
            'listJenis' => $listJenis,
            'listRuang' => $listRuang,
            'listPetugas' => $listPetugas,
        ]);
    }

    /**
     * Updates an existing AppInventaris model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $jenis = AppJenis::find()->all();
        $listJenis = ArrayHelper::map($jenis,'id_jenis','nama');

        $ruang = AppRuang::find()->all();
        $listRuang = ArrayHelper::map($ruang,'id_ruang','nama');

        $petugas = AppPetugas::find()->all();
        $listPetugas = ArrayHelper::map($petugas,'id_petugas','nama');

        if ($model->load(Yii::$app->request->post()) ) {
            $model->date_updated = date('Y-m-d:h:m:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_inventaris]);
        }

        return $this->render('update', [
            'model' => $model,
            'listJenis' => $listJenis,
            'listRuang' => $listRuang,
            'listPetugas' => $listPetugas,
        ]);
    }

    /**
     * Deletes an existing AppInventaris model.
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
     * Finds the AppInventaris model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppInventaris the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppInventaris::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
