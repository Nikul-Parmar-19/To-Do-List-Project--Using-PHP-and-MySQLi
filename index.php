<?php
$insert = false;
$update = false;
$delete = false;
// Connect to DataBase :
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbtodo";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if the connection was not successful :
if (!$conn) {
  die("Sorry, we failed to connect : " . mysqli_connect_error());
  echo "<br>";
}


if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;

  $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

// It will perform a edit in notes :
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['snoEdit'])){
      // Update the record :
      $sno = $_POST['snoEdit'];
      $title = $_POST['titleEdit'];
      $description = $_POST['descriptionEdit'];

      // sql query to execute :
      $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno;";

      $result = mysqli_query($conn, $sql);
      if($result){
        // echo "The Record has been inserted successfully. <br>";
       $update = true;
      }
      else{
        echo "The Record has not been inserted dut to : ". mysqli_error($conn);
      }
  }
  else{

      $title = $_POST['title'];
      $description = $_POST['description'];

      // sql query to execute :
      $sql = "INSERT INTO `notes` ( `title`, `description`, `tstamp`) VALUES ('$title', '$description, ', current_timestamp());";
      $result = mysqli_query($conn, $sql);


      if($result){
        // echo "The Record has been inserted successfully. <br>";
        $insert = true;
      }
      else{
        echo "The Record has not been inserted dut to : ". mysqli_error($conn);
      }
}
}

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iNotes - Notes taking made easy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Adding a external css -->
  <link rel="stylesheet" href="index.css">
 
</head>

<body >

<!-- PHP code which will check. if user visit a index.php page without login then this message will appear : -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {


    echo "<div class='big-container>";
    echo "<div class='container' style='border: 1px solid #ccc; border-radius: 10px; padding: 20px;'>";
    echo "<p class='mb-3'>Please login to continue</p>";
    echo "<a href='login.php' class='btn btn-primary'>Login</a>";
    echo "</div>";
    echo "</div>";
    exit;
}
?>


  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="index.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- This is a navbar , which is taken from a bootstrap -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="php-logo.png" width="49px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Below a php code will show a success message when user inserted successfully a note -->
  <?php
    if($insert){
      echo  "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>SUCCESS!</strong> Your note has been inserted successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
      ";
    }

  ?>

<!-- Below a php code will show a success message when user updated a notes successfully -->
<?php
    if($update){
      echo  "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>SUCCESS!</strong> Your note has been updated successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
      ";
    }

  ?>

<!-- Below a php code will show a success message when user deleted a note from table successfully -->
<?php
    if($delete){
      echo  "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>SUCCESS!</strong> Your note has been deleted successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
      ";
    }
 

  ?>

<!-- This is html code for add a Note (with Title a descripton) -->
  <div class="container my-5">
    <h2>Add a Note</h2>
    <form action="index.php" method="post" >
      <div class="form-group">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" >
      </div>

      <div class="form-group">
        <label for="description">Note Description</label>
        <textarea class="form-control" id="description" style="height: 100px" name="description"></textarea>

      </div>
      <button type="submit" class="btn btn-primary my-3">Add Note</button>
    </form>
  </div>

  <!-- THis is html code which whill show a Tabel content, in this php is embedded  -->
  <div class="container my-4">
    
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Sr No.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $sql = "SELECT * FROM `notes`";
          $result = mysqli_query($conn, $sql);

          $no = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $no = $no + 1;
            echo "
              <tr>
                <th scope='row'>" . $no . "</th>
                <td>" . $row['title'] . "</td>
                <td>" . $row['description'] . "</td>
                <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> / <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button> </td>
              </tr>
            ";
      
          }
      ?>
        
      </tbody>
    </table>
    <hr>

  </div>
        
  

<!-- Here, Javascript logic is written to perform a various task -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  <!-- This below code will show a tabel -->
  <script>
    let table = new DataTable('#myTable');
  </script>
   <!-- Adding a external Javascript file -->
   <script src="index.js"></script>

</body>
<footer>
  <!-- This code is logout button -->
  <div class="container">
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</footer>
</html>