<?php
  
$conexiune=mysqli_connect("localhost:3306", "imitrache", "6711", "imitrache") or die("Conexiunea nu s-a putut realiza");

if($_SERVER["REQUEST_METHOD"] == "POST"){
 $param_nume=$_POST["nume"];
  $param_email=$_POST["email"];
     $param_subiect=$_POST["subiect"];
     $param_mesaje=$_POST["mesaj"];
    
    $sql = "INSERT INTO mesaje (nume, email, subiect, mesaj) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conexiune, $sql))
        {
 
            mysqli_stmt_bind_param($stmt, "ssss", $param_nume, $param_email, $param_subiect, $param_mesaje);

            if(mysqli_stmt_execute($stmt))
                header("location: ../contact.html");
           else
                echo "Ceva nu funcționează. Reveniți mai târziu!";
            
        mysqli_stmt_close($stmt);
		}
    }
 

    mysqli_close($conexiune);



?>
