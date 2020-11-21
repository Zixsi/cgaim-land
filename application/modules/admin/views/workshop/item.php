<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <form class="" method="post" id="form-user-params" enctype="multipart/form-data">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Общие</h3> 
                </div>
                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-6">
                            <input type="hidden" name="img_big" value="<?=($item['img_big'] ?? '')?>">
                            <img 
                                src="<?=(empty($item['img_big'])?IMG_DEFAULT_300_300:$item['img_big'])?>" 
                                width="" 
                                height="150" 
                                style="border: 1px solid #f6f2f2; width: auto;"
                            >
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="img_small" value="<?=($item['img_small'] ?? '')?>">
                            <img 
                                src="<?=(empty($item['img_small'])?IMG_DEFAULT_300_300:$item['img_small'])?>" 
                                width="" 
                                height="150" 
                                style="border: 1px solid #f6f2f2; width: auto;"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>
                                <span>Изображение большое <i class="req-field">*</i></span>
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Расширение png. Разрешение 630x805. Размер не более 1мб."
                                ></span>
                            </label>
                            <input type="file" name="img_big" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Загрузка файла">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Выбрать</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                <span>Изображение малое <i class="req-field">*</i></span>
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Расширение png. Разрешение 350x350. Размер не более 512кб."
                                ></span>
                            </label>
                            <input type="file" name="img_small" class="file-upload-default">
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
                            <label>Название <i class="req-field">*</i></label>
                            <input type="text" name="title" class="form-control" value="<?=($item['title'] ?? '')?>">
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Код <i class="req-field">*</i>
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Код курса из школы"
                                ></span>
                            </label>
                            <input type="text" name="code" class="form-control" value="<?=($item['code'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Дата начала <i class="req-field">*</i></label>
                            <input type="text" name="start_date" class="form-control datepiker" value="<?=($item['start_date'] ?? '')?>">
                            <label class="mt-2">
                                <span>Отсутствует дата начала</span>
                                <input type="hidden" name="start_date_disable" value="0">
                                <input 
                                    type="checkbox" 
                                    name="start_date_disable" 
                                    value="1" 
                                    <?=((int) ($item['start_date_disable'] ?? 0))?'checked="true"':''?>
                                >
                            </label>
                        </div>
                        <div class="form-group col-6">
                            <label>Преподаватель <i class="req-field">*</i></label>
                            <select name="instructor" class="form-control">
                                <option>-- Выбирете преподавателя--</option>
                                <?php foreach ($instructors as $row): ?>
                                    <option value="<?=$row['id']?>" <?=((int) ($item['instructor'] ?? 0) === (int) $row['id'])?'selected="true"':''?>><?=$row['name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Заметка
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Текст для плашки. Например: 1 класс или 2в1. Добавить символ # для разделения на строки"
                                ></span>
                            </label>
                            <input type="text" name="note" class="form-control" value="<?=($item['note'] ?? '')?>">
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Промо видео (ссылка)
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Ссылка на youtube"
                                ></span>
                            </label>
                            <input type="text" name="video" class="form-control" value="<?=($item['video'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>
                                Описание <i class="req-field">*</i>
                                <span 
                                    class="mdi mdi-information-outline tooltip-btn" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    data-original-title="Описание для шапки курса"
                                ></span>
                            </label>
                            <textarea name="description" class="form-control" rows="3"><?=($item['description'] ?? '')?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Цель курса <i class="req-field">*</i></label>
                            <textarea name="purpose" class="form-control" id="editor1" rows="10"><?= htmlspecialchars_decode($item['purpose'] ?? '')?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Стоимость</h3> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="packages[standart][available]" value="1">
                        <div class="form-group col-4">
                            <label>Cтоимость</label>
                            <input 
                                type="number" 
                                name="packages[standart][price]" 
                                class="form-control" 
                                value="<?=($item['packages']['standart']['price'] ?? 0)?>"
                                min="0"
                                step="0.01"
                            >
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Программа</h3> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="form-group col-12">
                                    <h4>Практическая часть</h4>
                                </div>
                                <div class="form-group col-12">
                                    <label>Программы</label>
                                    <input type="hidden" name="program[module_4_apps][]" value="">
                                    <select class="form-control select2-simple" name="program[module_4_apps][]" multiple="multiple">
                                        <?php foreach ($apps as $row): ?>
                                        <option 
                                            value="<?=$row['id']?>" 
                                            <?=(in_array($row['id'], ($item['program']['module_4_apps'] ?? []))?'selected="true"':'')?>
                                        ><?=$row['title']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
            </div>
        </form>
    </div>
</div>