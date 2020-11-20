<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="shortcut icon" href="<?=TEMPLATE_DIR?>/land/favicon.ico" type="image/x-icon">
    <title>Главная</title>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,300;0,400;0,500;0,600;0,800;0,900;1,300;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=TEMPLATE_DIR?>/land/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="<?=TEMPLATE_DIR?>/land/css/styles.css?v=<?=VERSION?>">
</head>
<body>
    <div id="top-panel">
        <div class="content">
            <a href="/" class="logo"></a>
            <label id="burger-menu" for="menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <input type="checkbox" value="1" id="menu-trigger">
            <ul id="main-menu">
                <li>
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="#">Блог</a>
                </li>
                <li>
                    <a href="/courses/">Курсы</a>
                </li>
                <li>
                    <a href="/workshop/">Мастерская</a>
                </li>
                <li>
                    <a href="#">О школе</a>
                </li>
                <li>
                    <a href="#">Отзывы</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>
            <a href="#" class="btn btn-pink login-btn">Войти</a>
        </div>
    </div>
    
    <?php $this->content()?>
    
    <div id="footer">
        <div class="content" id="contacts">
            <div class="nav-panel">
                <a href="/"><img src="<?= TEMPLATE_DIR ?>/main_v2/img/logo.png" alt="" class="logo"></a>
                <ul class="nav main-menu">
                    <li <?if(isActiveMenuItem('maincontroller')):?>class="active"<?endif;?>><a href="/">Главная</a></li>
                    <li><a href="https://blog.cgaim.ru/">Блог</a></li>
                    <li <?if(isActiveMenuItem('coursecontroller')):?>class="active"<?endif;?>><a href="/courses/">Курсы</a></li>
                    <li <?if(isActiveMenuItem('workshopcontroller')):?>class="active"<?endif;?>><a href="/workshop/">Мастерская</a></li>
                    <li><a href="/#about">О школе</a></li>
                    <li><a href="/#reviews">Отзывы</a></li>
                    <li><a href="/#contacts">Контакты</a></li>
                </ul>
                <div class="soc">
                    <a href="https://vk.com/cgaim" class="icon vk" target="_blank"></a>
                    <a href="https://www.instagram.com/cgaim_school/" class="icon inst" target="_blank"></a>
                    <a href="https://cutt.ly/ZeuSQfS" class="icon yt" target="_blank"></a>
                </div>
            </div>
            <div class="links">
                <a href="/terms/">Правила&nbsp;и&nbsp;условия</a>
                <a href="/policy/">Политика&nbsp;конфиденциальности</a>
                <span>По&nbsp;всем&nbsp;вопросам:&nbsp;<a href="mailto:info@cgaim.ru">info@cgaim.ru</a></span>
            </div>
            <div class="info">&copy; 2019, ИП Серебряков Александр Сергеевич<br>ИНН 344112777283 Счёт 40802 810 3015 0003 5607 БИК 044525999 Корр. счёт 3010 1810 8452 5000 0999 Филиал Точка Публичного акционерного общества Банка «Финансовая Корпорация Открытие» город Москва</div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?=TEMPLATE_DIR?>/land/vendor/tiny-slider/tiny-slider.js"></script>
    <script type="text/javascript" src="<?=TEMPLATE_DIR?>/land/js/main.js?v=<?=VERSION?>"></script>
</body>
</html>