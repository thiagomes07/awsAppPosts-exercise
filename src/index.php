<?php
include('config.php');

// Inserir um novo post
$successMessage = ''; // Variável para armazenar a mensagem de sucesso

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['description']) && isset($_POST['autor'])) {
        $description = $_POST['description'];
        $autor = $_POST['autor'];

        // Inserir o novo post no banco de dados
        $sql = "INSERT INTO posts (description, autor) VALUES ('$description', '$autor')";
        if ($conn->query($sql) === TRUE) {
            $successMessage = "Novo post criado com sucesso!";
            // Redirecionar para evitar o reenvio do formulário ao dar reload na página
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete_all_posts'])) {
        // Limpar todos os posts
        $sql = "DELETE FROM posts";
        if ($conn->query($sql) === TRUE) {
            $successMessage = "Todos os posts foram removidos!";
            // Redirecionar para refletir a mudança após a exclusão
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Erro ao excluir os posts: " . $conn->error;
        }
    }
}

// Exibir todos os posts
$sql = "SELECT id, description, autor, data_criacao FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação de Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1{
            margin-top: -10px;
        }
        .container {
            width: 50%;
            max-height: 80vh;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .posts-container {
            flex: 1;
            overflow-y: auto;
            background: #f7f7f7;
            max-height: 50vh;
            padding-right: 10px;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
        }
        .post h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .post p {
            margin: 5px 0;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-top: 15px;
        }
        input, textarea {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #218838;
        }
        
        /* Toast Message Style */
        .toast {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Posts</h1>

        <!-- Toast Message -->
        <?php if ($successMessage): ?>
        <div id="toast" class="toast"><?= $successMessage ?></div>
        <?php endif; ?>

        <!-- Container rolável para os posts -->
        <div class="posts-container">
            <?php if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                    <div class="post">
                        <h3>ID: <?= $row['id'] ?> | <?= $row['autor'] ?> - <?= $row['data_criacao'] ?></h3>
                        <p><?= $row['description'] ?></p>
                    </div>
                <?php } 
            } else {
                echo "<p>Nenhum post encontrado.</p>";
            } ?>
        </div>

        <h2>Criar novo post</h2>
        <!-- Formulário para criar novo post -->
        <form method="POST" action="">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" required>
            
            <label for="description">Descrição:</label>
            <textarea name="description" rows="4" cols="50" required></textarea>
            
            <button type="submit">Salvar Post</button>
        </form>

        <!-- Botão para excluir todos os posts -->
        <form method="POST" action="">
            <button type="submit" name="delete_all_posts" style="background-color: #dc3545;">Excluir Todos os Posts</button>
        </form>
    </div>

    <script>
        // Exibe a toast message e a remove após 3 segundos
        <?php if ($successMessage): ?>
        var toast = document.getElementById("toast");
        toast.style.display = "block";
        setTimeout(function() {
            toast.style.display = "none";
        }, 3000); // A toast vai desaparecer após 3 segundos
        <?php endif; ?>
    </script>
</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
