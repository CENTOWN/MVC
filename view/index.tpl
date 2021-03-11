<?php session_start(); ?>
<div class="row">
    <div class="col m-0 p-2 bg-info">
        <h2 class="m-0 p-3 bg-info">Главная страница...</h2>
    </div>
</div>
<div class="row">
    <?php if(!isset($_SESSION['authorization'])){ ?>
    <div class="col m-auto p-5 bg-light">
        <form method="post" id="authorization">
            <h2>Авторизация</h2>
            <input type="email" name="email" class="form-control my-3" placeholder="E-mail:">
            <input type="password" name="password" class="form-control my-3" placeholder="Пароль:">
            <input type="submit" value="Войти" class="btn btn-primary w-100">
        </form>
    </div>
    <div class="col m-auto p-5 bg-light">
        <form method="post" id="registration">
            <h2>Регистрация</h2>
            <input type="email" name="email" class="form-control my-3" placeholder="E-mail:">
            <input type="password" name="password" class="form-control my-3" placeholder="Пароль:">
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
    </div>
    <?php } ?>
</div>