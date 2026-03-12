<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('menu.menu-items', ['search' => $search]);

$__html = app('livewire')->mount($__name, $__params, 'menu-item', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/menu/menu-items-content.blade.php ENDPATH**/ ?>