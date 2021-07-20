<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\notes\models\Notes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notes-form">
    <?php
    Pjax::begin(['id' => 'select']);

    $form = ActiveForm::begin(['options' => ['data-pjax' => true]]);

    echo $form->field($model, 'tag')->dropdownList(
        ArrayHelper::map($model->find()->all(), 'id', 'title'),
        [
            'prompt' => 'Выберите тему',
            'onchange' => '$.pjax.reload({container: "#lists", url: "' . Url::to(['/']) . '", data: {tag: $(this).val()}});',
            'options' => [
                $active => ['selected' => true]
            ]
        ]
    );

    ActiveForm::end();
    Pjax::end();
    ?>
</div>