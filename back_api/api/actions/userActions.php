<?php
/**
 * Created by PhpStorm.
 * User: levan
 * Date: 4/13/2020
 * Time: 12:42
 */

namespace api\actions;


use api\models\database\User;

class userActions
{
    public static function getBranch(){
        if (\Yii::$app->user->isGuest) {
            return null;
        } else {
            $model = User::find()->where(["id"=>\Yii::$app->user->id])->one();
            return $model->branch;

        }
    }
}