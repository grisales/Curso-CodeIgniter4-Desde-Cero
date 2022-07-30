<?= $validation->listErrors() ?>

<form action="/dashboard/movie/update/<?= $movie->movie_id ?>" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" id="title"/><br />

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="45" rows="4"></textarea><br />

    <input type="submit" name="submit" value="Guardar" />
</form>