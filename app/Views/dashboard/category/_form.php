
<?= csrf_field() ?>

<div class="form-group">
    <h4><label for="title">Title</label></h4>
    <input type="input" class="form-control" name="title" id="title" value="<?= old('title', $category->category_name) ?>" />
</div>

<button type="submit" class="btn btn-success btn-sm">
    <i class="fa-solid fa-floppy-disk"></i> <?= $textButton ?>
</button>