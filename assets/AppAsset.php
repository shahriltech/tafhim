<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
            //'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
            'theme/assets/global/plugins/font-awesome/css/font-awesome.min.css',
            'theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
            'theme/assets/global/plugins/bootstrap/css/bootstrap.min.css',
            'theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
            'theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
            'theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
            'theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
            'theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
            'theme/assets/global/plugins/morris/morris.css',
            'theme/assets/global/plugins/fullcalendar/fullcalendar.min.css',
            'theme/assets/global/plugins/jqvmap/jqvmap/jqvmap.css',
            'theme/assets/global/css/components-md.min.css',
            'theme/assets/global/css/plugins-md.min.css',

            'theme/assets/layouts/layout/css/layout.min.css',
            'theme/assets/layouts/layout/css/themes/darkblue.min.css',
            'theme/assets/layouts/layout/css/custom.min.css',


            //'theme/assets/layouts/layout2/css/layout.min.css',
            //'theme/assets/layouts/layout2/css/themes/blue.min.css',
            //'theme/assets/layouts/layout2/css/custom.min.css',


    ];
    public $js = [

            'theme/assets/global/plugins/bootstrap/js/bootstrap.min.js',
            'theme/assets/global/plugins/js.cookie.min.js',
            'theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
            'theme/assets/global/plugins/jquery.blockui.min.js',
            'theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
            'theme/assets/global/plugins/moment.min.js',
            'theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
            'theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
            'theme/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
            'theme/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
            'theme/assets/global/plugins/morris/morris.min.js',
            'theme/assets/global/plugins/morris/raphael-min.js',
            'theme/assets/global/plugins/counterup/jquery.waypoints.min.js',
            'theme/assets/global/plugins/counterup/jquery.counterup.min.js',
            'theme/assets/global/scripts/app.min.js',
            'theme/assets/pages/scripts/dashboard.min.js',
            'theme/assets/layouts/layout/scripts/layout.min.js',
            'theme/assets/layouts/layout/scripts/demo.min.js',
            'theme/assets/layouts/global/scripts/quick-sidebar.min.js',
            'theme/assets/pages/scripts/components-date-time-pickers.min.js',
            //'theme/assets/global/plugins/select2/js/select2.full.min.js',
            'js/extra.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
