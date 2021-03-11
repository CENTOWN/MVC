<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title></title>
    <link href="../web/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body class="container-fluid">
    <header class="container text-center">
        <?php if(isset($_SESSION['authorization'])) { ?>
        <div class="row">
            <div class="col m-0 p-2 text-right font-weight-bold text-white bg-secondary">
                <p class="my-3">
                    <span>Вы авторизовались как:
                        <?=$_SESSION['email'];?>
                    </span>
                    <button type="button" id="logout" class="btn btn-light mx-3 px-3">Выйти</button>
                </p>
            </div>
        </div>
        <?php } ?>
    </header>
    <div class="container text-center">