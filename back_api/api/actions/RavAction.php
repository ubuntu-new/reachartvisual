<?php
namespace api\actions;


use api\models\response\RavResponse;

use backend\models\Rav;
use yii\base\Exception;
use yii\helpers\Json;

class RavAction {
    public static function getList(){
//           return Artists::find()
//               ->where(['status' => '1'])
//               ->all();

        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{rav}} {{i}}
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'Rav' AND {{m}}.[[isMain]] = '1'";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}