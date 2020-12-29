<div class="row">
    <div class="col-12">
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-body">
                <form class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Курс</label>
                            <input type="text" class="form-control" readonly="true" disabled="true" value="<?=($item['title'] ?? '---')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Имя</label>
                            <input type="text" class="form-control" readonly="true" disabled="true" value="<?=($item['name'] ?? '')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Телефон</label>
                            <input type="text" class="form-control" readonly="true" disabled="true" value="<?=($item['phone'] ?? '')?>">
                        </div>
                        <div class="form-group col-12">
                            <label>Текст</label>
                            <textarea name="comment" class="form-control" rows="5"><?= htmlspecialchars($item['comment'] ?? '')?></textarea>
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