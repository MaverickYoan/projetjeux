<?php
require_once "connect.php";

// * Assure PDO connection is established
// Example: $db = new PDO('mysql:host=localhost;dbname=catalogue;charset=utf8', 'username', 'password');
// If connect.php already sets $db, this is not needed.


// * sql CREATE
// $sql = "CREATE DATABASE catalogue";

// * sql SELECT
$sql = "SELECT * FROM catalogue";

// * préparation de la requête sql
$query = $db->prepare($sql);

// * exécution de la requête sql
$query->execute();

// * récupération des données de la requête sql
$catalogue = $query->fetchAll(PDO::FETCH_ASSOC);

// * afficher la table catalogue
// print_r($catalogue);


require "disconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Game Catalog</title>
    <style>
        /* Basic styling for demonstration */
        body { font-family: sans-serif; }
        .game-list { margin-top: 20px; }
        .game-item { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .game-item h3 { margin-top: 0; }
    </style>
    <style>
        /* Underground Camouflage & Illusion Animation Styling */
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        :root {
            --black: #0b0b0b;
            --kaki: #6b8e23;
            /* olive drab green */
            --dark-kaki: #2e3c15;
            --light-kaki: #76ba43;
            --green-glow: #0ee30eaa;
            --text-color: #a5f59f;

            --camouflage-colors: #0b0b0b, #638d0f, #161c0d, #7fce46;
        }

        * {
            box-sizing: border-box;
        }

        h2,
        p,
        span,
        div,
        .img,
        iframe,
        .contact-links,
        .contact-link,
        .social-links {
            animation: linear slide;
            animation-timeline: view();
            animation-range: cover 0 cover 20%
        }

        @keyframes slide {
            from {
                transform: translateY(100%);
                opacity: 0
            }

            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        body {
            margin: 0;
            font-family: 'Share Tech Mono', monospace;
            background: var(--black);
            color: var(--text-color);
            overflow-x: hidden;
            user-select: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            display: flex;
            flex-direction: column;

        }

        /* Camouflage animated illusion background */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background:
                radial-gradient(circle at 20% 30%, rgba(22, 206, 43, 0.8) 25%, transparent 40%),
                radial-gradient(circle at 80% 20%, rgba(35, 49, 10, 0.8) 30%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(106, 255, 0, 0.8) 40%, transparent 60%),
                radial-gradient(circle at 40% 80%, rgba(11, 11, 11, 0.85) 35%, transparent 50%);
            animation: camouflageMove 20s linear infinite alternate;
            filter: contrast(1.2) brightness(0.85);
        }

        @keyframes camouflageMove {
            0% {
                background-position:
                    0% 0%,
                    100% 0%,
                    50% 50%,
                    40% 80%;
            }

            100% {
                background-position:
                    10% 20%,
                    90% 10%,
                    60% 40%,
                    50% 70%;
            }
        }

        /* Header */
        header {
            background: linear-gradient(90deg, var(--dark-kaki), var(--kaki));
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--green-glow);
            box-shadow: 0 0 8px var(--green-glow);
        }

        header h1 {
            margin: 0;
            font-weight: normal;
            font-size: 1.8rem;
            color: var(--green-glow);
            letter-spacing: 2px;
            text-shadow: 0 0 10px #70ff70aa;
        }

        nav {
            display: flex;
            gap: 16px;
        }

        nav button {
            background: transparent;
            border: none;
            padding: 8px 14px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 1rem;
            color: var(--text-color);
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s ease;
            border: 1px solid transparent;
            user-select: none;
        }

        nav button:hover,
        nav button.active {
            background: var(--green-glow);
            color: var(--black);
            border-color: var(--green-glow);
            box-shadow: 0 0 8px var(--green-glow);
        }

        .navbar {
            position: fixed;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000000;
            padding: 0px 20px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }

        .hamburger-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger-menu .bar {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
            transition: 0.4s;
        }

        main {
            flex-grow: 1;
            padding: 24px;
            max-width: 960px;
            margin: 0 auto 24px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 0 15px var(--green-glow);
            min-height: 70vh;
            color: var(--text-color);
        }

        section {
            display: none;
        }

        section.active {
            display: block;
        }

        /* Home page */
        #home h2 {
            font-size: 2rem;
            color: var(--green-glow);
            text-align: center;
            text-shadow: 0 0 10px var(--green-glow);
            margin-top: 0rem;
            margin-bottom: 1rem;
        }

        #home p {
            font-size: 1.1rem;
            line-height: 1.4em;
            max-width: 100%;
            margin: 0 auto;
        }

        #home img {
            margin-left: 5rem;
        }

        /* About */
        #about h2 {
            font-size: 1.8rem;
            border-bottom: 2px solid var(--green-glow);
            margin-bottom: 12px;
            text-align: center;
        }

        #about p {
            max-width: 600px;
            margin: 0 auto;
            font-size: 1rem;
        }

        /* Catalog */

        #catalog,
        main {
            width: 100%;
        }

        #catalog h2 {
            font-size: 1.8rem;
            color: var(--green-glow);
            margin-bottom: 10px;
            text-align: center;
        }

        #catalog-controls {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        #catalog-controls button {
            background-color: var(--dark-kaki);
            border: 1px solid var(--green-glow);
            border-radius: 6px;
            color: var(--text-color);
            padding: 8px 12px;
            cursor: pointer;
            font-family: 'Share Tech Mono', monospace;
            box-shadow: 0 0 6px var(--green-glow);
            transition: background-color 0.3s;
        }

        #catalog-controls button:hover {
            background-color: var(--green-glow);
            color: var(--black);
        }

        #catalog-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 18px;
        }

        .catalog-item {
            background: var(--dark-kaki);
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 0 8px #405020aa;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--text-color);
            user-select: text;
        }

        .catalog-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 8px;
            box-shadow: 0 0 5px var(--green-glow);
        }

        .catalog-item textarea,
        .catalog-item input[type="text"] {
            background: var(--black);
            border: none;
            border-radius: 6px;
            color: var(--green-glow);
            resize: none;
            width: 100%;
            padding: 6px 8px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.9rem;
            box-shadow: 0 0 5px var(--green-glow);
            margin-bottom: 6px;
        }

        .catalog-item textarea {
            height: 60px;
        }

        .catalog-item button {
            background: transparent;
            border: 1px solid var(--green-glow);
            border-radius: 6px;
            color: var(--green-glow);
            cursor: pointer;
            padding: 4px 10px;
            align-self: stretch;
            font-family: 'Share Tech Mono', monospace;
            transition: background-color 0.3s ease;
            margin-top: auto;
        }

        .catalog-item button:hover {
            background: var(--green-glow);
            color: var(--black);
        }

        input[type="file"] {
            display: none;
        }

        label.file-input-label {
            background: var(--dark-kaki);
            border: 1px solid var(--green-glow);
            border-radius: 6px;
            padding: 6px 10px;
            color: var(--text-color);
            cursor: pointer;
            font-family: 'Share Tech Mono', monospace;
            text-align: center;
            box-shadow: 0 0 6px var(--green-glow);
            user-select: none;
            margin: 0 auto;
            display: block;
            width: max-content;
        }

        /* Admin Login */
        #admin h2 {
            color: var(--green-glow);
            margin-bottom: 12px;
            text-align: center;
        }

        .login-form {
            max-width: 320px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: var(--dark-kaki);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px var(--green-glow);
        }

        .login-form label {
            font-size: 0.9rem;
            margin-bottom: 4px;
            color: var(--text-color);
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="number"] {
            padding: 8px;
            border-radius: 6px;
            border: none;
            font-family: 'Share Tech Mono', monospace;
            font-size: 1rem;
            box-shadow: inset 0 0 5px #304010;
            color: var(--green-glow);
            background: var(--black);
        }

        .login-form button {
            padding: 10px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            background: var(--green-glow);
            color: var(--black);
            font-weight: bold;
            font-family: 'Share Tech Mono', monospace;
            box-shadow: 0 0 10px var(--green-glow);
            transition: background-color 0.3s ease;
            user-select: none;
        }

        .login-form button:hover {
            background: var(--light-kaki);
            color: var(--dark-kaki);
            box-shadow: 0 0 15px var(--green-glow);
        }

        .login-status {
            margin-top: 8px;
            font-size: 0.9rem;
            color: var(--green-glow);
            text-align: center;
            min-height: 20px;
        }

        /* Contact */
        /* .contact-links,
        .contact-link,
         {
            display: inline-flex;
            flex-flow: row;
            justify-content: center;
            align-items: center;
        } */
        #liens {
            width: 150px;
        }

        #liens_img {
            border-radius: 50%;
        }

        #liensNb {
            width: 200px;
        }

        #liensNb0 {
            width: 270px;
        }

        #liensNb1 {
            width: 280px;
        }

        #liensNb1 {
            width: 260px;
        }

        .container {
            border: 1px solid green;
        }

        #contact h2 {
            text-align: center;
            color: var(--green-glow);
            margin-bottom: 12px;
        }

        #contact form {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: var(--dark-kaki);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px var(--green-glow);
        }

        #contact label {
            font-size: 0.9rem;
            color: var(--text-color);
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact textarea {
            padding: 8px;
            border-radius: 6px;
            border: none;
            font-family: 'Share Tech Mono', monospace;
            font-size: 1rem;
            box-shadow: inset 0 0 5px #304010;
            color: var(--green-glow);
            background: var(--black);
            resize: vertical;
        }

        #contact textarea {
            min-height: 80px;
        }

        #contact button {
            background: var(--green-glow);
            border: none;
            padding: 10px;
            border-radius: 6px;
            color: var(--black);
            font-weight: bold;
            font-family: 'Share Tech Mono', monospace;
            cursor: pointer;
            box-shadow: 0 0 10px var(--green-glow);
            transition: background-color 0.3s ease;
            user-select: none;
        }

        #contact button:hover {
            background: var(--light-kaki);
            color: var(--dark-kaki);
            box-shadow: 0 0 15px var(--green-glow);
        }

        #social-links {
            max-width: 400px;
            margin: 20px auto 0;
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            user-select: none;
        }

        #social-links a {
            text-decoration: none;
            color: var(--green-glow);
            box-shadow: 0 0 5px var(--green-glow);
            font-size: 1.2rem;
            font-family: 'Share Tech Mono', monospace;
            padding: 6px 8px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        #social-links a:hover {
            background: var(--green-glow);
            color: var(--black);
            box-shadow: 0 0 10px var(--green-glow);
        }

        #projet img {
            width: 100%;
        }

        /* Image management */
        #images h2 {
            color: var(--green-glow);
            margin-bottom: 12px;
            text-align: center;
        }

        #image-upload-label {
            margin: 0 auto 14px;
            display: block;
            width: max-content;
            background: var(--dark-kaki);
            border: 1px solid var(--green-glow);
            border-radius: 6px;
            padding: 8px 14px;
            color: var(--text-color);
            cursor: pointer;
            font-family: 'Share Tech Mono', monospace;
            box-shadow: 0 0 6px var(--green-glow);
            user-select: none;
        }

        #image-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 14px;
            max-width: 600px;
            margin: 0 auto;
        }

        .image-thumb {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 8px #405020aa;
        }

        .image-thumb img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            display: block;
            filter: brightness(0.9);
            transition: filter 0.3s ease;
            user-select: none;
        }

        .image-thumb:hover img {
            filter: brightness(1.1);
        }

        .image-remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            background: var(--black);
            border: none;
            border-radius: 50%;
            color: var(--green-glow);
            width: 24px;
            height: 24px;
            cursor: pointer;
            font-weight: bold;
            font-family: monospace;
            font-size: 1rem;
            user-select: none;
            box-shadow: 0 0 5px var(--green-glow);
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .image-remove-btn:hover {
            opacity: 1;
            box-shadow: 0 0 10px var(--green-glow);
        }

        img {
            display: flex;
            justify-content: center;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 12px 20px;
            background: var(--dark-kaki);
            box-shadow: inset 0 1px 4px #405020cc;
            font-size: 0.9rem;
            color: var(--green-glow);
            user-select: none;
            letter-spacing: 1px;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-kaki);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--green-glow);
            border-radius: 4px;
        }

        @media only screen and (max-width: 600px) and (min-width: 400px) {

            #home img {
                margin-left: 2rem;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
            }

            .nav-links li {
                margin: 10px 0;
                text-align: center;
            }

            .hamburger-menu {
                display: flex;
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger-menu.active .bar:nth-child(1) {
                /* transform: rotate(45deg) translate(5px, 5px); */
                transform: translateY(0px) rotate(-135deg);
            }

            .hamburger-menu.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger-menu.active .bar:nth-child(3) {
                /* transform: rotate(-45deg) translate(5px, -5px); */
                transform: translateY(0px) rotate(135deg);
            }
        }
    </style>

</head>
<body>
    <h1>Video Game Catalog</h1>

    <p><a href="admin_dashboard.php">Dashboard</a></p>
    <p><a href="wink.php">Wink</a></p>
    <p><a href="http://localhost:8080/index.php?route=/sql&pos=0&db=catalogue&table=jeux">SQL Table Jeux</a></p>
    <p><a href="add_game.php">Add New Game</a></p>

    <div class="game-list">
        <h2>Available Games</h2>
        <!-- This section will be populated dynamically with game data -->
        <div class="game-item">
            <img src="placeholder.jpg" alt="Game Image" style="width: 100px; height: auto; float: left; margin-right: 15px;"> <!-- Placeholder for image -->
            <h3>Game Title 1</h3>
            <p>Genre: Action</p>
            <p>Platforme: PC</p>
            <button>Remove</button> <!-- Placeholder for remove action -->
            <div style="clear: both;"></div> <!-- Clear float -->
        </div>
        <div class="game-item">
             <img src="placeholder.jpg" alt="Game Image" style="width: 100px; height: auto; float: left; margin-right: 15px;"> <!-- Placeholder for image -->
            <h3>Game Title 2</h3>
            <p>Genre: RPG</p>
            <p>Platforme: PlayStation</p>
            <button>Remove</button> <!-- Placeholder for remove action -->
             <div style="clear: both;"></div> <!-- Clear float -->
        </div>
        <!-- More game items will be listed here -->
    </div>    <!-- This is a basic structure. Dynamic content and server-side logic are needed for full functionality. -->
</body>
</html>