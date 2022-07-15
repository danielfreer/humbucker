<?php

function aboutCandy($order) {
    $candies = array(
        "bit o honey",
        "smarties",
        "candy"
    );
    foreach ($candies as $candy) {
        if (stripos($order->comments, $candy) !== false) return true;
    }
    return false;
}

class CandyOrders {
    /**
     * @param $orders Order[]
     * @return Order[]
     */
    public function filter($orders) {
        return array_filter($orders, "aboutCandy");
    }
}