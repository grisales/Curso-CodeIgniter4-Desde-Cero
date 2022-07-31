<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/movie/update/<?= $movie->movie_id ?>" method="post" enctype="multipart/form-data">
<?= view("dashboard/movie/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>