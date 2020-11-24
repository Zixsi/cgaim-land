<div id="header" class="main">
    <div class="content">
        <div class="content-wrap">
            <h1 class="title">Обучаем <br>компьютерной <br>графике и анимации</h1>
            <div class="description">Жми кнопку ниже<br><span>и получи новую профессию</span><br>с зарплатой от 55 000 рублей уже сейчас</div>
            <div class="buttons">
                <a href="#courses" type="button" class="btn btn-pink btn-xl">Мне интересно</a>
                <span class="change">Выбрать курс</span>
            </div>
        </div>
        <img src="<?=TEMPLATE_DIR?>/land/images/main-header-img.png" class="img">
    </div>
</div>

<div id="about">
    <div class="content">
        <div class="block-title">О школе</div>
        <span class="figure-rocket"></span>
        <div class="description">
            <p>Добро пожаловать в онлайн-школу CGAim!</p>
            <p>Нашей главной целью явлется научить студентов работать с 3D-графикой, моделированием и анимацией, а более опытным развить навыки и найти новую специализацию. Наша команда не довольна тем контентом, который заполонил интернет, поэтому мы разработали подход, основанный на постоянной практике.</p>
            <p>Задача курсов - обучить не только какими кнопками пользоваться в программах, а научить правильно и качественно создавать творческий замысел для игр, мультфильмов и кино. Помимо этого, познакомитесь с единомышленниками в закрытом Discord чате.</p>
        </div>
    </div>
</div>

<div id="courses" class="courses_main">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Курсы</div>
        <div class="course_cards mobile" id="courses-slider">
            <?php foreach($courses as $row): ?>
                <div class="card">
                    <a href="/courses/<?=$row['code']?>/" class="link"></a>
                    <div class="card_head">
                        <div class="header">Начало обучения</div>
                        <div class="date"><?=$row['start_date_formated']?></div>
                        <?php if($row['note']): ?>
                            <span class="badge">
                                <span class="badge_big_text"><?=$row['note'][0]?></span>
                                <?php if(empty($row['note'][1]) === false): ?>
                                    <span class="badge_small_text"><?=$row['note'][1]?></span>
                                <?php endif;?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="card_content">
                        <div class="img">
                            <img src="<?=$row['img_big']?>" alt="<?=$row['title']?>" class="img_big">
                            <img src="<?=$row['img_small']?>" alt="<?=$row['title']?>" class="img_small">
                        </div>
                        <div class="text_wrap">
                            <div class="title"><?=$row['title']?></div>
                            <div class="description"><?=$row['description']?></div>
                        </div>
                        <div class="info">
                            <div class="start">
                                <div class="header">Начало обучения</div>
                                <div class="date"><?=$row['start_date_formated']?></div>
                            </div>
                            <div class="instructor">
                                <img src="<?=$instructors[$row['instructor']]['photo_small']?>" alt="">
                                <div class="header">Автор курса</div>
                                <div class="fio"><?=$instructors[$row['instructor']]['first_name']?> <?=$instructors[$row['instructor']]['last_name']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="card_footer">
                        <a href="/courses/<?=$row['code']?>/" class="btn btn-pink btn-md">Подробнее</a>
                        <?php if($row['note']): ?>
                            <span class="badge">
                                <span class="badge_big_text"><?=$row['note'][0]?></span>
                                <?php if(empty($row['note'][1]) === false): ?>
                                    <span class="badge_small_text"><?=$row['note'][1]?></span>
                                <?php endif;?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="courses-slider-controls">
            <div id="courses-slider-nav" class="slider-dot-nav">
                <?php foreach($courses as $row): ?>
                    <button type="button" class="btn"></button>
                <?php endforeach; ?>
            </div>
            <div id="courses-slider-btns">
                <button class="btn btn-pink btn-round btn-slider-nav prev" id="courses-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round btn-slider-nav next" id="courses-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>
        
        <div class="page-center-btn">
            <a href="/courses/" class="btn btn-pink btn-xl">Все курсы</a>
        </div>
    </div>
</div>

<div id="for-whom" class="main">
    <div class="content">
        <span class="figure-cube"></span>
        <div class="block-title">Преимущества обучения</div>
        <div class="cards">
            <div class="card" style="background-image: url('<?=TEMPLATE_DIR?>/land/img/block1.png');">
                <div class="card-content">
                    <div class="title">Свободный график</div>
                    <div class="description">Обучение онлайн доступно из любой точки мира, вам не нужно никуда ехать.</div>
                </div>
            </div>
            <div class="card" style="background-image: url('<?=TEMPLATE_DIR?>/land/img/block2.png');">
                <div class="card-content">
                    <div class="title">Курсы с инструктором</div>
                    <div class="description">Онлайн-встречи каждую неделю, индивидуальная проверка работ и помощь инструктора.</div>
                </div>
            </div>
            <div class="card" style="background-image: url('<?=TEMPLATE_DIR?>/land/img/block3.png');">
                <div class="card-content">
                    <div class="title">Легкость обучения</div>
                    <div class="description">Лекции выстроены таким способом, что понятно будет новичку. Главное - старание и труд, тогда у вас получится.</div>
                </div>
            </div>
            <div class="card" style="background-image: url('<?=TEMPLATE_DIR?>/land/img/block4.png');">
                <div class="card-content">
                    <div class="title">Мы всегда на связи</div>
                    <div class="description">Студенты в любое время могут просматривать видеолекции и обращаться к инструктору за советом.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="questions">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Появились вопросы<span class="symbol">?</span></div>
        <div class="page-center-btn">
            <a href="javascript: void(0);" onclick="jivo_api.open(); return false;" class="btn btn-pink btn-xl">Задать вопрос</a>
        </div>
    </div>
</div>

<div id="training" class="main">
    <div class="content">
        <div class="block-title">Как проходит обучение</div>
        <div class="cards">
            <div class="card">
                <div class="card-content">
                    <div class="title">Первые задания</div>
                    <div class="description">— Сразу после оплаты вы попадаете в закрытую группу, где лежат первые задания. Перед стартом курса вам будет чем заняться. Чем раньше впишетесь, тем тщательнее подготовитесь к курсу, и тем лучше результат получите.</div>
                </div>
                <div class="img-wrap"></div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="title">Обучение в игровом формате</div>
                    <div class="description">Это обучение с применением игровых механик, как в игре вы будете проходить занятия как уровни, зарабатывать очки за выполнение домашнего задания. И в итоге получите дополнительные бонусы!</div>
                </div>
                <div class="img-wrap"></div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="title">Домашние задания</div>
                    <div class="description">1. Основные - то задание, которое необходимо выполнить по пройденному материалу. 2. Бонусное - можно сказать, собственный проект. Он быстрее прокачает навыки и будет возможность получить дополнительные плюшки от школы. По каждой домашке будет сделан ролик с ее разбором. Вы получите подробный фидбек, узнаете на что необходимо обратить внимание, как можно улучшить работу на данном этапе и т.д.</div>
                </div>
                <div class="img-wrap"></div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="title">Онлайн встречи</div>
                    <div class="description">В конце недели будет проходить вебинар внутри платформы, на котором сможете задать вопросы, возникшие в процессе выполнения домашнего задания. Также можно пообщаться на отвлеченные темы.</div>
                </div>
                <div class="img-wrap"></div>
            </div>
        </div>
        <span class="figure figure2-3"></span>
    </div>
</div>

<div id="workshop" class="courses_main">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Мастерская</div>
        <div class="course_cards mobile" id="workshop-slider">
            
            <?php foreach($workshop as $row): ?>
                <div class="card">
                    <a href="/workshop/<?=$row['code']?>/" class="link"></a>
                    <div class="card_head">
                        <?php if($row['note']): ?>
                            <span class="badge">
                                <span class="badge_big_text"><?=$row['note'][0]?></span>
                                <?php if(empty($row['note'][1]) === false): ?>
                                    <span class="badge_small_text"><?=$row['note'][1]?></span>
                                <?php endif;?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="card_content">
                        <div class="img">
                            <img src="<?=$row['img_big']?>" alt="<?=$row['title']?>" class="img_big">
                            <img src="<?=$row['img_small']?>" alt="<?=$row['title']?>" class="img_small">
                        </div>
                        <div class="text_wrap">
                            <div class="title"><?=$row['title']?></div>
                            <div class="description"><?=$row['description']?></div>
                        </div>
                        <div class="info">
                            <div class="instructor">
                                <img src="<?=$instructors[$row['instructor']]['photo_small']?>" alt="">
                                <div class="header">Автор курса</div>
                                <div class="fio"><?=$instructors[$row['instructor']]['first_name']?> <?=$instructors[$row['instructor']]['last_name']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="card_footer">
                        <a href="/workshop/<?=$row['code']?>/" class="btn btn-pink btn-md">Подробнее</a>
                        <?php if($row['note']): ?>
                            <span class="badge">
                                <span class="badge_big_text"><?=$row['note'][0]?></span>
                                <?php if(empty($row['note'][1]) === false): ?>
                                    <span class="badge_small_text"><?=$row['note'][1]?></span>
                                <?php endif;?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="workshop-slider-controls">
            <div id="workshop-slider-nav" class="slider-dot-nav">
                <?php foreach($workshop as $row): ?>
                    <button type="button" class="btn"></button>
                <?php endforeach; ?>
            </div>
            <div id="workshop-slider-btns">
                <button class="btn btn-pink btn-round btn-slider-nav prev" id="workshop-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round btn-slider-nav next" id="workshop-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>

        <div class="page-center-btn">
            <a href="#" class="btn btn-pink btn-xl">Все курсы</a>
        </div>
    </div>
</div>

<div id="examples">
    <div class="content">
        <div class="block-title">Работы студентов</div>
        <div id="works-slider">
            <?php foreach($works as $row): ?>
                <div class="item">
                    <div class="item-content">
                        <?php if($row['type'] === 'IMG'): ?>
                            <img src="<?=$row['source']?>" alt="">
                        <?php else: ?>
                            <iframe width="100%" height="600" src="<?=$row['source']?>?enablejsapi=1&version=3" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="works-slider-controls">
            <div id="works-slider-nav" class="slider-dot-nav">
                <?php foreach($works as $row): ?>
                    <button type="button" class="btn"></button>
                <?php endforeach; ?>
            </div>
            <div id="works-slider-btns">
                <button class="btn btn-pink btn-round btn-slider-nav prev" id="works-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round btn-slider-nav next" id="works-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>
    </div>
</div>

<div id="reviews">
    <div class="content">
        <div class="block-title">Отзывы</div>
        <?php if(count($reviews)): ?>
            <div class="slider-wrap">
                <div class="slider" id="review-slider">
                    <?php for($i = 0; $i < 2; $i++): ?>
                        <?php foreach ($reviews as $row): ?>
                            <div class="item">
                                <div class="item-content">
                                    <?php if($row['type'] === 'IMG'): ?>
                                        <img src="<?=$row['source']?>" alt="">
                                    <?php else: ?>
                                        <iframe width="350" height="600" src="<?=$row['source']?>?enablejsapi=1&version=3" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
                <div class="slider-btns">
                    <button class="btn btn-pink btn-round btn-slider-nav prev" id="review-prev-btn" data-controls="prev"><span></span></button>
                    <button class="btn btn-pink btn-round btn-slider-nav next" id="review-next-btn" data-controls="next"><span></span></button>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>

<div id="knowledge">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Где применять знания<span class="symbol">?</span></div>
        <div class="skills">
            <div class="cards">
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s1.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— Мультипликация<br>Разработай дизайн персонажа и создай 3D- анимацию для собственного ролика или работай в анимационной студии</div>
                    </div>
                </div>
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s2.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— YouTube<br>Используй навыки для создания дизайна канала, интегрируй 3D в видео и освежи взгляд на подачу материала.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s3.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— Реклама<br>Создавай персонажей и визуализируй собственные решения для рекламы продуктов и брендов</div>
                    </div>
                </div>
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s4.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— Веб-дизайн<br>Придумывай макеты сайтов, не трать время на поиск и адаптацию чужой графики</div>
                    </div>
                </div>
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s1.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— Кинематограф<br>Работайте со спецэффектами и сложными 3D- визуализациями, которые станут частью видеоролика или фильма</div>
                    </div>
                </div>
                <div class="card">
                    <div class="img-wrap">
                        <img src="<?=TEMPLATE_DIR?>/land/images/s2.png" alt="">
                    </div>
                    <div class="description-wrap">
                        <div class="description">— Разработка игр<br>Создавай окружение, персонажей и анимацию для игр от минималистичных до гиперреалистичных RPG</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-center-btn">
            <a href="javascript: void(0);" onclick="jivo_api.open(); return false;" class="btn btn-pink btn-xl">Задать вопрос</a>
        </div>
    </div>
</div>