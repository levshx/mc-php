<?php if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); } ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
            <form action="/admin/editServer/<?php echo $data['id']; ?>" method="post">
                    <div class="form-group">
                        <label>Название сервера:</label>
                        <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Версия маинкампфа:</label>
                        <input class="form-control" type="text" name="version" value="<?php echo htmlspecialchars($data['version'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>PVP:</label><br>
                        <input type="radio" id="onPVP" name="pvp" value="1" <?php if ($data['pvp']=="1") {echo "checked";} ?>>
                        <label for="onPVP">Включено</label><br>
                        <input type="radio" id="offPVP" name="pvp" value="0" <?php if ($data['pvp']=="0") {echo "checked";} ?>>
                        <label for="offPVP">Выключено</label><br>
                    </div>
                    <div class="form-group">
                        <label>Дата вайпа:</label>
                        <input class="form-control" type="date" name="vipedate" value="<?php echo htmlspecialchars($data['vipedate'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Размер мира:</label>
                        <input class="form-control" type="text" name="size" value="<?php echo htmlspecialchars($data['size'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Моды (через запятую `,` без пробелов):</label>
                        <textarea class="form-control" rows="3" name="mods"><?php echo htmlspecialchars($data['mods'], ENT_QUOTES); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Описание:</label>
                        <textarea class="form-control" rows="3" name="description"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>IP адрес сервера:</label>
                        <input class="form-control" type="text" name="host" value="<?php echo htmlspecialchars($data['host'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Порт сервера:</label>
                        <input class="form-control" type="text" name="port" value="<?php echo htmlspecialchars($data['port'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Порт для подключения RCON:</label>
                        <input class="form-control" type="text" name="rcon_port" value="<?php echo htmlspecialchars($data['rcon_port'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Пароль RCON:</label>
                        <input class="form-control" type="text" name="rcon_password" value="<?php echo htmlspecialchars($data['rcon_password'], ENT_QUOTES); ?>">
                    </div>
                    <div class="form-group">
                        <label>Видимость сервера:</label><br>
                        <input type="radio" id="onVisibility" name="visibility" value="1" <?php if ($data['visibility']=="1") {echo "checked";} ?>>
                        <label for="onVisibility">Включена</label><br>
                        <input type="radio" id="offVisibility" name="visibility" value="0" <?php if ($data['visibility']=="0") {echo "checked";} ?>>
                        <label for="offVisibility">Выключена</label><br>
                    </div>
                    <div class="form-group">
                        <label>Заменить иконку сервера (.jpg):</label>
                        <input class="form-control" type="file" name="img" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                </form>               
            </div>
        </div>
    </div>
</div>