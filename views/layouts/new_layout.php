<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yiister\gentelella\assets\Asset;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}
Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-binoculars"></i> <span>My Inventory</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                 <div class="profile">
                      <?php 
                        if (Yii::$app->user->isGuest) {
                                
                         ?>
                         <li>
                            <div class="profile_info">
                             <a href="login" class="user-profile">Please Login</a>
                            </div>
                         </li>
                     <?php }else{ ?>
                    <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= Yii::$app->user->identity->username ?></h2>
                        <?php 
                            $status;
                            $level = Yii::$app->user->identity->level;
                            if ($level == '1') {
                                $status = "Administrator";
                            }else if ($level == '2') {
                                $status = "Operator";
                            }else{
                                $status = "pegawai";
                            }
                         ?>
                        <i>As <?= $status ?></i>
                    </div>
                <?php } ?>
                </div>
                 <div class="clearfix"></div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => ["site/index"], "icon" => "home"],
                                    [
                                        "label" => "Kelola Inventaris",
                                        "icon" => "recycle",
                                        "url" => "#",
                                        "items" => [
                                                ["label" => "Input Inventaris", "url" => ["app-inventaris/index"], "icon" => "paw"],

                                                ["label" => "Input Ruang", "url" => ["app-ruang/index"], "icon" => "university"],

                                                ["label" => "Input Jenis", "url" => ["app-jenis/index"], "icon" => "pencil"],

                                                ["label" => "Input Level", "url" => ["app-level/index"], "icon"=>"tag"],
                                                ["label" => "Input Petugas", "url" => ["app-petugas/index"],"icon" => "user"],

                                                ["label" => "Input Pegawai", "url" => ["app-pegawai/index"], "icon"=>"user-o"],

                                                ["label" => "Tambah User", "url" => ["app-user/index"], "icon"=>"user-circle"],
                        
                                        ],
                                    ],
                                    ["label" => "Peminjaman", "url" => ["app-peminjaman/index"], "icon" => "handshake-o"],
                                    // ["label" => "Report Inventaris", "url" => ["report/inventarisir"], "icon" => "book"],
                                    
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                   
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                       <?php 
                            if (Yii::$app->user->isGuest) {
                                
                         ?>
                         <li>
                             <a href="/inventoryii/web/site/login" class="user-profile">Login</a>
                         </li>
                     <?php }else{ ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt=""><?= Yii::$app->user->identity->username ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile (<?= Yii::$app->user->identity->username ?>)</a>
                                </li>
                               
                                <li>
                                    <div class="clearfix"></div>
                                    <?= 
                                        '<li>'
                                        . Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                            'Logout',
                                            ['class' => 'user-profile btn btn-secondary btn-block text-left']
                                        )
                                        . Html::endForm()
                                        . '</li>'
                                     ?>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
               &copy;<?= date('Y') ?> Copyright by Gakim : Yii2-Inventarisir
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>