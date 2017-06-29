<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>
   <?php if(Yii::$app->user->isGuest) { ?>
       <?= ListView::widget([
           'model' => $model,
           'attributes' => [
               'id',
               'title',
               'anons:ntext',
               'content:ntext',
               'category.title',
               'author.username',
               'publish_status',
               'publish_date',
           ],
       ]) ?>
   <?php } else {  ?>
       <p>
           <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
           <?= Html::a('Delete', ['delete', 'id' => $model->id], [
               'class' => 'btn btn-danger',
               'data' => [
                   'confirm' => 'Are you sure you want to delete this item?',
                   'method' => 'post',
               ],
           ]) ?>
       </p>

       <?= DetailView::widget([
           'model' => $model,
           'attributes' => [
               'id',
               'title',
               'anons:ntext',
               'content:ntext',
               'category.title',
               'author.username',
               'publish_status',
               'publish_date',
           ],
       ]) ?>

    <?php } ?>



</div>
