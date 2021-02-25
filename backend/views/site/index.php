<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <?php Pjax::begin(['id' => 'comments']); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'username:ntext',
                    'comment:ntext',
                    'created_at:datetime',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>

    </div>
</div>

<script type="text/javascript">
    var conn = new WebSocket('ws://localhost:8080');

    conn.onmessage = function(e) {
        $.pjax.reload({container: '#comments'});
        console.log('Response:' + e.data);
    };
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onclose = function (e) {
        console.log("Закрыт");
    };
</script>
