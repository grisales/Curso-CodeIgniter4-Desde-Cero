<?= csrf_field() ?>

<label for="title">Title</label><br />
<input type="input" name="title" id="title" value="<?= old('title', $movie->movie_title) ?>" /><br />

<br /><label for="description">Description</label><br />
<textarea name="description" id="description" cols="45" rows="4"><?= old('description', $movie->movie_description) ?></textarea><br />

<?php if(!$created): ?>
<br /><label for="image">Imagen </label>
<input type="file" name="image" />
<?php endif ?>

<br /><br /><label for="category_id">Categoría</label><br />
<select name="category_id" id="category_id">
<?php foreach ($categories as $c): ?>
    <option <?= $movie->category_id !== $c->category_id ?: " selected" ?> value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
<?php endforeach?>
</select>
<br /><br />
<input type="submit" name="submit" value="<?= $textButton ?>" />