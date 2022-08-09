<a href="category/new" class="btn btn-success mb-4"><i class="fa-solid fa-plus"></i> <?= lang('Form.create_button') ?></a>

    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Id</th>
                <th><?= lang('Form.category_label') ?></th>
                <th><?= lang('Form.options_label') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $key => $c): ?>
            <tr>
                <td><?= $c->category_id?></td>
                <td>
                    <span><?= $c->category_name?></span>
                </td>
                <td>
                    <form action="category/delete/<?= $c->category_id ?>" method="POST">
                        <!-- <input type="submit" class="btn btn-danger btn-sm mt-2" name="submit" value="Borrar" /> -->
                        <button data-toggle="tooltip" data-placement="top" title="<?= lang('Form.delete_tooltip') ?>" type="submit" class="btn btn-danger btn-sm m-2 float-right" value="Borrar">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    <a data-toggle="tooltip" data-placement="top" title="<?= lang('Form.edit_tooltip') ?>" class="btn btn-primary btn-sm m-2 float-right" href="category/edit/<?= $c->category_id ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

<?= $pager->links() ?>