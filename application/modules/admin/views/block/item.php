<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-body">
                <form class="" method="post" id="form-user-params" enctype="multipart/form-data">
                    <div class="row pb-4">
                        <div class="col-12">
                            <input type="hidden" name="img" value="<?=($item['img'] ?? '')?>">
                            <img 
                                src="<?=(empty($item['img'])?IMG_DEFAULT_300_300:$item['img'])?>" 
                                width="" 
                                height="100" 
                                style="border: 1px solid #f6f2f2; width: auto;"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>
                                <span>Изображение <i class="req-field">*</i></span>
                                <span class="mdi mdi-information-outline" title="" style="font-size: 16px; cursor: pointer;"
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Расширение png. Разрешение 350x350. Размер не более 300кб."
                                ></span>
                            </label>
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Загрузка файла">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Выбрать</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Название <i class="req-field">*</i></label>
                            <input type="text" name="title" class="form-control" value="<?=($item['title'] ?? '')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Тип <i class="req-field">*</i></label>
                            <select name="type" class="form-control" id="block-type-trigger">
                                <option value="TEXT" <?=($item['type'] === 'TEXT')?'selected="true"':''?>>Текст</option>
                                <option value="LIST" <?=($item['type'] === 'LIST')?'selected="true"':''?>>Список</option>
                            </select>
                        </div>
                        <div class="form-group col-12 block-type-variant <?=($item['type'] !== 'TEXT')?'d-none':''?>" id="type_TEXT">
                            <label>Текст</label>
                            <textarea name="data[text]" class="form-control" id="editor1" rows="5"><?=($item['data']['text'] ?? '')?></textarea>
                        </div>
                        <div class="form-group col-12 block-type-variant <?=($item['type'] !== 'LIST')?'d-none':''?>" id="type_LIST">
                            <label>Список</label>
                            <button 
                                type="button" 
                                class="btn btn-primary btn-sm" 
                                id="add-lecture-row" 
                                data-index="<?=count($item['data']['list'])?>" 
                                style="margin-left: 15px;"
                            >Добавить</button>
                            <div id="lecture-row-container">
                                <?php if(count($item['data']['list']) === 0): ?>
                                    <div class="form-group row">
                                        <div class="col-11">
                                            <label>Строка<i class="req-field">*</i></label>
                                            <input type="text" name="data[list][]" class="form-control" value="<?=($row ?? '')?>">
                                        </div>
                                        <div class="col-1">
                                            <label>Действие</label>
                                            <button type="button" class="btn btn-danger btn-sm delete-lecture-row">Удалить</button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php foreach($item['data']['list'] as $key => $row): ?>
                                    <div class="form-group row">
                                        <div class="col-11">
                                            <label>Строка<i class="req-field">*</i></label>
                                            <input type="text" name="data[list][]" class="form-control" value="<?=($row ?? '')?>">
                                        </div>
                                        <div class="col-1">
                                            <label>Действие</label>
                                            <button type="button" class="btn btn-danger btn-sm delete-lecture-row">Удалить</button>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="tmpl-lecture-row">
    <div class="form-group row">
        <div class="col-11">
            <label>Строка<i class="req-field">*</i></label>
            <input type="text" name="data[list][]" class="form-control" value="">
        </div>
        <div class="col-1">
            <label>Действие</label>
            <button type="button" class="btn btn-danger btn-sm delete-lecture-row">Удалить</button>
        </div>
    </div>
</script>