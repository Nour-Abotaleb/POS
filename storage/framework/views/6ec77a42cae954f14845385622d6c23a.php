<?php if($fetchSetting && $fetchSetting->supported_until): ?>

<?php $supportDate = \Carbon\Carbon::parse($fetchSetting->supported_until) ?>



<?php if($supportDate->isPast()): ?>
    <span>Your support has been expired on <b><?php echo e($supportDate->translatedFormat('d M, Y')); ?></b>
        <?php if($supportDate->isYesterday()): ?>
            (Yesterday)
        <?php endif; ?>
    </span>
    <br>
<?php else: ?>
    <span>Your support will expire on <b><?php echo e($supportDate->translatedFormat('d M, Y')); ?></b>
        <?php if($supportDate->isToday()): ?>
            (Today)
        <?php elseif($supportDate->isTomorrow()): ?>
            (Tomorrow)
        <?php endif; ?>
    </span>
    <?php if((int)now()->diffInDays($supportDate) < 90): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('support-date-modal');

$__html = app('livewire')->mount($__name, $__params, 'lw-2203345069-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>



<?php /**PATH C:\xampp\htdocs\script\resources\views\custom-modules\sections\support-date.blade.php ENDPATH**/ ?>