<?php
session_start();
 #echo "<script>alert('Welcome User ".$_SESSION['userid']."!');</script>"; 
 $userid = $_SESSION['userid'];
 $password = $_SESSION['password'];
 

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" href="viewstudent.css">
    
</head>

<body>

    <div class="container">
        <div class="welcome"><h1 style="font-size:50px;">IIT DHARWAD LIBRARY SYSTEM</h1></div>
        <div class="line"><h1 style="font-size:20px;">the portal to unlimited knowledge</h1></div>
    </div>
    <div style="height: 30px;"></div>
    <div>
    <nav class="menu">
        <ul >
        <li class="menubar"><a href="homestudent.php">Home</a></li>
        <li class="menubar"> <a href="orderstudent.php">Order</a></li>
        <li class="menubar"> <a href="finestudent.php">Fine</a></li>
        <li class="menubar" > <a class="active" href="viewstudent.php">View</a></li>
        <li class="menubar"> <a href="searchstudent.php">Search</a></li>
        <li class="logout"><a href="main.php">Logout</a></li>
        </ul>
         
    </nav>
    </div>
    <h3>Available Books</h3>
    <div>
    <form method="post" action="viewstudent.php">
        <input type="submit" value="View the books" name="view" style="background-color:rgb(66, 43, 22)" >
    </form>
    <br>
    <br>
</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 if(isset($_POST['view'])){

    $viewquery = "SELECT Title,Author,Publisher,Genre FROM Books WHERE Quantity > 0";
    $resultsview = $conn->query($viewquery);
    if ($resultsview->num_rows > 0) {
        echo "<table class='books'><tr><th>Title</th><th>Author</th><th>Publisher</th><th>Genre</th></tr>";
        while($row = $resultsview->fetch_assoc()) {
          echo "<tr><td>".strtolower($row["Title"])."</td><td>".$row["Author"]."</td><td>".$row["Publisher"]."</td><td>".$row["Genre"]."</td><tr>";
        }
        echo "</table>";
      } else {
        echo "<script>alert('No book is available currently.');</script>";
      }

}  
$conn->close(); 

?>