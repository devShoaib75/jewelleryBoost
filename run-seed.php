<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

// Run the seeder
$seeder = new Database\Seeders\AdminSeeder();
$seeder->run();

echo "Seeding completed!\n";
