<?php
$urlSchool = $this->config->item('school_url');
?>
<?$this->load->view('inc_header.php');?>

<div id="first-block">
	<div class="content">
		<?$this->load->view('inc_navpanel.php');?>
		<div class="info">
			<div class="info-text">
				<div class="title">Обучаем компьютерной графике и анимации</div>
				<div class="text">Жми кнопку ниже и получи новую <br>профессию с зарплатой от 55 тыс <br>рублей уже сейчас!</div>
				<a href="<?=$urlSchool?>/auth/register/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Мне интересно</a>
			</div>
			<div class="info-img">
				<span class="point p1">
					<span class="point-pulse point-pulse-bg">
						<span class="pulse point-pulse-bg"></span>
					</span>
					Анимация
				</span>
				<span class="point p2">
					<span class="point-pulse point-pulse-bg">
						<span class="pulse point-pulse-bg"></span>
					</span>
					Текстурирование
				</span>
				<span class="point p3">
					Моделирование
					<span class="point-pulse point-pulse-bg">
						<span class="pulse point-pulse-bg"></span>
					</span>
				</span>
			</div>
		</div>
	</div>
</div>

<?$this->content()?>
<?$this->load->view('inc_footer.php');?>