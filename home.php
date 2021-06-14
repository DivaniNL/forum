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
     <script src="https://kit.fontawesome.com/55c7e8bc98.js" crossorigin="anonymous"></script>
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
       </div>
       <div id="nieuwe_onderwerpen" class="block">
         <h2>Nieuwe Onderwerpen</h2>
         <?php
         $sql="SELECT onderwerp from onderwerpen";

         $result = $conn->query($sql);
          if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<div class='onderwerp'>";
            echo "<a href='forum.php'><div class='text'>" .$row['onderwerp']."</div></a>";
            echo "</div>";
          }
      }
          ?>
       </div>
     </main>
   </body>
 </html>
