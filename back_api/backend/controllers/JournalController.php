<?php

namespace backend\controllers;

use backend\models\Journal;
use backend\models\JournalSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
/**
 * JournalController implements the CRUD actions for Journal model.
 */
class JournalController extends Controller
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
     * Lists all Journal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JournalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Journal model.
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
     * Finds the Journal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Journal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Journal::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }



    public function actionCreate()
    {
        $model = new Journal() ;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image =  UploadedFile::getInstance($model , 'image');
//            $pdf =  UploadedFile::getInstance($model , 'pdf');
            $model->image =$image;
            $model->pdf = UploadedFile::getInstance($model , 'pdf');;
            if(!empty($image) && $image->size !== 0) {
                $model->removeImage( $model->getImage());
            }
            if($model->image){
                $model->upload();
            }
            if($model->pdf){
                $model->pdf->saveAs('images/' .$model->pdf->baseName . '.' .$model->pdf->extension) ;
                $model->pdf = $model->pdf->baseName. '.' .$model->pdf->extension;
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);




/*
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs('images/' .$model->image->baseName . '.' .$model->image->extension) ;
                $model->image = $model->image->baseName. '.' .$model->image->extension;
            $model->pdf = UploadedFile::getInstance($model, 'pdf');
                $model->pdf->saveAs('images/' .$model->pdf->baseName . '.' .$model->pdf->extension) ;
                $model->pdf = $model->pdf->baseName. '.' .$model->pdf->extension;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing Journal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image =  UploadedFile::getInstance($model , 'image');
            $pdf =  UploadedFile::getInstance($model , 'pdf');
            $model -> image = $image;
            $model -> pdf = $pdf;
            if(!empty($image) && $image->size !== 0) {
                $model->removeImage( $model->getImage());
            }

            if($model->image){
                $model->upload();
            }
            if($model->pdf){
//                $model->uploadfile();
                    $model->pdf->saveAs('images/' .$model->pdf->baseName . '.' .$model->pdf->extension) ;
                    $model->pdf = $model->pdf->baseName. '.' .$model->pdf->extension;


            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//
//            $image = UploadedFile::getInstance($model, 'image');
//            $model->image = $image;
//            if (!empty($image) && $image->size !== 0) {
//                $model->removeImage($model->getImage());
//            }
//
//            if ($model->image) {
//                $model->upload();
//            }
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Journal model.
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
}
