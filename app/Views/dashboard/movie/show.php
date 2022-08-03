<div class="row">
    <div class="col">
        <div class="card">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach($images as $index => $i): ?>
                        <li data-target="#carouselExampleControls" data-slide-to="<?= $index ?>" class="<?= $index !==0 ?: "active" ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">

                    <?php foreach($images as $index => $i): ?>
                        <div class="carousel-item <?= $index !==0 ?: "active" ?>">
                            <img src="<?= route_to('get_image',$i->movie_id, $i->movie_image) ?>/" class="d-block w-100 " alt="...">
                        </div>
                    <?php endforeach; ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- <img class="card-img-top" src="<?= route_to('get_image',$images[0]->movie_id, $images[0]->movie_image) ?>/" alt=""/> -->
            <div class="card-body">
                <p class="card-text"><?= $movie->movie_description ?></p>
            </div>
        </div>
    </div>
    <!-- <div class="col">
      Blank area (⌐■_■)
    </div>
    <div class="col">
      Blank area (⌐■_■)
    </div> -->
  </div>