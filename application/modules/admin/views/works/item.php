<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-body">
                <form class="" method="post" id="form-user-params" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Название <i class="req-field">*</i></label>
                            <input type="text" name="title" class="form-control" value="<?=($item['title'] ?? '')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Тип <i class="req-field">*</i></label>
                            <select name="type" class="form-control" id="block-type-trigger">
                                <option value="IMG" <?=($item['type'] === 'IMG')?'selected="true"':''?>>Изображение</option>
                                <option value="VIDEO" <?=($item['type'] === 'VIDEO')?'selected="true"':''?>>Видео</option>
                            </select>
                        </div>
                        <div class="form-group col-12 block-type-variant <?=($item['type'] !== 'IMG')?'d-none':''?>" id="type_IMG">
                            <div class="row pb-4">
                                <div class="col-12">
                                    <input type="hidden" name="img" value="<?=($item['source'] ?? '')?>">
                                    <img 
                                        src="<?=((empty($item['source']) || strpos($item['source'], '/uploads/') === false)?IMG_DEFAULT_300_300:$item['source'])?>" 
                                        width="" 
                                        height="100" 
                                        style="border: 1px solid #f6f2f2; width: auto;"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>
                                        <span>Изображение <i class="req-field">*</i></span>
                                        <span class="mdi mdi-information-outline" title="" style="font-size: 16px; cursor: pointer;"
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-original-title="Расширение jpg, jpeg. Разрешение 1052x2160. Размер не более 1мб."
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
                        </div>
                        <div class="form-group col-12 block-type-variant <?=($item['type'] !== 'VIDEO')?'d-none':''?>" id="type_VIDEO">
                            <label>Видео <i class="req-field">*</i></label>
                            <input type="text" name="source" class="form-control" value="<?=($item['source'] ?? '')?>">
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