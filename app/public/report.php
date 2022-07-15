<?php

require_once('../Repository.php');


$repo = new Repository();
$orders = $repo->orders();
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
                    <?php forEach ($orders as $order ): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order->orderid) ?></td>
                            <td><?php echo htmlspecialchars($order->comments) ?></td>
                            <td><?php echo htmlspecialchars($order->shipdate_expected) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <h2>Comments about call me / don't call me</h2>
        <h2>Comments about who referred me</h2>
        <h2>Comments about signature requirements upon delivery</h2>
        <h2>Miscellaneous comments (everything else)</h2>
    </body>
</html>

