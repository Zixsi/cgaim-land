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
<div class="page-block" id="courses-list">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title">Наши курсы</div>
				<div class="card-deckk">
					<?if($courses):?>
						<?$i = 0;?>
						<div class="row">
							<?foreach($courses as $course):?>
								<?$i++;?>
								<div class="item col-4 mb-4">
									<div class="card">
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
								</div>
							<?endforeach;?>
						</div>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
</div>