<?php

/* @var $this yii\web\View */

use yii\bootstrap\Collapse;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <?= Collapse::widget(['items' => $items]); ?>
            </div>
        </div>
    </div>
</div>
