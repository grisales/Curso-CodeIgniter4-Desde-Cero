<a href="movie/new">Crear</a>

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
            <td><?= $m->movie_title?></td>
            <td><?= $m->category_name?></td>
            <td>
                <form action="movie/delete/<?= $m->movie_id ?>" method="POST">
                    <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Borrar" />
                </form>

                <a class="mt-2 btn btn-primary btn-sm" href="movie/edit/<?= $m->movie_id ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?= $pager->links() ?>