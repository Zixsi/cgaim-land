<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-body">
                <form class="" method="post" id="form-user-params" enctype="multipart/form-data">
                    <div class="row pb-4">
                        <div class="col-6">
                            <input type="hidden" name="photo_big" value="<?=($item['photo_big'] ?? '')?>">
                            <img 
                                src="<?=(empty($item['photo_big'])?IMG_DEFAULT_300_300:$item['photo_big'])?>" 
                                width="" 
                                height="100" 
                                style="border: 1px solid #f6f2f2; width: auto;"
                            >
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="photo_small" value="<?=($item['photo_small'] ?? '')?>">
                            <img 
                                src="<?=(empty($item['photo_small'])?IMG_DEFAULT_300_300:$item['photo_small'])?>" 
                                width="" 
                                height="100" 
                                style="border: 1px solid #f6f2f2; width: auto;"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>
                                <span>Фото большое</span>
                                <span class="mdi mdi-information-outline" title="" style="font-size: 16px; cursor: pointer;"
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Расширение png. Разрешение 425x615. Размер не более 1мб."
                                ></span>
                            </label>
                            <input type="file" name="photo_big" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Загрузка файла">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Выбрать</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                <span>Фото малое</span>
                                <span class="mdi mdi-information-outline" title="" style="font-size: 16px; cursor: pointer;"
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Расширение png, jpg, jpeg. Разрешение 128x128. Размер не более 256кб."
                                ></span>
                            </label>
                            <input type="file" name="photo_small" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Загрузка файла">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Выбрать</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Фамилия</label>
                            <input type="text" name="last_name" class="form-control" value="<?=($item['last_name'] ?? '')?>">
                        </div>
                        <div class="form-group col-6">
                            <label>Имя</label>
                            <input type="text" name="first_name" class="form-control" value="<?=($item['first_name'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Ссылка на деморил</label>
                            <input type="text" name="video_link" class="form-control" value="<?=($item['video_link'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Цитата</label>
                            <textarea name="quote" class="form-control" rows="5"><?=($item['quote'] ?? '')?></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                    <?php for($i = 0; $i < 6; $i++): ?>
                        <div class="form-group col-6">
                            <label>Блок <?=($i + 1)?></label>
                            <textarea name="blocks[<?=$i?>]" class="form-control"><?=($item['blocks'][$i] ?? '')?></textarea>
                        </div>
                    <?php endfor;?>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>