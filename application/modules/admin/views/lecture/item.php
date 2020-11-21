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
                                    data-original-title="Расширение png. Разрешение 450x450. Размер не более 512кб."
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
                        <div class="form-group col-6">
                            <label>Месяц <i class="req-field">*</i></label>
                            <select name="month" class="form-control">
                                <?php for($i = 1; $i <= 24; $i++):?>
                                    <option value="<?=$i?>" <?=($i === $item['month'])?'selected="true"':''?> ><?=$i?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <span>Лекции</span> 
                                <button 
                                    type="button" 
                                    class="btn btn-primary btn-sm" 
                                    id="add-lecture-row" 
                                    data-index="<?=count($item['items'])?>" 
                                    style="margin-left: 15px;"
                                >Добавить</button>
                            </h4>
                            <div id="lecture-row-container"> 
                                <?php foreach($item['items'] as $key => $row): ?>
                                    <div class="form-group row">
                                        <div class="col-5">
                                            <label>Заголовок лекции<i class="req-field">*</i></label>
                                            <input type="text" name="items[<?=$key?>][title]" class="form-control" value="<?=($row['title'] ?? '')?>">
                                        </div>
                                        <div class="col-6">
                                            <label>Описание лекции<i class="req-field">*</i></label>
                                            <textarea name="items[<?=$key?>][description]" class="form-control" rows="3"><?=($row['description'] ?? '')?></textarea>
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
        <div class="col-5">
            <label>Заголовок лекции<i class="req-field">*</i></label>
            <input type="text" name="items[{INDEX}][title]" class="form-control" value="">
        </div>
        <div class="col-6">
            <label>Описание лекции<i class="req-field">*</i></label>
            <textarea name="items[{INDEX}][description]" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-1">
            <label>Действие</label>
            <button type="button" class="btn btn-danger btn-sm delete-lecture-row">Удалить</button>
        </div>
    </div>
</script>