<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $id= $_GET['id'];
  //requête de suppression
  $query = "DELETE FROM module WHERE module_id = $id" ;
  $req = mysqli_query($con , $query );
  //redirection vers la page index.php
  header("Location:index.php")
?>