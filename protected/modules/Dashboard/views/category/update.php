<?php
$this->breadcrumbs=array(
    'Category' => array('/Dashboard/category/index'),
    'Update: '.$model->cate_name
);
?>
<div class="row-fluid">
	<div class="span12">
        <div class="widget-box">
          	<div class="widget-title bg_ly"><span class="icon"><i class="icon-chevron-down"></i></span>
            	<h5>Update Category</h5>
            	<span class="buttons"><?=CHtml::link('<i class="icon-plus"></i> Manager Category', array('/Dashboard/category/index'));?></span>
          	</div>
          	<div class="widget-content nopadding">
          		<?php $this->renderPartial('_form', array('model'=>$model));?>
          	</div>
        </div>
    </div>
</div>