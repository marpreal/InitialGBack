<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Extensiones
use dosamigos\ckeditor\CKEditor;
use kartik\datecontrol\DateControl;

// Modelos Relacionados
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $options = ArrayHelper::map(Usuarios::find()->asArray()->all(), 'id', 'nombre'); ?>
    <?= $form->field($model, 'usuario_id')->dropDownList($options, ['prompt' => 'Seleccionar Creador']); ?>

    <?= $form->field($model, 'creado')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]); ?>

    <?= $form->field($model, 'contenido')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>