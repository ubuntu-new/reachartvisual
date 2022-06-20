<?php
namespace api\actions;

use api\models\response\CategoriesResponse;
use backend\models\Journal;

use yii\base\Exception;
use yii\helpers\Json;

class JournalAction {
    public static function getList(){
//           return Journal::find()
//               ->where(['status' => '1'])
//               ->all();



        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{journal}} {{i}}
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'Journal' AND {{m}}.[[isMain]] = '1'";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}