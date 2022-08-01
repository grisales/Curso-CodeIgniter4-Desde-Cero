<a href="movie/new">Crear</a>

<table class="table" style="padding: 3px;border: 2px solid #D3D3D3;background-color:#f8f8f8;">
    <thead>
        <tr>
            <th style="padding: 10px;border: 1px solid #D3D3D3;">Id</th>
            <th style="padding: 10px;border: 1px solid #D3D3D3;">Nombre</th>
            <th style="padding: 10px;border: 1px solid #D3D3D3;">Categoría</th>
            <th style="padding: 10px;border: 1px solid #D3D3D3;">Opciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($movies as $key => $m): ?>
        <tr>
            <td style="padding: 10px;border: 1px solid #D3D3D3;"><?= $m->movie_id?></td>
            <td style="padding: 10px;border: 1px solid #D3D3D3;"><?= $m->movie_title?></td>
            <td style="padding: 10px;border: 1px solid #D3D3D3;"><?= $m->category_name?></td>
            <td style="padding: 10px;border: 1px solid #D3D3D3;">
                <form action="movie/delete/<?= $m->movie_id ?>" method="POST">
                    <input type="submit" name="submit" value="Borrar" />
                </form>

                <a href="movie/edit/<?= $m->movie_id ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?= $pager->links() ?>