<div id="workshop-block" class="list">
	<div class="content">
		<div class="card-list">
			<?if($items):?>
				<?foreach($items as $row):?>
					<div class="card-wrap">
						<div class="card">
							<a href="/workshop/<?=$row['code']?>"></a>
							<div class="card-body" style="background-image: url('<?=$row['img']?>');">
								<div class="info">
									<div class="title"><?=$row['title']?></div>
									<div class="description"><?=$row['description']?></div>
									<?if($row['type'] === 'collection'):?>
										<ul class="nav">
											<li><span><?=$row['totalDurationHours']?></span>Час<?=getNumEnding($row['totalDurationHours'], ['', 'а', 'ов'])?> <br>занятий</li>
											<li><span><?=$row['videosCount']?></span>Насыщен<?=getNumEnding($row['videosCount'], ['ая', 'ых', 'ых'])?> <br>лекци<?=getNumEnding($row['videosCount'], ['я', 'и', 'й'])?></li>
										</ul>
									<?else:?>
										<ul class="nav">
											<li><span>2</span>Часа <br>занятий</li>
										</ul>
									<?endif;?>
								</div>
							</div>
						</div>
					</div>
				<?endforeach;?>
			<?endif;?>
		</div>
	</div>
</div>