<?php if (!defined("MCPROJECT")) {
    exit("Hacking Attempt!");
} ?>
<?php

use application\models\User;

$model = new User; ?>
<?php if (isset($_SESSION['admin'])) : ?>
    <hr>
    <a href="/admin/" class="btn btn-danger btn-block">Панель админа</a>
    <hr>
<?php endif; ?>
<?php if (isset($_SESSION['authorize']['id'])) : ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="mc-face-viewer-8x" style="background-image:url('<?= $model->skinUrl($_SESSION['authorize']['id']) ?>')"></div>
        </div>
        <div class="col-lg-9">
            <ul class="info" style="padding-left: 1px;font-size: 16px;">
                <li>
                    <i class="fa fa-user"></i>
                    <b>Логин:</b>
                    <?= $model->getUserById($_SESSION['authorize']['id'])['login'] ?>
                </li>
                <li>
                    <i class="fa fa-money"></i>
                    <b>Баланс:</b>
                    <?= $model->getUserById($_SESSION['authorize']['id'])['money'] ?> р.
                </li>
                <li>
                    <i class="fa fa-btc"></i>
                    <b>Баланс:</b>
                    <?= $model->getUserById($_SESSION['authorize']['id'])['vmoney'] ?> р.
                </li>

            </ul>
        </div>
    </div>
    <a href="/pay" class="btn btn-outline-warning btn-block">Пополнить счёт</a>

    <a href="/profile" class="btn btn-success btn-block">Профиль</a>



    <form action="/logout" class="mt-2" method="post">
        <div class="form-group">
            <div class="input-group">
                <input type="submit" class="btn btn-danger btn-block" name="submit" value="Выход">
            </div>
        </div>
    </form>
<?php elseif (!isset($_SESSION['authorize']['id'])) : ?>
    <h3 style="text-align: center;">ВХОД</h3>
    <hr>
    <form method="post" action="/login"><input type="hidden" name="mcr_secure" value="1627992114_a0455fd523cab926ec61fcaca3ceb316">
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="login" class="form-control" placeholder="Логин или E-Mail">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Пароль">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="btn btn-danger btn-block" name="submit" value="Вход">
                <a href="/reg" class="btn btn-secondary btn-block">Регистрация</a>
            </div>
        </div>
    </form>
<?php endif; ?>