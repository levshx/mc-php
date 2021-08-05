<?php


require('application/lib/Rcon.php');

use Minecraft\Rcon;


$host = '95.216.48.177'; 
$port = 9285;                    
$password = 'FRMUqpKeKZMCXllJIg85wfTnY1i6cRlLukfmnnQK';
$timeout = 3;     



$rcon = new Rcon($host, $port, $password, $timeout);

?>

<div class="head-block">
    <?php
        if ($rcon->connect())
        {
            echo 'Ркон коннектед<br>';
          echo $rcon->sendCommand("say СОси шлюха!");
        }
    ?>
    <p>Здесь могло быть больше текста, но мне лень писать :)</p>
</div>
