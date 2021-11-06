<?php


namespace app\controllers\api;

use app\components\StackApp;
use yii\helpers\Url;
use yii\rest\Controller;

class StackexchangeController extends Controller
{

    public function actionIndex(){
        return ['questions' => Url::to('questions', true)];
    }

    public function actionQuestions(){
        return StackApp::app()->setSection('questions')->getData();
    }

}