
<?= csrf_field() ?>

<div class="form-group">
    <label for="title">Title</label>
    <input type="input" class="form-control" name="title" id="title" value="<?= old('title', $movie->movie_title) ?>" />
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" cols="45" rows="4"><?= old('description', $movie->movie_description) ?></textarea>
</div>

<?php if(!$created): ?>
    <div class="form-group">
        <label for="image">Imagen </label>
        <input class="form-control" type="file" name="image" />
    </div>
    <?php endif ?>
    
<div class="form-group">
    <label for="category_id">Categoría</label>
    <select class="form-control" name="category_id" id="category_id">
        <?php foreach ($categories as $c): ?>
            <option <?= $movie->category_id !== $c->category_id ?: " selected" ?> value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
        <?php endforeach?>
    </select>
</div>

<input type="submit" class="btn btn-primary btn-sm" name="submit" value="<?= $textButton ?>" />