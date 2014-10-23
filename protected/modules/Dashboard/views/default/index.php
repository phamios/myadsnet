<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Homepage',
);
?>
<div class="row-fluid">
	<div class="span12">
        <div class="widget-box">
          	<div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            	<h5>Latest Notice</h5>
          	</div>
          	<div class="widget-content">
<?php if(Yii::app()->user->hasFlash('message')):?>
    <div class="alert alert-dismissable alert-success">
        <?php echo Yii::app()->user->getFlash('message'); ?>
    </div>
<?php endif; ?>
          	</div>
        </div>

	</div>
</div>