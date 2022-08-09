<table class="table table-responsive">
    <thead>
        <tr>
            <th>IP</th>
            <th>IP válida</th>
            <th>Método</th>
            <th>Servidor</th>
            <th>Ajax</th>
            <th>CLI</th>
            <th>Secure</th>
            <th>Uri</th>
            <th>Headers</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $request->getIPAddress(); ?></td>
            <td><?= (int)$request->isValidIP($request->getIPAddress()); ?></td>
            <td><?= $request->getMethod(); ?></td>
            <td><pre><?= var_dump($request->getServer(['SERVER_PROTOCOL', 'REQUEST_URI'])) ?></pre></td>
            <td><?= (int)$request->isAJAX(); ?></td>
            <td><?= (int)$request->isCLI(); ?></td>
            <td><?= (int)$request->isSecure(); ?></td>
            <td><?= $request->getUri(); ?></td>
            <td><pre><?= var_dump($request->getHeaders()) ?></pre></td>
        </tr>
    </tbody>
</table>