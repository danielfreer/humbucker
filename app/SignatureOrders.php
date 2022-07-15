<?php

function aboutSignatures($order) {
    $hints = array(
        "SIGNATURE",
    );
    foreach ($hints as $hint) {
        if (stripos($order->comments, $hint) !== false) return true;
    }
    return false;
}

class SignatureOrders {
    /**
     * @param $orders Order[]
     * @return Order[]
     */
    public function filter($orders) {
        return array_filter($orders, "aboutSignatures");
    }
}