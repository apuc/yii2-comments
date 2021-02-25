<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article class="item" data-key="<?= $model->id; ?>">
    <h2 class="item-username">
        <?= Html::encode($model->username); ?>
    </h2>

    <div class="item-comment">
        <?= Html::encode($model->comment); ?>
    </div>

    <div class="item-created">
        <?= date('Y-m-d H:i:s', Html::encode($model->created_at)); ?>
    </div>

</article>