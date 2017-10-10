<?php

require_once "bootstrap.php";

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(",", $argv[3]);

$reporter = $entityManager->find(\PhpArchDoctrine\User::class, $reporterId);
$engineer = $entityManager->find(\PhpArchDoctrine\User::class, $engineerId);

if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the given id(s).\n";
    exit(1);
}

$bug = new \PhpArchDoctrine\Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new \DateTime("now"));
$bug->setStatus("OPEN");

foreach ($productIds as $productId) {
    $product = $entityManager->find(\PhpArchDoctrine\Product::class, $productId);
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: " . $bug->getId() . "\n";
