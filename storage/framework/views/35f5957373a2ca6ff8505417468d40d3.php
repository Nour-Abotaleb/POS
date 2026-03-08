<li>
    <a href="<?php echo e($link); ?>" wire:navigate
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['flex items-center p-2 text-base text-gray-900 rounded-xl hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700', 'hover:text-gray-800 text-white font-bold bg-gray-700' => $active]); ?>">
        <?php echo $customIcon ?? $icon; ?>

        <span class="ltr:ml-3 rtl:mr-3" sidebar-toggle-item><?php echo e($name); ?></span>
    </a>
</li>
<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\sidebar-menu-item.blade.php ENDPATH**/ ?>