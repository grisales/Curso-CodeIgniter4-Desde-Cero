<table class="table">
    <thead>
        <tr>
            <th>Tablas</th>
            <th>Existe movies</th>
            <th>Existe movie</th>
            <th>Campos movies</th>
            <th>Campo existe</th>
            <th>Meta-data campo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= implode('<br>',$db->listTables())  ?></td>
            <td><?= $db->tableExists('movies') ?></td>
            <td><?= (int)$db->tableExists('movie') ?></td>
            <td><?= implode('<br>',$db->getFieldNames('movies'))  ?></td>
            <td>title: <?= (int)$db->fieldExists('title','movies')."<br>movie_title: ".$db->fieldExists('movie_title','movies') ?></td>
            <td><pre><?= var_dump('<br>',$db->getFieldData('movies'))  ?></pre></td>
        </tr>
    </tbody>
</table>