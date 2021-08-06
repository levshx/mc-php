<?php if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); } ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <form action="/admin/addServer" method="post">
                    <div class="form-group">
                        <label>Название сервера:</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Версия маинкампфа:</label>
                        <input class="form-control" type="text" name="version">
                    </div>
                    <div class="form-group">
                        <label>PVP:</label><br>
                        <input type="radio" id="on" name="pvp" value="1" checked>
                        <label for="on">Включено</label><br>
                        <input type="radio" id="off" name="pvp" value="0">
                        <label for="off">Выключено</label><br>
                    </div>
                    <div class="form-group">
                        <label>Дата вайпа:</label>
                        <input class="form-control" type="date" name="vipedate">
                    </div>
                    <div class="form-group">
                        <label>Размер мира:</label>
                        <input class="form-control" type="text" name="size">
                    </div>
                    <div class="form-group">
                        <label>Моды (через запятую `,` без пробелов):</label>
                        <textarea class="form-control" rows="3" name="mods"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Описание:</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>IP адрес сервера:</label>
                        <input class="form-control" type="text" name="host">
                    </div>
                    <div class="form-group">
                        <label>Порт сервера:</label>
                        <input class="form-control" type="text" name="port">
                    </div>
                    <div class="form-group">
                        <label>Порт для подключения RCON:</label>
                        <input class="form-control" type="text" name="rcon_port">
                    </div>
                    <div class="form-group">
                        <label>Пароль RCON:</label>
                        <input class="form-control" type="text" name="rcon_password">
                    </div>
                    <div class="form-group">
                        <label>Видимость сервера:</label><br>
                        <input type="radio" id="on" name="visibility" value="1" checked>
                        <label for="on">Включена</label><br>
                        <input type="radio" id="off" name="visibility" value="0">
                        <label for="off">Выключена</label><br>
                    </div>
                    <div class="form-group">
                        <label>Иконка сервера (.jpg):</label>
                        <input class="form-control" type="file" name="img" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>