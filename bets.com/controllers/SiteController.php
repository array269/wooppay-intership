<?php

namespace app\controllers;

use app\models\BetsForm;
use app\models\BetsModel;
use app\models\ConfirmForm;
use app\models\Matches;
use Yii;
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionStep1()
    {
//        $liveTime = Matches::getLiveMatches(1);

        $model = new BetsModel();
        $session = Yii::$app->session;
        $session->set('model',[$model]);

       /* $model->matchname = 'JUV-BARS';
        $model->matchresult = 'Ничья';
        $model->phonenumber = '87054208888';
        $model->moneybet = '100000';
        $model->save();*/

        if ($model->load(Yii::$app->request->post()))
        {
            return $this->redirect('/confirm');
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('form', ['model' => $model]);
               }
    }
    public function actionStep2()
    {
        $model = new BetsForm();
        $session = Yii::$app->session;
        $match_result = $session['model'][0]['matchresult'];
        $phone_number = $session['model'][0]['phonenumber'];
        $money_bet = $session['model'][0]['moneybet'];
        //$session->destroy();
        $model->matchresult = $match_result;
        $model->phonenumber = $phone_number;
        $model->moneybet = $money_bet;

        if ($model->load(Yii::$app->request->post())&& $model->save())
        {
            return $this->redirect('/enter-code');
        }
        else
        return $this->render('form_confirm',['model'=>$model]);

    }

    public function actionStep3()
    {
        $conf = new ConfirmForm();
        if ($conf->load(Yii::$app->request->post()))
        {
            $data=$_POST;
                if($conf->checkCode($data))
                    echo "Неверный код";
                exit;
        }
        return $this->render('confirm',['conf'=>$conf]);
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCongrats()
    {
        return $this->render('congratulate');
    }

    public function actionError2()
    {
        return $this->render('code_error');
    }
}
