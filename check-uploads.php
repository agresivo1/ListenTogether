<?php
$uploadsFolder = 'uploads';
$exists = is_dir($uploadsFolder);
$isEmpty = !glob($uploadsFolder . '/*');

// Ustaw nagłówek Content-Type
header('Content-Type: application/json');

// Zwróć dane JSON
echo json_encode(['exists' => $exists, 'isNotEmpty' => $isEmpty]);
?>
