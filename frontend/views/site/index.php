<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'comment-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'comment')->textarea(['rows' => 5]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', [
                        'id' => 'send-comment',
                        'class' => 'btn btn-primary',
                        'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-5">
                <?php Pjax::begin(['id' => 'comments']); ?>

                <?= ListView::widget([
                    'dataProvider' => $comments,
                    'itemView' => '_list',
                ]); ?>

                <?php Pjax::end(); ?>
            </div>
        </div>

    </div>
</div>

<?

$js = <<<JS
    $('form').on('beforeSubmit', function(){
        var data = $(this).serialize();
        $.ajax({
            url: '/',
            type: 'POST',
            data: data,
            success: function(res){
                var conn = new WebSocket('ws://localhost:8080');
                conn.onopen = function(e) {
                     conn.send('1');
                }
                $.pjax.reload({container: '#comments'});
                $('#comment-form')[0].reset();
            }
        });
        return false;
    });
JS;

$this->registerJs($js);

?>