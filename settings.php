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
     <link rel="stylesheet" href="css/style.min.css">
     <title></title>
   </head>
   <body>
     <header>
       <nav>
         <a href="home.php" class="logo"><h1>Forum</h1></a>
         <a href="settings.php"><i class="fas fa-user-cog" id="settings"></i></a>
         <form class="" action="index.html" method="post">
         </form>
       </nav>
     </header>
     <main>
       <div class="nieuwe_onderwerpen">

       </div>
     </main>
   </body>
 </html>
