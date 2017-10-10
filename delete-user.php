<?php

require_once "bootstrap.php";

$id = $argv[1];

$user = $entityManager->find(\PhpArchDoctrine\User::class, $id);

if ($user === null) {
    echo "User $id does not exist.\n";
    exit(1);
}

$entityManager->remove($user);
$entityManager->flush();
