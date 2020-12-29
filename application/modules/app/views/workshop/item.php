<div id="header" class="workshop">
    <div class="content">
        <div class="content-wrap">
            <h1 class="title"><?=$item['title_splited']?></h1>
            <div class="description"><?=$item['description']?></div>
            <div class="price">
                <?php if((int) $item['packages']['standart']['price'] > 0): ?>
                    <?=number_format($item['packages']['standart']['price'], 0, '.', ' ')?> Р
                <?php else: ?>
                    FREE
                <?php endif; ?>
            </div>
            <div class="buttons">
                
                <?php if(PAYMENT): ?>
                    <a href="<?=getPayWorkshop($item['code'])?>" class="btn btn-pink btn-xl" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Купить</a>
                <?php else: ?>
                    <a href="#callback-form--modal" rel="modal:open" class="btn btn-pink btn-xl">Записаться</a>
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

<div id="purpose">
    <div class="content">
        <span class="figure figure1-4"></span>
        <div class="block-title">Цель лекций</div>
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
<!--            <div class="text-center">
                <a href="#program" class="btn btn-pink btn-xl">Смотреть программу</a>
            </div>-->
        </div>
    </div>
</div>
<div id="program">
    <div class="content">
        <div class="block-title">Практическая часть</div>
        <div class="module-block module4">
            <div class="background"></div>
            <span class="figure figure2-6"></span>
            <div class="box">
                <div class="box-content">
                    <div class="buttons" id="lectures-slider-nav">
                        <?php foreach($lectures as $row): ?>
                        <button type="button" class="btn btn-pink btn-md btn-exo"><?= getStringNumber($row['month'])?> блок</button>   
                        <?php endforeach;?>
                    </div>
                    <div class="lectures-block" id="lectures-slider">
                        <?php foreach($lectures as $row): ?>
                            <div class="item">
                                <div class="img-wrap">
                                    <img src="<?=$row['img']?>" alt="" class="img">
                                </div>
                                <div class="list">
                                    <?php foreach($row['items'] as $lectureKey => $lectureRow):?>
                                        <div class="row">
                                            <div class="title">Лекция <?= makeLectureNumber($row['month'], $lectureKey)?>: <span><?=$lectureRow['title']?></span></div> 
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

<div id="courses" class="courses_main other">
    <div class="background"></div>
    <div class="content">
        <div class="block-title">Другие наши курсы</div>
        <div class="course_cards mobile" id="courses-slider">
            <?php foreach($courses as $row): ?>
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