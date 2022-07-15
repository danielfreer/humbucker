<?php
    $pdo = new PDO('mysql:dbname=humbucker;host=sql', 'humbucker', 'password', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $query = $pdo->query('SHOW VARIABLES like "version"');

    $row = $query->fetch();

    echo 'MySQL version:' . $row['Value'];

    phpinfo();
