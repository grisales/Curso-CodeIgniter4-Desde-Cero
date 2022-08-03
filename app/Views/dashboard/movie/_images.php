<?php foreach($images as $i): ?>
    
    <img height="150px" src="<?= route_to('get_image',$i->movie_id, $i->movie_image) ?>/" alt=""/>

<?php endforeach; ?>