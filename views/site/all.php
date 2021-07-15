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
                    <form action="">
                        <select  onchange="this.form.submit()" class="form-control" name="tag">
                        <?php
                            foreach ($tags as $key => $tag): ?>
                                <option <?= !empty($selected) && $selected->id == $tag->id ? 'selected' : ''?> value="<?=  $tag->id ?>"><?= $tag->title; ?></option>
                            <?php endforeach;
                        ?>
                        </select>
                    </form>
                </div>
                <hr>
                <ul>
                    <?php
                    if (!empty($categories)):
                        foreach ($categories as $key => $category): ?>
                            <li><?= $category->title; ?></li>
                        <?php endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
