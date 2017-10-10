<?php

require_once "bootstrap.php";

$userRepository = $entityManager->getRepository(\PhpArchDoctrine\User::class);
$users = $userRepository->findAll();

/**
 * @var \PhpArchDoctrine\User $user
 */
foreach ($users as $user) {
    printf("%d - %s\n", $user->getId(), $user->getName());
}
