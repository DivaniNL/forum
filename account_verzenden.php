<?php
function setFormData(){
  include("connect.php");

  if(isset($_POST['gebruikersnaam']) && $_POST['gebruikersnaam'] != ''){
      $gebruikersnaam = ($_POST['gebruikersnaam']);
  }else{
      echo "Gebruikernaam is verplicht";
  }
  if(isset($_POST['email']) && $_POST['email'] != ''){
      $email = ($_POST['email']);
  }else{
      echo "E-mailadres is verplicht";
  }
  if(isset($_POST['wachtwoord']) && $_POST['wachtwoord'] != ''){
      $wachtwoord = ($_POST['wachtwoord']);
  }else{
      echo "Wachtwoord is verplicht";
  }

  $query1 = $conn->prepare('INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord) VALUES (?,?,?)');
  if ($query1 === false) {
      echo mysqli_error($conn)." - ";

  }
  $query1->bind_param('sss',$gebruikersnaam,$email,$wachtwoord);
  if ($query1->execute() === false) {
      echo mysqli_error($conn)." - ";
      exit(LINE);
  } else {
    header('Location: index.php');
      $query1->close();
  }
}

?>
