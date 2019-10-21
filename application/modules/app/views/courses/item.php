
<div class="row" id="first-block">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<?/*<div class="big-title">Надоела скучная учеба или работа?</div>
				<div class="sub-title">Обучайся компьютерной графике и стань нужным<br> в профессии за <b>9</b> месяцев</div>
				<div class="small-sub-title">Курсы дистанционного обучения компьютерной графике и анимации в <span class="site-name">CG<b>Аim</b></span></div>*/?>

				<div class="big-title"><?=$item['name']?></div>
				<?if(empty($item['preview_text']) === false):?>
					<div class="sub-title"><?=$item['preview_text']?></div>
				<?endif;?>
			</div>
		</div>
	</div>
</div>

<div class="page-block" id="course-item">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="course-item--about row mb-2 pb-2">
					<div class="col-12 col-lg-3 title">О курсе</div>
					<div class="col-6 col-md-4 col-lg-3 mb-2 mb-md-0 info">
						<span class="number"><?=(int) $item['lectures_count']?></span>
						<span class="label">недель обучения</span>
					</div>
					<div class="col-6 col-md-4 col-lg-3 mb-2 mb-md-0 info">
						<span class="number"><?=(int) ($item['lectures_count'] * 2)?></span>
						<span class="label">насыщенных задания</span>
					</div>
					<div class="col-6 col-md-4 col-lg-3 mb-2 mb-md-0 info">
						<span class="number"><?=ceil((int) $item['lectures_count'] * 3.5)?></span>
						<span class="label">часов занятий</span>
					</div>
				</div>
				<?/*
				<h3 class="course-item--title"><?=$item['name']?></h3>
				<?if(empty($item['preview_text']) === false):?>
					<div class="course-item--subtitle"><?=$item['preview_text']?></div>
				<?endif;?>
				*/?>
				<div class="course-item--description">
					<?=$item['description']?>
				</div>

				<?if(count($lectures)):?>
					<div class="course-item--lectures">
						<h3 class="title">Процесс обучения</h3>
						<?
						$monthNumber = 1;
						$currentLecturesCnt = 0;
						$lecturesNewMonth = true;
						?>
						<?foreach($lectures as $val):?>
							<?if($lecturesNewMonth):?>
								<div class="pb-4">
									<!-- <div><b>Месяц <?=$monthNumber?>:</b></div> -->
								<?$lecturesNewMonth = false;?>
							<?endif;?>

							<?if((int) $val['type'] === 1):?>
								<div><b>Лекция</b> - <?=$val['name']?></div>
							<?else:?>
								<div><b>Лекция <?=(++$currentLecturesCnt)?></b> - <?=$val['name']?></div>
							<?endif;?>

							<?if($currentLecturesCnt > 0 && ($currentLecturesCnt%4) === 0):?>
								</div>
								<?
								$monthNumber++;
								$lecturesNewMonth = true;
								?>
							<?endif;?>
						<?endforeach;?>

						<?if($currentLecturesCnt > 0 && ($currentLecturesCnt%4)):?>
							</div>
						<?endif;?>
					</div>
				<?endif;?>
				<?//debug($item);?>
			</div>
			<div class="col-12 col-lg-4">
				<?if($offers):?>
					<div class="course-item-groups">
						<h3 class="title">Ближайший набор</h3>
						<div class="list">
							<?foreach($offers as $val):?>
								<a href="<?=$schoolUrl?>/courses/<?=$item['code']?>/?date=<?=$val['ts_f']?>" class="btn btn-outline-light"><?=$val['ts_f']?></a>
							<?endforeach;?>
						</div>
					</div>
				<?endif;?>

				<div class="course-item--info">
					<h3 class="title">Данные курса</h3>
					<?if(empty($item['text_app_main']) === false):?>
						<div class="info-row"><b>Основные программы:</b> <?=$item['text_app_main']?></div>
					<?endif;?>
					<?if(empty($item['text_app_other']) === false):?>
						<div class="info-row"><b>Дополнительные программы:</b> <?=$item['text_app_other']?></div>
					<?endif;?>
					<div class="info-row"><b>Требования к студенту:</b> Желание учиться. Все необходимые знания по используемым программам будут предоставлены на курсе.</div>
					<div class="info-row"><b>Требования к компьютеру:</b> Процессор Intel i3 или AMD А6, оперативная память 8гб, видеокарта GeForce или Radeon с памятью 2гб и более.</div>
					<div class="info-row"><b>Другие требования:</b> От 5 до 12 часов в неделю, на просмотр материалов и выполнения заданий.</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?if(empty($item['trailer_code']) === false || empty($teacher['blog_url'] ?? '') === false):?>
	<div class="page-block" id="course-item-details">
		<div class="container">
			<div class="row">
				<?if(empty($item['trailer_code']) === false):?>
					<div class="col-12 col-lg-8 mb-4 mb-lg-0 mx-auto video">
						<h3 class="title">Трейлер курса</h3>
						<iframe width="100%" height="90%" src="https://www.youtube.com/embed/<?=$item['trailer_code']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					</div>
				<?endif;?>
				<div class="col-12 col-lg-4 mx-auto">
					<h3 class="title">Ваш преподаватель</h3>
					<div class="course--teacher">
						<div class="photo">
							<img src="<?=$schoolUrl.'/'.$teacher['img']?>" alt="">
						</div>
						<h3 class="name"><?=$teacher['full_name']?></h3>
						<div class="text"><?=$teacher['title']?></div>
						<?if(empty($teacher['blog_url']) === false):?>
							<div class="text-center">
								<a href="<?=($teacher['blog_url'] ?? '')?>" class="btn btn-orange">Читать интервью</a>
							</div>
						<?endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endif;?>
<div id="training" class="page-block white">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Как проходит обучение?</div>
				<div class="row items-list">
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
						<div class="img color-c1">
							<i class="fas fa-file-video"></i>
						</div>
						<div class="title">Лекции</div>
						<div class="text">После оплаты получаете доступ к группе, внутри вас ждет вводная лекция с инструкциями.Каждый понедельник открывается новая лекция.</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
						<div class="img color-c2">
							<i class="fas fa-file-alt"></i>
						</div>
						<div class="title">Проверка домашнего задания</div>
						<div class="text">Домашнее задание нужно сдать в конце каждой недели. В ближайший понедельник преподаватель делает видео обзор.</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
						<div class="img color-c3">
							<i class="fas fa-graduation-cap"></i>
						</div>
						<div class="title">Онлайн встречи</div>
						<div class="text">В конце недели проходит онлайн встреча с преподавателем, на ней вы сможете задавать вопросы и получить дополнительную информацию.</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
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
<div class="page-block" id="course-item-invest">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="block-title white">Инвестируйте в ваше образование</div>
				<div class="small-subtitle">С таким объёмом материалов, заданий, практики и помощи инструктора успех гарантирован!</div>
			</div>
		</div>
		<div class="row course-item-invest--blocks">
			<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center block">
				<div class="head color-1">1/4</div>
				<div class="text">вы получите подготовку к карьере в анимации за четверть времени, которые вы проведете в колледже или институте</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center block">
				<div class="head color-2">50т.р.</div>
				<div class="text">средняя зарплата по России, быстро растущая отрасль, студенты востребованы</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center block">
				<div class="head color-3">2500+</div>
				<div class="text">студий по всему миру. Работай в студии и дома.</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center block">
				<div class="head color-4">70+</div>
				<div class="text">часов увлекательных занятий</div>
			</div>
		</div>
	</div>
</div>

<?if(empty($item['examples_code']) === false):?>
	<div class="page-block" id="course-item-works">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="block-title">Работы студентов</div>
					<div class="small-subtitle">Воплощайте творческие идеи, просто уделите этому время.</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-10 offset-lg-1 video">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$item['examples_code']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>
<?endif;?>
<div id="subscribe" class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Как подписаться на курс?</div>
				<div class="row items-list">
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
						<div class="img color-c1">
							<i class="fas fa-address-card"></i>
						</div>
						<div class="title">Регистрация</div>
						<div class="text">Регистрируемся на платформе и проходим авторизацию через почту.</div>
						<i class="fas fa-angle-double-right arrow  d-none d-sm-block"></i>
						<i class="fas fa-angle-double-down arrow-down  d-sm-none"></i>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item">
						<div class="img color-c2">
							<i class="fas fa-address-book"></i>
						</div>
						<div class="title">Выбор курса</div>
						<div class="text">У понравишегося курса выбираем тип подписки.</div>
						<i class="fas fa-angle-double-right arrow  d-none d-lg-block"></i>
						<i class="fas fa-angle-double-down arrow-down  d-lg-none"></i>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item order-sm-2 order-lg-1">
						<div class="img color-c3">
							<i class="fas fa-calculator"></i>
						</div>
						<div class="title">Оплата</div>
						<div class="text">Выбираем наиболее подходящий способ оплаты.</div>
						<i class="fas fa-angle-double-right arrow  d-none d-lg-block"></i>
						<i class="fas fa-angle-double-down arrow-down  d-sm-none"></i>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center item order-sm-1 order-lg-2">
						<div class="img color-c4">
							<i class="fas fa-check-circle"></i>
						</div>
						<div class="title">Доступ</div>
						<div class="text">После оплаты вам сразу откроется доступ к вашей группе.</div>
						<i class="fas fa-angle-double-left arrow  d-none d-sm-block d-lg-none"></i>
					</div>
				</div>
				<div class="text-center">
					<a href="<?=$schoolUrl?>/auth/register/" class="btn btn-orange">Регистрация</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-block" id="course-item-price">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="block-title white">Стоимость обучения</div>
				<div class="small-subtitle">Выбери подходящий тип подписки</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="row justify-content-center pt-4">
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="card">
							<div class="card-body text-center">
								<div class="title">Стандарт</div>
								<div class="icon">
									<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
								</div>
								<?if((float) $item['price']['standart']['full'] <= 0):?>
									<div class="price">FREE</div>
								<?else:?>
									<div class="switcher">
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#price-standart-full" role="tab">Полная</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#price-standart-month" role="tab">Помесячная</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade show active" id="price-standart-full" role="tabpanel">
												<div class="price" data=""><?=number_format($item['price']['standart']['full'], 2, '.', ' ')?> руб</div>
											</div>
											<div class="tab-pane fade" id="price-standart-month" role="tabpanel">
												<div class="price" data="month"><?=number_format($item['price']['standart']['month'], 2, '.', ' ')?> руб/мес</div>
											</div>
										</div>
									</div>
								<?endif;?>
								<div class="description">
									<ul class="list-unstyled plan-features">
										<li class="checked"><i class="fa fa-times"></i>Доступ ко всем лекциям курса</li>
										<li><i class="fa fa-times"></i>Проверка домашних работ</li>
										<li><i class="fa fa-times"></i>Закрытый канал в дискорде</li>
										<li><i class="fa fa-times"></i>Груповые онлайн встречи</li>
										<li><i class="fa fa-times"></i>Личные онлайн встречи</li>
										<li class="checked"><i class="fa fa-times"></i>Начало в назначенную дату</li>
										<li><i class="fa fa-times"></i>Старт в ближайший понедельник</li>
									</ul>
								</div>
								<div class="btn-row">
									<a href="<?=$schoolUrl?>/courses/<?=$item['code']?>/" class="btn btn-orange">Записаться</a>
								</div>
							</div>
						</div>
					</div>
					<?if($item['only_standart'] === false):?>
						<div class="col-12 col-md-6 col-lg-4 mb-4">
							<div class="card">
								<div class="card-body text-center">
									<div class="title">Расширенный</div>
									<div class="icon">
										<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
									</div>
									<?if((float) $item['price']['advanced']['full'] <= 0):?>
										<div class="price">FREE</div>
									<?else:?>
										<div class="switcher">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#price-advanced-full" role="tab">Полная</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#price-advanced-month" role="tab">Помесячная</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="price-advanced-full" role="tabpanel">
													<div class="price" data="">от <?=number_format($item['price']['advanced']['full'], 2, '.', ' ')?> руб</div>
												</div>
												<div class="tab-pane fade" id="price-advanced-month" role="tabpanel">
													<div class="price" data="month">от <?=number_format($item['price']['advanced']['month'], 2, '.', ' ')?> руб/мес</div>
												</div>
											</div>
										</div>
									<?endif;?>
									<div class="description">
										<ul class="list-unstyled plan-features">
											<li class="checked"><i class="fa fa-times"></i>Доступ ко всем лекциям курса</li>
											<li class="checked"><i class="fa fa-times"></i>Проверка домашних работ</li>
											<li class="checked"><i class="fa fa-times"></i>Закрытый канал в дискорде</li>
											<li class="checked"><i class="fa fa-times"></i>Груповые онлайн встречи</li>
											<li><i class="fa fa-times"></i>Личные онлайн встречи</li>
											<li class="checked"><i class="fa fa-times"></i>Начало в назначенную дату</li>
											<li><i class="fa fa-times"></i>Старт в ближайший понедельник</li>
										</ul>
									</div>
									<div class="btn-row">
										<a href="<?=$schoolUrl?>/courses/<?=$item['code']?>/" class="btn btn-orange">Записаться</a>
									</div>
								</div>
							</div>
						</div>
						<?if((float) $item['price']['vip']['full'] > 0):?>
							<div class="col-12 col-md-6 col-lg-4 mb-4">
								<div class="card">
									<div class="card-body text-center">
										<div class="title">Премиум</div>
										<div class="icon">
											<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
										</div>
										<div class="switcher">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#price-vip-full" role="tab">Полная</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#price-vip-month" role="tab">Помесячная</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="price-vip-full" role="tabpanel">
													<div class="price" data="">от <?=number_format($item['price']['vip']['full'], 2, '.', ' ')?> руб</div>
												</div>
												<div class="tab-pane fade" id="price-vip-month" role="tabpanel">
													<div class="price" data="month">от <?=number_format($item['price']['vip']['month'], 2, '.', ' ')?> руб/мес</div>
												</div>
											</div>
										</div>
										<div class="description">
											<ul class="list-unstyled plan-features">
												<li class="checked"><i class="fa fa-times"></i>Доступ ко всем лекциям курса</li>
												<li class="checked"><i class="fa fa-times"></i>Проверка домашних работ</li>
												<li class="checked"><i class="fa fa-times"></i>Закрытый канал в дискорде</li>
												<li><i class="fa fa-times"></i>Груповые онлайн встречи</li>
												<li class="checked"><i class="fa fa-times"></i>Личные онлайн встречи</li>
												<li><i class="fa fa-times"></i>Начало в назначенную дату</li>
												<li class="checked"><i class="fa fa-times"></i>Старт в ближайший понедельник</li>
											</ul>
										</div>
										<div class="btn-row">
											<a href="<?=$schoolUrl?>/courses/<?=$item['code']?>/" class="btn btn-orange">Записаться</a>
										</div>
									</div>
								</div>
							</div>
						<?endif;?>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
</div>