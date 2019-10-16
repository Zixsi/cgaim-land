<?php
$urlSchool = $this->config->item('school_url');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?=($pageMetaDescription ?? 'Профессиональные онлайн курсы  - 3D анимация, 3D моделирование, скульптинг, рисование, спецэффекты, композиция, концепт-арт, разработка игр и другие курсы дистанционного обучения. Успей записаться, скоро стартует учебный месяц!')?>">
	<meta name="keywords" content="<?=($pageMetaKeyword ?? 'анимация, клуб аниматоров, аниматоры в россии, фриланс, анимационная студия, уроки по анимации, портфолио, персонаж, тайминг, блокинг, короткометражка, фильм, мульт, перекладка, 2D,3D, animator, animations, дорогов, школа анимации, референс, pixar, scream school, animation, blocking, animation mentor, maya, 3d max, key, character, rig, rigging, blender, setup, timing, movie, tooon, cartoon, anime, reference, short, showreel, demoreel, сообщество по анимации ищу аниматора, вакансии, флеш аниматор, работа аниматорам, фриланс, курсы режиссуры, школа анимации, живопись, рисование, мультфильм, Сериал, Буквальные истории, Авторская анимация, Федор Хитрук,wizartschool, wizart, school, wizart animation, школа компьютерной графики, школа кино индустрия, концепт-арт, иллюстрация, 3D моделирование, 3D скульптинг, курсы Zbrush, курсы 3ds max, курсы maya, cg, gamedev, курсы adobe photoshop')?>">
	<meta name="yandex-verification" content="bc7775afd3d30064" />
	<title>CGAim - онлайн школа компьютерной графики и анимации</title>
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
					<a href="<?=$urlSchool?>" class="btn btn-sm btn-orange float-right btn--auth d-none d-lg-block">Вход / Регистрация</a>
					<label for="main-menu-trigger" id="main-menu-burger" class="d-block d-lg-none">
						<i class="fas fa-bars"></i>
					</label>
					<input type="checkbox" id="main-menu-trigger" value="1">
					<ul class="list-unstyled main-menu d-none d-lg-block" id="main-menu">
						<li>
							<?if(isActiveMenuItem('maincontroller')):?>
								<span class="active">Главная</span>
							<?else:?>
								<a href="/">Главная</a>
							<?endif;?>
						</li>
						<li><a href="http://blog.cgaim.ru/">Блог</a></li>
						<li>
							<?if(isActiveMenuItem('coursecontroller')):?>
								<span class="active">Онлайн курсы</span>
							<?else:?>
								<a href="/courses/">Онлайн курсы</a>
							<?endif;?>
						</li>
						<li><a href="/#about">О школе</a></li>
						<li><a href="/#reviews">Отзывы</a></li>
						<li><a href="/#contacts">Контакты</a></li>
						<li><a href="<?=$urlSchool?>" class="d-block d-lg-none">Вход / Регистрация</a></li>
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
		<div class="container" id="contacts">
			<div class="top row">
				<div class="col-12">
					<ul class="list-unstyled main-menu">
						<li>
							<?if(isActiveMenuItem('maincontroller')):?>
								<span class="active">Главная</span>
							<?else:?>
								<a href="/">Главная</a>
							<?endif;?>
						</li>
						<li><a href="http://blog.cgaim.ru/">Блог</a></li>
						<li>
							<?if(isActiveMenuItem('coursecontroller')):?>
								<span class="active">Онлайн курсы</span>
							<?else:?>
								<a href="/courses/">Онлайн курсы</a>
							<?endif;?>
						</li>
						<li><a href="/#about">О школе</a></li>
						<li><a href="/#reviews">Отзывы</a></li>
						<li><a href="/#contacts">Контакты</a></li>
					</ul>
				</div>
			</div>
			<div class="bottom row">
				<div class="col-12 col-md-7 order-2 order-md-1 block-owner-info">
					<span>&copy; 2018, ИП Серебряков Александр Сергеевич</span>
					<span>ИНН 344112777283 Счёт 40802 810 3015 0003 5607 БИК 044525999 Корр. счёт 3010 1810 8452 5000 0999  Филиал Точка Публичного акционерного общества Банка «Финансовая Корпорация Открытие» город Москва </span>
				</div>
				<div class="col-12 col-md-5 order-1 order-md-2 mb-2 mb-md-0 text-right">
					<div class="links">
						<a href="/terms/">Правила и условия</a>
						<a href="/policy/">Политика&nbsp;конфиденциальности</a>
					</div>
					<div class="contacts pt-2">По всем вопросам:&nbsp;<a href="mailto:info@cgaim.ru">info@cgaim.ru</a></div>
					<div class="soc-block pt-2">
						<span>Мы в соц. сетях:</span>
						<a href="https://cutt.ly/ZeuSQfS" target="_blank"><i class="fab fa-youtube"></i></a>
						<a href="https://vk.com/cgaim" target="_blank"><i class="fab fa-vk"></i></a>
						<a href="https://www.instagram.com/cgaim_school/" target="_blank"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main/js/app.js?v=<?=VERSION?>"></script>
</body>
</html>