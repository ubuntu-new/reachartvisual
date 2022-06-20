<?php
namespace rest\controllers;

use api\actions\UserAction;
use api\actions\UserPasswordResetAction;
use api\models\database\Poses;
use api\models\database\Safe;
use rest\models\response\Response;
use rest\models\response\TokenInfo;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\web\User;

class AuthController extends LangController {


    public function behaviors() {

        $behaviors['cors'] = ['class' => Cors::class];
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
           /* 'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class
            ]*/
        ];
        return $behaviors;
    }



    /*public function actionIndex() {
        $post = \Yii::$app->request->post();

        if (!isset($post['username']) || empty($post['username']))
            throw new HttpException(422, "Missing parameter: 'username'");
        if (!isset($post['password']) || empty($post['password']))
            throw new HttpException(422, "Missing parameter: 'password'");

        $token = UserAction::tryToFetchAccessToken($post['username'], $post['password']);
        if (!$token)
            throw new HttpException(401, "Authentication Failed!");
        return ['token' => $token];
    }*/

    public function actionIndex() {
        $response = new Response();


            $username = trim(\Yii::$app->request->post('username'));
            $password = trim(\Yii::$app->request->post('password'));


            if (!$username) {
                $response->error_message = "Missing parameter: 'username'";
                return $response;
            }

            if (!$password) {
                $response->error_message = "Missing parameter: 'password'";
                return $response;
            }

            $user = UserAction::tryToFetchAccessToken($username, $password);


        if (!$user) {
            $response->error_message = 'Incorrect username or password';
            return $response;
        }

        $dir = "";
        $token_info = new TokenInfo();
        $token_info->token = $user->access_token;
        $token_info->id = $user->id;
        $token_info->first_name = $user->username;


        $token_info->email = $user->email;
        $roleModel = \Yii::$app->db
            ->createCommand("Select * from auth_assignment where user_id='$user->id'")
            ->queryOne();
        $token_info->role = $roleModel['item_name'];

        $response->is_error = false;
        $response->data = $token_info;
        return $response;
    }


    public function actionClocked() {
        $response = new Response();
        if (\Yii::$app->request->post("pin")) {


            $user = UserAction::tryToFetchAccessTokenClocked(trim(\Yii::$app->request->post("pin")));

        }


        if (!$user) {
            $response->error_message = 'Incorrect username or password';
            return $response;
        }

        $dir = "";
        $token_info = new TokenInfo();
        $token_info->token = $user->access_token;
        $token_info->id = $user->id;
        $token_info->first_name = $user->username;
        $token_info->email = $user->email;
        $roleModel = \Yii::$app->db
            ->createCommand("Select * from auth_assignment where user_id='$user->id'")
            ->queryOne();
        $token_info->role = $roleModel['item_name'];

        $response->is_error = false;
        $response->data = $token_info;
        return $response;
    }

    public function actionResetPasswordCode() {
        $email = trim(\Yii::$app->request->post('email'));
        $program = trim(\Yii::$app->request->post('program'));
        $response = new Response();

        if (!$email) {
            $response->error_message = "Missing parameter: 'email'";
            return $response;
        }

        if (!$program) {
            $response->error_message = "Missing parameter: 'program'";
            return $response;
        }

        $response->is_error = !UserPasswordResetAction::requestPasswordResetCode($email, $program);
        return $response;
    }

    public function actionResetPassword() {
        $email = trim(\Yii::$app->request->post('email'));
        $code = trim(\Yii::$app->request->post('code'));
        $password = trim(\Yii::$app->request->post('password'));
        $password_repeat = trim(\Yii::$app->request->post('password_repeat'));
        $response = new Response();

        if (!$email) {
            $response->error_message = "Missing parameter: 'email'";
            return $response;
        }

        if (!$code) {
            $response->error_message = "Missing parameter: 'code'";
            return $response;
        }

        if (!$password) {
            $response->error_message = "Missing parameter: 'password'";
            return $response;
        }

        if (!$password_repeat) {
            $response->error_message = "Missing parameter: 'password repeat'";
            return $response;
        }

        if ($password != $password_repeat) {
            $response->error_message = "Passwords do not match";
            return $response;
        }

        $result = UserPasswordResetAction::processPasswordReset($email, $code, $password);
        $response->is_error = !$result;
        $response->error_message = (!$result) ? \Yii::t('Notifications', 'Operation failed') : '';
        return $response;
    }

}