<?php

require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find(\PhpArchDoctrine\Bug::class, (int)$theBugId);
$bug->close();

$entityManager->flush();
