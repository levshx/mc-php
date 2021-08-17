<?php if (!defined("MCPROJECT")) {
    exit("Hacking Attempt!");
} ?>
<div class="head-block">
    <div class="row">
        <div class="col-lg-4">
            <?php require_once('profile.3d.view.php'); ?>
        </div>
        <div class="col-lg-8">
            <h2>Профиль</h2>
            <div class="account_info_item">
                <div class="account_info_item_title">Логин</div>
                <div class="account_info_item_content">
                    <div class="account_info_span"><?= $user['login'] ?></div>
                </div>
            </div>
            <div class="account_info_item">
                <div class="account_info_item_title">Email</div>
                <div class="account_info_item_content">
                    <div class="account_info_span"><?= $user['email'] ?></div>
                </div>
            </div>
            <div class="account_info_item">
                <div class="account_info_item_title">Регистрация</div>
                <div class="account_info_item_content">
                    <div class="account_info_span"><?= $user['regdate'] ?></div>
                </div>
            </div>
            <div class="account_info_item">
                <div class="account_info_item_title">Монеты</div>
                <div class="account_info_item_content">
                    <div class="account_info_span"><?= $user['vmoney'] ?> </div>
                </div>
            </div>
            <div class="account_info_item">
                <div class="account_info_item_title">Деньги</div>
                <div class="account_info_item_content">
                    <div class="account_info_span"><?= $user['money'] ?> р.
                    <a href="/profile" class="btn btn-outline-warning p-1">Пополнить</a>
                    </div>
                </div>
            </div>

            <a href="<?= $skinUrl ?>">Skin</a>
            <a href="<?= $cloakUrl ?>">Cloak</a>
        </div>
    </div>
</div>