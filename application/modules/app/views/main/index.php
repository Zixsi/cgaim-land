<?php
$urlSchool = $this->config->item('school_url');
?>
<div class="row" id="first-block">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="big-title">Надоела скучная учеба или работа?</div>
				<div class="sub-title">Обучайся компьютерной графике и стань нужным<br> в профессии за <b>9</b> месяцев</div>
				<div class="small-sub-title">Курсы дистанционного обучения компьютерной графике и анимации в <span class="site-name">CG<b>Аim</b></span></div>
				<?/*
				<div class="bottom">
					<div class="small-sub-title">Пройди бесплатный урок по курсу «Основы 3D анимации»</div>
					<div class="button-row">
						<button type="button" class="btn btn-orange">Записаться</button>
					</div>
					<!--<div class="counter-row">Осталось свободных мест: 4</div>-->
				</div>*/?>
			</div>
		</div>
	</div>
</div>
<div id="about" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title">О школе</div>
				<div class="block-sub-title">Добро пожаловать в  дружное и уютное сообщество!</div>
				<div class="text">
					<div class="row img-row">
						<div class="col-6">
							<p>Привет, онлайн школа CGAim помогает новичкам с нуля научиться работе с 2D-графикой, 3D-моделированием и анимацией, а опытным развить навыки и найти новую специализацию. Наша команда не довольна тем контентом который заполонил интернет, поэтому разработали подход основанный на постоянной практике.</p>
						</div>
						<div class="col-6">
							<img src="<?=TEMPLATE_DIR?>/main/img/about-img1.jpg">
						</div>
					</div>
					<div class="row img-row">
						<div class="col-6">
							<img src="<?=TEMPLATE_DIR?>/main/img/about-img2.jpg">
						</div>
						<div class="col-6">
							<p>Задача курсов обучить не только какими кнопками пользоваться в программах, а научить качественно и выразительно создавать творческий замысел для игр и кино. Познакомишься с коллегами по цеху в закрытом Discord чате.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="courses-block" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<div class="block-title white">Выберите свой курс!</div>
				<div class="block-sub-title white">Блок курсов для новичков и творческого развития, где познакомишься с принципами и необходимым инструментом для дальнейшего развития в компьютерной графике</div>
				<div class="card-deck">
					<?if($courses):?>
						<?$i = 0;?>
						<?foreach($courses as $course):?>
							<?$i++;?>
							<div class="card mb-4">
								<a href="/courses/<?=$course['code']?>">
									<img src="<?=$course['img']?>" class="card-img-top" alt="<?=$course['name']?>">
								</a>
								<div class="card-body">
									<h5 class="card-title">
										<a href="/courses/<?=$course['code']?>"><?=$course['name']?></a>		
									</h5>
									<p class="card-text"><?=$course['description']?></p>
									<div class="text-center">
										<a href="/courses/<?=$course['code']?>" class="btn btn-blue">О курсе</a>
									</div>
								</div>
							</div>
							<?if(($i % 2) === 0):?>
								<div class="w-100 d-none d-xl-block"><!-- wrap every 5 on xl--></div>
							<?endif;?>
						<?endforeach;?>
					<?endif;?>
				</div>
				<div class="button-row text-center">
					<a href="/courses/" class="btn btn-orange">Все курсы</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="advantage-block" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title">Преимущества обучения</div>
				<div class="row items-list">
					<div class="col-3 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/9.png" alt="">
						</div>
						<div class="title">Свободный график</div>
						<div class="text">Обучение онлайн доступно из любой точки мира, вам не нужно никуда ехать.</div>
					</div>
					<div class="col-3 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/7.png" alt="">
						</div>
						<div class="title">Курсы с инструктором</div>
						<div class="text">Онлайн встречи каждую неделю, индивидуальная проверка работ и помощь инструктора.</div>
					</div>
					<div class="col-3 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/10.png" alt="">
						</div>
						<div class="title">Легкость обучения</div>
						<div class="text">Лекции выстроены таким способом, что понятно будет новичку. Главное старание и труд, тогда у вас получится</div>
					</div>
					<div class="col-3 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/6.png" alt="">
						</div>
						<div class="title">Мы всегда на связи</div>
						<div class="text">Студенты в любое время могут просматривать видео лекции и обращаться к инструктору за советом.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div id="why-block" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title">Почему стоит выбрать нас?</div>
				<div class="block-sub-title">Наш подход к преподаванию и принципы обучения компьютерной графики уже помогли раскрыть потенциал!</div>
				<div class="row items-list">
					<div class="col-4 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/5.png" alt="">
						</div>
						<div class="text">Придерживаемся формата занятий в мини-группах по 5-10 человек. Преподаватель уделяет каждому ученику много времени.</div>
					</div>
					<div class="col-4 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/5.png" alt="">
						</div>
						<div class="text">Наша школа работает круглосуточно и без выходных, подберёте для себя курс даже если заняты плотным графиком.</div>
					</div>
					<div class="col-4 text-center">
						<div class="img">
							<img src="<?=TEMPLATE_DIR?>/main/img/5.png" alt="">
						</div>
						<div class="text">Наши преподаватели помогут раскрыться даже стеснительному ученику</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div id="training" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Как проходит обучение?</div>
				<div class="row items-list">
					<div class="col-3 text-center item">
						<div class="img color-c1">
							<i class="fas fa-file-video"></i>
						</div>
						<div class="title">Лекции</div>
						<div class="text">После оплаты получаете доступ к группе, внутри вас ждет вводная лекция с инструкциями.Каждый понедельник открывается новая лекция.</div>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c2">
							<i class="fas fa-file-alt"></i>
						</div>
						<div class="title">Проверка домашнего задания</div>
						<div class="text">Домашнее задание нужно сдать в конце каждой недели. В ближайший понедельник преподаватель делает видео обзор.</div>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c3">
							<i class="fas fa-graduation-cap"></i>
						</div>
						<div class="title">Онлайн встречи</div>
						<div class="text">В конце недели проходит онлайн встреча с преподавателем, на ней вы сможете задавать вопросы и получить дополнительную информацию.</div>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c4">
							<i class="fab fa-discord"></i>
						</div>
						<div class="title">Секретный чат</div>
						<div class="text">Помимо общего чата, студенту курса выдается доступ в закрытый чат Discord с выпускниками школы. В нем можно решать вопросы во время и после обучения.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="works-block" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title whitee">Работы наших студентов</div>
				
				<div id="carousel-works" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-works" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-works" data-slide-to="1"></li>
						<li data-target="#carousel-works" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="<?=TEMPLATE_DIR?>/main/images/img1.jpg" class="d-block w-100" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=TEMPLATE_DIR?>/main/images/img1.jpg" class="d-block w-100" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=TEMPLATE_DIR?>/main/images/img1.jpg" class="d-block w-100" alt="">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-works" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Предыдущая</span>
					</a>
					<a class="carousel-control-next" href="#carousel-works" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Следующая</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="subscribe" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Как подписаться на курс?</div>
				<div class="row items-list">
					<div class="col-3 text-center item">
						<div class="img color-c1">
							<i class="fas fa-address-card"></i>
						</div>
						<div class="title">Регистрация</div>
						<div class="text">Регистрируемся на платформе и проходим авторизацию через почту.</div>
						<i class="fas fa-angle-double-right arrow"></i>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c2">
							<i class="fas fa-address-book"></i>
						</div>
						<div class="title">Выбор курса</div>
						<div class="text">У понравишегося курса выбираем тип подписки.</div>
						<i class="fas fa-angle-double-right arrow"></i>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c3">
							<i class="fas fa-calculator"></i>
						</div>
						<div class="title">Оплата</div>
						<div class="text">Выбираем наиболее подходящий способ оплаты.</div>
						<i class="fas fa-angle-double-right arrow"></i>
					</div>
					<div class="col-3 text-center item">
						<div class="img color-c4">
							<i class="fas fa-check-circle"></i>
						</div>
						<div class="title">Доступ</div>
						<div class="text">После оплаты вам сразу откроется доступ к вашей группе.</div>
					</div>
				</div>
				<div class="text-center">
					<a href="<?=$urlSchool?>/auth/register/" class="btn btn-orange">Регистрация</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="knowledge-block" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-11 m-auto">
				<div class="block-title">Где можно применять знания после обучения?</div>
				<div class="card-deck">
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k1.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Мультипликация</h5>
							<p class="card-text">Разработай дизайн персонажа и создай 3D- анимацию для собственного ролика или работай в анимационной студии.</p>
						</div>
					</div>
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k2.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">YouTube</h5>
							<p class="card-text">Используй навыки для создания дизайна канала, интегрируй 3D в видео и освежи взгляд на подачу материала.</p>
						</div>
					</div>
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k3.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Реклама</h5>
							<p class="card-text">Создавай персонажей и визуализируй собственные решения для рекламы продуктов и брендов.</p>
						</div>
					</div>
					<div class="w-100 d-none d-xl-block"><!-- wrap every 5 on xl--></div>
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k4.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Веб-дизайн</h5>
							<p class="card-text">Придумывай макеты сайтов, не трать время на поиск и адаптацию чужой графики.</p>
						</div>
					</div>
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k5.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Кинематограф</h5>
							<p class="card-text">Работайте со спецэффектами и сложными 3D- визуализациями, которые станут частью видеоролика или фильма.</p>
						</div>
					</div>
					<div class="card mb-4">
						<img src="<?=TEMPLATE_DIR?>/main/img/k6.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Разработка игр</h5>
							<p class="card-text">Создавай окружение, персонажей и анимацию для игр от минималистичных до гиперреалистичных RPG.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="reviews" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Отзывы наших выпускников</div>

				<div id="carousel-reviews" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-reviews" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-reviews" data-slide-to="1"></li>
						<li data-target="#carousel-reviews" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="carousel-caption">
								<h5 class="title">Основы 3D анимации</h5>
								<p class="text">Спасибо за ваш оптимизм, которым вы заразили нас! Спасибо за организацию курсов на высоком уровне, за ваше тепло, гостеприимство и доброжелательность, и, конечно, за знания!!</p>
								<p class="author"><span>Марина Дюмина</span></p>
							</div>
						</div>
						<div class="carousel-item">
							<div class="carousel-caption">
								<h5 class="title">Основы 3D анимации</h5>
								<p class="text">“На курсах была очень интересная подача материала. Александр приводил много практических примеров из своей практики. Это всегда вызывает положительные эмоции и создает настрой на позитив, когда человек на одной волне с собеседником. Спасибо большое, за интересные лекции и познавательную информацию. Я много взяла для себя из Ваших лекций. Приятно всякий раз для себя открывать какие-то новые грани!”</p>
								<p class="author"><span>Макс Федоренко</span></p>
							</div>
						</div>
						<div class="carousel-item">
							<div class="carousel-caption">
								<h5 class="title">Основы 3D анимации</h5>
								<p class="text">Курсы познавательные, четко простроенные. Замечательно, что вначале мы знакомились с базовыми параметрами, а только затем работали с практической частью.</p>
								<p class="author"><span>Kiril D.</span></p>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-reviews" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel-reviews" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?/*
<div id="faq-block" class="page-block">
	<div class="row">
		<div class="col-11 m-auto">
			<div class="block-title white">Часто задаваемые вопросы</div>
			<div class="card-deck">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><span>Какие навыки нужны, чтобы начать обучение?</span></h5>
						<p class="card-text">В первую очередь необходимо желание учиться! У нас есть курсы, которые не требуют подготовки и вы можете начать обучение с нуля.</p>
					</div>
					<div class="card-footer">
						<span class="quot"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.0000045299530029296875 19.699987411499023 200 161.20912170410156" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;"><g><path d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z"></path><path d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z"></path></g></svg></span>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><span>Выдается ли сертификат?</span></h5>
						<p class="card-text">Для получения сертификата об окончании курсов достаточно выполнить от 80% домашних заданий и закончить дипломный проект.</p>
					</div>
					<div class="card-footer">
						<span class="quot"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.0000045299530029296875 19.699987411499023 200 161.20912170410156" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;"><g><path d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z"></path><path d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z"></path></g></svg></span>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><span>С чего лучше начать изучение и как понять, что это моё?</span></h5>
						<p class="card-text">Определиться поможет бесплатное пробное занятие или индивидуальная консультация</p>
					</div>
					<div class="card-footer">
						<span class="quot"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.0000045299530029296875 19.699987411499023 200 161.20912170410156" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;"><g><path d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z"></path><path d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z"></path></g></svg></span>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><span>Сколько нужно времени на выполнение домашних заданий?</span></h5>
						<p class="card-text">Чем больше времени будете уделять домашним заданиям - тем лучше, но в среднем 2 часа в день.</p>
					</div>
					<div class="card-footer">
						<span class="quot"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.0000045299530029296875 19.699987411499023 200 161.20912170410156" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px;"><g><path d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z"></path><path d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z"></path></g></svg></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
*/?>