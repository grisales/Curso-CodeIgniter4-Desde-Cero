<?php if (! empty($errors)) : ?>
	<div class="errors" role="alert">
		<ul style="list-style-type: none; padding: 0; margin: 0;">
		<?php foreach ($errors as $error) : ?>
			<li>
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <?= esc($error) ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
