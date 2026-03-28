<?php

// كود لتصحيح السعرات من الوصف للعميد الجديد
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;

echo "🚀 Starting data migration...\n";

$count = 0;
MenuItem::all()->each(function($item) use (&$count) {
    // البحث عن أرقام بجانبها كلمة CAL في الوصف
    if (preg_match("/([0-9.]+)\s*CAL/i", (string)$item->description, $matches)) {
        $item->calories = $matches[1];
        $item->save();
        echo "✅ Updated Product: {$item->name} -> {$matches[1]} CAL\n";
        $count++;
    }
});

echo "\n✨ Migration finished! Updated {$count} products.\n";
