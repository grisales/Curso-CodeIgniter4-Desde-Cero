<?= csrf_field() ?>

<label for="title">Title</label>
<input type="input" name="title" id="title" value="<?= old('title', $movie->movie_title) ?>" /><br />

<label for="description">Description</label>
<textarea name="description" id="description" cols="45" rows="4"><?= old('description', $movie->movie_description) ?></textarea><br />

<?php if(!$created): ?>
<label for="image">Image</label>
<input type="file" name="image" />
<?php endif ?>


<input type="submit" name="submit" value="<?= $textButton ?>" />