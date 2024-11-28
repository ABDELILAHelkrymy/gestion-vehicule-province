<?php

$role = $_SESSION['userrole'] ?? null;
var_dump($role);
if ($role === 'gouv') {
    header('Location: /board');
    exit;
} else {
    header('Location: /vehicule/ajouter');
    exit;
}