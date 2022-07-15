<?php

function aboutCalls($order) {
    $callSigns = array(
        "call",
        "phone",
        "speak with someone",
    );
    foreach ($callSigns as $callSign) {
        if (stripos($order->comments, $callSign) !== false) return true;
    }
    return false;
}

class CallOrders {
    /**
     * @param $orders Order[]
     * @return Order[]
     */
    public function filter($orders) {
        return array_filter($orders, "aboutCalls");
    }
}