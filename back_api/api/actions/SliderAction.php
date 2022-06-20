<?php
namespace api\actions;

use api\models\response\ProductsResponse;
use api\models\response\Result;
use rest\models\response\Response;
use api\models\response\SafeResponse;
use yii\base\Exception;
use yii\helpers\Json;

class SliderAction {
    public static function getList()
    {

        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]], {{cat}}.[[name]] AS [[categoryName]],{{cat}}.[[name_ge]] AS [[categoryName_ge]]
                    FROM {{slider}} {{i}} 
                    LEFT JOIN {{categories}} {{cat}}
                    ON {{i}}.[[catId]] = {{cat}}.[[id]]
                    LEFT JOIN {{image}} {{m}} 
                    ON {{m}}.[[itemId]] = [[i]].[[id]]
                    AND {{m}}.[[modelName]] = 'Slider' 
                    AND {{m}}.[[isMain]] = '1'
                    ORDER BY {{i}}.[[id]] desc";

        $cmd = \Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}