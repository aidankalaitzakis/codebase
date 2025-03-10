<!---

Codebase created by (c) 2025 Aidan Kalaitzakis
https://github.com/aidankalaitzakis/codebase

This work is licensed under the Creative Commons Attribution-NonCommercial 4.0 International License. You may not use this work for commercial purposes. To view a copy of this license, visit http://creativecommons.org/licenses/by-nc/4.0/.

-->

<?php
$codebaseDir = 'codebase/';
if (!is_dir($codebaseDir)) {
    mkdir($codebaseDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['code'])) {
        $name = basename($_POST['name']);
        $code = $_POST['code'];

        $filePath = $codebaseDir . $name . '.txt';

        if (file_put_contents($filePath, $code)) {
            echo json_encode(['message' => 'Snippet uploaded successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error saving snippet']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Name and code are required']);
    }
}
?>
