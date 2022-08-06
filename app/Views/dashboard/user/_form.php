
<?= csrf_field() ?>

<div class="form-group">
    <h4><label for="username">Usuario</label></h4>
    <input type="text" class="form-control" name="username" id="username" value="<?= old('title', $user->username) ?>" />
</div>
<div class="form-group">
    <h4><label for="email">E-Mail</label></h4>
    <input type="text" class="form-control" name="email" id="email" value="<?= old('title', $user->email) ?>" />
</div>
<div class="form-group">
    <h4><label for="password">Contraseña</label></h4>
    <input type="password" class="form-control" name="password" id="password" value="<?= old('title', $user->password) ?>" />
</div>

<button type="submit" class="btn btn-success btn-sm">
    <i class="fa-solid fa-floppy-disk"></i> <?= $textButton ?>
</button>