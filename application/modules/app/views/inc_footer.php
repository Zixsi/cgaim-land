	<div id="footer">
		<div class="content" id="contacts">
			<div class="nav-panel">
				<a href="/"><img src="<?=TEMPLATE_DIR?>/main_v2/img/logo.png" alt="" class="logo"></a>
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
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main_v2/vendor/tiny-slider/tiny-slider.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main_v2/vendor/glightbox/dist/js/glightbox.min.js"></script>
	<script type="text/javascript" src="<?=TEMPLATE_DIR?>/main_v2/scripts/main.js?v=<?=VERSION?>"></script>
</body>
</html>