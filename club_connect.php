<?php
    $configuredDbPath = getenv('CLUB_PANDA_DB_PATH');
    $defaultDbPath = dirname(__DIR__) . '/clubpanda.sqlite';
    $legacyDbPath = __DIR__ . '/clubpanda.sqlite';
    $dbPath = $configuredDbPath ?: (file_exists($defaultDbPath) ? $defaultDbPath : $legacyDbPath);

    $db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE);
?>
