<?= csrf_field() ?>

<label for="title">Title</label>
<input type="input" name="title" id="title" value="<?= old('title', $movie->movie_title) ?>" /><br />

<label for="description">Description</label>
<textarea name="description" id="description" cols="45" rows="4"><?= old('description', $movie->movie_description) ?></textarea><br />

<input type="submit" name="submit" value="Guardar" />