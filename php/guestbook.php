<!DOCTYPE html>

<head>
  <title>Guestbook sign in</title>
</head>

<body>

  <h2>Welcome to sign in my Guestbook</h2>

  <?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cp476";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

  $sql = "INSERT INTO guestbook VALUES ('', '$name', '$email', '$comment')";
  if ($conn->query($sql) === TRUE) {
    //echo "Insert successfully\n";
    $sql = "SELECT name FROM guestbook where Name='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Hi " . $row['name'] . ", thank you for signing in my guestbook\n";
    } else {
      echo "0 results";
    }
  } else {
    echo "\nError: " . $conn->error;
  }
  $conn->close();

  ?>

</body>

</html>