<?php
// Destroy the currently active session.
session_start();
session_destroy();
header("Location: index.php");
