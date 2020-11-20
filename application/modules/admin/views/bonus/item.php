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
                                <span>Иконка <i class="req-field">*</i></span>
                                <span class="mdi mdi-information-outline" title="" style="font-size: 16px; cursor: pointer;"
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title=""></span>
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
                            <label>Описание <i class="req-field">*</i></label>
                            <textarea name="description" class="form-control" rows="5"><?=($item['description'] ?? '')?></textarea>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Стоимость <i class="req-field">*</i></label>
                            <input type="number" name="price" class="form-control" value="<?=($item['price'] ?? 0)?>" min="0" step="0.01">
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