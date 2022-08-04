<a href="movie/new" class="btn btn-success mb-4"><i class="fa-solid fa-plus"></i> Crear</a>

    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $key => $m): ?>
            <tr>
                <td><?= $m->movie_id?></td>
                <td>
                    <span><?= $m->movie_title?></span>
                </td>
                <td><?= $m->category_name?></td>
                <td>
                    
                    <form action="movie/delete/<?= $m->movie_id ?>" method="POST">
                        <!-- <input type="submit" class="btn btn-danger btn-sm mt-2" name="submit" value="Borrar" /> -->
                        <button data-toggle="tooltip" data-placement="top" title="Borrar" type="submit" class="btn btn-danger btn-sm m-2 float-right" value="Borrar">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    
                    <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-sm m-2 float-right" href="movie/edit/<?= $m->movie_id ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                    
                    <a data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-primary btn-sm m-2 float-right" href="movie/<?= $m->movie_id ?>"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

<?= $pager->links() ?>