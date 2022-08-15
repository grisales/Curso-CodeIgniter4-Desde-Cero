    <div class="row row-cols-1 row-cols-md-3">
        <?php foreach ($movies as $key => $m): ?>
            <div class="col mb-4">
             <div class="card h-100">
              <img src="<?php echo !$m->image ? "https://dummyimage.com/600x400/4290de/fff.png&text=Peli+".$m->movie_id : route_to('get_image',$m->movie_id, $m->image) ?>" class="card-img-top img-fluid" style="height: 232px;" alt="...">
              <div class="card-body">
                  <h5 class="card-title"><?= $m->movie_title?></h5>
                  <p class="card-text"><?= character_limiter($m->movie_description,60)?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-danger" style="color:#fff;font-weight: 600;">Género</li>
                    <li class="list-group-item" style="color:#dc3545;font-weight: 600;"><?= $m->category_name?></li>
                </ul>
                <div class="card-body">
                    <a href="<?= route_to('store_movie_show',$m->movie_id)?>" class="btn btn-info btn-sm float-right"> <i class="fa fa-eye"></i> Ver</a>
                    <!-- <a href="#" class="btn btn-primary btn-sm float-right">Otro Link</a> -->
              </div>
             </div>
            </div>
        <?php endforeach?>
    </div>
<!--  -->
<?= $pager->links() ?>