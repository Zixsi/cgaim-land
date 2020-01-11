<?php
$urlSchool = $this->config->item('school_url');
?>
<div class="nav-panel" id="header-navpanel">
	<a href="/"><img src="<?=TEMPLATE_DIR?>/main_v2/img/logo.png" alt="" class="logo"></a>
	<div class="burger-menu" id="burger-menu-btn" data-target="head-main-menu">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<ul class="nav main-menu" id="head-main-menu">
		<li <?if(isActiveMenuItem('maincontroller')):?>class="active"<?endif;?>><a href="/">Главная</a></li>
		<li><a href="https://blog.cgaim.ru/">Блог</a></li>
		<li <?if(isActiveMenuItem('coursecontroller')):?>class="active"<?endif;?>><a href="/courses/">Курсы</a></li>
		<li <?if(isActiveMenuItem('workshopcontroller')):?>class="active"<?endif;?>><a href="/workshop/">Мастерская</a></li>
		<li><a href="/#about">О школе</a></li>
		<li><a href="/#reviews">Отзывы</a></li>
		<li><a href="/#contacts">Контакты</a></li>
	</ul>
	<a href="<?=$urlSchool?>" class="btn btn-pink btn-sm" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Войти</a>
</div>