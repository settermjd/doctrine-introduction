<?php

require_once "bootstrap.php";

$theUserId = $argv[1];

$dql = sprintf(
    "SELECT b, e, r 
    FROM %s b 
    JOIN b.engineer e 
    JOIN b.reporter r 
    WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) 
    ORDER BY b.created DESC",
    \PhpArchDoctrine\Bug::class
);

$myBugs = $entityManager->createQuery($dql)
    ->setParameter(1, $theUserId)
    ->setMaxResults(15)
    ->getResult();

echo "You have created or are assigned to " . count($myBugs) . " open bugs:\n\n";

foreach ($myBugs as $bug) {
    echo $bug->getId() . " - " . $bug->getDescription()."\n";
}
