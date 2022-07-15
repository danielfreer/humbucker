<?php

try {
    $pdo = new PDO("mysql:host=sql;dbname=humbucker", "humbucker", "password");
    $sql = 'SELECT * FROM sweetwater_test';
    $query = $pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {
    die("Could not connect to the database: " . $pe->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report on Order Comments</title>
    </head>
    <body>
        <h2>Comments about candy</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Comments</th>
                        <th>Expected Shipdate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $query->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['orderid']) ?></td>
                            <td><?php echo htmlspecialchars($row['comments']) ?></td>
                            <td><?php echo htmlspecialchars($row['shipdate_expected']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <h2>Comments about call me / don't call me</h2>
        <h2>Comments about who referred me</h2>
        <h2>Comments about signature requirements upon delivery</h2>
        <h2>Miscellaneous comments (everything else)</h2>
    </body>
</html>

