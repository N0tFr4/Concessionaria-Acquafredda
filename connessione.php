<?php    
$host   = "localhost"; 
$username = "root"; 
$password = ""; 
$db_nome = "concessionaria"; 

$conn = new mysqli($host, $username, $password, $db_nome);    
if ($conn->connect_errno) {       
    echo "Impossibile connettersi al server:  " . $conn->connect_error . "\n"; 
    exit;    
}
?> 