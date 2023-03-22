<div id="header">
    <div class="content">
        <div class="content-wrap">
            <h1 class="title"><?=$item['title_splited']?></h1>
            <div class="description"><?=$item['description']?></div>
            
            <?php if(empty($item['video']) === false): ?>
                <div class="interactive">
                    <span class="round round-1"></span>
                    <span class="round round-2"></span>
                    <a href="#course-video-modal" rel="modal:open">
                        <button type="button" class="btn btn-pink btn-round btn-play">
                            <span></span>
                        </button>
                    </a>
                    <span class="text">Просмотрите <br>Промо - видео</span>
                </div>
                <div id="course-video-modal" class="modal video-modal">
                    <iframe width="560" height="315" src="<?=$item['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endif; ?>
            
            <div class="buttons">
                <?php if(PAYMENT): ?>
                    <a href="#packages" class="btn btn-pink btn-xl">Записаться</a>
                <?php else: ?>
                    <a href="javascript:void(0);" class="btn btn-pink btn-xl callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'advanced', true)?>" data-type="1">Записаться</a>
                <?php endif; ?>
                    
<!--                <a href="#program" class="btn btn-pink btn-xl">Смотреть программу</a>-->
                <?php if(empty($item['start_date']) === false): ?>
                    <span class="date">Старт <?=$item['start_date_formated']?></span>
                    <span class="date_info">(набор в группу до <?=getEndDateRecruit($item['start_date'])?>)</span>
                    
                <?php else: ?>
                    <span class="date">Старт сразу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <?php endif; ?>
                    
                <?php if($item['note'] && empty($item['note'][0]) === false): ?>
                    <span id="header-classroom">
                        <span class="number"><?=$item['note'][0]?></span>
                        <?php if(empty($item['note'][1]) === false): ?>
                            <span class="text"><?=$item['note'][1]?></span>
                        <?php endif;?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <img src="<?=$item['img_big']?>" class="img">
    </div>
</div>

<?php if(isset($item['for_whom'])): ?>
    <div id="for-whom">
        <div class="content">
            <span class="figure-sphere"></span>
            <span class="figure-cube"></span>
            <div class="block-title">Кому подойдет курс<span class="symbol">?</span></div>
            <div class="cards">
                <?php foreach($item['for_whom'] as $row): ?>
                <div class="card" style="background-image: url('<?=$row['img']?>');">
                        <div class="card-content">
                            <div class="title"><?=$row['title']?></div>
                            <div class="description"><?=$row['description']?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="purpose">
    <div class="content">
        <span class="figure figure1-4"></span>
        <div class="block-title">Цель курса</div>
        <span class="figure-rocket"></span>
        <div class="description"><?= htmlspecialchars_decode($item['purpose'])?></div>
    </div>
</div>
<div id="instructor">
    <div class="content">
        <div class="block-title">Инструктор курса</div>
        <div id="curse-instructor">
            <img src="<?=$instructor['photo_big']?>" alt="" class="photo">
            <div class="cards">
                <div class="card card-1">
                    <span class="number-img number-img-1"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][0]?></div>
                    </div>
                </div>
                <div class="card card-2">
                    <span class="number-img number-img-2"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][1]?></div>
                    </div>
                </div>
                <div class="card card-3">
                    <span class="number-img number-img-3"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][2]?></div>
                    </div>
                </div>
                <div class="card card-4">
                    <span class="number-img number-img-4"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][3]?></div>
                    </div>
                </div>
                <div class="card card-5">
                    <span class="number-img number-img-5"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][4]?></div>
                    </div>
                </div>
                <div class="card card-6">
                    <span class="number-img number-img-6"></span>
                    <div class="description-wrap">
                        <div class="description"><?=$instructor['blocks'][5]?></div>
                    </div>
                </div>
            </div>
            <div class="interactive">
                <?php if(empty($instructor['video_link']) === false): ?>
                    <div class="demo">
                        <span class="round round-1"></span>
                        <span class="round round-2"></span>
                        <button type="button" class="btn btn-pink btn-round btn-play">
                            <span></span>
                        </button>
                        <span class="arrow"></span>
                        <span class="text">Деморил<br>преподавателя</span>
                        <a href="#instructor-video-modal" rel="modal:open"></a>
                    </div>
                    
                    <div id="instructor-video-modal" class="modal video-modal">
                        <iframe width="560" height="315" src="<?=$instructor['video_link']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php endif;?>
                <!--<div class="fio"><?=$instructor['first_name']?> <br><?=$instructor['last_name']?></div>-->
            </div>
            <div class="quote"><?= htmlspecialchars_decode($instructor['quote'])?></div>
            <div class="text-center">
                <a href="#callback-form--modal" rel="modal:open" class="btn btn-pink btn-xl">Задать вопрос</a>
            </div>
        </div>
    </div>
</div>
<div id="program">
    <div class="content">
        <span class="figure figure1-2"></span>
        <div class="block-title">Программа курса</div>
        <div class="module-block module1">
            <div class="block-title-2">Модуль 1 - <?=$item['program']['module_1_title']?></div>
            
            <?php if(empty($item['program']['module_1_short_description']) === false): ?>
                <div class="description"><?=$item['program']['module_1_short_description']?></div>
            <?php endif; ?>
                
            <div class="animation-law">
                <?php if($moduleInfoBlock): ?>
                <div class="card">
                    <div class="card-content">
                        <div class="title"><?=$moduleInfoBlock['title']?></div>
                        <?php
                        $moduleInfoBlock['data'] = json_decode($moduleInfoBlock['data'], true);
                        ?>
                        <?php if($moduleInfoBlock['type'] === 'TEXT'): ?>
                            <div class="text">
                                <?= htmlspecialchars_decode($moduleInfoBlock['data']['text'])?>
                                <?= htmlspecialchars_decode($moduleInfoBlock['data']['text'])?>
                            </div>
                        <?php else:?>
                            <?php 
                                $chunks = array_chunk($moduleInfoBlock['data']['list'], ceil(count($moduleInfoBlock['data']['list']) / 2));
                                $number = 1;
                            ?>
                            <div class="list">
                                <?php foreach($chunks as $rows): ?>
                                    <div class="col">
                                        <?php foreach($rows as $row): ?>
                                            <span><?=($number++)?>. <?=$row?></span>
                                        <?php endforeach;?>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <span class="figure-man" style="background-image: url('<?=$moduleInfoBlock['img']?>');"></span>
                </div>
                <?php endif; ?>
                <div class="description"><?=$item['program']['module_1_description']?></div>
                <span class="figure-mouse" style="background-image: url('<?=$item['program']['module_1_img']?>');"></span>
            </div>
            <div class="skills">
                <div class="title">В этой части вы научитесь:</div>
                <div class="cards">
                    <?php foreach($item['program']['module_1_skills'] as $skillId): ?>
                        <div class="card">
                            <div class="img-wrap">
                                <img src="<?=$skills[$skillId]['img']?>" alt="">
                            </div>
                            <div class="description-wrap">
                                <div class="description">— <?=$skills[$skillId]['description']?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="afterword"><?=$item['program']['module_1_skills_description']?></div>
            </div>
        </div>

        <div class="module-block module2">
            <div class="background"></div>
            <span class="figure figure1-6"></span>
            <div class="block-title-2">Модуль 2 - <?=$item['program']['module_2_title']?></div>
            <div class="description">
                <div class="text-wrap"><?=$item['program']['module_2_description']?></div>
                <span class="figure-sculpture" style="background-image: url('<?=$item['program']['module_2_img']?>');"></span>
            </div>
            <div class="skills">
                <div class="title">В этой части вы научитесь:</div>
                <div class="cards">
                    <?php foreach($item['program']['module_2_skills'] as $skillId): ?>
                        <div class="card">
                            <div class="img-wrap">
                                <img src="<?=$skills[$skillId]['img']?>" alt="">
                            </div>
                            <div class="description-wrap">
                                <div class="description">— <?=$skills[$skillId]['description']?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="afterword"><?=$item['program']['module_2_skills_description']?></div>
            </div>
        </div>

        <div class="module-block module3">
            <span class="figure figure2-1"></span>
            <span class="figure figure1-3"></span>
            <div class="block-title-2">Модуль 3 - <?=$item['program']['module_3_title']?></div>
            <div class="description">
                <div class="text-wrap"><?=$item['program']['module_3_description']?></div>
                <span class="figure-box" style="background-image: url('<?=$item['program']['module_3_img']?>');"></span>
            </div>
            <div class="skills">
                <div class="title">В этой части вы научитесь:</div>
                <div class="cards">
                    <?php foreach($item['program']['module_3_skills'] as $skillId): ?>
                        <div class="card">
                            <div class="img-wrap">
                                <img src="<?=$skills[$skillId]['img']?>" alt="">
                            </div>
                            <div class="description-wrap">
                                <div class="description">— <?=$skills[$skillId]['description']?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="afterword"><?=$item['program']['module_3_skills_description']?></div>
            </div>
        </div>

        <div class="module-block module4">
            <div class="background"></div>
            <span class="figure figure2-6"></span>
            <div class="block-title-2">Практическая часть - <?=($item['program']['module_4_months'] ?? 0)?> <?=pluralMonth(($item['program']['module_4_months'] ?? 0))?></div>
            <div class="box">
                <div class="box-content">
                    <div class="buttons" id="lectures-slider-nav">
                        <?php foreach($lectures as $row): ?>
                        <button type="button" class="btn btn-pink btn-md btn-exo"><?= getStringNumber($row['month'])?> <?=(($item['program']['module_4_type'] ?? 'MONTH') === 'MONTH')?'месяц':'семестр'?></button>   
                        <?php endforeach;?>
                    </div>
                    <div class="lectures-block" id="lectures-slider">
                        <?php
                        $lectureNumber = 0;
                        ?>
                        <?php foreach($lectures as $row): ?>
                            <div class="item">
                                <div class="img-wrap">
                                    <img src="<?=$row['img']?>" alt="" class="img">
                                </div>
                                <div class="list">
                                    <?php foreach($row['items'] as $lectureKey => $lectureRow):?>
                                        <div class="row">
                                            <div class="title">
                                                <?=(($item['program']['module_4_type'] ?? 'MONTH') === 'MONTH')?'Лекция':'Месяц'?>
                                                &nbsp;
                                                <?= makeLectureNumber(1, ($lectureNumber++))?>: <span><?=$lectureRow['title']?></span>
                                            </div> 
                                            <div class="text"><?=$lectureRow['description']?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div id="lectures-slider-btn">
                        <button class="btn btn-pink btn-round" id="lectures-prev-btn" data-controls="prev"><span></span></button>
                        <button class="btn btn-pink btn-round" id="lectures-next-btn" data-controls="next"><span></span></button>
                    </div>
                </div>
                <div class="apps">
                    <div class="list">
                        <div class="title">Используемые программы на курсе:</div>
                        <?php
                        $appsName = [];
                        
                        foreach($item['program']['module_4_apps'] as $appId) {
                            $appsName[] = $apps[$appId]['title'];
                        }
                        ?>
                        <div class="names"><?= implode(', ', $appsName)?></div>
                    </div>
                    <div class="icons">
                        <?php foreach($item['program']['module_4_apps'] as $appId): ?>
                        <img src="<?=$apps[$appId]['img']?>" alt="<?=$apps[$appId]['title']?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php if (count($works)): ?>
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
<?php endif;?>

<div id="training">
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
                    <div class="title">Онлайн обучение</div>
                    <div class="description">Учитесь в удобном темпе с помощью нашей веб платформы на компьютере, планшете или телефоне.</div>
                </div>
                <div class="img-wrap"></div>
            </div>
        </div>
        <span class="figure figure2-3"></span>
    </div>
</div>

<div id="packages">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Пакеты</div>
        <div class="text-center" style="margin-top: 25px; font-size: 1.6rem;">Действует помесячная оплата (см. ниже)</div>
        <div class="cards" id="package-slider">
            <div class="card">
                <div class="card-head">
                    <div class="title">Старт</div>
                    <div class="date">Сразу после покупки</div>
                </div>
                <div class="card-content">
                    <div class="title">Стандарт</div>
                    <ul class="list">
                        <li>Доступ к лекциям сразу после оплаты</li>
                        <li>Самостоятельное изучение</li>
                    </ul>
                    <div class="price"><?=number_format($item['packages']['standart']['price'], 0, '.', ' ')?> Р</div>
                    <?php if((int) $item['packages']['standart']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'standart', true)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'standart', true)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="card selected">
                <div class="card-head">
                    <div class="title">Старт</div>
                    <div class="date"><?=$item['start_date_formated']?></div>
                    <?php if(empty($item['start_date']) === false): ?>
                        <div class="date_info">(набор в группу до <?=getEndDateRecruit($item['start_date'])?>)</div>
                    <?php endif;?>
                </div>
                <div class="card-content">
                    <div class="title">Расширенный</div>
                    <ul class="list">
                        <li>Доступ к лекции каждую неделю</li>
                        <li>Проверка домашних работ</li>
                        <li>Закрытый канал в дискорде</li>
                        <li>Месяц поддержки после курса</li>
                        <li>Начало в назначенную дату</li>
                        <li>Сертификат об окончании курса</li>  
                    </ul>
                    <div class="price"><?=number_format($item['packages']['advanced']['price'], 0, '.', ' ')?> Р</div>
                    <?php if((int) $item['packages']['advanced']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'advanced', true)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'advanced', true)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <div class="title">Старт</div>
                    <div class="date">Ближайший понедельник</div>
                </div>
                <div class="card-content">
                    <div class="title">Премиум</div>
                    <ul class="list">
                        <li>Доступ к лекции каждую неделю</li>
                        <li>Проверка домашних работ</li>
                        <li>Закрытый канал в дискорде</li>
                        <li>Личные онлайн встречи</li>
                        <li>Старт в ближайший понедельник</li>
                        <li>Гарантируем результат</li>
                        <li>Сертификат об окончании курса</li>
                    </ul>
                    <div class="price"><?=number_format($item['packages']['vip']['price'], 0, '.', ' ')?> Р</div>
                    <?php if((int) $item['packages']['vip']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'vip', true)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'vip', true)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="packages-controls">
            <div id="packages-slider-nav" class="slider-dot-nav">
                <button type="button" class="btn"></button>
                <button type="button" class="btn"></button>
                <button type="button" class="btn"></button>
            </div>
            <div id="packages-slider-btns">
                <button class="btn btn-pink btn-round btn-slider-nav prev" id="packages-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round btn-slider-nav next" id="packages-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>
    </div>
</div>

<div id="installment-plan">
    <div class="content">
        <div class="block-title">Помесячная оплата</div>
        <div class="cards" id="installment-plan-slider">
            <div class="card">
                <div class="card-content">
                    <div class="title">Стандарт</div>
                    <div class="price"><?=number_format($item['packages']['standart']['partial_price'], 0, '.', ' ')?> Р</div>
                    <div class="period">помесячно <br><?=($item['program']['module_4_months'] ?? 0)?> <?= pluralMonth(($item['program']['module_4_months'] ?? 0))?></div>
                    <?php if((int) $item['packages']['standart']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'standart', false)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'standart', false)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="title">Расширенный</div>
                    <div class="price"><?=number_format($item['packages']['advanced']['partial_price'], 0, '.', ' ')?> Р</div>
                    <div class="period">помесячно <br><?=($item['program']['module_4_months'] ?? 0)?> <?= pluralMonth(($item['program']['module_4_months'] ?? 0))?></div>
                    <?php if((int) $item['packages']['advanced']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'advanced', false)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'advanced', false)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="title">Премиум</div>
                    <div class="price"><?=number_format($item['packages']['vip']['partial_price'], 0, '.', ' ')?> Р</div>
                    <div class="period">помесячно <br><?=($item['program']['module_4_months'] ?? 0)?> <?= pluralMonth(($item['program']['module_4_months'] ?? 0))?></div>
                    <?php if((int) $item['packages']['vip']['available'] === 1): ?>
                        <?php if(PAYMENT): ?>
                            <a href="<?= getPayCourse($item['code'], $item['start_date'], 'vip', false)?>" class="btn btn-pink btn-md btn-exo" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Записаться на курс</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-pink btn-md btn-exo callback-from-show-btn" data-link="<?= getPayCourse($item['code'], $item['start_date'], 'vip', false)?>" data-type="0">Записаться</a>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="installment-controls">
            <div id="installment-slider-nav" class="slider-dot-nav">
                <button type="button" class="btn"></button>
                <button type="button" class="btn"></button>
                <button type="button" class="btn"></button>
            </div>
            <div id="installment-slider-btns">
                <button class="btn btn-pink btn-round btn-slider-nav prev" id="installment-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round btn-slider-nav next" id="installment-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>
    </div>
</div>

<?php if (empty($item['bonuses']) === false): ?>
    <div id="bonuses">
        <div class="content">
            <div class="block-title">Бонусы</div>
            <div class="slider-wrap">
                <div class="slider" id="bonus-slider">
                    <?php 
                        if (count($item['bonuses']) === 1) {
                            $item['bonuses'] = array_merge($item['bonuses'], $item['bonuses']);
                        }
                    ?>
                    <?php foreach($item['bonuses'] as $bonusId): ?>
                        <div class="item">
                            <div class="item-content-wrap">
                                <div class="img">
                                    <img src="<?=$bonuses[$bonusId]['img']?>" alt="<?=$bonuses[$bonusId]['title']?>">
                                </div>
                                <div class="item-content">
                                    <div class="title"><?=$bonuses[$bonusId]['title']?></div>
                                    <div class="description"><?=$bonuses[$bonusId]['description']?></div>
                                    <div class="price">Стоимость: <?= number_format($bonuses[$bonusId]['price'], 0, '.', ' ')?> рублей.</div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div id="bonus-slider-nav" class="slider-dot-nav">
                    <?php foreach($item['bonuses'] as $bonusId): ?>
                        <button type="button" class="btn"></button>
                    <?php endforeach; ?>
                </div>
                <button class="btn btn-pink btn-round" id="bonus-prev-btn" data-controls="prev"><span></span></button>
                <button class="btn btn-pink btn-round" id="bonus-next-btn" data-controls="next"><span></span></button>
            </div>
        </div>
    </div>
<?php endif; ?>

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

<div id="faq">
    <div class="background"></div>
    <div class="content"> 
        <div class="block-title">Ответы на вопросы</div>
        <div class="accordion" id="faq-accordion">
            <?php foreach($faq as $row): ?>
                <div class="item">
                    <span class="trigger"></span>
                    <div class="title"><?=$row['title']?></div>
                    <div class="description"><?= htmlspecialchars_decode($row['description'])?></div>
                </div>
            <?php endforeach;?>
        </div>
        <span class="figure figure2-4"></span>
        <span class="figure figure2-5"></span>
    </div>
</div>

<div id="courses" class="courses_main other">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Другие наши курсы</div>
        <div class="course_cards mobile" id="courses-slider">
            <?php foreach($courses as $row): ?>
                <div class="card">
                    <a href="/courses/<?=$row['code']?>/" class="link"></a>
                    <div class="card_head">
                        <div class="header">Начало обучения</div>
                        <div class="date"><?=$row['start_date_formated']?></div>
                        <?php if($row['note'] && empty($row['note'][0]) === false): ?>
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