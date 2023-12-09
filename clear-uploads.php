<?php
$uploadsDirectory = __DIR__ . '/uploads';

if (is_dir($uploadsDirectory)) {
    $files = glob($uploadsDirectory . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

header('Content-Type: application/json');
echo json_encode(['message' => 'Usunięto pliki z folderu uploads']);
?>
