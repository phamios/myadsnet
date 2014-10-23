<div id="loginbox">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'loginform',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
    'htmlOptions'=>array(
        'class'=>'form-vertical',
        'style'=>''
    )
)); ?>
	<div class="control-group normal_text"> <h3><img src="<?=Yii::app()->theme->baseUrl;?>/img/logo.png" alt="Logo" /></h3></div>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-dismissable alert-danger">
            <?php echo $form->error($model,'authenticate'); ?>
            <?php echo $form->error($model,'username'); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    <?php endif; ?>

    <div class="control-group">
        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>"Username")); ?>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>"Password")); ?>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
    <div class="form-actions text-center">
        <div class="pull-left"><label><?php echo $form->checkBox($model,'rememberMe', array('style'=>'margin-bottom: 0px')); ?> Remember Me</label></div>
        <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
    </div>
<?php $this->endWidget(); ?>
</div>