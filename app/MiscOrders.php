<?php

function isSameOrder($thisOrder, $thatOrder) {
    return strcmp(spl_object_hash($thisOrder), spl_object_hash($thatOrder));
}

class MiscOrders {
    /**
     * @param $candyOrders Order[]
     * @param $callOrders Order[]
     * @param $referralOrders Order[]
     * @param $signatureOrders Order[]
     * @param $orders Order[]
     * @return Order[]
     */
    public function filter(
        $candyOrders,
        $callOrders,
        $referralOrders,
        $signatureOrders,
        $orders
    ) {
        $otherOrders = array_merge($candyOrders, $callOrders, $referralOrders, $signatureOrders);
        return array_udiff($orders, $otherOrders, "isSameOrder");
    }
}