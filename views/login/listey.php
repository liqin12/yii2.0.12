<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<table border="1px">
    <tr><th><a href="<?=Url::to(['index']) ?>">增加</a></th></tr>
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>邮箱</th>
        <th>操作</th>
    </tr>
    <?php foreach ($list as $v){ ?>
    <tr>
        <td><?=Html::encode("{$v['id']}") ?></td>
        <td><?=Html::encode("{$v['name']}") ?></td>
        <td><?=Html::encode("{$v['email']}") ?></td>
        <td>
            <a href="<?=Url::to(['update','id'=>$v['id']]) ?>" >修改</a>
            <a href="<?=Url::to(['delete','id'=>$v['id']]) ?>" >删除</a>
        </td>
    </tr>
    <?php } ?>
</table>
