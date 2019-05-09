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
                    <!-- First name -->
                        <input type="text" id="search_input" class="form-control" placeholder="Enter your query..." name="search">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>

<!-- Search area -->

    <?php
      
      include 'db_connection.php';

      if (isset($_REQUEST['search']))
      {
    
      //Search result
      echo '
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
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

    
        $param = "%{$_REQUEST['search']}%";
        $sql = "SELECT id, first_name, last_name, email, blood_group, district, phone, address FROM donors WHERE
              first_name LIKE ?";
        
        if ($stmt = $mysqli->prepare($sql))
        {
          // Bind variables to the prepared statement as parameters
          $stmt->bind_param("s", $param);

          //Set the parameters values and execute
          $id = $_REQUEST['id'];
          $first_name = $_REQUEST['first_name'];
          $last_name = $_REQUEST["last_name"];
          $email = $_REQUEST["email"];
          $blood_group = $_REQUEST["blood_group"];
          $district = $_REQUEST["district"];
          $phone = $_REQUEST["phone"];
          $address = $_REQUEST["address"];

          $stmt->execute();
          
          $stmt->bind_result($id, $first_name, $last_name, $email, $blood_group, 
            $district, $phone, $address);

          while ($stmt->fetch()) 
          {
              // echo "Id: {$id}, First Name: {$first_name}";
            echo '<tr> 
                      <td>'.$id.'</td> 
                      <td>'.$first_name.'</td> 
                      <td>'.$last_name.'</td>
                      <td>'.$blood_group.'</td>
                      <td>'.$phone.'</td>  
                      <td>'.$email.'</td> 
                      <td>'.$district.'</td>
                      <td>'.$address.'</td>
                  </tr>';
          }
        }
      }
    ?>

      </tbody>
    </table>
</div>