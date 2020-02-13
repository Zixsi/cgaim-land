<?php
$urlSchool = $this->config->item('school_url');
?>
<div id="about-block">
    <div class="content" id="about">
        <h3 class="title-block">О школе</h3>
        <div class="sub-title">Добро пожаловать в онлайн-школу CGAim</div>
        <p>Нашей главной целью явлется научить студентов работать с 2D-графикой, 3D-моделированием и анимацией, а более опытным развить навыки и найти новую специализацию. Наша команда не довольна тем контентом, который заполонил интернет, поэтому мы разработали подход, основанный на постоянной практике.</p>
        <p>Задача курсов - обучить не только какими кнопками пользоваться в программах, а научить правильно и качественно создавать творческий замысел для игр, мультфильмов и кино. Помимо этого, познакомитесь с единомышленниками в закрытом Discord чате.</p>
    </div>
</div>

<div id="course-block">
    <div class="content">
        <h3 class="title-block">Выберите свой курс</h3>
        <div class="sub-title">Блок курсов для начинающих и более опытных , где <br>познакомитесь с принципами и необходимым инструментом <br>для дальнейшего развития в компьютерной графике.</div>

        <div class="card-list card-slider" id="course-slider">
            <?php if ($courses) :?>
                <?php foreach ($courses as $course) :?>
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
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="text-center">
            <a href="/courses/" class="btn btn-pink text-pink">Все курсы</a>
        </div>
    </div>
</div>

<div id="advantage-block">
    <div class="content">
        <h3 class="title-block">Преимущества обучения</h3>
        <div class="items-list">
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/a1.png" alt="" width="81">
                </div>
                <div class="title">Свободный график</div>
                <div class="text">Обучение онлайн доступно из любой точки мира, вам не нужно никуда ехать</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/a2.png" alt="" width="76">
                </div>
                <div class="title">Курсы с инструктором</div>
                <div class="text">Онлайн-встречи каждую неделю, индивидуальная проверка работ и помощь инструктора</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/a3.png" alt="" width="89">
                </div>
                <div class="title">Легкость обучения</div>
                <div class="text">Лекции выстроены таким способом, что понятно будет новичку. Главное - старание и труд, тогда у вас получится</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/a4.png" alt="" width="76">
                </div>
                <div class="title">Мы всегда на связи</div>
                <div class="text">Студенты в любое время могут просматривать видеолекции и обращаться к инструктору за советом</div>
            </div>
        </div>
    </div>
</div>

<div id="faq-block">
    <div class="content">
        <h3 class="title-block white">Появились вопросы по обучению?</h3>
        <a href="https://vk.com/im?media=&sel=-178242314" class="btn btn-pink" target="_blank">Задать вопрос</a>
    </div>
</div>

<?php $this->load->view('inc_training.php');?>

<?php if ($workshop) :?>
    <div id="workshop-block">
        <div class="content">
            <h3 class="title-block">Мастерская</h3>
            <div class="card-list card-slider" id="workshop-slider">
                <?php foreach ($workshop as $row) :?>
                    <div class="card-wrap">
                        <div class="card">
                            <a href="/workshop/<?=$row['code']?>"></a>
                            <div class="card-body" style="background-image: url('<?=$row['img']?>');">
                                <div class="info">
                                    <div class="title"><?=$row['title']?></div>
                                    <div class="description"><?=$row['description']?></div>
                                    <?php if ($row['type'] === 'collection') :?>
                                        <ul class="nav">
                                            <li><span><?=$row['totalDurationHours']?></span>Час<?=getNumEnding($row['totalDurationHours'], ['', 'а', 'ов'])?> <br>занятий</li>
                                            <li><span><?=$row['videosCount']?></span>Насыщен<?=getNumEnding($row['videosCount'], ['ая', 'ых', 'ых'])?> <br>лекци<?=getNumEnding($row['videosCount'], ['я', 'и', 'й'])?></li>
                                        </ul>
                                    <?php else :?>
                                        <ul class="nav">
                                            <li><span>2</span>Часа <br>занятий</li>
                                        </ul>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="text-center">
                <a href="/workshop/" class="btn btn-pink text-pink">Все курсы</a>
            </div>
        </div>
    </div>
<?php endif;?>

<div id="works-block">
    <div class="content">
        <h3 class="title-block">Работы наших студентов</h3>

        <div class="card-list card-slider" id="works-slider">
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w8.jpg?v=1');">
                        <div class="info">
                            <div class="title">Максим Семёнов</div>
                            <div class="description">Arnold renderer<br>Базовый курс</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w8.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w2.jpg?v=1');">
                        <div class="info">
                            <div class="title">Миша Бондарь</div>
                            <div class="description">Основы 3D анимации</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w2.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w3.jpg?v=1');">
                        <div class="info">
                            <div class="title">Екатерина Измайлова</div>
                            <div class="description">Механика тела</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w3.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w4.jpg?v=1');">
                        <div class="info">
                            <div class="title">Маша Чижова</div>
                            <div class="description">Arnold renderer<br>Базовый курс</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w4.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w5.jpg?v=1');">
                        <div class="info">
                            <div class="title">Александр Петров</div>
                            <div class="description">Arnold renderer<br>Базовый курс</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w5.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w6.jpg?v=1');">
                        <div class="info">
                            <div class="title">Александр Петров</div>
                            <div class="description">Arnold renderer<br>Базовый курс</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w6.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w7.jpg?v=1');">
                        <div class="info">
                            <div class="title">Александр Самсонов</div>
                            <div class="description">Arnold renderer<br>Базовый курс</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w7.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="card-body" style="background-image: url('<?=TEMPLATE_DIR?>/assets/works/w1.jpg?v=1');">
                        <div class="info">
                            <div class="title">Дмитрий Серов</div>
                            <div class="description">Основы 3D анимации</div>
                            <a href="<?=TEMPLATE_DIR?>/assets/works/w1.jpg?v=1" class="btn btn-pink btn-sm works-lightbox" data-type="image">Смотреть</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="review-block">
    <div class="content" id="reviews">
        <h3 class="title-block white">Отзывы наших выпускников</h3>
        <?php $this->load->view('inc_reviews.php');?>
    </div>
</div>

<div id="knowledge-block">
    <div class="content">
        <h3 class="title-block">Где можно применять знания после обучения</h3>
        <div class="items-list">
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k1.png" alt="" width="82">
                </div>
                <div class="title">Мультипликация</div>
                <div class="text">Разработай дизайн персонажа и создай 3D- анимацию для собственного ролика или работай в анимационной студии</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k2.png" alt="" width="72">
                </div>
                <div class="title">YouTube</div>
                <div class="text">Используй навыки для создания дизайна канала, интегрируй 3D в видео и освежи взгляд на подачу материала.</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k3.png" alt="" width="74">
                </div>
                <div class="title">Реклама</div>
                <div class="text">Создавай персонажей и визуализируй собственные решения для рекламы продуктов и брендов</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k4.png" alt="" width="82">
                </div>
                <div class="title">Веб-дизайн</div>
                <div class="text">Придумывай макеты сайтов, не трать время на поиск и адаптацию чужой графики</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k5.png" alt="" width="66">
                </div>
                <div class="title">Кинематограф</div>
                <div class="text">Работайте со спецэффектами и сложными 3D- визуализациями, которые станут частью видеоролика или фильма</div>
            </div>
            <div class="item">
                <div class="icon">
                    <img src="<?=TEMPLATE_DIR?>/main_v2/img/k6.png" alt="" width="78">
                </div>
                <div class="title">Разработка игр</div>
                <div class="text">Создавай окружение, персонажей и анимацию для игр от минималистичных до гиперреалистичных RPG</div>
            </div>
        </div>
        <div class="text-center">
            <a href="<?=$urlSchool?>/auth/register/" class="btn btn-pink text-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Регистрация</a>
        </div>
    </div>
</div>