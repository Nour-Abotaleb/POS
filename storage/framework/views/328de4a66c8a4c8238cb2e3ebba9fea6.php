<div>
    <!-- 🟡 5. Cart Summary & Customer Information -->
    <div x-show="currentScreen === 'customer-info'" 
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full"
            x-init="
                $watch('currentScreen', (value) => {
                    if (value === 'customer-info') {
                        $wire.dispatch('refreshCartSummary');
                    }
                });
            "
            class="min-h-screen flex items-center justify-center bg-white">
        <div class="w-full max-w-6xl px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php echo e(__('kiosk::modules.cart.order_summary')); ?></h1>
                <p class="text-xl text-gray-600"><?php echo e(__('kiosk::modules.cart.order_summary_help')); ?></p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Order Summary -->
                <div class="bg-white border border-gray-200 rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        <?php echo e(__('kiosk::modules.cart.your_order')); ?>

                        <span class="text-gray-500 ml-2">(<?php echo e($cartCount); ?> <?php echo e(__('kiosk::modules.cart.items_suffix')); ?>)</span>
                    </h2>
                    
                    <!-- Cart Items -->
                    <div class="space-y-4 mb-8 ">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $cartItemList['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg" wire:key="cart-item-<?php echo e($item['id']); ?>">
                                <div class="flex items-center space-x-4">
                                    <img src="<?php echo e($item['menu_item']['image_url']); ?>" 
                                         alt="<?php echo e($item['menu_item']['name']); ?>" 
                                         class="w-16 h-16 rounded-lg object-cover">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 text-lg"><?php echo e($item['menu_item']['name']); ?></h4>
                                        <div class="text-sm text-gray-600">
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($item['variation'])): ?>
                                                <span><?php echo e($item['variation']['name']); ?> • </span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($item['modifiers']) && count($item['modifiers']) > 0): ?>
                                                <span>
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($modifier['name']); ?><!--[if BLOCK]><![endif]--><?php if(!$loop->last): ?>, <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                    • 
                                                </span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                        
                                        <!-- Tax Information for Item Level -->
                                        <!--[if BLOCK]><![endif]--><?php if($taxMode === 'item' && !empty($item['tax_amount']) && $item['tax_amount'] > 0): ?>
                                            <div class="text-xs text-gray-500 mt-1">
                                                <?php echo e(__('kiosk::modules.cart.base')); ?>: <?php echo currency_format($item['display_price'], $restaurant->currency_id); ?>

                                                <!--[if BLOCK]><![endif]--><?php if(!empty($item['tax_breakup'])): ?>
                                                    | <?php echo e(__('kiosk::modules.cart.tax')); ?>: 
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item['tax_breakup']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($taxName); ?> <?php echo currency_format($taxInfo['amount'], $restaurant->currency_id); ?><!--[if BLOCK]><![endif]--><?php if(!$loop->last): ?>, <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-gray-900 text-lg"><?php echo currency_format($item['amount'], $restaurant->currency_id); ?></div>
                                    <div class="text-sm text-gray-500"><?php echo e(__('kiosk::modules.cart.qty')); ?>: <?php echo e($item['quantity']); ?></div>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <button wire:click="updateQuantity(<?php echo e($item['id']); ?>, -1)" 
                                                class="w-6 h-6 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 flex items-center justify-center">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button wire:click="updateQuantity(<?php echo e($item['id']); ?>, 1)" 
                                                class="w-6 h-6 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 flex items-center justify-center">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button wire:click="removeFromCart(<?php echo e($item['id']); ?>)" 
                                                class="w-6 h-6 rounded-full bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center ml-2">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-8 text-gray-500">
                                <p class="text-lg"><?php echo e(__('kiosk::modules.cart.empty')); ?></p>
                                <p class="text-sm"><?php echo e(__('kiosk::modules.cart.empty_cta')); ?></p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!-- Order Totals -->
                    <div class="border-t border-gray-200 pt-6 space-y-3">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600"><?php echo e(__('kiosk::modules.cart.subtotal')); ?></span>
                            <span class="font-semibold"><?php echo currency_format($subtotal, $restaurant->currency_id); ?></span>
                        </div>
                        
                        <!--[if BLOCK]><![endif]--><?php if($totalTaxAmount > 0): ?>
                            <!--[if BLOCK]><![endif]--><?php if($taxMode === 'order' && !empty($taxBreakdown)): ?>
                                <!-- Order-level taxes -->
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $taxBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between text-lg">
                                        <span class="text-gray-600"><?php echo e($taxName); ?> (<?php echo e(number_format($taxInfo['percent'], 2)); ?>%)</span>
                                        <span class="font-semibold"><?php echo currency_format($taxInfo['amount'], $restaurant->currency_id); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <?php else: ?>
                                <!-- Item-level taxes or simple tax display -->
                                <!--[if BLOCK]><![endif]--><?php if(!empty($taxBreakdown)): ?>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $taxBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex justify-between text-lg">
                                            <span class="text-gray-600"><?php echo e($taxName); ?> (<?php echo e(number_format($taxInfo['percent'], 2)); ?>%)</span>
                                            <span class="font-semibold"><?php echo currency_format($taxInfo['amount'], $restaurant->currency_id); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <?php else: ?>
                                    <div class="flex justify-between text-lg">
                                        <span class="text-gray-600"><?php echo e(__('kiosk::modules.cart.tax')); ?></span>
                                        <span class="font-semibold"><?php echo currency_format($totalTaxAmount, $restaurant->currency_id); ?></span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        
                        <div class="flex justify-between text-2xl font-bold text-gray-900 border-t border-gray-200 pt-3">
                            <span><?php echo e(__('kiosk::modules.cart.total')); ?></span>
                            <span><?php echo currency_format($total, $restaurant->currency_id); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Customer Information Form -->
                <div class="bg-white border border-gray-200 rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6"><?php echo e(__('kiosk::modules.cart.customer_info')); ?></h2>
                    
                    <div class="space-y-6">
                        <!--[if BLOCK]><![endif]--><?php if($requireName): ?>
                        <div>
                            <label class="block text-lg font-medium text-gray-700 mb-3"><?php echo e(__('kiosk::modules.cart.full_name')); ?></label>
                            <input type="text" 
                                    wire:model="customerName"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-skin-base focus:border-skin-base"
                                    placeholder="<?php echo e(__('kiosk::modules.cart.full_name')); ?>">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($requireEmail): ?>
                        <div>
                            <label class="block text-lg font-medium text-gray-700 mb-3"><?php echo e(__('kiosk::modules.cart.email_address')); ?></label>
                            <input type="email" 
                                    wire:model="customerEmail"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-skin-base focus:border-skin-base"
                                    placeholder="<?php echo e(__('kiosk::modules.cart.email_address')); ?>">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($requirePhone): ?>
                        <div>
                            <label class="block text-lg font-medium text-gray-700 mb-3"><?php echo e(__('kiosk::modules.cart.phone_number')); ?></label>
                            <input type="tel" 
                                    wire:model="customerPhone"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-skin-base focus:border-skin-base"
                                    placeholder="<?php echo e(__('kiosk::modules.cart.phone_number')); ?>">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customerPhone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        
                        <!--[if BLOCK]><![endif]--><?php if($orderType === 'pickup'): ?>
                            <div>
                                <label class="block text-lg font-medium text-gray-700 mb-3"><?php echo e(__('kiosk::modules.cart.pickup_time')); ?></label>
                                <select wire:model="pickupTime"
                                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-skin-base focus:border-skin-base">
                                    <option value="15">15 <?php echo e(__('kiosk::modules.cart.minutes')); ?></option>
                                    <option value="30">30 <?php echo e(__('kiosk::modules.cart.minutes')); ?></option>
                                    <option value="45">45 <?php echo e(__('kiosk::modules.cart.minutes')); ?></option>
                                    <option value="60"><?php echo e(__('kiosk::modules.cart.one_hour')); ?></option>
                                </select>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 space-y-4">
                        <button wire:click="proceedToPayment" 
                        
                                class="w-full bg-skin-base text-white py-6 rounded-lg font-bold text-xl transition-all duration-200 hover:bg-skin-base disabled:opacity-50 disabled:cursor-not-allowed">
                            <?php echo e(__('kiosk::modules.cart.proceed_to_payment')); ?>

                        </button>
                        <button @click="currentScreen = 'menu'" 
                                class="w-full border-2 border-gray-300 text-gray-700 py-4 rounded-lg font-medium text-lg hover:bg-gray-50 transition-colors duration-200">
                            <?php echo e(__('kiosk::modules.cart.back_to_menu')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\script\Modules/Kiosk\Resources/views/livewire/kiosk/cart-summary.blade.php ENDPATH**/ ?>