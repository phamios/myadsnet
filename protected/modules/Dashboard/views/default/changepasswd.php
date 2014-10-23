<?php
$this->breadcrumbs=array(
    'Change password'
);
?>
<div class="row-fluid">
  <div class="span12">
        <div class="widget-box">
            <div class="widget-title bg_ly"><span class="icon"><i class="icon-chevron-down"></i></span>
              <h5>Change password</h5>
            </div>
            <div class="widget-content nopadding">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'admin-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    )
)); ?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'current_password', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo $form->passwordField($model, 'current_password', array('class'=>'span11')); ?>
      <?php echo $form->error($model, 'current_password', array('class'=>'help-block')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'new_password', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo $form->passwordField($model, 'new_password', array('class'=>'span11')); ?>
      <?php echo $form->error($model, 'new_password', array('class'=>'help-block')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'confirm_new_password', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo $form->passwordField($model, 'confirm_new_password', array('class'=>'span11')); ?>
      <?php echo $form->error($model, 'confirm_new_password', array('class'=>'help-block')); ?>
    </div>
</div>

<div class="form-actions">
  	<button type="submit" class="btn btn-success">Submit</button>
  	<button type="reset" class="btn btn-default">Reset</button>
</div>
<?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>