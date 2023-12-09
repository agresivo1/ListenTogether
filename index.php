<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
    <link rel="stylesheet" href="style.css"> <!-- Dodaj swój plik stylów CSS -->
    
</head>

<body>
    <?php
    $pageTitle = 'ListenTogether';
    $customContent = '<div id="user-input">
        <label for="username">Podaj swoją nazwę:</label>
        <input type="text" id="username" />
        <button onclick="submitUsername()">Prześlij nazwę użytkownika</button>
    </div>
    <div id="users-panel">
        <!-- Panel użytkowników -->
    </div>
    <div id="video-panel">
        <!-- Panel wideo -->
    </div>
    <div id="playlist-panel">
        <!-- Panel filmów -->
        <h2>Playlista</h2>
        <button onclick="showAddToPlaylistForm()">Dodaj do playlisty</button>
        <ul id="playlist"></ul>
    </div>
    <div id="add-to-playlist-form" style="display: none;">
        <label for="fileInput">Wybierz plik muzyczny:</label>
        <input type="file" id="fileInput" accept=".mp3, .wav, .ogg" />
        <button onclick="addToPlaylist()">Dodaj</button>
    </div>
    <button onclick="resetSessionAndPlaylist()">Zresetuj playlistę</button>
    <!-- Dostępne playlisty -->
    <div id="available-playlists">
        <h2>Dostępne playlisty</h2>
        <!-- Przykładowa playlista -->
        <div class="playlist-item" onclick="playVideoo(\'playlist/◖07◗ Japanese songs you need to have in your playlist.mp4\')">

            <img src="playlist1.jpg" alt="Playlist 1">
            <span>◖07◗ Japanese songs you need to have in your playlist</span>
            <button onclick="playVideoo(\'playlist/◖07◗ Japanese songs you need to have in your playlist.mp4\')">Odtwórz</button>
        </div>
    </div>

    <!-- Dostępne piosenki -->
    <div id="available-songs">
        <h2>Dostępne piosenki</h2>
        <!-- Przykładowa piosenka -->
        <div class="songs-item" onclick="playSongs(\'songs/(Kokoronashi)┃Cover by Raon Lee-(1080p).mp4\')">

            <img src="song1.jpg" alt="Song 1">
            <span>(Kokoronashi)┃Cover by Raon Lee-(1080p)</span>
            <button onclick="playVideoo(\'playlist/(Kokoronashi)┃Cover by Raon Lee-(1080p).mp4\')">Odtwórz</button>
        </div>
    </div>


    <script src="sw.js"></script>
    <script>
        document.getElementById("resetButton").addEventListener("click", resetSessionAndPlaylist);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Tutaj dodaj kod sprawdzający dostępność funkcji resetSessionAndPlaylist
            if (typeof resetSessionAndPlaylist === "function") {
                console.log("Funkcja resetSessionAndPlaylist jest dostępna globalnie.");
            } else {
                console.error("Funkcja resetSessionAndPlaylist nie jest dostępna globalnie.");
            }
        });
    </script>';

    include 'template.php';
    ?>
</body>

</html>
