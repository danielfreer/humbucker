<?php

require_once('../Repository.php');
require_once('../CandyOrders.php');
require_once('../CallOrders.php');
require_once('../ReferralOrders.php');
require_once('../SignatureOrders.php');
require_once('../MiscOrders.php');
require_once('../DateFixer.php');

$repo = new Repository();
$candy = new CandyOrders();
$call = new CallOrders();
$referral = new ReferralOrders();
$signature = new SignatureOrders();
$misc = new MiscOrders();
$dateFixer = new DateFixer();

$orders = $repo->orders();
$candyOrders = $candy->filter($orders);
$callOrders = $call->filter($orders);
$referralOrders = $referral->filter($orders);
$signatureOrders = $signature->filter($orders);
$miscOrders = $misc->filter($candyOrders, $callOrders, $referralOrders, $signatureOrders, $orders);

$fixedOrders = $dateFixer->ingest($orders);
foreach ($fixedOrders as $fixedOrder) {
    $repo->updateExpectedShipdate($fixedOrder->orderid, $fixedOrder->shipdate_expected);
}

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <title>Report on Order Comments</title>
    </head>
    <body>
        <h2>Comments about candy</h2>
            <table>
                <tbody>
                    <?php forEach ($candyOrders as $order ): ?>
                        <tr><td><?php echo htmlspecialchars($order->comments) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <h2>Comments about call me / don't call me</h2>
            <table>
                <tbody>
                    <?php forEach ($callOrders as $order ): ?>
                        <tr><td><?php echo htmlspecialchars($order->comments) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <h2>Comments about who referred me</h2>
            <table>
                <tbody>
                    <?php forEach ($referralOrders as $order ): ?>
                        <tr><td><?php echo htmlspecialchars($order->comments) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <h2>Comments about signature requirements upon delivery</h2>
            <table>
                <tbody>
                    <?php forEach ($signatureOrders as $order ): ?>
                        <tr><td><?php echo htmlspecialchars($order->comments) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <h2>Miscellaneous comments (everything else)</h2>
            <table>
                <tbody>
                    <?php forEach ($miscOrders as $order ): ?>
                        <tr><td><?php echo htmlspecialchars($order->comments) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </body>
</html>

