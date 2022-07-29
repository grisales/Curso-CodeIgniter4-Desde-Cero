<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($movies as $key => $m): ?>
        <tr>
            <td><?= $m->movie_id?></td>
            <td><?= $m->movie_title?></td>
            <td>
                <form action="movie/delete/<?= $m->movie_id ?>" method="POST">
                    <input type="submit" name="submit" value="Borrar" />
                </form>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?= $pager->links() ?>