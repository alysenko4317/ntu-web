<?php

require_once __DIR__ . '/includes/session.php';

logoutUser();

header('Location: login.php?logout=1');
exit;
