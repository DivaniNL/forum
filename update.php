<?php
include 'connect.php';
session_start();

if (isset($_SESSION['login'])) {
} else {
  header('Location: index.php');
  exit();
}

if(isset($_POST['submit'])){


$ber = $_POST['ber'];
$id = $_GET['id'];
$sql = "UPDATE berichten SET tekst = '$ber' WHERE id= $id";
if (mysqli_query($conn, $sql)) {
  $product_id = $conn->insert_id;
    header('Location: home.php');
}
else {
  echo "<center>Probeer het opnieuw</center>";
  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <script src="https://kit.fontawesome.com/6d3b4f3309.js" crossorigin="anonymous"></script>
     <meta charset="utf-8">
      <link rel="stylesheet" href="css/home.min.css">
     <title>Verander Bericht - Forum</title>
   </head>
   <body>
     <main><br><br><br>
       <center><form method="post" enctype="multipart/form-data">
         <h2 id="text1">Verander hier uw bericht</h2>
         <?php
         $id = $_GET['id'];
         $sql="SELECT * from berichten WHERE id = $id ";
         $result = $conn->query($sql);
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<div class='bericht'>";
            echo "<p>" .$row["tekst"]. "</p>";
            echo "</div>";
          }
      }
          ?>
         <label for="">Uw nieuw bericht</label><br>
           <input type="text" name="ber" id="pname"  class="form-control" placeholder="Product naam"/><br><br>
           <center><input type="submit" name="submit" class="btn btn-info" id="bttn" value="Bericht Wijzigen"/></center>
       </form></center>
     </main>
   </body>
 </html>
