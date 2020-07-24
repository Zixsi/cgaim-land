<?php
$urlSchool = $this->config->item('school_url');
?>
<?$this->load->view('inc_header.php');?>

<div id="first-block" class="compact" <?if(strpos($item['img_land_bg'], 'img_default') === false):?>style="background-image: url('<?= $item['img_land_bg'] ?>');"<?endif;?>>
    <?$meta_item_img = (strpos($meta_item_img, 'img_default') === false)?$item['img_land_bg']:($item['img'] ?? '');?>
    <img src="<?= $meta_item_img ?>" alt="<?= $item['name'] ?>" style="width: 1px; height: 1px; position: absolute; left: -99999px;">
    <div class="content">
        <?$this->load->view('inc_navpanel.php');?>
        <div class="info">
            <div class="info-text">
                <div class="title"><?= $item['name'] ?></div>
                <?if(empty($item['preview_text']) === false):?>
                    <div class="text"><?= $item['preview_text'] ?></div>
                <?endif;?>

                <?php if($item['type'] === 'webinar'):?>
                    <a href="<?= $schoolUrl ?>/external/pay/?code=<?= $item['code'] ?>&target=workshop" class="btn btn-pink" onclick="ym(51851432, 'reachGoal', 'Registration'); return true;">Купить</a>
                <?php else:?>
                    <a href="#price" class="btn btn-pink">Мне интересно</a>
                <?php endif;?>
            </div>

            <?if($item['type'] === 'collection' || $item['type'] === 'webinar'):?>
            <div class="info-text price">
                <?if((float) $item['price'] <= 0):?>
                <div class="title">FREE</div>
                <?else:?>
                <div class="title"><?= number_format($item['price'], 2, '.', ' ') ?><span> руб</span></div>
                <?endif;?>
            </div>
            <?endif;?>

        </div>
    </div>
</div>

<?$this->content()?>
<?$this->load->view('inc_footer.php');?>