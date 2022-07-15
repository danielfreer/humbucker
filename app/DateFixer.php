<?php

class DateFixer {
    /**
     * @param array $orders
     * @return Order[]
     */
    public function ingest(array $orders) {
        echo "Total number of orders: ".count($orders)."</br>";

        $regex = '~Expected Ship Date: (\d+)/(\d+)/(\d+)~';
        $fixedOrders = [];
        foreach ($orders as $order) {
            $matches = [];
            if (preg_match($regex, $order->comments, $matches)) {
                $month = $matches[1];
                $day = $matches[2];
                $year = "20".$matches[3];
                $fixedDate = $year."-".$month."-".$day." 00:00:00";
                if (strcmp($order->shipdate_expected, $fixedDate)) {
                    $order->shipdate_expected = $fixedDate;
                    $fixedOrders[] = $order;
                }
            }
        }
        echo "Total number of fixed orders: ".count($fixedOrders)."</br>";
        return $fixedOrders;
    }
}