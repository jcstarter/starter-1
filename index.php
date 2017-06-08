<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Hit the Button</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="timeline-small">
  <div class="header">
    <div class="color-overlay">
      <div class="header-name">PHP Button Mini Project</div>
      <div class="header-sub">Click the button in the box below</div>
    </div>
  </div>
        <div class="whoa">
          <form action="#" method="post">
            <button class="button1" type="submit" name="btn" formmethod="post" formaction="#">Hit This Button!</button>

            <?php

              date_default_timezone_set('America/New_York');
              $daDate = date("m-d-Y");
              $daTime = date("h:ia");
              $ip = $_SERVER['REMOTE_ADDR'];

              if (isset($_POST['btn'])){
                echo "<p>You hit the button at " . $daTime . " on " . $daDate;

                // Learing how to connect to a database here
                $server = "localhost";
                $user = "root";
                $pass = "";
                $db = "timestamps";

                // This is everything needed to connect to the database - add "die" to terminate on unsuccessful connect
                $conn = new mysqli($server, $user, $pass, $db) or die("Unable to connect to database");

                $sql = "INSERT INTO info (datetime, ip) VALUES (NOW(), '$ip')";

                // Want SELECT at this point - SELECT
                if ($conn->query($sql) === TRUE) {
                    echo " </p>You previously hit the button at: ";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "SELECT datetime, ip FROM info WHERE ip = '$ip' ORDER BY datetime DESC";

                $result = mysqli_query($conn, $sql);
                echo "<br/> ";
                  if (mysqli_num_rows($result) > 1) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                          $histDateTime = $row["datetime"];
                          $date = date('m-d-Y',strtotime($histDateTime));
                          $time = date('h:i:sa',strtotime($histDateTime));
                          echo $time . " on " . $date . "<br/>";
                      }
                  } else {
                      echo "(Hit the button again to see your history)";
                  }

                $conn->close();

              }

            ?>
              </p>

          </form>

        </div>
  </div>
</div>


</body>
</html>
