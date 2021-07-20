<?php

namespace app\controllers;

use app\models\SearchCategory;
use app\models\Tag;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    const DEFAULT_TAG_ID = 10;

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
    public function actionIndex(): string
    {
        $tagModel = new Tag();
        $searchModel = new SearchCategory();

        $queryParams = Yii::$app->request->queryParams;
        $queryParams['tag'] = $queryParams['tag'] ?? self::DEFAULT_TAG_ID;

        $dataProvider = $searchModel->search($queryParams);

        return $this->render('all',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $tagModel,
                'active' => $queryParams['tag']
            ]);
    }

    /**
     * Get singe tag categories.
     *
     * @return string
     */
    public function actionAll(): string
    {
        $items = [];

        $modelTag = new Tag();
        $tags = $modelTag->find()->all();

        foreach ($tags as $k => $tag) {
            $items[$k]['label'] = $tag->title;
            if (!empty($tag->categories)) {
                foreach ($tag->categories as $key => $category) {
                    $items[$k]['content'][] = $category->title;
                }
            }
        }
        return $this->render('index', ['items' => $items]);
    }

}
