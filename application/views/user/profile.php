<div class="head-block">
    <div class="row">
        <div class="col-lg-4">
            <?= require_once('profile.3d.view.php') ?>
        </div>
        <div class="col-lg-8">
            <h1>LOGIN <?= $user['login'] ?></h1>
            <h1>EMAIL <?= $user['email'] ?></h1>
            <h1>VMONEY <?= $user['vmoney'] ?></h1>
            <h1>MONEY <?= $user['money'] ?></h1>
            <a href="<?= $skinUrl ?>">Skin</a>
            <a href="<?= $cloakUrl ?>">Cloak</a>
        </div>
    </div>
</div>