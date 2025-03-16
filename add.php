<?php
require_once("connection.php");

/**
 * @var PDO $dbh
 */

// If the user has completed the form:
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    // Add new record based on the form received
    $query = "INSERT INTO `student`(`first_name`, `surname`, `home_address`, `parent_phone`, `parent_email`, `date_of_birth`, `subscribed`) VALUES (:first_name, :surname, :home_address, :parent_phone, :parent_email, :date_of_birth, :subscribed)";
    $stmt = $dbh->prepare($query);

    try {
        // Execute the query
        $stmt->execute([
            'first_name' => $_POST["first_name"],
            'surname' => $_POST["surname"],
            // Home address needs to be set to null when left empty
            'home_address' => (empty($_POST["home_address"])) ? null : $_POST["home_address"],
            'parent_phone' => $_POST["parent_phone"],
            'parent_email' => $_POST["parent_email"],
            // Date of birth needs to be set to null when left empty
            'date_of_birth' => (empty($_POST["date_of_birth"])) ? null : $_POST["date_of_birth"],
            // Subscribed field needs to be set to correct value based on whether the box has been ticked
            // Note when input checkbox is not being ticked, you don't even get the key, so
            // we'll use a null coalescing operator to default an unchecked box to 0 (false)
            'subscribed' => $_POST['subscribed'] ?? '0',
        ]);

        // And send the user back to where we were
        header('Location: index.php');
    } catch (PDOException $e) {
        // Set appropriate headers and HTTP response
        header('HTTP/1.1 400 Bad Request');
        header('Content-Type:text/plain');

        // Handle the exception when execution is failed
        $err = $stmt->errorInfo();
        echo "Error deleting record from database – contact System Administrator\n";
        echo "Error is: " . $err[2];
    }
else:
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="FIT2104 Lab Week 5 2023 S2">
        <meta name="author" content="Bill Gong <haofei.gong@monash.edu>">

        <title>Add New Student</title>

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
                            <a class="nav-link" href="index.php">List students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="add.php">Add new student</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="pt-3 pb-5">
            <div class="container">
                <div class="mx-auto my-1">
                    <h1>Add new student</h1>
                    <p class="lead">Please fill in the student information below:</p>
                </div>
                <form method="post">
                    <div class="row">
                        <div class="col col-12 col-md-4">
                            <div class="mb-3">
                                <label for="first-name" class="form-label">First name</label>
                                <input type="text" maxlength="128" id="first-name" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" maxlength="128" id="surname" class="form-control" name="surname" required>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of birth</label>
                                <input type="date" id="dob" class="form-control" name="date_of_birth">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Home address</label>
                                <input type="text" maxlength="65535" id="home-address" class="form-control" name="home_address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-12 col-md-6 col-lg-4">
                            <div class="mb-3">
                                <label for="parent-phone" class="form-label">Parent Phone/Mobile</label>
                                <input type="text" maxlength="10" pattern="0[1-9][0-9]{8}" title="Requires an 10-digit Australian phone number, e.g. 0412345678" id="parent-phone" class="form-control" name="parent_phone" required>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6 col-lg-8">
                            <div class="mb-3">
                                <label for="parent-email" class="form-label">Parent Email</label>
                                <input type="email" id="parent-email" class="form-control" name="parent_email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-12 py-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="subscribe-switch" name="subscribed" value="1" checked>
                                <label class="form-check-label" for="subscribe-switch">Subscribe to newsletters</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary"/>
                </form>
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
<?php endif; ?>