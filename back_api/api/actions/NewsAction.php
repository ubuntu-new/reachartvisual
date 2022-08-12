<?php
namespace api\actions;


use api\models\response\NewsResponse;

use backend\models\Image;
use backend\models\News;
use yii\base\Exception;
use yii\helpers\Json;

class NewsAction {
    public static function getList(){
        $result =[];

        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{news}} {{i}}
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = {{i}}.[[id]] AND {{m}}.[[modelName]] = 'News' 
                    AND {{m}}.[[isMain]] = '1'
                    WHERE {{i}}.[[status]] = '1'
                    order by id desc ";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        foreach ($cmd as $row) {
            $result[] = new NewsResponse($row);
        }



        return $result;
    }
    public static function getImages($id)
    {
        $images = Image::find()->where(['itemId'=>$id, 'modelName'=>'News'])->all();
        return $images;
    }
}