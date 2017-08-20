<?php

namespace panwenbin\yii2\activerecord\changelog\controllers;

use Yii;
use panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog;
use panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLogSearch;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogController implements the CRUD actions for ActiveRecordChangeLog model.
 */
class LogController extends Controller
{
    /**
     * Lists all ActiveRecordChangeLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActiveRecordChangeLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActiveRecordChangeLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionModel($id)
    {
        $log = $this->findModel($id);
        /* @var ActiveRecord $modelClass */
        $modelClass = new $log->model;
        $model = $modelClass::findOne(json_decode($log->pk, true));
        if (empty($model)) {
            throw new NotFoundHttpException(Yii::t('ar_change_log', 'Model Not Found, deleted ?'));
        }
        return $this->render('model', [
            'log' => $log,
            'model' => $model,
        ]);
    }

    /**
     * Finds the ActiveRecordChangeLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActiveRecordChangeLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActiveRecordChangeLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
