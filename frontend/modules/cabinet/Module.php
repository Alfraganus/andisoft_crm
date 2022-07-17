<?php

namespace frontend\modules\cabinet;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * cabinet module definition class
 */
class Module extends \yii\base\Module
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\cabinet\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if(Yii::$app->user->isGuest) {
           return Yii::$app->response->redirect(['/site/login']);
        }

        // custom initialization code goes here
    }
}
