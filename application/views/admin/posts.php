<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <a class="nav-link" href="/admin/addPost">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">Добавить пост</span>
                </a>
                <div class="row">
                    <?php if (empty($list)) : ?>
                        <p>Список постов пуст</p>
                    <?php else : ?>
                        <table class="table">
                            <tr>
                                <th>Название</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($list as $val) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></td>
                                    <td><a href="/admin/editPost/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                    <td><a href="/admin/deletePost/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $pagination; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>