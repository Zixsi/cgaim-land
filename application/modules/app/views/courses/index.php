<div id="course-block" class="list">
	<div class="content">
		<div class="card-list">
			<?if($courses):?>
				<?foreach($courses as $course):?>
					<div class="card-wrap">
						<div class="card">
							<a href="/courses/<?=$course['code']?>"></a>
							<div class="card-body" style="background-image: url('<?=$course['img']?>');">
								<div class="info">
									<div class="title"><?=$course['name']?></div>
									<div class="description"><?=$course['description']?></div>
									<ul class="nav">
										<li><span><?=(int) $course['lectures_count']?></span>Недель <br>обучения</li>
										<li><span><?=ceil((int) $course['lectures_count'] * 3.5)?></span>Часа <br>занятий</li>
										<li><span><?=(int) ($course['lectures_count'] * 2)?></span>Насыщеных <br>задания</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?endforeach;?>
			<?endif;?>
		</div>
	</div>
</div>