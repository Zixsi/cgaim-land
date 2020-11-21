<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-body">
                <form class="" method="post" id="form-user-params">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Активен?</label>
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" <?=((int) ($item['active'] ?? 0))?'checked="true"':''?> value="1">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label>Вопрос <i class="req-field">*</i></label>
                            <input type="text" name="title" class="form-control" value="<?=($item['title'] ?? '')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Ответ <i class="req-field">*</i></label>
                            <textarea name="description" class="form-control" id="editor1" rows="5"><?=($item['description'] ?? '')?></textarea>
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