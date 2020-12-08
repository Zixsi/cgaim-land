<div class="row mb-4">
    <div class="col-6">
        <h3>Курсы</h3>
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
                                <th>Название</th>
                                <th width="100">Сортировка</th>
                                <th width="70">Статус</th>
                                <th width="70" class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($items): ?>
                                <?php foreach($items as $item):?>
                                <tr>
                                    <td><?=$item['id']?></td>
                                    <td>
                                        <a href="./edit/<?= $item['id'] ?>"><?=$item['title']?></a>
                                    </td>
                                    <td><?=$item['sort']?></td>
                                    <td>
                                        <?php if((int) $item['published'] === 0): ?>
                                            <a href="./publish/<?= $item['id'] ?>/1" class="badge badge-danger">Неопубликован</a>
                                        <?php else: ?>
                                            <a href="./publish/<?= $item['id'] ?>/0" class="badge badge-success">Опубликован</a>
                                        <?php endif;?>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="dropdown">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right navbar-dropdown">
                                                <li class="dropdown-item">
                                                    <a href="/courses/<?= $item['code'] ?>/" target="_blank">Просмотр</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="./edit/<?= $item['id'] ?>">Редактировать</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="/admin/lecture/<?= $item['id'] ?>">Лекции</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="/admin/review/<?= $item['id'] ?>">Отзывы</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="/admin/works/<?= $item['id'] ?>">Работы</a>
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