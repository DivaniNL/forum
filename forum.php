<?php
include 'connect.php';
session_start();

if (isset($_SESSION['login'])) {
} else {
  header('Location: index.php');
  exit();
}

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
         <a href="home.php" class="logo"><h1>Home</h1></a>
         <?php
         $gebruikersnaam = $_SESSION['login'];
         echo "<div id='settings'><p3>Hallo $gebruikersnaam</p3></div>";?>
         <a href="onderwerpen.php" class="logo" id="onder"><h1>Onderwerpen</h1></a>
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
          $sql="SELECT * from berichten WHERE onderwerp_id = $id ORDER BY datum DESC ";
          $result = $conn->query($sql);
           if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
             echo "<div class='bericht'>";
             echo "<p1>" .$row["gebruikersnaam"]. "</p1>";
             echo "<p>" .$row["tekst"]. "</p>";
             echo "<p2> Geplaatst op: " .$row["datum"]. "</p2><br>";
             echo "<a id='update' href='update.php?id=".$row['id']."''><p5>Bericht Aanpassen<p5></a>";
             echo "<a id='del' href='delete.php?id=" .$row['id']."' onClick=\"return confirm('Weet u zeker dat u dit bericht wilt verwijderen?');\"><p4>Bericht Verwijderen</p4></a>";
             echo "</div>";
           }
       }
           ?>
        </div>
        <div class="maak_posts">
          <h3>Plaats een Bericht</h3>
          <form class="form"  action="" method="post">
            <label for=""></label><br>
            <input type="text" name="bericht" class="put" id="put1" value="" required placeholder="Schrijf hier een nieuw bericht"><br>
            <label for=""></label><br>
            <input type="submit" name="submit" class="put" id="put2" value="Plaats uw bericht"><br>
          </form>
        </div>
     </main>
   </body>
   <script type="text/javascript">

   </script>
 </html>
