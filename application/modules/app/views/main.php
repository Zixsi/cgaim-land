<?php
$urlSchool = $this->config->item('school_url');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="<?=($pageMetaDescription ?? '')?>">
	<meta name="keywords" content="<?=($pageMetaKeyword ?? '')?>">
	<meta name="yandex-verification" content="bc7775afd3d30064" />
	<title>CGAim</title>

	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=TEMPLATE_DIR?>/main/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=TEMPLATE_DIR?>/main/css/main.css?v=<?=VERSION?>">
	
	<?require_once 'inc_analytics.php';?>
</head>
<body>
	<div id="background"></div>
	<div id="content">
		<div id="header">
			<div class="panel-menu">
				<div class="container">
					<a href="/">
						<img src="<?=TEMPLATE_DIR?>/main/img/logo_white.png" class="logo">
					</a>
					<a href="<?=$urlSchool?>" class="btn btn-sm btn-orange float-right btn--auth">Вход / Регистрация</a>
					<ul class="list-unstyled main-menu">
						<li><span class="active">Главная</span></li>
						<li><a href="http://blog.cgaim.ru/">Блог</a></li>
						<li><a href="/courses/">Онлайн курсы</a></li>
						<li><a href="#">Отзывы</a></li>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">О школе</a></li>
					</ul>

				</div>
			</div>
		</div>
		<div id="page">
			<div class="page-content">
				<?$this->content()?>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="top row">
				<div class="col-12">
					<ul class="list-unstyled main-menu">
						<li><span class="active">Главная</span></li>
						<li><a href="http://blog.cgaim.ru/">Блог</a></li>
						<li><a href="/courses/">Онлайн курсы</a></li>
						<li><a href="#">Отзывы</a></li>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">О школе</a></li>
					</ul>
				</div>
			</div>
			<!--
			<div class="middle row">
				<div class="block-contacts col-4">
					<div class="title">Свяжитесь с нами:</div>
					<ul class="list-unstyled">
						<li><a href="mail:info@kaanima.com">info@kaanima.com</a></li>
						<li><a href="mail:job@kaanima.com">job@kaanima.com</a></li>
						<li><a href="mail:game@kaanima.com">game@kaanima.com</a></li>
					</ul>
				</div>
				<div class="block-soc col-3 offset-5">
					<div class="title">Социальные сети:</div>
				</div>
			</div>-->
			<div class="bottom row">
				<div class="col-md-8 col-lg-4 block-owner-info">
					<span>&copy; 2018, ИП Серебряков Александр Сергеевич</span>
					<span>ИНН 1850210580185011</span>
				</div>
				<!--
				<div class="col-4 offset-4 text-right">
					<button type="button" class="btn btn-sm btn-primary">Подписаться на рассылку</button>
				</div>-->
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/app.js?v=<?=VERSION?>"></script>
</body>
</html>