<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/movie/update/<?= $movie->movie_id ?>" method="post">
<?= view("dashboard/movie/_form",['movie' => $movie]); ?>
</form>