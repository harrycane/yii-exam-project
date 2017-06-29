<?php

/* @var $this yii\web\View */

$this->title = 'The Sitest Site';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">На наш сайт!</p>
    </div>

    <div class="body-content">
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-lg-4">
                    <h2><?php echo $post->title;?></h2>

                    <p><?php echo $post->anons;?></p>

                    <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['post/view', 'id' => $post->id]);?>">Ссылка на новость &raquo;</a></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
