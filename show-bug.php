<?php

require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find(\PhpArchDoctrine\Bug::class, (int)$theBugId);

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
