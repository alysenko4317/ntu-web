<?php
$name = $_GET['name'] ?? 'Guest';
echo "<html>";
echo "<head><title>Greeting</title></head>";
echo "<body>";
echo "<h2>Hello, " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "!</h2>";
echo "</body>";
echo "</html>";
