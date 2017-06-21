<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 16:12
 */
namespace app\models;
use yii\base\Model;
class UserForm extends Model
{
    public $user_email;

    public $user_password;
    public function rules()
    {
        return [
            // 在这里定义验证规则
            [['user_email','user_password'],'required'],
            ['user_email','user_email'],
        ];
    }
}