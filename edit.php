<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

$connection = new mysqli($servername, $username, $password, $dbname, 3308);
$id = $name = $email = $phone = $address = $errorMessage = $successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id = $id";
    $result = $connection->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    } else {
        $errorMessage = "Failed to get client";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($address)) {
        $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "Client updated successfully";
            header("Location: /MYSOP/index.php");
            exit;
        } else {
            $errorMessage = "Failed to update client";
        }
    } else {
        $errorMessage = "Please fill all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head> 
<body>
    <div class = " container mt-5">
    <h2> Edit client</h2>
    <?php
    if (!empty($errorMessage)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $errorMessage;
        echo '</div>';
    }
    if (!empty($successMessage)) {
        echo '<div class="alert alert-success" role="alert">';
        echo $successMessage;
        echo '</div>';
    }
    ?>
    <form method="post">
        <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <div class="col-sm-6">

            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="col-sm-6">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="form-label">Phone</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="form-label">Address</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
        <?php
if (!empty($successMessage)) {
    echo '<div class="alert alert-success" role="alert">';
    echo $successMessage;
    echo '</div>';
}
?>


        <div class = "row mb-3">
            <div class="col-sm-6">
            <a class="btn btn-secondary" href="/MYSOP">Cancel</a>
            <button type="submit" class="btn btn-primary">Update client</button>
            </div>
        </div>
    </form>
  
</div>
</body>
</html>