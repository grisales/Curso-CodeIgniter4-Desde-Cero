
<?= csrf_field() ?>

<div class="form-group">
    <h4><label for="username">Usuario</label></h4>
    <input <?= !$created ? "readonly" : "" ?> class="form-control" type="text"name="username" id="username" value="<?= old('title', $user->username) ?>" />
</div>
<div class="form-group">
    <h4><label for="email">E-Mail</label></h4>
    <input <?= !$created ? "readonly" : "" ?> class="form-control" type="text"name="email" id="email" value="<?= old('title', $user->email) ?>" />
</div>
<div class="form-group">
    <h4><label for="password">Contraseña</label></h4>
    <input class="form-control" type="password" name="password" id="password" value="" placeholder="•••" />
</div>

<button type="submit" class="btn btn-success btn-sm">
    <i class="fa-solid fa-floppy-disk"></i> <?= $textButton ?>
</button>