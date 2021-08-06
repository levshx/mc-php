<?php if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); } ?>
<div class="head-block">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <h2>Регистрация</h2>
            <hr>
            <form method="post" action="/reg">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="login" class="form-control" placeholder="Логин (Никнейм)">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email адресс">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password2" class="form-control" placeholder="Повторите пароль">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a>Скоро тут будет каптча</a>
                        <hr>
                        <input type="submit" class="btn btn-danger btn-block" name="submit" value="Зарегестрировать">                
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>