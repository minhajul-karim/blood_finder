<?php
  // if(!isset($_SESSION)) 
  // { 
  //     session_start(); 
  // }
  // $rows = $_SESSION['abc'];
  //echo $rows;
  //echo 'list.php receives '. $row_count;

  include 'db_connection.php';
  include 'header.php';
  include 'nav.php';
  include 'banner.php';

  // Submit button wasn"t clicked!
  if (!isset($_POST['sub']))
  {

    $query = "SELECT * FROM donors";

    // If no result is found print all data from db
    // if ($_SESSION['abc'] == 0)
      echo '<div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">District</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>';
      //echo 'zero';
      if ($result = $mysqli->query($query)) 
      {
        while ($row = $result->fetch_assoc()) 
        {
            //$id = $row["id"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email = $row["email"];
            $blood_group = $row["blood_group"];
            $district = $row["district"];
            $phone = $row["phone"];
            $address = $row["address"];

            echo '<tr> 
                      <td>'.$first_name.'</td> 
                      <td>'.$last_name.'</td>
                      <td>'.$blood_group.'</td>
                      <td>'.$phone.'</td>  
                      <td>'.$email.'</td> 
                      <td>'.$district.'</td>
                      <td>'.$address.'</td>
                  </tr>';
        }
        $result->free();
      }
    echo '</tbody>
    </table>
  </div>';
  }


?>



    



<!-- Footer -->
<?php
  include 'footer.php';
?>
