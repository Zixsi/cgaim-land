<div id="item-block">
	<div class="content">
		<h3 class="title-block">О курсе</h3>
		<?/*if($item['type'] === 'collection'):?>
			<div class="info-stat" style="justify-content: center;">
				<div class="stat" style="margin: 0 20px;">
					<div class="stat-value"><?=$item['totalDurationHours']?></div>
					<div class="stat-label">Час<?=getNumEnding($item['totalDurationHours'], ['', 'а', 'ов'])?> занятий</div>
				</div>
				<div class="stat" style="margin: 0 20px;">
					<div class="stat-value"><?=$item['videosCount']?></div>
					<div class="stat-label">Насыщен<?=getNumEnding($item['videosCount'], ['ая', 'ых', 'ых'])?> <br>лекци<?=getNumEnding($item['videosCount'], ['я', 'и', 'й'])?></div>
				</div>
			</div>
		<?endif;*/?>
	</div>
</div>

<div id="item-detail-block">
	<div class="content">
		<div class="row">
			<div class="col">
				<h4 class="title">Цель курса</h4>
				<?=$item['description']?>
			</div>
			<div class="col">
				<?if($teacher['id'] > 0):?>
					<div class="teacher">
						<div class="teacher-img">
							<img src="<?=$schoolUrl.'/'.$teacher['img']?>" alt="">
						</div>
						<div class="teacher-info">
							<div class="name"><?=$teacher['full_name']?></div>
							<div class="subname">Ваш преподаватель</div>
							<div class="text"><?=$teacher['title']?></div>
							<?if(empty($teacher['blog_url']) === false):?>
								<a href="<?=($teacher['blog_url'] ?? '')?>" class="btn btn-pink text-pink" target="_blank">Читать интервью</a>
							<?endif;?>
						</div>
					</div>
				<?endif;?>
				<div class="other-info">
					<h4 class="title">Данные курса</h4>
					<p><b>Требования к студенту:</b> Желание учиться. Все необходимые знания по используемым программам будут предоставлены на курсе.</p>
					<p><b>Требования к компьютеру:</b> Процессор Intel i3 или AMD А6, оперативная память 8гб, видеокарта GeForce или Radeon с памятью 2гб и более.</p>
					<p><b>Другие требования:</b> От 5 до 12 часов в неделю, на просмотр материалов и выполнения заданий.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?if(empty($item['trailer_code']) === false && $item['type'] === 'collection'):?>
	<div id="item-video-trailer-block">
		<div class="content">
			<h3 class="title-block">Трейлер курса</h3>
			<iframe width="700" height="375" src="https://www.youtube.com/embed/<?=$item['trailer_code']?>?modestbranding=1&rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
<?endif;?>

<div id="item-price-block">
	<div class="content">
		<h3 class="title-block">Стоимость обучения</h3>
		<?if($offers):?>
			<?$offer = current($offers);?>
			<div class="subtitle text-center">Ближайший набор <?=$offer['ts_f']?></div>
		<?endif;?>
		<div class="price-list">
			<?for($i = 0; $i < 3; $i++):?>
				<div class="item <?=($i == 1)?'big':''?>">
					<div class="body">
						<div class="title">Стандарт</div>
						<div class="type">
							<div class="btn btn-pink active">Полная</div>
						</div>
						<div class="text"></div>
						<?if((float) $item['price'] <= 0):?>
							<div class="price active">FREE</div>
						<?else:?>
							<div class="price active"><?=number_format($item['price'], 2, '.', ' ')?><span>руб</span></div>
						<?endif;?>
						<a href="<?=$schoolUrl?>/workshop/item/<?=$item['code']?>/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться</a>
					</div>
				</div>
			<?endfor;?>
		</div>
	</div>
</div>

<div id="faq-block">
	<div class="content">
		<h3 class="title-block white">Появились вопросы по обучению?</h3>
		<a href="https://vk.com/im?media=&sel=-178242314" class="btn btn-pink" target="_blank">Задать вопрос</a>
	</div>
</div>

<?$this->load->view('inc_training.php');?>

<div id="review-block" class="review-item-block">
	<div class="content">
		<h3 class="title-block">Отзывы наших выпускников</h3>
		<?$this->load->view('inc_reviews.php');?>
	</div>
</div>