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
         <a href="home.php" class="logo"><h1>Home</h1></a>
         <?php
         $gebruikersnaam = $_SESSION['login'];
         echo "<div id='settings'><p3>Hallo $gebruikersnaam</p3></div>";?>
         <!--<a href="onderwerpen.php" class="logo" id="onder"><h1>Onderwerpen</h1></a>-->
       </nav>
     </header>
     <main>
       <div id="mijn_onderwerpen" class="block">
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
            echo "<a id='bekijk' href='forum.php?id=".$row['onderwerp_id']."''><p2>Bericht Bekijken<p2></a>";
            echo "<a id='update' href='update.php?id=".$row['id']."''><p5>Bericht Aanpassen<p5></a><br>";
            echo "<a id='del' href='delete.php?id=" .$row['id']."' onClick=\"return confirm('Weet u zeker dat u dit bericht wilt verwijderen?');\"><p2>Bericht Verwijderen</p2></a>";
            echo "</div>";
          }
      }
          ?>
        </div>
       <div id="nieuwe_onderwerpen" class="block">
         <h2>Instellingen</h2>

       </div>
     </main>
   </body>
   <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
 </html>
