<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="post" enctype="multipart/form-data">
    <?= view("dashboard/user/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>