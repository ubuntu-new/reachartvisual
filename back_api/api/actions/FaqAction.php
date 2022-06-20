<?php
namespace api\actions;


use api\models\response\FaqResponse;

use backend\models\Faq;
use yii\base\Exception;
use yii\helpers\Json;

class FaqAction {
    public static function getList(){
           return Faq::find()
               ->where(['status' => '1'])
               ->all();



//        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{faq}} {{i}}
//                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'Faq' AND {{m}}.[[isMain]] = '1'";
//
//        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
//        return $cmd;
    }
}