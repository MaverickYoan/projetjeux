<?php
// Vérifiez si le formulaire a été soumis à l'aide de la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'] ?? ''; // Utilisez ?? '' pour gérer les cas où un champ pourrait être manquant
    $genre = $_POST['genre'] ?? '';
    $platforme = $_POST['platforme'] ?? '';
    $image_url = $_POST['image_url'] ?? '';
    $description = $_POST['description'] ?? '';
    $release_date = $_POST['release_date'] ?? '';
    $developer = $_POST['developer'] ?? '';

    // --- C'est ici que vous ajouteriez généralement du code : --- 
    // 1. Valider les données (par exemple, vérifier si le titre n'est pas vide) 
    // 2. Nettoyer les données pour éviter les problèmes de sécurité (comme l'injection SQL) 
    // 3. Se connecter à votre base de données 
    // 4. Insérer les données du jeu dans une table 
    // 5. Gérer le succès ou l'échec (par exemple, rediriger vers une page de réussite ou afficher une erreur)
    // -------------------------------------------------------

    // À des fins de démonstration, imprimons simplement les données reçues
    echo "<h2>Received Game Data:</h2>";
    echo "<p><strong>Title:</strong> " . htmlspecialchars($title) . "</p>";
    echo "<p><strong>Genre:</strong> " . htmlspecialchars($genre) . "</p>";
    echo "<p><strong>Platforme:</strong> " . htmlspecialchars($platforme) . "</p>";
    echo "<p><strong>Image URL:</strong> " . htmlspecialchars($image_url) . "</p>";
    echo "<p><strong>Description:</strong> " . htmlspecialchars($description) . "</p>";
    echo "<p><strong>Release Date:</strong> " . htmlspecialchars($release_date) . "</p>";
    echo "<p><strong>Developer:</strong> " . htmlspecialchars($developer) . "</p>";

    // Dans une application réelle, vous pouvez rediriger l'utilisateur après une soumission réussie :
    // header("Location: index.php");
    // exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <style>
        /* Basic styling for demonstration */
        body { font-family: sans-serif; }
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Hide scrollbars */
            background: linear-gradient(to bottom,rgb(52, 219, 66), #8e44ad); /* Gradient background */
            color: white;
        }
        /* Animated background stars */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Allow clicks to pass through */
        }
        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: twinkle linear infinite;
        }
        @keyframes twinkle {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }        h1 { text-align: center; color: white; }
        p { text-align: center; }
        a { color: lightblue; }
        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent form background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7);
        }
        button {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover { background-color: #4cae4c; }
    </style>
</head>
<body><!-- Background animé d'étoiles -->
    <div class="stars"></div>
    <h1>Add New Game to Catalog</h1>

    <p><a href="index.php">Back to Catalog</a></p>

    <form action="/add-game" method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre">
        </div>
        <div>
            <label for="platforme">Platforme:</label>
            <input type="text" id="platforme" name="platforme">
        </div>
        <div>
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url">
        </div>
        <div>
            <label for="description">Description:</label>            
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        <div>
            <label for="release_date">Date:</label>
            <input type="date" id="release_date" name="release_date">
        </div>
        <!-- <div>
            <label for="developer">Developer:</label>
            <input type="text" id="developer" name="developer">
        </div> -->
        <div>
            <label for="rating">Note (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5">
        </div>
        <button type="submit">Ajouter jeu</button>
    </form>    
    <!-- Il s'agit d'une structure de base. 
    Une logique côté serveur est nécessaire pour traiter la soumission du formulaire. -->

    <script>
        // JavaScript pour créer des étoiles animées
        const starsContainer = document.querySelector('.stars');
        const numberOfStars = 50;

        for (let i = 0; i < numberOfStars; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.style.top = `${Math.random() * 100}%`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.width = `${Math.random() * 5 + 2}px`;
            star.style.height = star.style.width;
            star.style.animationDuration = `${Math.random() * 3 + 1.5}s`;
            starsContainer.appendChild(star);
        }
    </script>
    </body>
</html>