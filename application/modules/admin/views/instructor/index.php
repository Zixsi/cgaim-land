<div class="row mb-4">
    <div class="col-6">
        <h3>Преподаватели</h3>
    </div>
    <div class="col-6 text-right">
        <a href="./add/" class="btn btn-primary">Добавить</a>
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
                                <th width="70">Id</th>
                                <th>Имя</th>
                                <th width="70" class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($items): ?>
                                <?php foreach($items as $item):?>
                                <tr>
                                    <td><?=$item['id']?></td>
                                    <td>
                                        <a href="./edit/<?= $item['id'] ?>"><?=$item['name']?></a>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="dropdown">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right navbar-dropdown">
                                                <li class="dropdown-item">
                                                    <a href="./edit/<?= $item['id'] ?>">Редактировать</a>
                                                </li>
<!--                                                <li class="dropdown-item">
                                                    <a href="./delete/<?= $item['id'] ?>" class="delete-item-btn">Удалить</a>
                                                </li>-->
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