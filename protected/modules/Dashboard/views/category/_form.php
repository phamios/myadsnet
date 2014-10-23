<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'category-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
    )
)); ?>
<div class="control-group">
  	<?php echo $form->labelEx($model, 'cate_name', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->textField($model, 'cate_name', array('class'=>'span11')); ?>
  		<?php echo $form->error($model, 'cate_name', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="control-group">
  	<?php echo $form->labelEx($model, 'cate_root', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->dropDownList($model, 'cate_root', CHtml::listData(Category::model()->findAll(), 'id', 'cate_name', 'parent_category.cate_name'), array('class'=>'span11', 'prompt'=>'Select Root Category')); ?>
  		<?php echo $form->error($model, 'cate_root', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="control-group">
  	<?php echo $form->labelEx($model, 'cate_status', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->dropDownList($model, 'cate_status', array('active'=>'Active', 'inactive'=>'Inactive'), array('class'=>'span11')); ?>
  		<?php echo $form->error($model, 'cate_status', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="form-actions">
  	<button type="submit" class="btn btn-success">Submit</button>
  	<button type="reset" class="btn btn-default">Reset</button>
</div>
<?php $this->endWidget(); ?>