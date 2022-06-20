<?php
namespace api\actions;

use api\models\database\Products;

//use api\models\database\User;
use api\models\response\ProductsResponse;
use api\models\response\Result;

use api\models\response\SafeResponse;
use yii\base\Exception;
use yii\helpers\Json;

class ProductAction {
    public static function getList(){
        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]], {{cat}}.[[name]] AS [[categoryName]],{{cat}}.[[name_ge]] AS [[categoryName_ge]]
                    FROM {{goods}} {{i}} 
                    LEFT JOIN {{categories}} {{cat}}
                    ON {{i}}.[[catId]] = {{cat}}.[[id]]
                    LEFT JOIN {{image}} {{m}} 
                    ON {{m}}.[[itemId]] = [[i]].[[id]]
                    AND {{m}}.[[modelName]] = 'Goods' 
                    AND {{m}}.[[isMain]] = '1'
                    ORDER BY {{i}}.[[dateTime]] desc";
        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }

    public static function getFeautured(){
        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]], {{cat}}.[[name]] AS [[categoryName]],{{cat}}.[[name_ge]] AS [[categoryName_ge]]
                    FROM {{goods}} {{i}} 
                    LEFT JOIN {{categories}} {{cat}}
                    ON {{i}}.[[catId]] = {{cat}}.[[id]]
                    LEFT JOIN {{image}} {{m}} 
                    ON {{m}}.[[itemId]] = [[i]].[[id]]
                    AND {{m}}.[[modelName]] = 'Goods' 
                    AND {{m}}.[[isMain]] = '1'
                    WHERE {{i}}.[[trending]] = '1'
                    ORDER BY {{i}}.[[dateTime]] desc 
                    LIMIT 1";
        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}