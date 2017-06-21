<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/17
 * Time: 15:03
 */
namespace app\models;
use yii\base\Model;
class Entry extends \yii\db\ActiveRecord{
    public $name;
    public $email;
    public $image;

    public static function tableName(){
        return 'entry';
    }

    public function rules(){
        return[
            [['name','email'],'required'],
            ['email','email'],
            [['name'],'string','max'=>10],
            [['email'],'string','max'=>12],
        ];
    }

}