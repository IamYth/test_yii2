<?php

namespace backend\controllers;

use Yii;
use common\models\Modelauto;
use common\models\ModelautoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ModelautoController implements the CRUD actions for Modelauto model.
 */
class ModelautoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all Modelauto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelautoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modelauto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Modelauto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Modelauto();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $modelautoId = $model->id;
            $image = UploadedFile::getInstances($model, 'image');
            foreach ($image as $image) {
                $imgName = 'image_' . uniqid() .$modelautoId . '.' . $image->getExtension();
                $image->saveAs(realpath(Yii::$app->basePath.'/../') . Yii::getAlias('@imageImgPath') . '/' . $imgName);
                $model->image = $imgName;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Modelauto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $modelautoId = $model->id;
            $image = UploadedFile::getInstances($model, 'image');
            foreach ($image as $image) {
                $imgName = 'image_' . uniqid() .$modelautoId . '.' . $image->getExtension();
                $image->saveAs(realpath(Yii::$app->basePath.'/../') . Yii::getAlias('@imageImgPath') . '/' . $imgName);
                $model->image = $imgName;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Modelauto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Modelauto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modelauto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modelauto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
