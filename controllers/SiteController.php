<?php

namespace app\controllers;

use app\models\Tag;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $id = Yii::$app->request->get('tag') ? Yii::$app->request->get('tag') : 0;

        $model = new Tag();

        $tags = $model->find()->all();

        $selectedModel = $model->find()->where(['id' => $id])->orWhere(['title' => 'животные'])->one();
        $categories = !empty($selectedModel) ? $selectedModel->categories : [];

        return $this->render('all',['tags' => $tags, 'categories' => $categories, 'selected' => $selectedModel]);
    }

    /**
     * Get singe tag categories.
     *
     * @return string
     */
    public function actionAll()
    {
        $model = new Tag();
        $tags = $model->find()->all();
        return $this->render('index', compact('tags'));
    }

}
