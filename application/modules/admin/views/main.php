<?php
$CI = &get_instance();
//$tpl_user = $CI->Auth->user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?=TEMPLATE_DIR?>/main_v1/img/favicon.ico" />
    <title>Админка</title>
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/main_v1/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/main_v1/vendors/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/main_v1/vendors/jquery-toast-plugin/jquery.toast.min.css">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/tools/upload/jquery.fileupload.css">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/tools/datetimepicker/jquery.datetimepicker.css">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/tools/select2/select2.min.css">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/tools/ekko-lightbox/ekko-lightbox.css">
    <link href="<?=TEMPLATE_DIR?>/tools/editor/styles/simditor.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/main_v1/css/style.css?v=<?=VERSION?>">
    <link rel="stylesheet" href="<?=TEMPLATE_DIR?>/main_v1/css/custom.css?v=<?=VERSION?>">
</head>

<body>
    <div class="page-loader">
        <div class="loader"><div class="loader-spin"></div><div class="loader-message"></div></div>
    </div>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
                <a class="navbar-brand brand-logo" href="/admin/"><img src="<?=TEMPLATE_DIR?>/main_v1/img/logo_white.png" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="/admin/"><img src="<?=TEMPLATE_DIR?>/main_v1/img/logo_mini.png" alt="logo"/></a> 
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-settings d-none d-lg-flex dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" id="appDropdown">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="appDropdown">
                            <a class="dropdown-item" href="/admin/logout/"><i class="mdi mdi-logout text-primary"></i>Выход</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item <?=is_active_menu_item('main')?'active':''?>">
                        <a class="nav-link" href="/admin/">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Главная</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('course')?'active':''?>">
                        <a class="nav-link" href="/admin/course/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Курсы</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('workshop')?'active':''?>">
                        <a class="nav-link" href="/admin/workshop/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Мастерская</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('block')?'active':''?>">
                        <a class="nav-link" href="/admin/block/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Блоки</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('instructor')?'active':''?>">
                        <a class="nav-link" href="/admin/instructor/">
                            <i class="mdi mdi-account-circle menu-icon"></i>
                            <span class="menu-title">Преподаватели</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('skill')?'active':''?>">
                        <a class="nav-link" href="/admin/skill/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Навыки</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('apps')?'active':''?>">
                        <a class="nav-link" href="/admin/apps/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Приложения</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('bonus')?'active':''?>">
                        <a class="nav-link" href="/admin/bonus/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Бонусы</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('faq')?'active':''?>">
                        <a class="nav-link" href="/admin/faq/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('review')?'active':''?>">
                        <a class="nav-link" href="/admin/review/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Отзывы</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('works')?'active':''?>">
                        <a class="nav-link" href="/admin/works/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Работы студентов</span>
                        </a>
                    </li>
                    <li class="nav-item <?=is_active_menu_item('subscription')?'active':''?>">
                        <a class="nav-link" href="/admin/subscription/">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Подписки</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php $this->content()?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=TEMPLATE_DIR?>/main_v1/js/main.js?v=<?=VERSION?>"></script>
    <script src="<?=TEMPLATE_DIR?>/main_v1/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>

    <script src="<?=TEMPLATE_DIR?>/tools/upload/jquery.ui.widget.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/upload/jquery.iframe-transport.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/upload/jquery.fileupload.js"></script> 
    <script src="<?=TEMPLATE_DIR?>/tools/datetimepicker/jquery.datetimepicker.full.min.js"></script>    
    <script src="<?=TEMPLATE_DIR?>/tools/owl/owl.carousel.min.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/toastr/toastr.min.js"></script>    
    <script src="<?=TEMPLATE_DIR?>/tools/select2/select2.min.js"></script>  
    <script src="<?=TEMPLATE_DIR?>/tools/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/editor/scripts/module.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/editor/scripts/hotkeys.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/editor/scripts/uploader.js"></script>
    <script src="<?=TEMPLATE_DIR?>/tools/editor/scripts/simditor.js"></script>

    <script src="<?=TEMPLATE_DIR?>/main_v1/js/app.js?v=<?=VERSION?>"></script>
    <script src="<?=TEMPLATE_DIR?>/main_v1/js/admin.js?v=<?=VERSION?>"></script>
</body>
</html>