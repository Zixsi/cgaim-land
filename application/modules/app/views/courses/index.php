<div class="page-block" id="courses-list">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block-title white">Выберите свой курс!</div>
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