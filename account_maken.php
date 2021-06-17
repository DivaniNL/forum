<?php
include("connect.php");
include("account_verzenden.php");

if(!empty($_POST)){
    $sfd = setFormData();
}
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
      <div class="welkomBlok">
        <h2>Vul hier uw gegevens in!</h2>
      </div>
      <div class="form-group">
          <label for="gebruikersnaam">Gebruikernaam</label><br>
          <input type="user" name="gebruikersnaam" class="form-control" id="gebruikersnaam" placeholder="Gebruikernaam" required />
        </div>
          <div class="form-group">
              <label for="email">E-mailadres</label><br>
              <input type="email" name="email" class="form-control" id="email" placeholder=" E-mailadres" required />
            </div>
          <div class="form-group">
              <label for="password">Wachtwoord</label><br>
              <input type="password" name="wachtwoord" class="form-control" id="wachtwoord" placeholder=" Wachtwoord " required />
          </div><br>
          <input type="submit" name="submit" value="Account aanmaken" class="bttn">
      </form>
    </main>
  </body>
</html>
