<div>
    <div class="flex flex-col">
        <div class="flex gap-4 mb-4">
            <img class="w-16 h-16 rounded-md object-cover" src="<?php echo e($menuItem->item_photo_url); ?>" alt="<?php echo e($menuItem->item_name); ?>">
            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                <div class="text-base font-semibold text-gray-900 dark:text-white inline-flex items-center">
                    <img src="<?php echo e(asset('img/'.$menuItem->type.'.svg')); ?>" class="h-4 mr-2"
                        title="<?php echo app('translator')->get('modules.menu.' . $menuItem->type); ?>" alt="" />
                    <?php echo e($menuItem->item_name); ?>

                </div>
                <div class="text-sm font-normal text-gray-500 dark:text-gray-400"><?php echo e($menuItem->description); ?></div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    <?php echo app('translator')->get('modules.menu.itemName'); ?>
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-right">
                                    <?php echo app('translator')->get('app.action'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700"
                            wire:key='menu-item-list-<?php echo e(microtime()); ?>'>

                            <?php $__currentLoopData = $menuItem->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(!isset($orderItemQty[$item->menu_item_id . '_' . $item->id]) || (isset($orderItemQty[$item->menu_item_id . '_' . $item->id]) && $orderItemQty[$item->menu_item_id . '_' . $item->id] == 0)) continue; ?>

                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700"
                                wire:key='menu-item-<?php echo e($item->menu_item_id . '_' . $item->id . microtime()); ?>'>
                                <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        <div class="text-base text-gray-900 dark:text-white inline-flex items-center">
                                            <?php echo e($item->variation); ?>

                                        </div>
                                    </div>
                                </td>

                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-right">
                                    <div class="relative flex items-center max-w-24 mx-auto" wire:key='orderItemQty-<?php echo e($item->id); ?>-counter'>
                                        <button type="button"
                                        wire:click="$dispatch('subQty', { id: <?php echo e('"' . $item->menu_item_id . '_' . $item->id . '"'); ?> })"
                                        class="bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-md p-3 h-8">
                                            <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        
                                        <input type="text" wire:model='orderItemQty.<?php echo e($item->menu_item_id . '_' . $item->id); ?>' class="min-w-10 bg-white border-x-0 border-gray-300 h-8 text-center text-gray-900 text-sm  block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " value="1" readonly  />
                    
                                        <button type="button"
                                        wire:click="$dispatch('addQty', { id: <?php echo e('"' . $item->menu_item_id . '_' . $item->id . '"'); ?> })"
                                        class="bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-md p-3 h-8 ">
                                            <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\shop\cart-item-variations.blade.php ENDPATH**/ ?>