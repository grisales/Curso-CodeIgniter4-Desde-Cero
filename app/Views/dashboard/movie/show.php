<div class="card">
    <img class="card-img-top" src="<?= route_to('get_image',$images[0]->movie_id, $images[0]->movie_image) ?>/" alt=""/>
    <div class="card-body">
        <p class="card-text"><?= $movie->movie_description ?></p>
    </div>
</div>