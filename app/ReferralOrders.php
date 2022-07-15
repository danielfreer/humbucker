<?php

function aboutReferrals($order) {
    $hints = array(
        "referral",
        "sales engineer",
        "Chris N",
        "Kurt M",
        "sales rep",
        "Thanks",
        "Nick C",
        "Frank Gertz",
        "shout out",
        "helpful",
        "helping me",
        "Jordan D",
        "Aaron S",
        "referred",
        "Paul A",
        "credit",
        "Chris K",
        "Mike D",
        "client of",
        "told me about",
        "Kirk Lyons",
        "swears by"
    );
    foreach ($hints as $hint) {
        if (stripos($order->comments, $hint) !== false) return true;
    }
    return false;
}

class ReferralOrders {
    /**
     * @param $orders Order[]
     * @return Order[]
     */
    public function filter($orders) {
        return array_filter($orders, "aboutReferrals");
    }
}