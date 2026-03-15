<div class="my-6">
    <!-- 🟡 4. Item Customization Screen -->
    <div x-show="currentScreen === 'item-customization'"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-full"
        class="min-h-screen flex items-center justify-center bg-white relative">
        
        <!-- Loading Overlay -->
        <div wire:loading.delay.shortest class="absolute inset-0 bg-white/80 backdrop-blur-sm z-50 flex items-center justify-center"
            wire:target="selectVariant,toggleSelection,increaseQuantity,decreaseQuantity,addToCartFromCustomization,showItem">
            <div class="flex flex-col items-center space-y-4">
                <div class="relative">
                    <div class="w-16 h-16 border-4 border-skin-base/20 border-t-skin-base rounded-full animate-spin"></div>
                </div>
                <p class="text-gray-600 font-medium"><?php echo e(__('kiosk::modules.customisation.loading') ?? 'Loading...'); ?></p>
            </div>
        </div>

        <div class="w-full max-w-2xl px-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <button @click="currentScreen = 'menu'"
                    class="text-gray-500 hover:text-gray-700 font-medium text-lg transition-colors duration-200">
                ← <?php echo e(__('kiosk::modules.customisation.back_to_menu')); ?>

            </button>
            <h1 class="text-2xl font-bold text-gray-900"><?php echo e(__('kiosk::modules.customisation.customize_item')); ?></h1>
            <div></div>
        </div>

        <!-- Item Details -->
        <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
            <div class="flex items-center space-x-4">
                <img src="<?php echo e($item->item_photo_url); ?>" alt="<?php echo e($item->getTranslatedValue('item_name', session('locale'))); ?>" class="w-20 h-20 rounded-lg object-cover">
                <div>
                    <h2 class="text-xl font-bold text-gray-900"><?php echo e($item->getTranslatedValue('item_name', session('locale'))); ?></h2>
                    <p class="text-gray-600"><?php echo e($item->getTranslatedValue('description', session('locale'))); ?></p>
                    <p class="text-lg font-bold text-gray-900"><?php echo currency_format($item->price, $restaurant->currency_id); ?></p>
                </div>
            </div>
        </div>

        <!-- Customization Options -->
        <div class="space-y-6">
            <!-- Size/Variants -->
           <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->load('variations')->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div wire:key="variation-<?php echo e($variation->id . microtime()); ?>">
                <h3 class="text-lg font-semibold text-gray-900 mb-4"><?php echo e($variation->name); ?></h3>
                <div class="grid grid-cols-1 gap-4">
                    <button wire:click="selectVariant(<?php echo e($variation->id); ?>)"
                            wire:loading.attr="disabled"
                            wire:target="selectVariant"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'p-4 rounded-lg font-medium transition-all duration-200 text-left relative',
                                'bg-skin-base text-white' => $selectedVariant === $variation->id,
                                'bg-gray-100 text-gray-700 hover:bg-gray-200' => $selectedVariant !== $variation->id
                            ]); ?>">
                        <div wire:loading.remove wire:target="selectVariant">
                            <div class="font-bold"><?php echo e($variation->variation); ?></div>
                            <div class="text-sm"><?php echo currency_format($variation->price, $restaurant->currency_id); ?></div>
                        </div>
                        <div wire:loading wire:target="selectVariant" class="flex items-center justify-center space-x-2">
                            <div class="w-4 h-4 border-2 border-current border-t-transparent rounded-full animate-spin"></div>
                            <span class="text-sm"><?php echo e(__('kiosk::modules.customisation.loading') ?? 'Loading...'); ?></span>
                        </div>
                    </button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->load('modifierGroups', 'modifierGroups.options')->modifierGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Add-ons -->
            <div >
                <h3 class="text-lg font-semibold text-gray-900 mb-4"><?php echo e($modifier->name); ?></h3>
                <div class="space-y-3">

                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modifier->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer relative"
                           wire:loading.class="opacity-60 cursor-wait"
                           wire:target="toggleSelection">
                        <div class="flex items-center space-x-3">
                            <!--[if BLOCK]><![endif]--><?php if($option->is_available): ?>
                            <input type="checkbox"  
                                   wire:model="selectedModifiers.<?php echo e($option->id); ?>" 
                                   wire:click="toggleSelection(<?php echo e($modifier->id); ?>, <?php echo e($option->id); ?>)" 
                                   wire:loading.attr="disabled"
                                   wire:target="toggleSelection"
                                   value="<?php echo e($option->id); ?>"
                                   class="w-5 h-5 text-skin-base border-gray-300 rounded focus:ring-skin-base">
                            <?php else: ?>
                            <span class="text-xs font-medium px-2.5 py-0.5 rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                <?php echo app('translator')->get('modules.menu.notAvailable'); ?>
                            </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <div>
                                <div class="font-medium text-gray-900"><?php echo e($option->name); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e($option->price ? currency_format($option->price, $item->branch->restaurant->currency_id) : __('--')); ?></div>
                            </div>
                        </div>
                        <div wire:loading wire:target="toggleSelection" class="absolute right-4">
                            <div class="w-4 h-4 border-2 border-skin-base border-t-transparent rounded-full animate-spin"></div>
                        </div>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->



            <!-- Quantity -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4"><?php echo e(__('kiosk::modules.customisation.quantity')); ?></h3>
                <div class="flex items-center justify-center space-x-6">
                    <button wire:click="decreaseQuantity()"
                            wire:loading.attr="disabled"
                            wire:target="decreaseQuantity"
                            class="w-12 h-12 bg-gray-200 text-gray-700 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg wire:loading.remove wire:target="decreaseQuantity" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                        </svg>
                        <div wire:loading wire:target="decreaseQuantity" class="w-4 h-4 border-2 border-gray-700 border-t-transparent rounded-full animate-spin"></div>
                    </button>
                    <span class="text-3xl font-bold text-gray-900" ><?php echo e($quantity); ?></span>
                    <button wire:click="increaseQuantity()"
                            wire:loading.attr="disabled"
                            wire:target="increaseQuantity"
                            class="w-12 h-12 bg-skin-base text-white rounded-full flex items-center justify-center hover:bg-skin-base transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg wire:loading.remove wire:target="increaseQuantity" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <div wire:loading wire:target="increaseQuantity" class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                    </button>
                </div>
            </div>

            <!-- Total Price -->
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold text-gray-900"><?php echo e(__('kiosk::modules.customisation.total_price')); ?></span>
                    <span class="text-2xl font-bold text-gray-900" ><?php echo currency_format($totalPrice, $restaurant->currency_id); ?></span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4">
                <button wire:click="addToCartFromCustomization" 
                        @click="currentScreen = 'menu'"
                        wire:loading.attr="disabled"
                        wire:target="addToCartFromCustomization"
                        class="flex-1 bg-skin-base text-white py-4 rounded-lg font-bold text-lg hover:bg-skin-base transition-all duration-200 disabled:opacity-75 disabled:cursor-not-allowed flex items-center justify-center space-x-2">
                    <span wire:loading.remove wire:target="addToCartFromCustomization">
                        <?php echo e(__('kiosk::modules.customisation.add_to_cart')); ?>

                    </span>
                    <span wire:loading wire:target="addToCartFromCustomization" class="flex items-center space-x-2">
                        <div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                        <span><?php echo e(__('kiosk::modules.customisation.adding') ?? 'Adding...'); ?></span>
                    </span>
                </button>
                <button @click="currentScreen = 'menu'"
                        wire:loading.attr="disabled"
                        wire:target="addToCartFromCustomization"
                        class="flex-1 border-2 border-gray-300 text-gray-700 py-4 rounded-lg font-medium text-lg hover:bg-gray-50 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    <?php echo e(__('kiosk::modules.customisation.cancel')); ?>

                </button>
            </div>
        </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\script\Modules/Kiosk\Resources/views/livewire/kiosk/item-customisation.blade.php ENDPATH**/ ?>