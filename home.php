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
     <link rel="stylesheet" href="css/home.min.css">
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
       <div id="mijn_onderwerpen" class="block">
         <h2>Mijn Onderwerpen</h2>
       </div>
       <div class="mijn_posts">
         <h2>Mijn Posts</h2>
         <?php
         $gebruiker = $_SESSION['login'];
          $sql="SELECT * from berichten WHERE gebruikersnaam = '$gebruiker' ORDER BY datum DESC ";
         $result = $conn->query($sql);
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<div class='bericht'>";
            echo "<p1>" .$row["gebruikersnaam"]. "</p1>";
            echo "<p>" .$row["tekst"]. "</p>";
            echo "<p2> Geplaatst op: " .$row["datum"]. "</p2><br>";
            echo "<a href='forum.php?id=".$row['id']."''><p2>Bekijk Bericht<p2></a>";
            echo "</div>";
          }
      }
          ?>
       </div>
       <div id="nieuwe_onderwerpen" class="block">
         <h2>Nieuwe Onderwerpen</h2>
         <?php
         $sql="SELECT * from onderwerpen ORDER BY datum DESC";

         $result = $conn->query($sql);
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<div class='onderwerp'>";
            echo "<a href='forum.php?id=".$row['id']."''><div class='text'>" .$row['onderwerp']."</div></a>";
            echo "</div>";
          }
      }
          ?>
       </div>
     </main>
   </body>
 </html>
