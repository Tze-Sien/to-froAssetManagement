
<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/assetmanagementforward-firebase-adminsdk-1dehw-91fb6b1663.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://assetmanagementforward.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();
?>