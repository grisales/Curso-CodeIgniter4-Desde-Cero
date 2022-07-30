
<div style="color:orange;"><?= view("dashboard/partials/_form-error"); ?></div>
<form action="create" method="post" enctype="multipart/form-data">
<?= view("dashboard/movie/_form",['movie' => $movie]); ?>
</form>