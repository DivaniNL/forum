<?php include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.min.css">
    <title></title>
  </head>
  <body>
    <header>
      <nav>
        <a href="index.php" class="logo"><h1>Forum</h1></a>
      </nav>
    </header>
    <main>
      <form method="post">
        <?php
        if(isset($_POST['submit'])){
          $email = $_POST['email'];
          $wachtwoord= $_POST['wachtwoord'];

          $sql="select * from gebruikers where email='".$email."'AND wachtwoord='".$wachtwoord."' limit 1";

            session_start();

          $result=mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)==1){
            $_SESSION['login'] = "1";
            header('Location: home.php');
            }else {
              echo "<div id='verkeerd'>Uw E-mail of Wachtwoord is verkeerd!</div>";
            }
          }
         ?>
      <div class="welkomBlok">
        <h2>Welkom bij Forum!<br>Heeft u al een account log dan hier in</h2>
      </div>
      <?php  ?>
          <div class="form-group">
              <label for="email">E-mailadres</label><br>
              <input type="email" name="email" class="form-control" id="email" placeholder=" E-mailadres" required />
          <div class="form-group">
              <label for="passwd">Wachtwoord</label><br>
              <input type="password" name="wachtwoord" class="form-control" id="Wachtwoord" placeholder=" Wachtwoord" required />
          </div><br>
          <input type="submit" name="submit" class="bttn" value="Inloggen" id="bttn"/>
            <h2 id="tekst1">Heeft u nog geen account?</h2>
            <h2 id="tekst2">Maak die dan hier aan.</h2>
          <a href="account_maken.php">
            <button type="button" name="button" id="bttn2" class="bttn">Account aanmaken</button>
          </a>
      </form>
    </main>
  </body>
</html>
