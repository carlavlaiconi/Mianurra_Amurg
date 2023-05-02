<?php
  
$conexiune=mysqli_connect("localhost:3306", "imitrache", "6711", "imitrache") or die("Nu s-a putut realiza conexiuniea");
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $param_nume=$_POST["nume"];
  $param_email=$_POST["email"];
     $param_telefon=$_POST["telefon"];
     $param_data=$_POST["data"];
    $param_nopti=$_POST["nopti"];
  $param_persoane=$_POST["nr_pers"];
     $param_mesaje=$_POST["mesaj"];

    $sql = "INSERT INTO rezervare (nume, email, telefon, data, nopti, nr_pers, mesaj) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($conexiune, $sql)){
     mysqli_stmt_bind_param($stmt, "sssssss", $param_nume, $param_email, $param_telefon, $param_data, $param_nopti, $param_persoane, $param_mesaje);
        
          if(mysqli_stmt_execute($stmt))
              echo "Rezervare initiata";
         else
                echo "Întâmpinăm probleme tehnice, vă rugăm să reveniți!";
        
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($conexiune);
    
    
?>