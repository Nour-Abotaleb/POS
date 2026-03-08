<?php
    $now = \Carbon\Carbon::now();
    $color = 'text-gray-500';
    $isToday = false;

    if ($date?->isToday()) {
        $color = 'text-green-600';
        $isToday = true;
    } elseif ($date?->isYesterday()) {
        $color = 'text-blue-800';
    } elseif ($date?->diffInDays($now) < 7) {
        $color = 'text-yellow-600';
    } elseif ($date?->diffInDays($now) < 30) {
        $color = 'text-orange-500';
    }

    // Format date - hide year if it's current year and add ordinal suffix
    $day = $date?->translatedFormat('j'); // Day without leading zero
    $month = $date?->translatedFormat('M');
    $year = $date?->translatedFormat('Y');

    // Add ordinal suffix
    $ordinal = '';
    if ($day >= 11 && $day <= 13) {
        $ordinal = 'th';
    } else {
        switch ($day % 10) {
            case 1: $ordinal = 'st'; break;
            case 2: $ordinal = 'nd'; break;
            case 3: $ordinal = 'rd'; break;
            default: $ordinal = 'th'; break;
        }
    }

    $dateFormat = $date?->year === $now->year ? "{$day}<sup>{$ordinal}</sup> {$month}" : "{$day}<sup>{$ordinal}</sup> {$month} {$year}";
?>

<?php if($date): ?>
    <?php if(!$isToday): ?>
        <span class="<?php echo e($color); ?> text-xs"><?php echo $dateFormat; ?></span>
    <?php endif; ?>
    <?php if($isToday): ?>
        <span class="<?php echo e($color); ?> text-xs"><?php echo e($date?->translatedFormat('h:i A')); ?></span>
    <?php endif; ?>
    <p class="text-[11px] text-gray-400"><?php echo e($date?->diffForHumans(short:true)); ?></p>
<?php else: ?>
    -
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views\common\date-display.blade.php ENDPATH**/ ?>