<?php

namespace backend\controllers;

use Yii;
use backend\models\Oadode;
use backend\models\DescriptionOfGoods;
use backend\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
   * File generated with the GII tool
 */

/**
 * OadodeController implements the CRUD actions for Oadode model.
 */
class OadodeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Oadode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Oadode::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Oadode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Oadode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oadode();
        $modelsDescriptionOfGoods = [new DescriptionOfGoods()];

        if ($model->load(Yii::$app->request->post())) {

            $modelsDescriptionOfGoods = Model::createMultiple(DescriptionOfGoods::classname());
            Model::loadMultiple($modelsDescriptionOfGoods, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsDescriptionOfGoods),
                    ActiveForm::validate($model)
                );
            }
            $model->business_title = '';
            if(is_array(Yii::$app->request->post('business_title'))){
                foreach(Yii::$app->request->post('business_title') as $i => $item){
                    $model->business_title .= $item .', ';
                }
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDescriptionOfGoods) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsDescriptionOfGoods as $modelDescriptionOfGoods) {
                            $modelDescriptionOfGoods->oadode_id = $model->id;
                            if (! ($flag = $modelDescriptionOfGoods->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model, 
            'modelsDescriptionOfGoods' => (empty($modelsDescriptionOfGoods)) ? [new DescriptionOfGoods] : $modelsDescriptionOfGoods
        ]);
    }

    /**
     * Updates an existing Oadode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsDescriptionOfGoods = $model->description_of_goods;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsDescriptionOfGoods, 'id', 'id');
            $modelsDescriptionOfGoods = Model::createMultiple(DescriptionOfGoods::classname(), $modelsDescriptionOfGoods);
            Model::loadMultiple($modelsDescriptionOfGoods, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDescriptionOfGoods, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsDescriptionOfGoods),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDescriptionOfGoods) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            DescriptionOfGoods::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsDescriptionOfGoods as $modelDOG) {
                            $modelDOG->oadode_id = $model->id;
                            if (! ($flag = $modelDOG->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsDescriptionOfGoods' => (empty($modelsDescriptionOfGoods)) ? [new DescriptionOfGoods] : $modelsDescriptionOfGoods
        ]);
    }

    /**
     * Deletes an existing Oadode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Oadode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oadode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oadode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
