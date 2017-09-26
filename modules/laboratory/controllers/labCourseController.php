<?php

namespace app\modules\laboratory\controllers;

class LabCourseController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
