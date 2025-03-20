<?php
$servername = "tutorial-db-instance.c1ouky4m05tb.us-east-1.rds.amazonaws.com";
$username = "tutorial_user";
$password = "tutorialDB55%";
$dbname = "ec2_exercise";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados.");
} else {
    echo "<script>console.log('✅ Conexão bem-sucedida com o banco de dados!');</script>";
}
?>
