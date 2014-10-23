<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$this->pageTitle;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/uniform.css" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/select2.css" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/matrix-style.css" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/css/matrix-media.css" />
<link href="<?=Yii::app()->theme->baseUrl;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="<?=Yii::app()->createUrl('/Dashboard/default/index');?>"><?=Yii::app()->name;?></a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <?php $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
        array('label'=>'<i class="icon icon-user"></i> <span class="text">Welcome <strong>'.Yii::app()->user->name.'</strong></span>', 'url'=>array('/Dashboard/default/index')),
        array('label'=>'<i class="icon icon-cog"></i> <span class="text">Change password</span>', 'url'=>array('/Dashboard/default/changepasswd')),
        array('label'=>'<i class="icon icon-share-alt"></i> <span class="text">Logout</span>', 'url'=>array('/Dashboard/default/logout')),
      ),
      'encodeLabel'=>false,
      'htmlOptions'=>array(
        'class'=>'nav'
      ),
    )); ?>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <?php $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
        array('label'=>'<i class="icon icon-home"></i> <span>Dashboard</span>', 'url'=>array('/Dashboard/default/index')),
        array(
          'label'=>'<i class="icon icon-th-list"></i> <span class="text">Categories</span>',
          'url'=>array('/Dashboard/category/index'),
          'items'=>array(
            array('label'=>'All categories', 'url'=>array('/Dashboard/category/index')),
            array('label'=>'Create category', 'url'=>array('/Dashboard/category/create')),
          ),
          'itemOptions'=>array(
            'class'=>'submenu'
          ),
        ),
        array(
          'label'=>'<i class="icon icon-tint"></i> <span class="text">Ads</span>',
          'url'=>array('/Dashboard/ads/index'),
          'items'=>array(
            array('label'=>'All ads', 'url'=>array('/Dashboard/ads/index')),
            array('label'=>'Create ads', 'url'=>array('/Dashboard/ads/create')),
          ),
          'itemOptions'=>array(
            'class'=>'submenu'
          ),
        ),
      ),
      'encodeLabel'=>false,
      'htmlOptions'=>array(
        'class'=>'nav-main'
      ),
    )); ?>
<!--   <ul>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul> -->
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
          'links'=>$this->breadcrumbs,
          'separator'=>'',
          'inactiveLinkTemplate'=>'<a href="#" class="current">{label}</a>',
          'homeLink' => CHtml::link('<i class="icon-home"></i> Dashboard', Yii::app()->homeUrl),
          'htmlOptions'=>array(
            'id'=>'breadcrumb'
          ),
        )); ?><!-- breadcrumbs -->
        <?php endif?>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
      <?php echo $content; ?>
    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?=date('Y');?> &copy; API <a href="http://admega.vn">Admega</a> Admin.</div>
</div>

<!--end-Footer-part-->

<script src="<?=Yii::app()->theme->baseUrl;?>/js/excanvas.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=Yii::app()->theme->baseUrl;?>/js/jquery.min.js"><\/script>')</script>
<script src="<?=Yii::app()->theme->baseUrl;?>/js/jquery.ui.custom.js"></script>
<script src="<?=Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
<script src="<?=Yii::app()->theme->baseUrl;?>/js/jquery.uniform.js"></script>
<script src="<?=Yii::app()->theme->baseUrl;?>/js/select2.min.js"></script>
<script src="<?=Yii::app()->theme->baseUrl;?>/js/matrix.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>