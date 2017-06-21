<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Entry;
class LoginController extends Controller
{
    public $layout=false;

    /**
     * yii表单创建
     *
     * @return string
     */
    public function actionIndex()
    {
        $model=new Entry();
        return $this->renderPartial('index',[
            'model'=>$model
        ]);
    }

    /**
     * yii接收form表单的数据,并处理
     */
    public function actionList(){
        $model=new Entry();
        $request=Yii::$app->request;
        //接收所有参数
        $data=$request->bodyParams;
        $post=$request->post('Entry');
        $model->name=$post['name'];
        $model->email=$post['email'];
//        var_dump($model->name);
//        var_dump($model->email);
//
//        $rs=$model->save(false);

       $rs= Yii::$app
                   ->db
                   ->createCommand()
                   ->insert(Entry::tableName(),$post)
                   ->execute();
        if ($rs){
            $this->redirect(['listey']);
            //var_dump($rs);
        }
    }

    /**
     * 查询出数据，展示数据列表
     */
    public function actionListey(){
        $model=new Entry();
        //$list=Entry::find()->orderBy('id')->all();
        $list=Yii::$app
                    ->db
                    ->createCommand('select * from entry')
                    ->queryAll();
        return $this->renderPartial('listey',[
            'list'=>$list,
        ]);
    }

    /**
     * 修改数据 并处理数据
     */
    public function actionUpdate(){
        $model=new Entry();
        $id=Yii::$app->request->get('id');
        $data=Yii::$app
                    ->db
                    ->createCommand('select * from entry where id=:id')
                    ->bindValue(':id',$id)
                    ->queryOne();

        $post=Yii::$app->request->post();
        if ($post){
            $id=$post['id'];
            $list['name']=$post['name'];
            $list['email']=$post['email'];
            $rs=Yii::$app
                    ->db
                    ->createCommand()
                    ->update(Entry::tableName(),$list,['id'=>$id])
                    ->execute();
            if ($rs){
                return $this->redirect(['listey']);
            }
        }

        return $this->renderPartial('update',[
            'data'=>$data,
        ]);
    }

    /**
     *删除数据
     */
    public function actionDelete(){
        $id=Yii::$app->request->get('id');
        $rs=Yii::$app
                ->db
                ->createCommand()
                ->delete(Entry::tableName(),['id'=>$id])
                ->execute();
        if ($rs){
            return $this->redirect(['listey']);
        }
    }

    /**
     * 登录
     */
    public function actionLogin(){
        $model=new Entry();
        return $this->render('register', [
            'model' => $model,]);
    }
}
