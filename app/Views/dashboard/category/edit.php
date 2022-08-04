<?= view("dashboard/partials/_form-error"); ?>
<form action="/dashboard/category/update/<?= $category->category_id ?>" method="post" enctype="multipart/form-data">
    <?= view("dashboard/category/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>