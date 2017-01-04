<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



use common\models\Brand;
use common\models\Bid;
use common\models\Modelauto;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

  public function actionIndex()
    {
        $name = Brand::getLogo();
        return $this->render('index', ['logoInView' => $name]);
    }

    public function actionBrand($slug = '')
    {
      if (!empty($slug)) {
        $brand = Brand::find()->where(['slug' => $slug])->with('modelautos')->one();
        if (!empty($brand->modelautos)) {
          return $this->render('brand', ['models' => $brand->modelautos]);
        }
      }
    }

  public function actionForm($slug = '')
    {
      $model = new Bid();
      $brand = Modelauto::find()->where(['slug' => $slug])->with('bs')->one();
      $model->brand_id = $brand->brand_id;
      $model->modelauto_id = $brand->id;
      if ($model->load(Yii::$app->request->post()) && $model->save() ) {
          if ($model->rules()) {

              return $this->render('info', [
                'model' => $model,
                'brand_id' => $brand->brand_id,
                'modelauto_id' => $brand->id,

              ]);
          }
      }
      return $this->render('form', [
          'model' => $model,
          'brand' => $brand,
      ]);
    }
  public function actionInfo()
  {
    return $this->render('info');
  }

  public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
}