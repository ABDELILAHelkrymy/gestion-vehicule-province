<?php

$role = $_SESSION['userrole'] ?? null;
var_dump($role);
header('Location: /board');