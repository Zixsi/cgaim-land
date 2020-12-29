<div id="callback-form--modal" class="modal callback-modal">
    <form class="form" id="callback-form">
        <input type="hidden" name="title" value="<?= htmlspecialchars($item['title'] ?? '')?>">
        <div class="title">Нужен совет</div>
        <div class="alert alert-danger"></div>
        <div class="row">
            <div class="col-12">
                <label>Имя</label>
                <input type="text" name="name" value="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>Телефон</label>
                <input type="text" name="phone" value="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-pink btn-md">Отправить</button>
            </div>
        </div>
    </form>
</div>

<div id="callback-form-success--modal" class="modal callback-modal">
    <p>Спасибо! Ваша заявка принята.</p> 
    <p>Мы свяжемся с вами в ближайшее время.</p>
</div>