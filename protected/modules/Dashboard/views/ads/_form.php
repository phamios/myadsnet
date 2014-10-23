<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ads-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
        'enctype' => 'multipart/form-data'
    )
)); ?>

<div class="control-group">
  	<?php echo $form->labelEx($model, 'ad_name', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->textField($model, 'ad_name', array('class'=>'span11')); ?>
  		<?php echo $form->error($model, 'ad_name', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'ad_type', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo $form->dropDownList($model, 'ad_type', $model->ad_type_list, array('class'=>'span11')); ?>
      <?php echo $form->error($model, 'ad_type', array('class'=>'help-block')); ?>
    </div>
</div>

<div class="control-group">
  	<?php echo $form->labelEx($model, 'ad_link', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->textField($model, 'ad_link', array('class'=>'span11')); ?>
  		<?php echo $form->error($model, 'ad_link', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="control-group">
  	<?php echo $form->labelEx($model, 'ad_status', array('class'=>'control-label'));?>
  	<div class="controls">
  		<?php echo $form->dropDownList($model, 'ad_status', array('active'=>'Active', 'inactive'=>'Inactive'), array('class'=>'span11')); ?>
  		<?php echo $form->error($model, 'ad_status', array('class'=>'help-block')); ?>
  	</div>
</div>

<div class="control-group">
    <label for="Images" class="control-label">Images</label>
    <div class="controls">
      <?php $this->widget('CMultiFileUpload', array(
          'name' => 'Images',
          'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
          'duplicate' => 'Duplicate file!', // useful, i think
          'denied' => 'Invalid file type', // useful, i think
          'htmlOptions' => array('class'=>'span11'),
      )); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model_category, 'id_category', array('class'=>'control-label')); ?>
    <div class="controls">
      <?php echo $form->dropDownList($model_category, 'id_category', CHtml::listData(Category::model()->findAll(), 'id', 'cate_name', 'parent_category.cate_name'), array('class'=>'select category-multi span11', 'multiple'=>'multiple', 'options'=>$list_category)); ?>
      <?php echo $form->error($model_category, 'id_category', array('class'=>'help-block')); ?>
    </div>
</div>

<div class="form-actions">
  	<button type="submit" class="btn btn-success">Submit</button>
  	<button type="reset" class="btn btn-default">Reset</button>
</div>
<?php $this->endWidget(); ?>