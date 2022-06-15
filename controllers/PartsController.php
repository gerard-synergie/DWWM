<?php

namespace app\controllers;

use app\models\Parts;
use app\models\PartsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartsController implements the CRUD actions for Parts model.
 */
class PartsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Parts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PartsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parts model.
     * @param int $id_part Id Part
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_part)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_part),
        ]);
    }

    /**
     * Creates a new Parts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Parts();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_part' => $model->id_part]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Parts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_part Id Part
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_part)
    {
        $model = $this->findModel($id_part);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_part' => $model->id_part]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Parts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_part Id Part
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_part)
    {
        $this->findModel($id_part)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_part Id Part
     * @return Parts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_part)
    {
        if (($model = Parts::findOne(['id_part' => $id_part])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
