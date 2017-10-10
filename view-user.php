<?php

require_once "bootstrap.php";

$userRepository = $entityManager->getRepository(\PhpArchDoctrine\User::class);
$users = $userRepository->findBy(
    ["name" => "Matthew Setter"], ["name" => "asc"], 5, 0
);

/**
 * @var \PhpArchDoctrine\User $user
 */
foreach ($users as $user) {
    printf("%d - %s\n", $user->getId(), $user->getName());
}
