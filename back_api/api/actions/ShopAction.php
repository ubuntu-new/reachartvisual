<?php
namespace api\actions;


use api\models\response\ShopResponse;

use backend\models\Shop;
use backend\models\Artists;
use yii\base\Exception;
use yii\helpers\Json;

class ShopAction {
    public static function getList()
    {
//           return Artists::find()
//               ->where(['status' => '1'])
//               ->all();

        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]], {{cat}}.[[fullname]] AS [[artistsName]]
                    FROM {{shop}} {{i}} 
                    LEFT JOIN {{artists}} {{cat}}
                    ON {{i}}.[[artistsId]] = {{cat}}.[[id]]
                    LEFT JOIN {{image}} {{m}} 
                    ON {{m}}.[[itemId]] = [[i]].[[id]]
                    AND {{m}}.[[modelName]] = 'Shop' 
                    AND {{m}}.[[isMain]] = '1'
                    ORDER BY {{i}}.[[dateTime]] desc";
        $cmd = \Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}