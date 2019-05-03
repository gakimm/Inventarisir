<?php

namespace app\controllers;

use Yii;
use app\models\AppUser;
use app\models\AppUserSearch;
use app\models\AppPetugas;
use app\models\AppPegawai;
use app\models\AppLevel;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppUserController implements the CRUD actions for AppUser model.
 */
class AppUserController extends Controller
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
     * Lists all AppUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $level = AppLevel::find()->all();
        $listLevel = ArrayHelper::map($level,'id_level','nama');


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listLevel' => $listLevel,
        ]);
    }

    /**
     * Displays a single AppUser model.
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
     * Creates a new AppUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppUser();

        $petugas = AppPetugas::find()->all();
        $listPetugas = ArrayHelper::map($petugas, 'id_petugas','nama');
        
        $level = AppLevel::find()->all();
        $listLevel = ArrayHelper::map($level,'id_level','nama');

        $pegawai = AppPegawai::find()->all();
        $listPegawai = ArrayHelper::map($pegawai, 'id_pegawai','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
            'listPetugas' => $listPetugas,
            'listLevel' => $listLevel,
            'listPegawai' => $listPegawai,
        ]);
    }

    /**
     * Updates an existing AppUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $petugas = AppPetugas::find()->all();
        $listPetugas = ArrayHelper::map($petugas, 'id_petugas','nama');

        $level = AppLevel::find()->all();
        $listLevel = ArrayHelper::map($level,'id_level','nama');

        $pegawai = AppPegawai::find()->all();
        $listPegawai = ArrayHelper::map($pegawai, 'id_pegawai','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
            'listPetugas' => $listPetugas,
            'listLevel' => $listLevel,
            'listPegawai' => $listPegawai,
        ]);
    }

    /**
     * Deletes an existing AppUser model.
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
     * Finds the AppUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
