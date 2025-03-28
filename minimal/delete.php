<?php
require_once("../connection.php");

/**
 * @var PDO $dbh
 */

// Delete the record with the given record ID

if (!empty($_GET["id"])) {
    $query = "DELETE FROM `student` WHERE `id` = :id";
    $stmt = $dbh->prepare($query);

    try {
        // Execute the query
        $stmt->execute([
            'id' => $_GET["id"]
        ]);

        // And send the user back to where we were
        header('Location: list.php');
    } catch (PDOException $e) {
        // Set appropriate headers and HTTP response
        header('HTTP/1.1 400 Bad Request');
        header('Content-Type:text/plain');

        // Handle the exception when execution is failed
        $err = $stmt->errorInfo();
        echo "Error deleting record from database – contact System Administrator\n";
        echo "Error is: " . $err[2];
    }
}