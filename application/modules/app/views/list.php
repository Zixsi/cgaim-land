<?php
$urlSchool = $this->config->item('school_url');
?>
<?$this->load->view('inc_header.php');?>

<div id="first-block" class="compact items-list-page">
	<div class="content">
		<?$this->load->view('inc_navpanel.php');?>
		<div class="info">
			<div class="info-text">
				<div class="title"><?=$page_header_title?></div>
				<div class="text"><?=$page_header_text?></div>
			</div>
		</div>
	</div>
</div>

<?$this->content()?>
<?$this->load->view('inc_footer.php');?>