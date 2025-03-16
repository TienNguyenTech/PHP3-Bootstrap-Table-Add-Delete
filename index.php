<?php
require_once("connection.php");
include_once("functions.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FIT2104 Lab Week 5 2023 S2">
    <meta name="author" content="Bill Gong <haofei.gong@monash.edu>">

    <title>List Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Student Table</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">List students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add new student</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
        <div class="student-table py-3">
            <?php if ($stmt->rowCount() > 0): ?>
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
                            <td class="student-firstname"><?= $row->first_name ?></td>
                            <td class="student-surname"><?= $row->surname ?></td>
                            <td><?= $row->home_address ?></td>

                            <?php //Use URI schemes to make phone numbers and email addresses clickable ?>
                            <td><a href="tel:<?= $row->parent_phone ?>"><?= formatPhoneNumber($row->parent_phone) ?></a></td>
                            <td><a href="mailto:<?= $row->parent_email ?>"><?= $row->parent_email ?></a></td>

                            <?php //Yes, you can reformat the date into something in Australian format ?>
                            <td><?= (new DateTime("$row->date_of_birth"))->format('j M o') ?></td>

                            <?php //And converting 0s and 1s from database boolean type to readable types ?>
                            <td><?= ($row->subscribed) ? "✅" : "❌" ?></td>
                            <td><a href="delete.php?id=<?= $row->id ?>" class="btn btn-danger student-delete">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="mx-auto text-center py-3">
                    <h3>No data found</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<footer class="bg-body-tertiary py-3">
    <div class="container">
        <p class="float-end">
            <a href="#">Back to top</a>
        </p>
        <p>For FIT2104 Week 5 Lab</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="scripts.js"></script>
</body>
</html>
