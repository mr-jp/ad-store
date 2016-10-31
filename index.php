<?php

include 'Client.php';
include 'Ad.php';
include 'DiscountInterface.php';
include 'Standard.php';
include 'XforY.php';
include 'OrMore.php';

//Initiate some Ads
$classic = new Ad('classic', 'Classic Ad', 269.99, '');
$standout = new Ad('standout', 'Standout Ad', 322.99, '');
$premium = new Ad('premium', 'Premium Ad', 394.99, '');

// Default, should return 987.97
$client = new Client('Default');
$client->order($classic);
$client->order($standout);
$client->order($premium);
$total = $client->calculateTotals();
echo "Default: $total <br>";

// Unilever, should return 934.97
$client = new Client('Unilever');
$client->addDiscount(new XforY(3, 2, $classic));
$client->order($classic);
$client->order($classic);
$client->order($classic);
$client->order($premium);
$total = $client->calculateTotals();
echo "Unilever: $total <br>";

// Apple, should return 1294.96
$client = new Client('Apple');
$client->addDiscount(new Standard(299.99, $standout));
$client->order($standout);
$client->order($standout);
$client->order($standout);
$client->order($premium);
$total = $client->calculateTotals();
echo "Apple: $total <br>";

// Nike, should return 1519.96
$client = new Client('Nike');
$client->addDiscount(new OrMore(379.99, 4, $premium));
$client->order($premium);
$client->order($premium);
$client->order($premium);
$client->order($premium);
$total = $client->calculateTotals();
echo "Default: $total <br>";

// Ford
$client = new Client('Ford');
$client->addDiscount(new XforY(5, 4, $classic));
$client->addDiscount(new Standard(309.99, $standout));
$client->addDiscount(new OrMore(389.99, 3, $premium));
$client->order($classic);
$client->order($classic);
$client->order($classic);
$client->order($classic);
$client->order($classic);
$client->order($standout);
$client->order($premium);
$client->order($premium);
$client->order($premium);
$total = $client->calculateTotals();
echo "Ford: $total <br>";
