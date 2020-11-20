<div id="course_page">
    <div class="content">

        <div class="block-title-course">Курсы</div>

        <div class="course_cards">
            <?php foreach($items as $item): ?>
                <?php //debug($item);?>
                <div class="card">
                    <div class="card_head">
                        <div class="header">Начало обучения</div>
                        <div class="date">1 ноября</div>
                        <span class="badge">
                            <span class="badge_big_text">5</span>
                            <span class="badge_small_text">класс</span>
                        </span>
                    </div>
                    <div class="card_content">
                        <div class="img">
                            <img src="<?=$item['img_big']?>" alt="" class="img_big">
                            <img src="<?=$item['img_small']?>" alt="" class="img_small">
                        </div>
                        <div class="text_wrap">
                            <div class="title"><?=$item['title']?></div>
                            <div class="description"><?=$item['description']?></div>
                        </div>
                        <div class="info">
                            <div class="start">
                                <div class="header">Начало обучения</div>
                                <div class="date"><?=$item['start_date_formated']?></div>
                            </div>
                            <div class="instructor">
                                <img src="<?=TEMPLATE_DIR?>/land/images/instructor.png" alt="">
                                <div class="header">Автор курса</div>
                                <div class="fio">Александр Серебряков</div>
                            </div>
                        </div>
                    </div>
                    <div class="card_footer">
                        <a href="/courses/<?=$item['code']?>/" class="btn btn-pink btn-md">Подробнее</a>
                        <?php if($item['note']): ?>
                            <span class="badge">
                                <span class="badge_big_text"><?=$item['note'][0]?></span>
                                <?php if(empty($item['note'][1]) === false): ?>
                                    <span class="badge_small_text"><?=$item['note'][1]?></span>
                                <?php endif;?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        
    </div>
</div>