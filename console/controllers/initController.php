<?php
/**
 * Created by PhpStorm.
 * User: Monster000
 * Date: 16/3/1
 * Time: 下午9:33
 */
namespace console\controllers;
use common\models\User;
use \yii\console\Controller;

class InitController extends Controller {
    public function actionUser() {
        echo "create init user...\n";
        $nike = $this->prompt('input nike:');
        $email = $this->prompt('input email:');
        $password = $this->prompt('input password:');
        $date = date("Y-m-d H:s:i");
        $time = strtotime($date);

        $user = new User();
        $user->nike = $nike;
        $user->password = $password;
        $user->email = $email;
        $user->avatar = "";
        $user->level = 0;
        $user->points = 0;
        $user->description = "";
        $user->gender = 0;
        $user->status = 10;
        $user->registered = $date;
        if(!$user->save()) {
            foreach($user->getErrors() as $errors) {
                foreach ($errors as $e) {
                    echo "$e\n";
                }
            }
            return 1;
        }
        return 0;
    }
}