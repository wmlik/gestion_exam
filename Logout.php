<?php
// Destroy the currently active session.
session_destroy();
header("Location: index.php");