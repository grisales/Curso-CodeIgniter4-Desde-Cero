<div class="row">
    <?php foreach($images as $i): ?>
        <div class="col-4 mt-5">
            <img class="img-fluid" src="<?= route_to('get_image',$i->movie_id, $i->movie_image) ?>/" alt=""/>
        </div>
    <?php endforeach; ?>
</div>