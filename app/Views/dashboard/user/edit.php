<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/user/update/<?= $user->user_id ?>" method="post" enctype="multipart/form-data">
    <?= view("dashboard/user/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>