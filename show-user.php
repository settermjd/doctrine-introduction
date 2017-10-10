<?php

require_once "bootstrap.php";

$id = $argv[1];
$user = $entityManager->find(\PhpArchDoctrine\User::class, $id);

if ($user === null) {
    echo "No user found.\n";
    exit(1);
}

/** @var \PhpArchDoctrine\User $user */
printf("%d - %s\n", $user->getId(), $user->getName());
