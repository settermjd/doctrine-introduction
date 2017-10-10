<?php

require_once "bootstrap.php";

$dql = sprintf(
    "SELECT p.id, p.name, count(b.id) AS openBugs 
    FROM %s b 
    JOIN b.products p 
    WHERE b.status = 'OPEN' 
    GROUP BY p.id",
    \PhpArchDoctrine\Bug::class
);
$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach ($productBugs as $productBug) {
    echo $productBug['name']." has " . $productBug['openBugs'] . " open bugs!\n";
}
