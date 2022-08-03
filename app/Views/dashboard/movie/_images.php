<div class="row">
    <?php foreach($images as $i): ?>
        <div class="col-4 mt-5">
            <a href="<?= route_to('image_delete',$i->image_id) ?>"  class="crud-images btn-sm btn-danger">
                <span aria-hidden="true">&times;</span>
            </a>
            <img class="img-fluid" src="<?= route_to('get_image',$i->movie_id, $i->movie_image) ?>/" alt=""/>
        </div>
    <?php endforeach; ?>
</div>