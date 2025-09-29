<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userMessage = trim($_POST["message"]);
        $quotedString = escapeshellarg($userMessage); // Ensures proper escaping
        $pythonCommand = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'python' : 'python3';
        $command = "$pythonCommand chatBot.py $quotedString";
        $output = shell_exec($command);
        echo $command ? $output : "Sorry, I couldn't process your request.";
    }
?>