<?php if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); } ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <form action="/admin/editPost/<?php echo $data['id']; ?>" method="post">
                    <div class="form-group">
                        <label>Логин:</label>
                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['login'], ENT_QUOTES); ?>" name="login">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label>Деньги:</label>
                        <input class="form-control" type="text" pattern="\d+(\.\d{2})?" value="<?php echo htmlspecialchars($data['money'], ENT_QUOTES); ?>" name="money">
                    </div>
                    <div class="form-group">
                        <label>Виртуальные деньги:</label>
                        <input class="form-control" type="text" pattern="\d+(\.\d{2})?" value="<?php echo htmlspecialchars($data['vmoney'], ENT_QUOTES); ?>" name="vmoney">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>