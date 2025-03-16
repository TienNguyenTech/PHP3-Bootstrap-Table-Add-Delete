<?php
require_once("../connection.php");

/**
 * @var PDO $dbh
 */

$stmt = $dbh->prepare("SELECT * FROM `student`");
$stmt->execute();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>List Students</title>

    <style>
        table, tr, th, td {
            border: 1px black solid;
        }
    </style>
</head>
<body>
<p><a href="add.php">Add new student</a></p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Home Address</th>
        <th scope="col">Parent Phone/Mobile</th>
        <th scope="col">Parent Email</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Subscribed?</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $stmt->fetchObject()): ?>
        <tr>
            <th scope="row"><?= $row->id ?></th>
            <td><?= $row->first_name ?></td>
            <td><?= $row->surname ?></td>
            <td><?= $row->home_address ?></td>
            <td><?= $row->parent_phone ?></td>
            <td><?= $row->parent_email ?></td>
            <td><?= $row->date_of_birth ?></td>
            <td><?= $row->subscribed ?></td>
            <td><a href="delete.php?id=<?= $row->id ?>">Delete</a></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
