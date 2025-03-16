<?php
require_once("../connection.php");

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
else:
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>List Students</title>
    </head>
    <body>
    <h1>Add new student</h1>

    <form method="post">
        <label for="first-name">First name:</label><br>
        <input type="text" maxlength="128" id="first-name" name="first_name" required><br>

        <label for="surname">Surname:</label><br>
        <input type="text" maxlength="128" id="surname" name="surname" required><br>

        <label for="home-address">Home address:</label><br>
        <input type="text" maxlength="65535" id="home-address" name="home_address"><br>

        <label for="parent-phone">Parent Phone/Mobile:</label><br>
        <input type="text" maxlength="10" pattern="0[1-9][0-9]{8}" id="parent-phone" name="parent_phone" required><br>

        <label for="parent-email">Parent Email:</label><br>
        <input type="email" id="parent-email" name="parent_email" required><br>

        <label for="dob">Date of birth:</label><br>
        <input type="date" id="dob" name="date_of_birth"><br><br>

        <!-- Since the subscribed attribute in the database takes 1 for true and 0 for false,
        we'll set the value of the checkbox to 1 by default. And don't forget the "value"
        attribute only sets the data being sent, it does NOT check the box for you! -->
        <input type="checkbox" id="subscribe" name="subscribed" value="1" checked>
        <label for="subscribe"> Subscribe to newsletters</label><br><br>

        <input type="submit" value="Add">
    </form>
    </body>
    </html>
<?php endif; ?>