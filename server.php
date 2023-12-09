<?php
session_start();

function getAllUsers() {
    if (!isset($_SESSION['allUsers'])) {
        $_SESSION['allUsers'] = [];
    }

    if (isset($_SESSION['user']) && !in_array($_SESSION['user'], $_SESSION['allUsers'])) {
        $_SESSION['allUsers'][] = $_SESSION['user'];
    }

    return $_SESSION['allUsers'];
}

function resetPlaylist() {
    if (isset($_SESSION['playlist'])) {
        unset($_SESSION['playlist']);
    }
}

function addToPlaylist($file) {
    // Przykład - zapisz plik w folderze na serwerze
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        if (!isset($_SESSION['playlist'])) {
            $_SESSION['playlist'] = [];
        }

        // Dodaj ścieżkę do pliku muzycznego do playlisty
        $_SESSION['playlist'][] = $uploadFile;
    } else {
        echo json_encode(['error' => 'Błąd podczas zapisywania pliku.']);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $_SESSION['user'] = $username;
    }

    if (isset($_FILES['file'])) {
        addToPlaylist($_FILES['file']);
    }

    if (isset($_POST['reset'])) {
        resetPlaylist();
    }

    // Zwróć aktualnego użytkownika i playlistę
    $currentUser = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $users = getAllUsers();
    $playlist = isset($_SESSION['playlist']) ? $_SESSION['playlist'] : null;

    // Ustaw nagłówek Content-Type
    header('Content-Type: application/json');

    // Zwróć dane JSON
    echo json_encode(['currentUser' => $currentUser, 'users' => $users, 'playlist' => $playlist]);
} else {
    // Zwróć tylko aktualnego użytkownika i playlistę
    $currentUser = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $users = getAllUsers();
    $playlist = isset($_SESSION['playlist']) ? $_SESSION['playlist'] : null;

    // Ustaw nagłówek Content-Type
    header('Content-Type: application/json');

    // Zwróć dane JSON
    echo json_encode(['currentUser' => $currentUser, 'users' => $users, 'playlist' => $playlist]);
}
?>
