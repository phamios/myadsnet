<div class="control-group image">
	<?php if (!$model->isNewRecord) {
	    echo $form->hiddenField($model, "[$id]id");
	} ?>
  	<?php echo $form->labelEx($model, "[$id]img_link", array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo CHtml::activeFileField($model, "[$id]img_link", array('class'=>'')); ?>
  		<?=CHtml::link('Remove', '#', array('onClick'=>'remove_image($(this));return false;', 'class'=>'add-on btn btn-danger'));?>
  		<?php echo $form->error($model, "[$id]img_link", array('class'=>'help-block')); ?>
  	</div>
</div>