
<?= csrf_field() ?>

<div class="form-group">
    <h4><label for="title">Title</label></h4>
    <input type="input" class="form-control" name="title" id="title" value="<?= old('title', $movie->movie_title) ?>" />
</div>

<div class="form-group">
    <h4><label for="description">Description</label></h4>
    <textarea class="form-control" name="description" id="description" cols="45"><?= old('description', $movie->movie_description) ?></textarea>
</div>

<?php if(!$created): ?>
    <div class="form-group">
        <h4><label for="image">Imagen </label></h4>
        <input class="form-control" type="file" name="image" />
    </div>
    <?php endif ?>
    
<div class="form-group">
    <h4><label for="category_id">Categoría</label></h4>
    <select class="form-control" name="category_id" id="category_id">
        <?php foreach ($categories as $c): ?>
            <option <?= $movie->category_id !== $c->category_id ?: " selected" ?> value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
        <?php endforeach?>
    </select>
</div>


<button type="submit" class="btn btn-success btn-sm">
    <i class="fa-solid fa-floppy-disk"></i> <?= $textButton ?>
</button>