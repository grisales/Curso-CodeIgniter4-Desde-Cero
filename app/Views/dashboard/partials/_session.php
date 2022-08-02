<?php if (session('message')): ?>
    <div class="alert alert-success mt-2 mb-2 alert-dismissible fade show" role="alert">
        <?= session('message') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>