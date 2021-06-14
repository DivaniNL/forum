<?php
include 'connect.php';
session_start();

if (isset($_SESSION['login'])) {
} else {
  header('Location: index.php');
  exit();
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <script src="https://kit.fontawesome.com/6d3b4f3309.js" crossorigin="anonymous"></script>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/forum.min.css">
     <title>Home - Forum</title>
   </head>
   <body>
     <header>
       <nav>
         <a href="home.php" class="logo"><h1>Forum</h1></a>
         <a href="settings.php"><i class="fas fa-user-cog" id="settings"></i></a>
         <form class="" action="" method="post">
           <input type="text" name="search" value="" placeholder="Zoek een onderwerp" class="search">
         </form>
       </nav>
     </header>
     <main>
      <?php
        $id = $_GET['id'];
        $sql="SELECT * from onderwerpen WHERE id = $id";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
              echo "<h1>" .$row["onderwerp"]. "</h1>";
              echo "<h5> Aangemaakt door " .$row["gebruikersnaam"]. "</h5>";
         }
     }
        ?>
        <div class="posts">
          <h2>Posts</h2>
          <?php
          $sql="SELECT * from berichten WHERE onderwerp_id = $id ";
          $result = $conn->query($sql);
           if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
             echo "<div class='bericht'>";
             echo "<p1>" .$row["gebruikersnaam"]. "</p1>";
             echo "<p>" .$row["tekst"]. "</p>";
             echo "<p2> Geplaatst op: " .$row["datum"]. "</p2>";

             echo "</div>";
           }
       }
           ?>
        </div>
        <div class="maak_posts">
          <h2>Plaats een Bericht</h2>
          <form class="form" onsubmit="setTimeout(function(){window.location.reload();},10);" action="" method="post">
            <label for=""></label><br>
            <input type="text" name="bericht" class="put" id="put1" value="" required placeholder="Schrijf hier een nieuw bericht"><br>
            <label for=""></label><br>
            <input type="submit" name="submit" class="put" id="put2" value="Plaats uw bericht"><br>
          </form>
          <?php
          if(isset($_POST['submit'])){

            $tekst = $_POST['bericht'];
            $gebruiker = $_SESSION['login'];
            $id = $_GET['id'];

           $sql = "INSERT INTO berichten (tekst, gebruikersnaam, onderwerp_id) VALUES ('$tekst', '$gebruiker', '$id')";

          if (mysqli_query($conn, $sql)) {
            $product_id = $conn->insert_id;

          } else {
            
          }
        }
        ?>
        </div>
     </main>
   </body>
   <script type="text/javascript">
   function sampleFunction() {
     location.reload(true);
   }
   </script>
 </html>
