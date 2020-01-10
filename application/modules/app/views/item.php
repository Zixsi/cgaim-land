<?php
$urlSchool = $this->config->item('school_url');
?>
<?$this->load->view('inc_header.php');?>

<div id="first-block" class="compact" <?if(strpos($item['img'], 'img_default') === false):?>style="background-image: url('<?=$item['img']?>');"<?endif;?>>
	<div class="content">
		<?$this->load->view('inc_navpanel.php');?>
		<div class="info">
			<div class="info-text">
				<div class="title"><?=$item['name']?></div>
				<?if(empty($item['preview_text']) === false):?>
					<div class="text"><?=$item['preview_text']?></div>
				<?endif;?>
				
				<a href="<?=$schoolUrl?>/courses/<?=$item['code']?>/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Мне интересно</a>
			</div>
		</div>
	</div>
</div>

<?$this->content()?>
<?$this->load->view('inc_footer.php');?>