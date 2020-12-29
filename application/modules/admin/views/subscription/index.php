<div class="row mb-4">
    <div class="col-6">
        <h3>Подписки</h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="160">Дата</th>
                                <th width="70">Имя</th>
                                <th width="70">Телефон</th>
                                <th>Курс</th>
                                <th>Комментарий</th>
                                <th width="70" class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($items): ?>
                                <?php foreach($items as $item):?>
                                <tr>
                                    <td><?= htmlspecialchars($item['date'])?></td>
                                    <td><?= htmlspecialchars($item['name'])?></td>
                                    <td><?= htmlspecialchars($item['phone'])?></td>
                                    <td><?= htmlspecialchars(($item['title'] ?? '---'))?></td>
                                    <td><?= htmlspecialchars(($item['comment'] ?? '---'))?></td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="dropdown">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right navbar-dropdown">
                                                <li class="dropdown-item">
                                                    <a href="./edit/<?= $item['id'] ?>">Редактировать</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>