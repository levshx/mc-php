<?php if (!defined("MCPROJECT")) {
    exit("Hacking Attempt!");
} ?>
<?php

use application\models\Main;

$model = new Main; 
$servers = $model->getServersInfo();
?>
<h5>Мониторинг серверов</h5>
<hr>
<?php foreach ($servers as $server) : ?>
    <img style="width: 100%;" src="https://mcapi.us/server/image?ip=<?=$server['host']?>&port=<?=$server['port']?>&title=<?=$server['name']?>" alt="альтернативный текст">
    <br>
<?php endforeach; ?>