<?php

require_once('Order.php');

/** Abstracts the database operations */
class Repository {
    /**
     * @return Order[]
     */
    function orders() {
        try {
            $pdo = new PDO("mysql:host=sql;dbname=humbucker", "humbucker", "password");
            $query = $pdo->query('SELECT orderid, comments, shipdate_expected FROM sweetwater_test');
            return $query->fetchAll(PDO::FETCH_CLASS, 'Order');
        } catch (PDOException $pe) {
            die("Could not connect to the database: " . $pe->getMessage());
        }
    }

    /**
     * @param $orderid int
     * @param $new_shipdate_expected string
     * @return void
     */
    function updateExpectedShipdate($orderid, $new_shipdate_expected) {
        try {
            $pdo = new PDO("mysql:host=sql;dbname=humbucker", "humbucker", "password");
            $sql = 'UPDATE sweetwater_test SET shipdate_expected = ? WHERE orderid = ?;';
            $query = $pdo->prepare($sql);
            $query->execute([$new_shipdate_expected, $orderid]);
        } catch (PDOException $pe) {
            die("Could not connect to the database: " . $pe->getMessage());
        }
    }
}