<?= $validation->listErrors() ?>

<form action="create" method="post">

<?= view("dashboard/movie/_form",['movie' => $movie]); ?>

</form>