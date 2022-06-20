<?php
namespace api\actions;


use api\models\response\AboutResponse;

use backend\models\About;
use yii\base\Exception;
use yii\helpers\Json;

class AboutAction {
    public static function getList(){
          // return About::find()
            //   ->where(['status' => '1'])
              // ->all();



        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{about}} {{i}}
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'About' AND {{m}}.[[isMain]] = '1'";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
       return $cmd;
    }
}