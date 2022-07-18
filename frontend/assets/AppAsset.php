<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css",
        "assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
        "assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css",
        "assets/css/bootstrap.min.css",
        "assets/css/icons.min.css",
        "assets/css/app.min.css",
    ];
    public $js = [
        "assets/libs/jquery/jquery.min.js",
        "assets/libs/bootstrap/js/bootstrap.bundle.min.js",
        "assets/libs/metismenu/metisMenu.min.js",
        "assets/libs/simplebar/simplebar.min.js",
        "assets/libs/node-waves/waves.min.js",
        "assets/libs/apexcharts/apexcharts.min.js",
        "assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js",
        "assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js",
        "assets/libs/datatables.net/js/jquery.dataTables.min.js",
        "assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
        "assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js",
        "assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
        "assets/js/pages/dashboard.init.js",
        "assets/js/app.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
