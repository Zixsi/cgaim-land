<div id="callback-form--modal" class="modal callback-modal">
    <form class="form" id="callback-form">
        <input type="hidden" name="title" value="<?= htmlspecialchars($item['title'] ?? '')?>">
        <input type="hidden" name="main" value="1">
        <div class="title">Записаться на курс</div>
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
            <div class="col-12 text-center">
                <a href="" id="callback-form-link" style="display: inline-block; color: #fff; font-size: 1.4rem;">Оплатить без заявки</a>
            </div>
        </div>
    </form>
</div>

<div id="callback-form-success--modal" class="modal callback-modal">
    <p>Спасибо! Ваша заявка принята.</p> 
    <p>Мы свяжемся с вами в ближайшее время.</p>
</div>