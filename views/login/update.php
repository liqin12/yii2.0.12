<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 18:06
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?=HTML::csrfMetaTags()?>
<form action="<?=\yii\helpers\Url::to(['update'])?>" method="post" >
    姓名：<input type="text" name="name" value="<?=Html::encode("{$data['name']}") ?>" ><br>
    邮箱：<input type="text" name="email" value="<?=Html::encode("{$data['email']}")  ?>" ><br>
    <input type="hidden" name="id" value="<?=Html::encode("{$data['id']}") ?>" >
    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <input type="submit" value="修改" >
</form>



