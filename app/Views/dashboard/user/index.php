<a href="user/new" class="btn btn-success mb-4"><i class="fa-solid fa-plus"></i> Crear</a>

    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Id</th>
                <th>E-Mail</th>
                <th>Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $u): ?>
            <tr>
                <td><?= $u->user_id?></td>
                <td>
                    <span><?= $u->email?></span>
                </td>
                <td>
                    <span><?= $u->username?></span>
                </td>
                <td>
                    <form action="user/delete/<?= $u->user_id ?>" method="POST">
                        <button data-toggle="tooltip" data-placement="top" title="Borrar" type="submit" class="btn btn-danger btn-sm m-2 float-right" value="Borrar">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-sm m-2 float-right" href="user/edit/<?= $u->user_id ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

<?= $pager->links() ?>