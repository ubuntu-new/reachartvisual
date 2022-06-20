<?php
namespace api\actions;


use api\models\response\ArtistsResponse;

use backend\models\Artists;
use yii\base\Exception;
use yii\helpers\Json;

class ArtistsAction {
    public static function getList(){
//           return Artists::find()
//               ->where(['status' => '1'])
//               ->all();

        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{artists}} {{i}}
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'Artists' AND {{m}}.[[isMain]] = '1'";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}