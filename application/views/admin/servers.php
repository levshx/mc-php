<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <a class="nav-link" href="/admin/addServer">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">Добавить сервер</span>
                </a>
                <div class="row">
                    
                        <?php if (empty($list)) : ?>
                            <p>Список серверов пуст</p>
                        <?php else : ?>
                            <table class="table">
                                <tr>
                                    <th>Название</th>
                                    <th>RCON</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/rcon/<?php echo $val['id']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-terminal"></i>RCON</a></td>
                                        <td><a href="/admin/editServer/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/deleteServer/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>                            
                        <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>