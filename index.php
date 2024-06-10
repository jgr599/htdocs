<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTaste</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class= "container my-5">
    
    <h2> List of Clients</h2>
    <a class="btn btn-primary" href="/MYSOP/create.php" role="button">Add new client</a>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myshop";

            //create connection
            $connection = new mysqli($servername, $username, $password, $dbname, 3308);


            //check connection  
            if ($connection->connect_error) {
                die("connection failed: " . $connection->connect_error);
            }
            //read all rows from the table
            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            if (!$result) {
                die("invalid query" . $connection->error);
            }

            //read date of each row
            while ($row = $result->fetch_assoc()) {
                    // Output the data for each row

                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary btn-sm' href='/MYSOP/edit.php?id=" . $row['id'] . "'>Edit</a>";
                echo "<a class='btn btn-danger btn-sm' href='/MYSOP/delete.php?id=" . $row['id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }


            ?>

        </tbody>
        </div>
        </div>
        </body>

</html>