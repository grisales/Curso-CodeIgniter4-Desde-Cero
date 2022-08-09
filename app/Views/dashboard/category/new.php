<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="post" enctype="multipart/form-data">
    <?= view("dashboard/category/_form",['textButton' => lang('Form.save_button'),'created' => true]); ?>
</form>