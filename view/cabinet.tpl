<?php 
session_start();
?>
<div class="row">
    <div class="col m-0 p-2 bg-info">
        <h2 class="col m-0 p-3 bg-info">Личный кабинет...</h2>
    </div>
</div>
<?php if(!isset($_SESSION['authorization'])) { ?>
<div class="row">
    <div class="col m-auto p-4 w-100 font-weight-bold text-white bg-danger">
        <h2>Требуется авторизация</h2>
    </div>
</div>
<?php } ?>