<?php
$this->breadcrumbs=array(
    'Ads' => array('/Dashboard/ads/index'),
    'Index'
);
?>
<div class="row-fluid">
	<div class="span12">
        <div class="widget-box">
          	<div class="widget-title bg_ly"><span class="icon"><i class="icon-chevron-down"></i></span>
            	<h5>Manager Ads</h5>
            	<span class="buttons"><?=CHtml::link('<i class="icon-plus"></i> Create Ads', array('/Dashboard/ads/create'));?></span>
          	</div>
          	<div class="widget-content nopadding">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'news-grid',
    'dataProvider'=>$model->search(),
    'template'=>'{items}{pager}{summary}',
    'pager'=>array(
        'header'=>'',
        'htmlOptions'=>array(
            'class'=>'pagination alternate'
        )
    ),
    //'filter'=>$model,
    'itemsCssClass'=>'table table-bordered table-striped',
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array(
                'style'=>'width: 40px;text-align: right;'
            )
        ),
        'ad_name',
        array(
            'name'=>'ad_type',
            'value'=>'$data->getType()'
        ),
        array(
            'class'=>'CButtonColumn',
            'header'=>'Action',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'delete'=>array(
                    'label'=>'<i class="icon-trash"></i>',
                    'imageUrl'=>false,
                    'options'=>array(
                        'class'=>'btn btn-danger btn-small show-tooltip',
                        'title'=>'Delete'
                    ),
                ),
                'update'=>array(
                    'label'=>'<i class="icon-edit"></i>',
                    'imageUrl'=>false,
                    'options'=>array(
                        'class'=>'btn btn-success btn-small show-tooltip',
                        'title'=>'Edit'
                    ),
                ),
                'view'=>array(
                    'label'=>'<i class="icon-eye-open"></i>',
                    'imageUrl'=>false,
                    'options'=>array(
                        'class'=>'btn btn-info btn-small show-tooltip',
                        'title'=>'View'
                    ),
                ),
            ),
            'htmlOptions'=>array(
                'width'=>'120px',
            ),
        ),
    ),
    'htmlOptions'=>array(
        'class'=>''
    ),
)); ?>
			</div>
		</div>
    </div>
</div>