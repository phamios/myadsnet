<?php
$this->breadcrumbs=array(
    'Ads' => array('/Dashboard/ads/index'),
    'View: '.$model->ad_name
);
?>
<div class="row-fluid">
	<div class="span12">
        <div class="widget-box">
          	<div class="widget-title bg_ly"><span class="icon"><i class="icon-chevron-down"></i></span>
            	<h5>View Ads</h5>
            	<span class="buttons"><?=CHtml::link('<i class="icon-plus"></i> Update Ads', array('/Dashboard/ads/update', 'id'=>$model->id));?></span>
          	</div>
          	<div class="widget-content nopadding form-horizontal">
<div class="control-group">
    <?php echo CHtml::activeLabel($model, 'ad_name', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo CHtml::activeTextField($model, 'ad_name', array('class'=>'span11')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo CHtml::activeLabel($model, 'ad_type', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo CHtml::activeTextField($model, 'ad_type', array('class'=>'span11')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo CHtml::activeLabel($model, 'ad_link', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo CHtml::activeTextField($model, 'ad_link', array('class'=>'span11')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo CHtml::activeLabel($model, 'ad_status', array('class'=>'control-label'));?>
    <div class="controls">
      <?php echo CHtml::activeTextField($model, 'ad_status', array('class'=>'span11')); ?>
    </div>
</div>

<div id="form_image">
    <?php if (!empty($model->images)) {
        foreach($model->images as $i => $image) : ?>
            <div class="control-group image" id="image_<?=$image->id;?>">
                <?php echo CHtml::activeLabel($image, "[$i]img_link", array('class'=>'control-label'));?>
                <div class="controls">
                  <input class="span9" type="text" value="<?=Yii::app()->getBaseUrl(true).'/images/'.$image->img_link;?>" />
                  <?=CHtml::link('Remove', '#', array('onClick'=>'remove_image('.$model->id.', '.$image->id.');return false;', 'class'=>'add-on btn btn-danger'));?>
                </div>
            </div>
        <?php endforeach;
    } ?>
</div>

<div class="control-group">
    <label class="control-label">Category</label>
    <div class="controls">
      <input class="span11" value="<?php $i=0;$c=count($model->categories);
      foreach ($model->categories as $category) {
        $i++;
        echo $category->cate_name;
        if ($i<$c) {
          echo ', ';
        }
      } ?>" />
    </div>
</div>
          	</div>
        </div>
    </div>
</div>

<script type="text/javascript">
function remove_image(id_ads, id_image) {
  if (confirm('Do you want to remove this image?')) {
    $.ajax({
      url : "<?=Yii::app()->createAbsoluteUrl('/Dashboard/ads/image'); ?>",
      type: "POST",
      data : {
        'id_ads': id_ads,
        'id_image': id_image
      },
      success: function(data, textStatus, jqXHR)
      {
          if (data == 'success') {
            $("#image_"+id_image).remove();
            alert('Delete image successfully!');
          }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Delete image Unsuccessfully!');
      }
    });
  }
}
</script>