<div class="row" id="first-block">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="big-title">Надоела скучная учеба или работа?</div>
				<div class="sub-title">Обучайся компьютерной графике и стань нужным<br> в профессии за <b>9</b> месяцев</div>
				<div class="small-sub-title">Курсы дистанционного обучения компьютерной графике и анимации в <span class="site-name">CG<b>Аim</b></span></div>
			</div>
		</div>
	</div>
</div>

<div class="page-block" id="course-item">
	<div class="container">
		<div class="row">
			<div class="col-8">
				<div class="course-item--about row mb-4 pb-4">
					<div class="col-3 title">О курсе</div>
					<div class="col-3 info">
						<span class="number"><?=(int) $item['lectures_count']?></span>
						<span class="label">недель обучения</span>
					</div>
					<div class="col-3 info">
						<span class="number"><?=(int) $item['lectures_count']?></span>
						<span class="label">насыщенных задания</span>
					</div>
					<div class="col-3 info">
						<span class="number"><?=ceil((int) $item['lectures_count'] * 2)?></span>
						<span class="label">часов занятий</span>
					</div>
				</div>
				<h3 class="course-item--title"><?=$item['name']?></h3>
				<?if(empty($item['preview_text']) === false):?>
					<div class="course-item--subtitle"><?=$item['preview_text']?></div>
				<?endif;?>
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
									<div><b>Месяц <?=$monthNumber?>:</b></div>
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
			<div class="col-4">
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
					<div class="col-8 mx-auto video">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$item['trailer_code']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					</div>
				<?endif;?>
				<div class="col-4 mx-auto">
					<div class="course--teacher">
						<div class="photo">
							<img src="<?=$schoolUrl.'/'.$teacher['img']?>" alt="">
						</div>
						<h3 class="name"><?=$teacher['full_name']?></h3>
						<div class="text"><?=$teacher['title']?></div>
						<div class="text-center">
							<a href="<?=($teacher['blog_url'] ?? '')?>" class="btn btn-orange">Читать статью</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endif;?>

<div class="page-block" id="course-item-invest">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="big-title">Инвестируйте в ваше образование</div>
				<div class="small-subtitle">С таким объёмом материалов, заданий, практики и помощи инструктора успех гарантирован!</div>
			</div>
		</div>
		<div class="row course-item-invest--blocks">
			<div class="col-3 text-center block">
				<div class="head color-1">1/4</div>
				<div class="text">вы получите подготовку к карьере в анимации за четверть времени, которые вы проведете в колледже или институте</div>
			</div>
			<div class="col-3 text-center block">
				<div class="head color-2">50т.р.</div>
				<div class="text">средняя зарплата по России, быстро растущая отрасль, студенты востребованы</div>
			</div>
			<div class="col-3 text-center block">
				<div class="head color-3">2500+</div>
				<div class="text">студий по всему миру. Работай в студии и дома.</div>
			</div>
			<div class="col-3 text-center block">
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
					<div class="big-title">Работы студентов</div>
					<div class="small-subtitle">Воплощайте творческие идеи, просто уделите этому время.</div>
				</div>
			</div>
			<div class="row">
				<div class="col-10 offset-1 video">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$item['examples_code']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>
<?endif;?>

<div class="page-block" id="course-item-price">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="big-title">Стоимость обучения</div>
				<div class="small-subtitle">Выбери подходящий тип подписки</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card-deck justify-content-center">
					<div class="card col-4">
						<div class="card-body text-center">
							<div class="title">Стандарт</div>
							<div class="icon">
								<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
							</div>
							<?if((float) $item['price']['standart']['full'] <= 0):?>
								<div class="price">FREE</div>
							<?else:?>
								<div class="price">от <?=number_format($item['price']['standart']['full'], 2, '.', ' ')?> руб</div>
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
					<?if($item['only_standart'] === false):?>
						<div class="card col-4">
							<div class="card-body text-center">
								<div class="title">Расширенный</div>
								<div class="icon">
									<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
								</div>
								<?if((float) $item['price']['advanced']['full'] <= 0):?>
									<div class="price">FREE</div>
								<?else:?>
									<div class="price">от <?=number_format($item['price']['advanced']['full'], 2, '.', ' ')?> руб</div>
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
						<?if((float) $item['price']['vip']['full'] > 0):?>
							<div class="card col-4">
								<div class="card-body text-center">
									<div class="title">Премиум</div>
									<div class="icon">
										<img src="<?=TEMPLATE_DIR?>/main/img/money.png">
									</div>
									<div class="price">от <?=number_format($item['price']['vip']['full'], 2, '.', ' ')?> руб</div>
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
						<?endif;?>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
</div>