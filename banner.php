<header class="bg-danger text-white">
    <div class="container text-center">
        <h1>Blood Finder</h1>
        <p class="lead">The right place to find blood</p>
    </div>

    <!-- Search form -->
    <div class="container">
        <div class="row justify-content-center">
            <form class="text-center" action="" method="post">
                <div class="form-row">
                    <div class="col">
                        <input type="text" id="search_input" class="form-control" placeholder="Enter your query..." name="search">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-light" name="sub">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>


<?php

  // Include the database connection file
  include 'db_connection.php';

  $output = '';
  if (isset($_POST['search']))
    $input = $_POST['search'];

  // Check if any search has been made or if the search field is not EMPTY
  if(isset($input) && $input != '')
  {

    $searchq = $_POST['search'];

    // Match and replace regular expression
    $searchq = preg_replace("#[^0-9a-z+-]#i", "", $searchq);

    // Query to search after sanitizing the input
    $query = $mysqli->query("SELECT * FROM donors WHERE blood_group = '$searchq' or first_name LIKE '%$searchq%' or last_name LIKE '%$searchq%' or  district LIKE '%$searchq%'") or die("Could not search");

    // Calculating the number of rows after the search
    $row_count = $query->num_rows;

    if ($row_count == 0)
    {
      // If there is no output
      echo '<br /><br /><br />
      <p class="text-center text-uppercase font-weight-bold">Nothing found.</p>
      <br /><br /><br /><br /><br /><br />';
    }
    else
    {
      echo '
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
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

      while ($row = $query->fetch_array(MYSQLI_BOTH)) 
      {
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $group = $row['blood_group'];
        $phone = $row['phone'];
        $email = $row['email'];
        $dist = $row['district'];
        $address = $row['address'];

        echo '<tr><td>'.$fname.'</td><td>'.$lname.'</td><td>'.$group.'</td><td>'.$phone.'</td><td>'.$email.'</td><td>'.$dist.'</td><td>'.$address.'</td></tr>';
      }
    }
  }
?>


    </tbody>
  </table>
</div>