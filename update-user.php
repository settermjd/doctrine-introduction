<?php

require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];

$user = $entityManager->find(\PhpArchDoctrine\User::class, $id);

if ($user === null) {
    echo "User $id does not exist.\n";
    exit(1);
}

$user->setName($newName);

$entityManager->flush();
