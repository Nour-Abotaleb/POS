<div>
    <div class="p-4 bg-white block sm:flex items-center justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo app('translator')->get('modules.menu.allMenus'); ?></h1>
            </div>
            <div class="items-center justify-between block sm:flex">
                <div class="flex items-center mb-4 sm:mb-0">
                    <form class="pe-3" action="#" method="GET">
                        <label for="products-search" class="sr-only">Search</label>
                        <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'menu_name','class' => 'block mt-1 w-full','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenus')).'','wire:model.live.debounce.500ms' => 'search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'menu_name','class' => 'block mt-1 w-full','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenus')).'','wire:model.live.debounce.500ms' => 'search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>
                    </form>
                </div>
                <div class="inline-flex gap-x-4 mb-4 sm:mb-0">
                <?php if (isset($component)) { $__componentOriginala6c1b2378c7a756a2b58951b1494d68f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-link','data' => ['href' => ''.e(route('menu-items.entities.sort')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('menu-items.entities.sort')).'']); ?>
                    <?php echo app('translator')->get('modules.menu.sortMenuItems'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $attributes = $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__attributesOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f)): ?>
<?php $component = $__componentOriginala6c1b2378c7a756a2b58951b1494d68f; ?>
<?php unset($__componentOriginala6c1b2378c7a756a2b58951b1494d68f); ?>
<?php endif; ?>

                <!--[if BLOCK]><![endif]--><?php if(user_can('Create Menu')): ?>
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-drawer-target' => 'drawer-create-product-default','data-drawer-show' => 'drawer-create-product-default','aria-controls' => 'drawer-create-product-default','data-drawer-placement' => 'right','id' => 'createProductButton']); ?><?php echo app('translator')->get('modules.menu.addMenu'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col my-4 px-4">
        <!-- Card Section: server-driven selection only (single source of truth, no jump on late responses) -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- Card -->
            <a
            wire:key="menu-<?php echo e($item->id); ?>"
            href="javascript:;"
            wire:click="showMenuItems(<?php echo e($item->id); ?>)"
            wire:loading.class.delay="opacity-60"
            wire:target="showMenuItems"
            style="<?php echo e($menuId == $item->id ? 'background-color: var(--brand-primary); border-color: var(--brand-primary);' : ''); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'group flex flex-col border shadow-sm rounded-lg hover:shadow-md transition dark:bg-gray-700 dark:border-gray-600',
                'bg-white dark:bg-gray-700' => $menuId != $item->id,
            ]); ?>">
                <div class="p-3">
                    <div class="flex items-center">
                        <div class="bg-gray-100 p-2 rounded-md">

                            <svg class="flex-shrink-0 size-5 text-gray-800 dark:text-neutral-200" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 409.221 409.221" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 409.221 409.221">
                                <path d="m387.059,389.218h-14.329v-18.114h14.327c5.523,0 10-4.477 10-10 0-55.795-42.81-101.781-97.305-106.843v-17.29c0-5.523-4.477-10-10-10s-10,4.477-10,10v17.29c-54.496,5.062-97.305,51.048-97.305,106.843 0,5.523 4.477,10 10,10h14.327v18.114h-14.327c-5.523,0-10,4.477-10,10s4.477,10 10,10h24.13c0.131,0.003 0.262,0.003 0.393,0h145.564c0.065,0.001 0.131,0.002 0.196,0.002s0.131,0 0.196-0.002h24.133c5.523,0 10-4.477 10-10s-4.478-10-10-10zm-34.33,0h-125.957v-18.114h125.957v18.114zm-149.714-38.113c4.978-43.447 41.978-77.305 86.736-77.305s81.758,33.858 86.736,77.305h-173.472zm-71.385-253.799c-29.383,1.42109e-14-52.4,16.809-52.4,38.267 0,21.457 23.017,38.265 52.4,38.265 29.383,0 52.399-16.808 52.399-38.265 0-21.459-23.016-38.267-52.399-38.267zm0,56.531c-19.094,0-32.4-9.625-32.4-18.265 0-8.64 13.306-18.267 32.4-18.267 19.093,0 32.399,9.627 32.399,18.267 0,8.639-13.306,18.265-32.399,18.265zm23.553,235.383h-123.021v-320.568h198.936v166.52c0,5.523 4.477,10 10,10s10-4.477 10-10v-176.52c0-5.523-4.477-10-10-10h-4.701v-38.652c0-2.858-1.223-5.58-3.36-7.478-2.137-1.897-4.984-2.789-7.822-2.452l-204.236,24.327c-5.03,0.599-8.817,4.864-8.817,9.93v364.893c0,5.523 4.477,10 10,10h133.021c5.523,0 10-4.477 10-10s-4.477-10-10-10zm-123.021-346.014l184.235-21.944v27.391h-184.235v-5.447zm82.627,317.362c-5.523,0-10-4.477-10-10s4.477-10 10-10h33.681c5.523,0 10,4.477 10,10s-4.477,10-10,10h-33.681z"/>
                            </svg>

                        </div>

                        <div class="grow ms-5">
                            <h3 class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'font-semibold dark:group-hover:text-neutral-400 dark:text-neutral-200',
                                'text-white' => $menuId == $item->id,
                                'text-gray-800 group-hover-text-theme' => $menuId != $item->id,
                            ]); ?>">
                                <?php echo e($item->menu_name); ?>

                            </h3>
                            <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'text-sm dark:text-gray-300',
                                'text-gray-100' => $menuId == $item->id,
                                'text-gray-500' => $menuId != $item->id,
                            ]); ?>">
                                <?php echo e($item->items_count); ?> <?php echo app('translator')->get('modules.menu.item'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span class="dark:text-gray-400"><?php echo app('translator')->get('messages.noMenuAdded'); ?></span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </div>
        <!-- End Card Section -->


        <!--[if BLOCK]><![endif]--><?php if($menuItems && $this->activeMenu): ?>
        <div class="w-full">
            <div class="my-4 flex items-center gap-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo e($this->activeMenu->menu_name); ?></h1>

                <!--[if BLOCK]><![endif]--><?php if(user_can('Update Menu')): ?>
                <?php if (isset($component)) { $__componentOriginal23a929514ef7d57034cc7b8bddc2b226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a929514ef7d57034cc7b8bddc2b226 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button-table','data' => ['wire:click' => 'showEditMenu('.e($this->activeMenu->id).')','wire:key' => 'editmenu-button-'.e($this->activeMenu->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showEditMenu('.e($this->activeMenu->id).')','wire:key' => 'editmenu-button-'.e($this->activeMenu->id).'']); ?>
                    <svg class="w-4 h-4 me-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <?php echo app('translator')->get('app.update'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a929514ef7d57034cc7b8bddc2b226)): ?>
<?php $attributes = $__attributesOriginal23a929514ef7d57034cc7b8bddc2b226; ?>
<?php unset($__attributesOriginal23a929514ef7d57034cc7b8bddc2b226); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a929514ef7d57034cc7b8bddc2b226)): ?>
<?php $component = $__componentOriginal23a929514ef7d57034cc7b8bddc2b226; ?>
<?php unset($__componentOriginal23a929514ef7d57034cc7b8bddc2b226); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if(user_can('Delete Menu')): ?>
                <?php if (isset($component)) { $__componentOriginal0c3cd59628568adb72d0e419d6abdcc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button-table','data' => ['wire:click' => '$toggle(\'confirmDeleteMenuModal\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'confirmDeleteMenuModal\')']); ?>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6)): ?>
<?php $attributes = $__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6; ?>
<?php unset($__attributesOriginal0c3cd59628568adb72d0e419d6abdcc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c3cd59628568adb72d0e419d6abdcc6)): ?>
<?php $component = $__componentOriginal0c3cd59628568adb72d0e419d6abdcc6; ?>
<?php unset($__componentOriginal0c3cd59628568adb72d0e419d6abdcc6); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>

            <!--[if BLOCK]><![endif]--><?php if(user_can('Show Menu Item')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('menu.menu-items', ['menuID' => $menuId,'defer' => true]);

$__html = app('livewire')->mount($__name, $__params, 'menu-item-' . $menuId, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>


    <?php if (isset($component)) { $__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.right-modal','data' => ['wire:model' => 'showEditMenuModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('right-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'showEditMenuModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo e(__("modules.menu.editMenuItem")); ?>

         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <!--[if BLOCK]><![endif]--><?php if($this->editingMenu): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.editMenu', ['activeMenu' => $this->editingMenu]);

$__html = app('livewire')->mount($__name, $__params, 'edit-menu-'.$this->editingMenuId, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$set(\'showEditMenuModal\', false)','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'showEditMenuModal\', false)','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.close')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13)): ?>
<?php $attributes = $__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13; ?>
<?php unset($__attributesOriginal2b7129b9a6e7f6a1be2b5d072517af13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13)): ?>
<?php $component = $__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13; ?>
<?php unset($__componentOriginal2b7129b9a6e7f6a1be2b5d072517af13); ?>
<?php endif; ?>

    <!--[if BLOCK]><![endif]--><?php if($this->activeMenu): ?>
    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => ['wire:model' => 'confirmDeleteMenuModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmDeleteMenuModal']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo app('translator')->get('modules.menu.deleteMenu'); ?>?
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <?php echo app('translator')->get('modules.menu.deleteMenuMessage'); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'confirmDeleteMenuModal\')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'confirmDeleteMenuModal\')','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.cancel')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'deleteMenu('.e($this->activeMenu->id).')','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'deleteMenu('.e($this->activeMenu->id).')','wire:loading.attr' => 'disabled']); ?>
                <?php echo e(__('app.delete')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/menu/menus.blade.php ENDPATH**/ ?>