<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

//create connection
$connection = new mysqli($servername, $username, $password, $dbname, 3308);

$name = "";
$email ="";
$phone ="";
$address ="";








$errorMessage ="";
$successMessage ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    do {
        if (empty($name)|| empty($email) || empty($phone) || empty($address)){
            $errorMessage = "Please fill all fields";
            break;
        }
        //add new client to database
        $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Failed to add client";
            break;
        }
        
        $name="";
        $email="";
        $phone="";
        $address="";
        $successMessage = "Client added successfully";
        header("Location: /MYSOP/index.php");
        exit;
    }while (false);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</head> 
<body>
    <div class = " container mt-5">
    <h2> Add new client</h2>
    <?php
    if (!empty($errorMessage)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $errorMessage;
        echo '</div>';
    }?>
    <form method="post">
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
            <button type="submit" class="btn btn-primary">Add client</button>
            </div>
        </div>
    </form>
  
</div>
</body>
</html>