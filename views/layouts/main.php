<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
     
    <?php $this->head() ?>
   
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
            
<?php $this->beginBody() ?>
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/theme/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->



                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/theme/assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> <?= Yii::$app->user->identity->username ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>

                                <li>
                                    <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout'],['data-method'=>'post']) ?>
         
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->


                        <?php


                        echo Menu::widget([
                            'items' => [
                                ['label' => '<i class="icon-home"></i><span class="title">Dashboard</span>', 'url' => ['site/index']],
                                //['label' => 'Tetapan Tahfiz', 'url' => ['/lookup-pusat-pengajian/index'],'options'=>['id'=>'kp']],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-settings"></i><span class="title">Tetapan</span><span class="arrow"></span></a>',
                                    'items' => [
                                        ['label' => 'Tetapan Tahfiz', 'url' => ['/lookup-pusat-pengajian/index']],
                                        ['label' => 'Senarai Pengguna', 'url' => ['/user/index']],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">KWSP<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'KWSP 11%', 'url' => ['/lookup-kwsp11/index']],
                                                ['label' => 'KWSP 8%', 'url' => ['/lookup-kwsp8/index']],
                                            ]

                                        ],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Peperiksaan<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Markah', 'url' => ['/lookup-markah/index']],
                                                [
                                                    'label' => '',
                                                    'options'=>['class'=>'nav-item'],
                                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle">Catatan Kemajuan<span class="arrow"></span></a>',
                                                    'items' => [
                                                        ['label' => 'Tahun 1', 'url' => ['/lookup-kemajuaan-tahun1/index']],
                                                        ['label' => 'Tahun 2', 'url' => ['/lookup-kemajuaan-tahun2/index']],
                                                        ['label' => 'Tahun 3', 'url' => ['/lookup-kemajuaan-tahun3/index']],
                                                        ['label' => 'Tahun 4', 'url' => ['/lookup-kemajuaan-tahun4/index']],
                                                        ['label' => 'Tahun 5', 'url' => ['/lookup-kemajuaan-tahun5/index']],
                                                        ['label' => 'Tahun 6', 'url' => ['/lookup-kemajuaan-tahun6/index']],

             
                                    
                                                        
                                                    ]

                                                ],
                                                [
                                                    'label' => '',
                                                    'options'=>['class'=>'nav-item'],
                                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle">Penilaian Amali<span class="arrow"></span></a>',
                                                    'items' => [
                                                        ['label' => 'Tahun 1', 'url' => ['/lookup-borang-penilaian-amali-tahun1/index']],
                                                        ['label' => 'Tahun 2', 'url' => ['/lookup-borang-penilaian-amali-tahun2/index']],
                                                        ['label' => 'Tahun 3', 'url' => ['/lookup-borang-penilaian-amali-tahun3/index']],
                                                        ['label' => 'Tahun 4', 'url' => ['/lookup-borang-penilaian-amali-tahun4/index']],
                                                        ['label' => 'Tahun 5', 'url' => ['/lookup-borang-penilaian-amali-tahun5/index']],
                                                        ['label' => 'Tahun 6', 'url' => ['/lookup-borang-penilaian-amali-tahun6/index']],

             
                                    
                                                        
                                                    ]

                                                ],

           
                                            ]

                                        ],


                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Yuran<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Tahun 1', 'url' => ['/lookup-yuran-tahun1/index']],
                                                ['label' => 'Tahun 2', 'url' => ['/lookup-yuran-tahun2/index']],
                                                ['label' => 'Tahun 3', 'url' => ['/lookup-yuran-tahun3/index']],
                                                ['label' => 'Tahun 4', 'url' => ['/lookup-yuran-tahun4/index']],
                                                ['label' => 'Tahun 5', 'url' => ['/lookup-yuran-tahun5/index']],
                                                ['label' => 'Tahun 6', 'url' => ['/lookup-yuran-tahun6/index']],
           
                                            ]

                                        ],
                                    ]
                                ],
                                ['label' => '<h3 class="uppercase">HUMAN RESOURCES</h3>',
                                    'options'=>['class'=>'heading'],
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-users"></i><span class="title">Pengurusan Kakitangan</span><span class="arrow"></span></a>',
                                    'items' => [
                                        ['label' => 'Maklumat Kakitangan', 'url' => ['/maklumat-kakitangan/index']],
                                        ['label' => 'Maklumat Berhenti', 'url' => ['/maklumat-kakitangan/resign']],
                                        ['label' => 'Surat Tawaran', 'url' => ['/maklumat-kakitangan/surat']],
                                        ['label' => 'Maklumat Cuti', 'url' => ['/maklumat-cuti/index']],
                                    ]
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-user"></i><span class="title">Pengurusan Pelajar</span><span class="arrow"></span></a>',
                                    'items' => [
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Pentadbiran<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Maklumat Pelajar', 'url' => ['/maklumat-pelajar/index']],
                                                ['label' => 'Maklumat Pelajar Pending', 'url' => ['#']],
                                                ['label' => 'Bilangan Pelajar Mengikut Tahfiz', 'url' => ['#']],
                                            ]

                                        ],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Kewangan<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Yuran Pendaftaran', 'url' => ['/yuran-semasa/index']],
                                                ['label' => 'Laporan Kewangan', 'url' => ['#']],
                            
                                                
                                            ]

                                        ],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Peperiksaan<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Penilaian Amali', 'url' => ['/penilaian-amali/index']],
                                                ['label' => 'Catatan Kemajuan', 'url' => ['/catatan-kemajuaan/index']],
                                                ['label' => 'Laporan', 'url' => ['#']],
                                          
                                                
                                            ]

                                        ],

                                    ]
                                ],
                                ['label' => '<h3 class="uppercase">PAYROLL</h3>',
                                    'options'=>['class'=>'heading'],
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-wallet"></i><span class="title">Pengurusan Gaji</span><span class="arrow"></span></a>',
                                    'items' => [
                                                ['label' => 'Maklumat Kakitangan', 'url' => ['maklumat-kakitangan/pengurusan_gaji']],
                                                ['label' => 'Proses Gaji', 'url' => ['#']],
                                    ]
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-briefcase"></i><span class="title">Laporan Kewangan</span><span class="arrow"></span></a>',
                                    'items' => [
                                                ['label' => 'Laporan Gaji Bersih', 'url' => ['pay-slip/laporan_gaji']],
                                                ['label' => 'Laporan EPF', 'url' => ['#']],
                                                ['label' => 'Laporan SOCSO', 'url' => ['#']],
                                                ['label' => 'Laporan Tabung Kebajikan', 'url' => ['#']],
                                                ['label' => 'Laporan Tabung Guru', 'url' => ['#']],
                                                ['label' => 'Laporan CTG', 'url' => ['#']],
                                                ['label' => 'Laporan Sewa Rumah', 'url' => ['#']],
                                                ['label' => 'Laporan KKSK', 'url' => ['#']],
                                                ['label' => 'Laporan Tabung Haji', 'url' => ['#']],
                                                ['label' => 'Laporan Bank', 'url' => ['#']],
                                                ['label' => 'Pengurusan Cuti', 'url' => ['#']],
                                    ]
                                ],

                            ],
                            'activateParents'=>true,
                            'encodeLabels' => false,
                            'options' => [
                                            'id' => 'menu',
                                            'class' => 'page-sidebar-menu  page-header-fixed',
                                            'data-keep-expanded' => 'false',
                                            'data-auto-scroll' => 'true',
                                            'data-slide-speed' => '200',
                                        ],
                            'itemOptions'=> ['class' => 'nav-item'],
                            'submenuTemplate' => "\n<ul class='sub-menu' >\n{items}\n</ul>\n",
                            //array('id'=>'item_id', 'class'=>'item_class', 'style'=>''),


                            //'submenuTemplate' => "\n<ul class='dropdown-menu pull-right' role='menu'>\n{items}\n</ul>\n",
                        ]);
                        ?>




                    <!-- END SIDEBAR MENU -->

                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
              
                        <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'itemTemplate' => '<li>{link}<i class="fa fa-circle"></i></li>',
                                'options' => [
                                    'class' => 'page-breadcrumb'
                                ]
                        ]) ?>

                        <div class="page-toolbar">
                            <div id="tarikh" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Tarikh">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase"><?= date('M d,Y') ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->

                    <?= $content ?>



                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->




           
        </div>
        <!-- END CONTAINER -->



<?php $this->endBody() ?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?= date('Y')?> &copy; TAFHIM - Human Resource & Payroll System.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

</body>
</html>
<?php 
Modal::begin([
    'header' =>'Tafhim',
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE],

]);

echo "<div id='modalContent'></div>";
Modal::end();



$this->endPage() ?>
