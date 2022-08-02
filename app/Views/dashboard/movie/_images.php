<?php foreach($images as $i): ?>
    
    <img id="gfg" src="<?= base_url().'/uploads/movies/'.$i->movie_id.'/'.$i->movie_image ?>/" alt=""/>

<?php endforeach; ?>