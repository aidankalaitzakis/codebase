<!---

Codebase created by (c) 2025 Aidan Kalaitzakis
https://github.com/aidankalaitzakis/codebase

This work is licensed under the Creative Commons Attribution-NonCommercial 4.0 International License. You may not use this work for commercial purposes. To view a copy of this license, visit http://creativecommons.org/licenses/by-nc/4.0/.

-->

<?php
$codebaseDir = 'codebase/';

if (isset($_GET['name'])) {
    $name = basename($_GET['name']);
    $filePath = $codebaseDir . $name . '.txt';

    if (file_exists($filePath)) {
        $code = file_get_contents($filePath);
        echo json_encode(['name' => $name, 'code' => $code]);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Snippet not found']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Name parameter is required']);
}
?>
