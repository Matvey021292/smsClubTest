<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_form', [
                    'model' => $model,
                    'active' => $active
                ]) ?>

                <?php
                Pjax::begin(['id' => 'lists']);
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'title:ntext',
                    ],
                ]);
                Pjax::end();
                ?>
            </div>
            <hr>
        </div>
    </div>
</div>
