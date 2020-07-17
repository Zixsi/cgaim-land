<div id="item-block">
    <div class="content">
        <h3 class="title-block">О курсе</h3>
        <?if(empty($item['preview_text']) === false):?>
        <div class="sub-title"><?= $item['preview_text'] ?></div>
        <?endif;?>
        <div class="info-stat">
            <div class="stat">
                <div class="stat-value"><?= (int) $item['lectures_count'] ?></div>
                <div class="stat-label">Недель обучения</div>
            </div>
            <div class="stat">
                <div class="stat-value"><?= (int) ($item['lectures_count'] * 2) ?></div>
                <div class="stat-label">Насыщеных задания</div>
            </div>
            <div class="stat">
                <div class="stat-value"><?= ceil((int) $item['lectures_count'] * 3.5) ?></div>
                <div class="stat-label">Часа занятий</div>
            </div>
        </div>
        <h3 class="title-block">Для кого этот курс</h3>
        <div class="sub-title">Для тех, кто решил стать профессионалом своего дела, кто хочет совместить свое хобби с дальнейшей профессиональной деятельностью, хочет погрузиться в творческую атмосферу.</div>
    </div>
</div>

<div id="item-detail-block">
    <div class="content">
        <div class="row">
            <div class="col">
                <h4 class="title">Цель курса</h4>
                <?= $item['description'] ?>
            </div>
            <div class="col">
                <div class="teacher">
                    <div class="teacher-img">
                        <img src="<?= $schoolUrl . '/' . $teacher['img'] ?>" alt="">
                    </div>
                    <div class="teacher-info">
                        <div class="name"><?= $teacher['full_name'] ?></div>
                        <div class="subname">Ваш преподаватель</div>
                        <div class="text"><?= $teacher['title'] ?></div>
                        <?if(empty($teacher['blog_url']) === false):?>
                        <a href="<?= ($teacher['blog_url'] ?? '') ?>" class="btn btn-pink text-pink" target="_blank">Читать интервью</a>
                        <?endif;?>
                    </div>
                </div>
                <h4 class="title">Особенности</h4>
                <p>Преподаватель подробно разбирает работу каждого ученика и дает развернутый комментарий.</p>
                <h4 class="title">Процесс обучения</h4>
                <div class="lectures">
                    <?if(count($lectures)):?>
                    <?foreach($lectures as $col):?>
                    <div class="lectures-col">
                        <?foreach($col as $val):?>
                        <?if((int) $val['type'] === 1):?>
                        Лекция - <?= $val['name'] ?><br>
                        <?else:?>
                        Лекция <?= (++$currentLecturesCnt) ?> - <?= $val['name'] ?></br>
                        <?endif;?>
                        <?endforeach;?>
                    </div>
                    <?endforeach;?>
                    <?endif;?>
                </div>
                <div class="other-info">
                    <h4 class="title">Данные курса</h4>
                    <?if(empty($item['text_app_main']) === false):?>
                    <p><b>Основные программы:</b> <?= $item['text_app_main'] ?></p>
                    <?endif;?>
                    <?if(empty($item['text_app_other']) === false):?>
                    <p><b>Дополнительные программы:</b> <?= $item['text_app_other'] ?></p>
                    <?endif;?>
                    <p><b>Требования к студенту:</b> Желание учиться. Все необходимые знания по используемым программам будут предоставлены на курсе.</p>
                    <p><b>Требования к компьютеру:</b> Процессор Intel i3 или AMD А6, оперативная память 8гб, видеокарта GeForce или Radeon с памятью 2гб и более.</p>
                    <p><b>Другие требования:</b> От 5 до 12 часов в неделю, на просмотр материалов и выполнения заданий.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?if(empty($item['trailer_code']) === false):?>
<div id="item-video-trailer-block">
    <div class="content">
        <h3 class="title-block">Трейлер курса</h3>
        <iframe width="700" height="375" src="https://www.youtube.com/embed/<?= $item['trailer_code'] ?>?modestbranding=1&rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<?endif;?>

<div id="item-price-block">
    <div class="content">
        <h3 class="title-block">Стоимость обучения</h3>
        <?php if($offers):?>
            <?php $offer = current($offers);?>
            <div class="subtitle text-center">Ближайший набор <?= $offer['ts_f'] ?></div>
        <?php endif;?>
        <div class="price-list">
            <div class="item">
                <div class="body">
                    <form action="<?= $schoolUrl ?>/external/pay/" method="get" target="_blank">
                        <input type="hidden" name="course" value="<?= $item['code'] ?>">
                        <input type="hidden" name="group" value="<?= $offer['ts_f'] ?>">
                        <input type="hidden" name="type" value="standart">
                        <div class="title">Стандарт</div>
                        <div class="type">
                            <div class="btn btn-pink active" data-target="price-standart-full">Полная</div>
                            <div class="btn btn-pink" data-target="price-standart-month">Помесячная</div>
                            <div class="radio">
                                <input type="radio" name="period" id="price-standart-full--period" value="full" checked="true">
                                <input type="radio" name="period" id="price-standart-month--period" value="month">
                            </div>
                        </div>
                        <div class="text">
                            Доступ ко всем лекциям курса<br>
                            Начало в назначенную дату
                        </div>
                        <?php if((float) $item['price']['standart']['full'] <= 0):?>
                            <div class="price active">FREE</div>
                        <?php else:?>
                            <div class="price active" id="price-standart-full"><?= number_format($item['price']['standart']['full'], 2, '.', ' ') ?><span>руб</span></div>
                            <div class="price" id="price-standart-month"><?= number_format($item['price']['standart']['month'], 2, '.', ' ') ?><span>руб/мес</span></div>
                        <?php endif;?>
                        <?php /*<a href="<?= $schoolUrl ?>/courses/<?= $item['code'] ?>/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться</a>*/?>
                        <button type="submit" class="btn btn-pink">Купить</button>
                    </form>
                </div>
            </div>

            <div class="item big">
                <div class="body">
                    <form action="<?= $schoolUrl ?>/external/pay/" method="get" target="_blank">
                        <input type="hidden" name="course" value="<?= $item['code'] ?>">
                        <input type="hidden" name="group" value="<?= $offer['ts_f'] ?>">
                        <input type="hidden" name="type" value="advanced">
                        <div class="title">Расширенный</div>
                        <div class="type">
                            <div class="btn btn-pink active" data-target="price-advanced-full">Полная</div>
                            <div class="btn btn-pink" data-target="price-advanced-month">Помесячная</div>
                            <div class="radio">
                                <input type="radio" name="period" id="price-advanced-full--period" value="full" checked="true">
                                <input type="radio" name="period" id="price-advanced-month--period" value="month">
                            </div>
                        </div>
                        <div class="text">
                            Доступ ко всем лекциям курса<br>
                            Проверка домашних работ<br>
                            Закрытый канал в дискорде<br>
                            Групповые онлайн встречи<br>
                            Начало в назначенную дату
                        </div>
                        <?php if($item['only_standart'] === false):?>
                            <?php if((float) $item['price']['advanced']['full'] <= 0):?>
                                <div class="price active">FREE</div>
                            <?php else:?>
                                <div class="price active" id="price-advanced-full"><?= number_format($item['price']['advanced']['full'], 2, '.', ' ') ?><span>руб</span></div>
                                <div class="price" id="price-advanced-month"><?= number_format($item['price']['advanced']['month'], 2, '.', ' ') ?><span>руб/мес</span></div>
                            <?php endif;?>
                            <?php /*<a href="<?= $schoolUrl ?>/courses/<?= $item['code'] ?>/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться</a>*/?>
                            <button type="submit" class="btn btn-pink">Купить</button>
                        <?php endif;?>
                    </form>
                </div>
            </div>

            <?php $isEnabledVip = ($item['only_standart'] === false && ((float) $item['price']['vip']['full'] > 0));?>
            <div class="item">
                <div class="body">
                    <form action="<?= $schoolUrl ?>/external/pay/" method="get" target="_blank">
                        <input type="hidden" name="course" value="<?= $item['code'] ?>">
                        <input type="hidden" name="group" value="<?= $offer['ts_f'] ?>">
                        <input type="hidden" name="type" value="vip">
                        <?php if($isEnabledVip):?>
                        <div class="label"><?= $nextMonday ?></div>
                        <?php endif;?>
                        <div class="title">Премиум</div>
                        <div class="type">
                            <div class="btn btn-pink active" data-target="price-vip-full">Полная</div>
                            <div class="btn btn-pink" data-target="price-vip-month">Помесячная</div>
                            <div class="radio">
                                <input type="radio" name="period" id="price-vip-full--period" value="full" checked="true">
                                <input type="radio" name="period" id="price-vip-month--period" value="month">
                            </div>
                        </div>
                        <div class="text">
                            Доступ ко всем лекциям курса<br>
                            Проверка домашних работ<br>
                            Закрытый канал в дискорде<br>
                            Личные онлайн встречи<br>
                            Старт в ближайший понедельник
                        </div>

                        <?php if($isEnabledVip):?>
                            <div class="price active" id="price-vip-full"><?= number_format($item['price']['vip']['full'], 2, '.', ' ') ?><span>руб</span></div>
                            <div class="price" id="price-vip-month"><?= number_format($item['price']['vip']['month'], 2, '.', ' ') ?><span>руб/мес</span></div>
                            <?php/*<a href="<?= $schoolUrl ?>/courses/<?= $item['code'] ?>/" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться</a>*/?>
                            <button type="submit" class="btn btn-pink">Купить</button>
                        <?php endif;?>
                    </form>
                </div>
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

<?$this->load->view('inc_training.php');?>

<?if(empty($item['examples_code']) === false):?>
<div id="item-video-works-block">
    <div class="content">
        <h3 class="title-block">Работы наших студентов</h3>
        <iframe width="700" height="375" src="https://www.youtube.com/embed/<?= $item['examples_code'] ?>?modestbranding=1&rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<?endif;?>

<div id="review-block" class="review-item-block">
    <div class="content">
        <h3 class="title-block">Отзывы наших выпускников</h3>
        <?$this->load->view('inc_reviews.php');?>
    </div>
</div>