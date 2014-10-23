<?php
$this->breadcrumbs=array(
    'Ads' => array('/Dashboard/ads/index'),
    'Update: '.$model->ad_name
);
?>
<div class="row-fluid">
	<div class="span12">
        <div class="widget-box">
          	<div class="widget-title bg_ly"><span class="icon"><i class="icon-chevron-down"></i></span>
            	<h5>Update Ads</h5>
            	<span class="buttons"><?=CHtml::link('<i class="icon-plus"></i> Manager Ads', array('/Dashboard/ads/index'));?></span>
              <span class="buttons"><?php echo CHtml::link('<i class="icon-plus"></i> Add Image', '#', array('onClick'=>'add_image();return false;', 'id'=>'add_image'));?></span>
          	</div>
          	<div class="widget-content nopadding">
          		<?php $this->renderPartial('_form', array(
                'model'=>$model,
                'model_category'=>$model_category,
                'list_category'=>$list_category,
              ));?>
          	</div>
        </div>
    </div>
</div>