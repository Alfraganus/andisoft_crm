<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use common\models\Companies;
use common\models\Profile;
use common\models\User;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rbac\DbManager;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        // 'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['status'=>User::STATUS_ACTIVE]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new User();
        $profile = new Companies();

        if ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->setPassword($model->password_hash);
                $model->save();
                $profile->user_id = $model->id;
                $profile->created_on = time();
                if ($profile->save()) {
                    $rbac = new DbManager;
                    $rbac->assign($rbac->getRole('playstation_admin'), $model->id);
                    return $this->redirect(['index']);
                } else {
                    return [
                        'errors' => [
                            $model->errors,
                            $profile->errors
                        ]
                    ];
                }

            }
        }
        return $this->render('create', [
            'model' => $model,
            'profile' => $profile
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $profile =Companies::findOne(['user_id'=>$id]);

        if ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->setPassword($model->password_hash);
                $model->save();
                $profile->user_id = $model->id;
                $profile->created_on = time();
                if ($profile->save()) {

                    return $this->redirect(['index']);
                } else {
                    return [
                        'errors' => [
                            $model->errors,
                            $profile->errors
                        ]
                    ];
                }

            }
        }
        return $this->render('create', [
            'model' => $model,
            'profile' => $profile
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = $model::STATUS_DELETED;
    }




    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
