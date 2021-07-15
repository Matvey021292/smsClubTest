<?php

/* @var $this yii\web\View */

use yii\bootstrap\Collapse;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php if (!empty($tags)): ?>
        <div class="body-content">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $items = [];
                    foreach ($tags as $k => $tag):
                        $items[$k]['label'] = $tag->title;
                        if (!empty($tag->categories)):
                            foreach ($tag->categories as $key => $category):
                                $items[$k]['content'][] = $category->title;
                            endforeach;
                        endif;
                    endforeach; ?>
                    <?php
                    echo Collapse::widget([
                        'items' => $items
                    ]);
                    ?>
                </div>
            </div>
        </div>
    <?php else: ?>

    <?php endif; ?>
</div>
