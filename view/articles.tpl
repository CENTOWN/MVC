<div class="row">
    <div class="col m-0 p-2 bg-info">
        <h2 class="col m-0 p-3 bg-info">Страница списка статей...</h2>
    </div>
</div>
<div class="row">
    <div class="col m-0 p-2 bg-light">
        <?php foreach($data as $value){ ?>
        <h3>
            <?=$value['title'];?>
        </h3>
        <p>
            <?=$value['content'];?>
        </p>
        <?php } ?>
    </div>
</div>