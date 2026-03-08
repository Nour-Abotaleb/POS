<div>
    <section class="p-4 overflow-hidden text-gray-700 border-gray-200 body-font sm:p-6 lg:p-8 dark:border-gray-700">

        <!-- Header Section - Made responsive -->
        <div class="flex flex-col items-start justify-between gap-4 px-2 py-4 sm:flex-row sm:items-center sm:px-7">
            <div class="flex flex-col w-full space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 sm:w-auto">
                <!-- Monthly Button -->
                <button wire:click="toggle"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'relative px-4 py-2 text-sm font-medium rounded-full transition-colors duration-200 ease-in-out w-full sm:w-auto'
                    , 'bg-skin-base text-white'=> !$isAnnual,
                    'bg-gray-200 dark:bg-gray-400 text-gray-800' => $isAnnual
                    ]); ?>">
                    <?php echo app('translator')->get('modules.billing.monthly'); ?>
                </button>

                <!-- Annually Button -->
                <button wire:click="toggle"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'relative px-4 py-2 text-sm font-medium rounded-full transition-colors duration-200 ease-in-out w-full sm:w-auto'
                    , 'bg-skin-base text-white'=> $isAnnual,
                    'bg-gray-200 dark:bg-gray-400 text-gray-800' => !$isAnnual
                    ]); ?>">
                    <?php echo app('translator')->get('modules.billing.annually'); ?>
                </button>
            </div>

            <!-- Currency Dropdown with Animation -->
            <div class="w-full sm:w-auto">
                <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['class' => 'block w-full mt-1 sm:w-auto','wire:model.live' => 'selectedCurrency']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block w-full mt-1 sm:w-auto','wire:model.live' => 'selectedCurrency']); ?>
                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_name); ?> (<?php echo e($currency->currency_symbol); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            </div>
        </div>

        <!-- Plans Grid - Responsive design with features in each plan -->
        <div class="grid grid-cols-1 gap-6 mx-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:mx-4">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'bg-white dark:bg-slate-800 rounded-lg border-2 relative overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300',
                    'border-skin-base ring-2 ring-skin-base/20' => $package->is_recommended,
                    'border-gray-200 dark:border-gray-700' => ! $package->is_recommended
                ]); ?>">
                    <?php if($package->is_recommended): ?>
                        <div class="py-2 text-center text-white bg-skin-base">
                            <span class="text-sm font-semibold tracking-wider"><?php echo app('translator')->get('modules.billing.popular'); ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Plan Header -->
                    <div class="p-6 text-center border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2"><?php echo e($package->package_name); ?></h3>

                        <!-- Price -->
                        <div class="mb-4">
                            <?php if($package->is_free): ?>
                                <span class="text-3xl font-bold text-skin-base"><?php echo app('translator')->get('modules.billing.free'); ?></span>
                            <?php else: ?>
                                <span class="text-3xl font-bold text-skin-base">
                                    <?php echo e(global_currency_format($package->package_type === App\Enums\packageType::LIFETIME ? $package->price : ($isAnnual ? $package->annual_price : $package->monthly_price), $package->currency_id)); ?>

                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Plan Type Info -->
                        <?php if($package->package_type === App\Enums\packageType::DEFAULT): ?>
                            <div class="flex items-center justify-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                <span><?php echo app('translator')->get('modules.package.defaultPlan'); ?></span>
                                <svg data-popover-target="popover-default-pricing-<?php echo e($package->id); ?>" data-popover-placement="bottom" class="w-4 h-4 text-gray-400 hover:text-gray-500 cursor-help" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                                <div data-popover id="popover-default-pricing-<?php echo e($package->id); ?>" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 text-wrap w-52 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2 break-words">
                                        <p><?php echo app('translator')->get('modules.package.planExpire'); ?></p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </div>
                        <?php elseif($package->package_type === App\Enums\packageType::LIFETIME): ?>
                            <span class="text-sm text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.billing.lifetimeAccess'); ?></span>
                        <?php elseif(!$package->is_free): ?>
                            <span class="text-sm text-gray-600 dark:text-gray-400"><?php echo app('translator')->get('modules.billing.billed'); ?> <?php echo e($isAnnual ? __('modules.billing.annually') : __('modules.billing.monthly')); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Features List -->
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 text-center"><?php echo app('translator')->get('landing.features'); ?></h4>

                        <?php
                            $packageAllModules = array_merge(
                                $package->modules->pluck('name')->toArray(),
                                $package->additional_features ? json_decode($package->additional_features, true) : []
                            );
                        ?>

                        <ul class="space-y-3">
                            <?php $__currentLoopData = $AllModulesWithFeature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $isEnabled = in_array($moduleName, $packageAllModules);
                                    $showLimit = false;
                                    $limitValue = null;
                                    $limitLabel = '';
                                    
                                    // Check if this module should show limit count
                                    if ($isEnabled) {
                                        if ($moduleName === 'Menu Item') {
                                            $showLimit = true;
                                            $limitValue = $package->menu_items_limit;
                                            $limitLabel = __('modules.package.menuItemsLimit');
                                        } elseif ($moduleName === 'Order') {
                                            $showLimit = true;
                                            $limitValue = $package->order_limit;
                                            $limitLabel = __('modules.package.orderLimit');
                                        } elseif ($moduleName === 'Staff') {
                                            $showLimit = true;
                                            $limitValue = $package->staff_limit;
                                            $limitLabel = __('modules.package.staffLimit');
                                        }
                                    }
                                ?>
                                <li class="flex items-start gap-3">
                                    <?php if($isEnabled): ?>
                                        <span class="w-5 h-5 inline-flex items-center justify-center bg-green-500 text-white rounded-full flex-shrink-0 mt-0.5">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                                                <path d="M20 6L9 17l-5-5"></path>
                                            </svg>
                                        </span>
                                    <?php else: ?>
                                        <span class="w-5 h-5 inline-flex items-center justify-center text-red-500 flex-shrink-0 mt-0.5">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" class="w-3 h-3" viewBox="0 0 24 24">
                                                <path d="M18 6L6 18M6 6l12 12"></path>
                                            </svg>
                                        </span>
                                    <?php endif; ?>
                                    <div class="flex-1">
                                        <span class="text-sm text-gray-700 dark:text-gray-300"><?php echo e(__('permissions.modules.'.$moduleName)); ?></span>
                                        <?php if($showLimit && $limitValue !== null): ?>
                                            <span class="ml-2 text-xs font-semibold text-skin-base dark:text-skin-base">
                                                <?php if($limitValue == -1): ?>
                                                    (<?php echo e(__('modules.billing.unlimited')); ?>)
                                                <?php else: ?>
                                                    <?php if($moduleName === 'Order'): ?>
                                                        (<?php echo e(number_format($limitValue)); ?> <?php echo e(__('modules.billing.perDay')); ?>)
                                                    <?php else: ?>
                                                        (<?php echo e(number_format($limitValue)); ?> <?php echo e(__('modules.billing.perPlan')); ?>)
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- Action Button -->
                    <div class="p-6 pt-0">
                        <?php if($package->is_free || $paymentActive ||
                            ($package->id == $restaurant->package_id && $restaurant->package_type == ($isAnnual ? 'annual' : 'monthly')) ||
                            $package->package_type == App\Enums\PackageType::DEFAULT): ?>
                            <div class="w-full">
                                <?php if($package->id == $restaurant->package_id && ($restaurant->package_type == ($isAnnual ? 'annual' : 'monthly') || !in_array($restaurant->package_type, ['annual', 'monthly']))): ?>
                                    <button class="w-full px-4 py-3 font-medium text-gray-600 transition-all duration-300 bg-gray-300 rounded-lg cursor-not-allowed dark:bg-gray-600 dark:text-gray-400 opacity-60">
                                        <?php echo app('translator')->get('modules.package.currentPlan'); ?>
                                    </button>
                                <?php else: ?>
                                    <button class="flex items-center justify-center w-full gap-2 px-4 py-3 font-medium text-white transition-all duration-300 rounded-lg bg-skin-base hover:bg-skin-base/90 group"
                                        wire:click="selectedPackage(<?php echo e($package->id); ?>)">
                                        <?php echo app('translator')->get('modules.package.choosePlan'); ?>
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 transition-transform duration-500 transform group-hover:translate-x-1" viewBox="0 0 24 24">
                                            <path d="M5 12h14m-7-7 7 7-7 7"/>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="py-3 text-sm text-center text-gray-500 dark:text-gray-400">
                                <?php echo app('translator')->get('modules.billing.noPaymentOptionEnable'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <!-- Mobile-friendly modal -->
    <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'showPaymentMethodModal','maxWidth' => 'xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showPaymentMethodModal','maxWidth' => 'xl']); ?>
         <?php $__env->slot('title', null, []); ?> 
            <?php if($free): ?>
                <?php echo app('translator')->get('modules.billing.choosePlan'); ?>
            <?php else: ?>
                <?php echo app('translator')->get('modules.billing.choosePaymentMethod'); ?>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <?php if(!$free): ?>
                <div>
                    <?php switch($show):
                        case ('payment-method'): ?>
                            <?php echo $__env->make('plans.payment-methods', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php break; ?>
                        <?php case ('authorize'): ?>
                            <?php echo $__env->make('plans.authorize-payment-method-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php break; ?>
                        <?php default: ?>
                            <!-- Default case if no match -->
                            <p><?php echo app('translator')->get('modules.billing.noPaymentMethodSelected'); ?></p>
                    <?php endswitch; ?>
                </div>
            <?php else: ?>
                <div class="inline-flex items-baseline text-center text-gray-500">
                    <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'freePlan','class' => 'w-full sm:w-auto']); ?>

                        <?php echo app('translator')->get($selectedPlan->packageType === App\Enums\PackageType::DEFAULT ? 'modules.package.choseDefaultPlan' : 'modules.package.choseFreePlan'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('footer', null, []); ?> 
            <div class="flex flex-col w-full gap-2 sm:flex-row sm:gap-0">
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => '$toggle(\'showPaymentMethodModal\')','wire:loading.attr' => 'disabled','class' => 'order-2 w-full sm:w-auto sm:order-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$toggle(\'showPaymentMethodModal\')','wire:loading.attr' => 'disabled','class' => 'order-2 w-full sm:w-auto sm:order-1']); ?>
                    <?php echo app('translator')->get('app.cancel'); ?>
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

                <?php if($offlineMethodId): ?>
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'order-1 w-full sm:w-auto sm:order-2 sm:ml-3','wire:click' => ''.e($show === 'authorize' ? 'offlinePaymentSubmit' : 'switchPaymentMethod(\'authorize\')').'','wire:loading.attr' => 'disabled']); ?>
                    <?php echo app('translator')->get($show === 'authorize' ? 'app.save' : 'app.select'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>

    <?php if(!$free): ?>

        <?php if($stripeSettings->razorpay_status == 1 || $stripeSettings->stripe_status == 1 || $stripeSettings->flutterwave_status == 1 || $stripeSettings->paypal_status == 1 || $stripeSettings->payfast_status == 1 || $stripeSettings->paystack_status == 1 || $stripeSettings->xendit_status == 1 || $stripeSettings->paddle_status == 1): ?>
            <?php $__env->startPush('scripts'); ?>
                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script src="https://checkout.flutterwave.com/v3.js"></script>
                <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($stripeSettings->paypal_client); ?>&currency=<?php echo e($selectedCurrencyCode); ?>"></script>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                    <?php
        $__scriptKey = '1311019403-0';
        ob_start();
    ?>
                    <script>
                        document.addEventListener('livewire:navigated', () => {
                            $wire.on('initiateRazorpay', (jsonData) => {
                                const data = JSON.parse(jsonData);
                                const options = {
                                    key: data.key,
                                    name: data.name,
                                    description: data.description,
                                    image: data.image,
                                    currency: data.currency,
                                    handler: function (response) {
                                        $wire.dispatch('confirmRazorpayPayment', {
                                            payment_id: response.razorpay_payment_id,
                                            reference_id: response.razorpay_subscription_id || response.razorpay_order_id,
                                            signature: response.razorpay_signature,
                                        });
                                    },
                                    notes: data.notes,
                                    modal: {
                                        ondismiss: function() {
                                            if (confirm("Are you sure you want to close the payment form?")) {
                                                console.log("Checkout form closed by the user.");
                                            } else {
                                                console.log("User opted to complete the payment.");
                                            }
                                        }
                                    }
                                };

                                // Set either subscription or order ID appropriately
                                if (data.subscription_id) {
                                    options.subscription_id = data.subscription_id;
                                } else {
                                    options.order_id = data.order_id;
                                    options.amount = data.amount;
                                }

                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function(response) {
                                    console.error("Payment failed: ", response);
                                });
                                rzp1.open();
                            });

                            // Stripe payment handling
                            $wire.on('stripePlanPaymentInitiated', (payment) => {
                                document.getElementById('license_payment').value = payment.payment.id;
                                document.getElementById('package_type').value = payment.payment.package_type;
                                document.getElementById('package_id').value = payment.payment.package_id;
                                document.getElementById('currency_id').value = payment.payment.currency_id;
                                document.getElementById('license-payment-form').submit();
                            });

                            $wire.on('redirectToFlutterwave', (params) => {
                                const form = document.getElementById('flutterwavePaymentformNew');
                                const paramsData = params[0].params;

                                // Clear existing inputs (in case of multiple submissions)
                                form.innerHTML = '<?php echo csrf_field(); ?>'; // Reset form with just CSRF token

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                console.log('Flutterwave Params:', paramsData);

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);

                                // Submit the form
                                form.submit();
                            });

                            $wire.on('redirectToPaypal', (params) => {
                                const form = document.getElementById('paypalPaymentForm');
                                const paramsData = params[0].params;

                                // Clear the form and add CSRF token again
                                form.innerHTML = '<?php echo csrf_field(); ?>';

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                console.log('PayPal Params:', paramsData);

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);

                                form.submit();
                            });

                            $wire.on('redirectToPayfast', (params) => {
                                const form = document.getElementById('payfastPaymentForm');
                                const paramsData = params[0].params;

                                // Clear form and retain CSRF token
                                form.innerHTML = '<?php echo csrf_field(); ?>';

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                console.log('Payfast Params:', paramsData);

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);

                                form.submit();
                            });

                            $wire.on('redirectToPaystack', (params) => {
                                const form = document.getElementById('paystackPaymentformNew');
                                const paramsData = params[0].params;

                                // Clear existing inputs (in case of multiple submissions)
                                form.innerHTML = '<?php echo csrf_field(); ?>'; // Reset form with just CSRF token

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);
                                addHiddenInput('email', paramsData.email);

                                form.submit();
                            });

                             $wire.on('redirectToXendit', (params) => {
                                const form = document.getElementById('xenditPaymentformNew');
                                const paramsData = params[0].params;

                                // Clear existing inputs (in case of multiple submissions)
                                form.innerHTML = '<?php echo csrf_field(); ?>'; // Reset form with just CSRF token

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);
                                addHiddenInput('email', paramsData.email);

                                form.submit();
                            });

                            $wire.on('redirectToPaddle', (params) => {
                                const form = document.getElementById('paddlePaymentformNew');
                                const paramsData = params[0].params;

                                // Clear existing inputs (in case of multiple submissions)
                                form.innerHTML = '<?php echo csrf_field(); ?>'; // Reset form with just CSRF token

                                const addHiddenInput = (name, value) => {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = name;
                                    input.value = value;
                                    form.appendChild(input);
                                };

                                addHiddenInput('payment_id', paramsData.payment_id);
                                addHiddenInput('amount', paramsData.amount);
                                addHiddenInput('currency', paramsData.currency);
                                addHiddenInput('restaurant_id', paramsData.restaurant_id);
                                addHiddenInput('package_id', paramsData.package_id);
                                addHiddenInput('package_type', paramsData.package_type);
                                addHiddenInput('email', paramsData.email);

                                form.submit();
                            });



                        });
                    </script>
                    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
            <?php $__env->stopPush(); ?>
        <?php endif; ?>
    <?php endif; ?>

</div>


<?php /**PATH C:\xampp\htdocs\script\resources\views\livewire\plan\plan-list.blade.php ENDPATH**/ ?>