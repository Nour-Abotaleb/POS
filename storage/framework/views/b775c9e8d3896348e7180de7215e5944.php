<div>
    <?php
        $languageSettings = collect(App\Models\LanguageSetting::LANGUAGES)
            ->keyBy('language_code')
            ->map(function ($lang) {
                return [
                    'flag_url' => asset('flags/1x1/' . strtolower($lang['flag_code']) . '.svg'),
                    'name' => App\Models\LanguageSetting::LANGUAGES_TRANS[$lang['language_code']] ?? $lang['language_name']
                ];
            });
    ?>
    <form wire:submit="submitForm">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column - Product Information -->
            <div class="space-y-4">
                <div class="bg-white space-y-4 dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">

                    <!--[if BLOCK]><![endif]--><?php if(count($languages) > 1): ?>
                    <div class="mb-6 sticky top-0 z-30 pt-4">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-100 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-3">
                                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'language','value' => __('modules.menu.selectLanguage'),'class' => 'font-medium text-gray-700 dark:text-gray-300 text-base']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'language','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.menu.selectLanguage')),'class' => 'font-medium text-gray-700 dark:text-gray-300 text-base']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button
                                        type="button" wire:click="$set('currentLanguage', '<?php echo e($code); ?>')"
                                        <?php if($currentLanguage === $code): ?> aria-current="true" <?php endif; ?>
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'px-3 py-1.5 text-xs rounded-md border transition-all duration-200 focus:ring-2 focus:ring-offset-2 focus:outline-none flex items-center gap-2',
                                            'bg-skin-base text-white border-skin-base shadow-sm font-medium focus:ring-skin-base' => $currentLanguage === $code,
                                            'bg-white text-gray-700 border-gray-200 hover:bg-gray-50 hover:text-skin-base hover:border-skin-base/20 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:border-skin-base/50 dark:hover:text-skin-base focus:ring-skin-base/30' => $currentLanguage !== $code
                                        ]); ?>"
                                    >
                                        <img src="<?php echo e($languageSettings->get($code)['flag_url'] ?? asset('flags/1x1/' . strtolower($code) . '.svg')); ?>" alt="<?php echo e($code); ?>" class="w-4 h-4 rounded-sm object-cover" />
                                        <span><?php echo e($languageSettings->get($code)['name'] ?? $name); ?></span>
                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Name and Description with Translation -->
                    <div class="mb-4">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'name','value' => __('modules.modifier.modifierName') . ' (' . $languages[$currentLanguage] . ')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.modifierName') . ' (' . $languages[$currentLanguage] . ')')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'name','class' => 'block mt-1 w-full','type' => 'text','placeholder' => ''.e(__('placeholders.modifierGroupNamePlaceholder')).'','wire:model' => 'name','wire:change' => 'updateTranslation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','class' => 'block mt-1 w-full','type' => 'text','placeholder' => ''.e(__('placeholders.modifierGroupNamePlaceholder')).'','wire:model' => 'name','wire:change' => 'updateTranslation']); ?>
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
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'translationNames.'.e($globalLocale).'','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'translationNames.'.e($globalLocale).'','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>

                    <div>
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'description','value' => __('modules.modifier.description') . ' (' . $languages[$currentLanguage] . ')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'description','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.description') . ' (' . $languages[$currentLanguage] . ')')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.textarea','data' => ['class' => 'block mt-1 w-full','placeholder' => __('placeholders.modifierGroupDescriptionPlaceholder'),'wire:model' => 'description','rows' => '2','wire:change' => 'updateTranslation','dataGramm' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block mt-1 w-full','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('placeholders.modifierGroupDescriptionPlaceholder')),'wire:model' => 'description','rows' => '2','wire:change' => 'updateTranslation','data-gramm' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $attributes = $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $component = $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'description','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'description','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>

                    <!--  Translation Preview Section - Only show if we have translations and multiple languages -->
                    <?php if(count($languages) > 1 && (array_filter($translationNames) || array_filter($translationDescriptions))): ?>
                    <div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-2.5">
                            <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => __('modules.menu.translations'),'class' => 'text-sm mb-2 last:mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.menu.translations')),'class' => 'text-sm mb-2 last:mb-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                            <div class="divide-y divide-gray-200 dark:divide-gray-600">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $langName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($translationNames[$lang]) || !empty($translationDescriptions[$lang])): ?>
                                    <div class="flex flex-col gap-1.5 py-2" wire:key="translation-details-<?php echo e($loop->index); ?>">
                                        <div class="flex items-center gap-3">
                                            <span class="min-w-[80px] text-xs font-medium text-gray-600 dark:text-gray-300">
                                                <?php echo e($languageSettings->get($lang)['name'] ?? strtoupper($lang)); ?>

                                            </span>
                                            <div class="flex-1">
                                                <?php if(!empty($translationNames[$lang])): ?>
                                                <div class="mb-1">
                                                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('app.name'); ?>:</span>
                                                    <span class="text-xs text-gray-700 dark:text-gray-200 ml-1"><?php echo e($translationNames[$lang]); ?></span>
                                                </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($translationDescriptions[$lang])): ?>
                                                <div>
                                                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('app.description'); ?>:</span>
                                                    <span class="text-xs text-gray-700 dark:text-gray-200 ml-1"><?php echo e($translationDescriptions[$lang]); ?></span>
                                                </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Menu Items and Variations Section -->
                    <div class="col-span-2">
                        <div class="flex items-center justify-between mb-1">
                            <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => __('modules.modifier.locations')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.locations'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                            <span class="text-xs text-gray-500">
                                <?php echo e(count($selectedMenuItems)); ?> <?php echo e(__('selected')); ?>

                            </span>
                        </div>

                        <div x-data="{ isOpen: <?php if ((object) ('isOpen') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isOpen'->value()); ?>')<?php echo e('isOpen'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('isOpen'); ?>')<?php endif; ?>.live }" @click.away="isOpen = false" x-cloak>
                            <div class="relative">
                                <!-- Selected Items Display -->
                                <div @click="isOpen = !isOpen"
                                    class="p-2 bg-gray-50 border rounded cursor-pointer dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-wrap gap-1.5 flex-grow">
                                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $allMenuItems->whereIn('id', $selectedMenuItems)->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <span class="px-2 py-0.5 text-xs font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 flex items-center" wire:key="selected-item-<?php echo e($item->id); ?>" @click.stop>
                                                    <?php echo e($item->item_name); ?>

                                                    <!--[if BLOCK]><![endif]--><?php if(isset($selectedVariations[$item->id]) && !empty(array_filter($selectedVariations[$item->id]))): ?>
                                                        <?php
                                                            $selectedVarNames = [];
                                                            $hasVariations = false;

                                                            // Check which variations are selected
                                                            foreach ($selectedVariations[$item->id] as $varId => $isSelected) {
                                                                if ($isSelected && $varId !== 'item') {
                                                                    $variation = $item->variations->firstWhere('id', $varId);
                                                                    if ($variation) {
                                                                        $selectedVarNames[] = $variation->variation;
                                                                        $hasVariations = true;
                                                                    }
                                                                }
                                                            }

                                                            // Only add base item if no other variations are selected
                                                            if (!$hasVariations && isset($selectedVariations[$item->id]['item']) && $selectedVariations[$item->id]['item']) {
                                                                $selectedVarNames[] = 'Base Item';
                                                            }

                                                            $selectedCount = count($selectedVarNames);
                                                            $totalCount = $item->variations->count() + 1; // +1 for base item
                                                        ?>

                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($selectedVarNames)): ?>
                                                            <span class="ml-2 px-2 py-0.5 rounded bg-skin-base text-white text-xs">
                                                                <!--[if BLOCK]><![endif]--><?php if(isset($selectedVariations[$item->id]['item']) && $selectedVariations[$item->id]['item']): ?>
                                                                    <?php echo e(__('All Variations')); ?>

                                                                <?php elseif($selectedCount <= 2): ?>
                                                                    <?php echo e(implode(', ', $selectedVarNames)); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($selectedCount); ?> variations
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </span>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <button type="button" wire:click="toggleSelectItem({ id: <?php echo e($item->id); ?>, item_name: '<?php echo e(addslashes($item->item_name)); ?>' })" class="inline-flex items-center p-1 ms-2 text-sm text-red-500 bg-transparent rounded-xs hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-800 dark:hover:text-red-300">
                                                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5 5m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                                                        <span class="sr-only">Remove badge</span>
                                                    </button>
                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(__('modules.modifier.selectMenuItem')); ?></span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            <!--[if BLOCK]><![endif]--><?php if($allMenuItems->whereIn('id', $selectedMenuItems)->count() > 5): ?>
                                                <span class="px-2 py-0.5 text-xs text-gray-500 bg-gray-100 border border-gray-200 rounded dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                                                    +<?php echo e($allMenuItems->whereIn('id', $selectedMenuItems)->count() - 5); ?> more
                                                </span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>

                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>


                                <!-- Search and Selection Dropdown -->
                                <div x-show="isOpen" x-transition class="absolute z-20 w-full mt-1 overflow-hidden bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-900 dark:border-gray-700">
                                    <div class="sticky top-0 px-3 py-2 bg-white dark:bg-gray-900 z-10 border-b dark:border-gray-700">
                                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model.live.debounce.300ms' => 'search','class' => 'block w-full','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenuItem')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.300ms' => 'search','class' => 'block w-full','type' => 'text','placeholder' => ''.e(__('placeholders.searchMenuItem')).'']); ?>
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

                                    <div class="overflow-y-auto max-h-60">
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div wire:key="menu-item-<?php echo e($item->id); ?>"
                                                class="border-b dark:border-gray-700 last:border-b-0"
                                                x-data="{ expanded: false }">
                                                <!-- Menu Item Header -->
                                                <div class="flex items-center justify-between py-2 px-3 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800"
                                                    :class="{ 'bg-gray-50 dark:bg-gray-800': $wire.selectedMenuItems.includes(<?php echo e($item->id); ?>) }"
                                                    @click="$wire.toggleSelectItem({ id: <?php echo e($item->id); ?>, item_name: '<?php echo e(addslashes($item->item_name)); ?>' })"
                                                    wire:key="menu-item-header-<?php echo e($item->id); ?>">

                                                    <div class="flex items-center gap-2">
                                                        <!-- Simple checkbox -->
                                                        <div class="flex-shrink-0">
                                                            <div class="w-4 h-4 border rounded transition-colors duration-150"
                                                                :class="$wire.selectedMenuItems.includes(<?php echo e($item->id); ?>) ?
                                                                        'border-green-500 bg-green-500' :
                                                                        'border-gray-300 dark:border-gray-600'">
                                                                <!--[if BLOCK]><![endif]--><?php if(in_array($item->id, $selectedMenuItems)): ?>
                                                                <svg class="w-4 h-4 text-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4 8l2 2 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </div>
                                                        </div>

                                                        <!-- Item name -->
                                                        <span class="text-gray-700 dark:text-gray-300"><?php echo e($item->item_name); ?></span>

                                                        <!-- Variations badge - simplified -->
                                                        <!--[if BLOCK]><![endif]--><?php if($item->variations->count() > 0): ?>
                                                        <span class="ml-1 text-xs text-gray-500 dark:text-gray-400">
                                                            (<?php echo e($item->variations->count()); ?>)
                                                        </span>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </div>

                                                    <!-- Simple variation toggle with selection display -->
                                                    <!--[if BLOCK]><![endif]--><?php if($item->variations->count() > 0): ?>
                                                    <button type="button"
                                                            @click.stop="expanded = !expanded"
                                                            wire:click.stop
                                                            class="flex items-center gap-1 text-xs px-1.5 py-0.5 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                                                        <div class="flex items-center">
                                                            <?php
                                                                $selectedCount = isset($selectedVariations[$item->id])
                                                                    ? collect($selectedVariations[$item->id])->filter()->count()
                                                                    : 0;

                                                                $selectedVarNames = [];
                                                                $hasVariations = false;
                                                                $hasBaseItem = false;

                                                                if(isset($selectedVariations[$item->id])) {
                                                                    // Check for base item selection
                                                                    if(isset($selectedVariations[$item->id]['item']) && $selectedVariations[$item->id]['item']) {
                                                                        $hasBaseItem = true;
                                                                        $selectedVarNames[] = 'Base Item';
                                                                    }

                                                                    // Check for specific variations
                                                                    foreach($selectedVariations[$item->id] as $varId => $isSelected) {
                                                                        if($isSelected && $varId !== 'item') {
                                                                            $variation = $item->variations->firstWhere('id', $varId);
                                                                            if($variation) {
                                                                                $selectedVarNames[] = $variation->variation;
                                                                                $hasVariations = true;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            ?>

                                                            <!--[if BLOCK]><![endif]--><?php if($selectedCount > 0): ?>
                                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                                    <!--[if BLOCK]><![endif]--><?php if($hasBaseItem): ?>
                                                                        <?php echo e(__('All Variations')); ?>

                                                                    <?php elseif(count($selectedVarNames) <= 2): ?>
                                                                        <?php echo e(implode(', ', $selectedVarNames)); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(count($selectedVarNames)); ?> <?php echo e(__('variations')); ?>

                                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                                </span>
                                                            <?php else: ?>
                                                                <span><?php echo e(__('Select Variations')); ?></span>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                        <svg class="w-3.5 h-3.5 transition-transform" :class="{'rotate-180': expanded}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>
                                                <!-- Variation dropdown (minimal) -->
                                                <!--[if BLOCK]><![endif]--><?php if($item->variations->count() > 0): ?>
                                                <div
                                                    x-show="expanded"
                                                    x-collapse
                                                    class="px-3 py-2 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800"
                                                    wire:key="menu-item-variations-<?php echo e($item->id); ?>"
                                                >
                                                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => __('modules.modifier.selectVariation'),'class' => 'text-xs mb-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.selectVariation')),'class' => 'text-xs mb-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>

                                                    <div class="space-y-2">

                                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="flex items-center" wire:key="variation-<?php echo e($variation->id); ?>">
                                                                <input
                                                                    id="variation-<?php echo e($variation->id); ?>"
                                                                    type="checkbox"
                                                                    wire:model.live="selectedVariations.<?php echo e($item->id); ?>.<?php echo e($variation->id); ?>"
                                                                    class="w-4 h-4 rounded border-gray-300 focus:ring-skin-base text-skin-base"
                                                                    @click.stop
                                                                >
                                                                <label for="variation-<?php echo e($variation->id); ?>" class="ml-2 text-xs text-gray-700 dark:text-gray-300">
                                                                    <?php echo e($variation->variation); ?>

                                                                </label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                    </div>
                                                </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="py-3 px-3 text-gray-500 dark:text-gray-400 text-center text-sm">
                                                <?php echo e(__('modules.modifier.noMenuItemsFound')); ?>

                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'selectedMenuItems','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'selectedMenuItems','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                            <p class="text-xs text-gray-500 mt-1">
                                <?php echo e(__('modules.modifier.selectMenuItemsHelpText')); ?>

                            </p>
                        </div>

                    </div>
                    <!-- Action Buttons -->
                    <div class="flex w-full space-x-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','wire:loading.attr' => 'disabled','wire:target' => 'submitForm','class' => 'flex-1']); ?>
                            <span wire:loading.remove wire:target="submitForm"><?php echo app('translator')->get('app.save'); ?></span>
                            <span wire:loading wire:target="submitForm" class="flex items-center">
                                Saving...
                            </span>
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
                        <?php if (isset($component)) { $__componentOriginala6c1b2378c7a756a2b58951b1494d68f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6c1b2378c7a756a2b58951b1494d68f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-link','data' => ['href' => ''.e(route('menu-items.index')).'','wire:navigate' => true,'wire:loading.attr' => 'disabled','wire:target' => 'submitForm','class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('menu-items.index')).'','wire:navigate' => true,'wire:loading.attr' => 'disabled','wire:target' => 'submitForm','class' => 'flex-1']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
                        
                    </div>
                </div>
            </div>

            <!-- Right Column - Pricing Details -->
            <div class="lg:col-span-1 space-y-4">
                <!-- Pricing Configuration -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 sticky top-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 me-2 text-yellow-500" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="currentColor" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="M9.5 10.5H12a1 1 0 0 0 0-2h-1V8a1 1 0 0 0-2 0v.55a2.5 2.5 0 0 0 .5 4.95h1a.5.5 0 0 1 0 1H8a1 1 0 0 0 0 2h1v.5a1 1 0 0 0 2 0v-.55a2.5 2.5 0 0 0-.5-4.95h-1a.5.5 0 0 1 0-1M21 12h-3V3a1 1 0 0 0-.5-.87 1 1 0 0 0-1 0l-3 1.72-3-1.72a1 1 0 0 0-1 0l-3 1.72-3-1.72a1 1 0 0 0-1 0A1 1 0 0 0 2 3v16a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1M5 20a1 1 0 0 1-1-1V4.73l2 1.14a1.08 1.08 0 0 0 1 0l3-1.72 3 1.72a1.08 1.08 0 0 0 1 0l2-1.14V19a3 3 0 0 0 .18 1Zm15-1a1 1 0 0 1-2 0v-5h2Z"/></svg>
                        <?php echo app('translator')->get('modules.modifier.modifierOptions'); ?>
                    </h3>
                    <!-- Modifier Options Section -->
                    <div class="col-span-2">
                        <div class="space-y-4 mt-4" x-data="{ openOption: null }">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $modifierOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div wire:key="modifierOption-<?php echo e($modifierOption['id']); ?>"
                                class="bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 p-4 transition-all duration-200"
                                :class="openOption === <?php echo e($index); ?> ? 'ring-1 ring-skin-base shadow-md' : ''">

                                <!-- Option Header - Clickable -->
                                <div class="cursor-pointer" @click="openOption = openOption === <?php echo e($index); ?> ? null : <?php echo e($index); ?>">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1 flex items-center">
                                            <svg class="w-4 h-4 me-2 text-gray-400 transition-transform duration-200"
                                                :class="openOption === <?php echo e($index); ?> ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <h4 class="font-medium text-gray-900 dark:text-white">
                                                        <?php echo e($modifierOptionName[$index] ?: 'Option ' . ($index + 1)); ?>

                                                    </h4>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-medium"><?php echo app('translator')->get('modules.modifier.price'); ?>:</span> <?php echo e(restaurant()->currency->currency_symbol); ?><?php echo e($modifierOption['price'] ?? '0.00'); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Remove Button -->
                                        <button type="button"
                                                wire:click.stop="removeModifierOption(<?php echo e($index); ?>)"
                                                class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 dark:hover:bg-red-900/20 rounded-md transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Expanded Content -->
                                <div x-show="openOption === <?php echo e($index); ?>"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600 space-y-4">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                                    <div>
                                        <!-- Modifier Option Name with Translation -->
                                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'modifierOptions.'.e($index).'.name','value' => __('modules.modifier.optionName') . ' (' . $languages[$currentLanguage] . ')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'modifierOptions.'.e($index).'.name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.optionName') . ' (' . $languages[$currentLanguage] . ')')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'modifierOptions.'.e($index).'.name','class' => 'mt-1 block w-full','type' => 'text','placeholder' => ''.e(__('placeholders.modifierOptionNamePlaceholder')).'','wire:model' => 'modifierOptionName.'.e($index).'','wire:change' => 'updateModifierOptionTranslation('.e($index).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modifierOptions.'.e($index).'.name','class' => 'mt-1 block w-full','type' => 'text','placeholder' => ''.e(__('placeholders.modifierOptionNamePlaceholder')).'','wire:model' => 'modifierOptionName.'.e($index).'','wire:change' => 'updateModifierOptionTranslation('.e($index).')']); ?>
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
                                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'modifierOptions.'.e($index).'.name.'.e($globalLocale).'','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'modifierOptions.'.e($index).'.name.'.e($globalLocale).'','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                                        <!-- Translation Preview for This Option -->
                                        <?php if(count($languages) > 1 && isset($modifierOptionInput[$index]) && array_filter($modifierOptionInput[$index])): ?>
                                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-2.5 mt-2">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modifierOptionInput[$index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($text)): ?>
                                                <div class="flex items-center gap-3 py-1" wire:key="translation-option-name-details-<?php echo e($modifierOption['id']); ?>-<?php echo e($lang); ?>">
                                                    <span class="min-w-[80px] text-xs font-medium text-gray-600 dark:text-gray-300">
                                                        <?php echo e($languageSettings->get($lang)['name'] ?? strtoupper($lang)); ?>:
                                                    </span>
                                                    <span class="flex-1 text-xs text-gray-700 dark:text-gray-200"><?php echo e($text); ?></span>
                                                </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                    <div>
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'modifierOptions.'.e($index).'.price','value' => __('modules.modifier.defaultPrice')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'modifierOptions.'.e($index).'.price','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.modifier.defaultPrice'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'modifierOptions.'.e($index).'.price','type' => 'number','step' => '0.001','class' => 'mt-1 block w-full','wire:model.live.debounce.500ms' => 'modifierOptions.'.e($index).'.price','placeholder' => ''.e(__('placeholders.modifierOptionPricePlaceholder')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modifierOptions.'.e($index).'.price','type' => 'number','step' => '0.001','class' => 'mt-1 block w-full','wire:model.live.debounce.500ms' => 'modifierOptions.'.e($index).'.price','placeholder' => ''.e(__('placeholders.modifierOptionPricePlaceholder')).'']); ?>
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
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'modifierOptions.'.e($index).'.price','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'modifierOptions.'.e($index).'.price','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'modifierOptions.'.e($index).'.is_available']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'modifierOptions.'.e($index).'.is_available']); ?>
                        <div class="flex items-center cursor-pointer">
                            <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['id' => 'modifierOptions.'.e($index).'.is_available','wire:model' => 'modifierOptions.'.e($index).'.is_available','value' => ''.e($modifierOption['id']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modifierOptions.'.e($index).'.is_available','wire:model' => 'modifierOptions.'.e($index).'.is_available','value' => ''.e($modifierOption['id']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                            <div class="select-none ms-2">
                                <?php echo e(__('modules.modifier.isAvailable')); ?>

                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                </div>

                <!-- Order Types Pricing -->
                <!--[if BLOCK]><![endif]--><?php if($orderTypes->isNotEmpty()): ?>
                <div class="col-span-2">
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => 'Order Types Pricing','class' => 'mb-3 text-base font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => 'Order Types Pricing','class' => 'mb-3 text-base font-semibold']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <div class="space-y-2">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orderTypes->reject(fn($type) => strtolower($type->slug ?? $type->name) === 'delivery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-600">
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo e($orderType->order_type_name); ?></span>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 text-sm"><?php echo e(restaurant()->currency->currency_symbol); ?></span>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'number','step' => '0.001','wire:model.live' => 'optionOrderTypePrices.'.e($index).'.'.e($orderType->id).'','class' => 'block pl-8 pr-3 w-32','placeholder' => '0.00']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '0.001','wire:model.live' => 'optionOrderTypePrices.'.e($index).'.'.e($orderType->id).'','class' => 'block pl-8 pr-3 w-32','placeholder' => '0.00']); ?>
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
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Delivery Platforms -->
                <div class="col-span-2">
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['value' => 'Delivery Platforms','class' => 'mb-3 text-base font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => 'Delivery Platforms','class' => 'mb-3 text-base font-semibold']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <div class="space-y-2">
                        <!-- Base Delivery Price -->
                        <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-gray-600 dark:text-gray-200" fill="currentColor" height="20" viewBox="0 0 64 64" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M4 16h14.001a3 3 0 0 1 3 3v11.001a3 3 0 0 1-3 3h-14a3 3 0 0 1-3.001-3v-11a3 3 0 0 1 3-3"/><circle cx="33.002" cy="7" r="5"/><path d="M12.003 35.852a5.92 5.92 0 0 0 1.7 4.15H29.96v-4.155a.996.996 0 0 0-.996-.996H12.998a1 1 0 0 0-.995 1.001"/><path d="M61.737 51.359a8.13 8.13 0 0 0-8.322-5.994 7 7 0 0 0 .24-1.791A5.93 5.93 0 0 0 51 38.75c-2.147-1.425-3.753-5.048-3.996-8.858h1.916a2.99 2.99 0 0 0 2.991-2.982v-1.986a2.99 2.99 0 0 0-2.991-2.982h-6.84c-5.782-1.665-7.522-3.583-8.561-4.732l-.063-.07a3.71 3.71 0 0 0-2.018-3.813 3.64 3.64 0 0 0-5.122 2.497l-2.869 13.71a2.983 2.983 0 0 0 2.598 3.571l4.917.544a.994.994 0 0 1 .887 1.043l-.774 13.106a5.27 5.27 0 0 1-1.477-5.796H14.313c-1.612 2.671-4.193 7.679-3.149 10.936a4.04 4.04 0 0 0 2.609 2.622 3.7 3.7 0 0 0 1.39.15 6.406 6.406 0 0 0 12.78 0h17.14a1.26 1.26 0 0 0 .875-.423 7 7 0 0 0 .587 1.703.996.996 0 0 0 1.716.14q.176-.25.376-.491a6.4 6.4 0 1 0 12.484-2.718.986.986 0 0 0 .875-1.075 8 8 0 0 0-.26-1.487m-40.184 8.318a4.407 4.407 0 0 1-4.385-3.967h8.77a4.407 4.407 0 0 1-4.385 3.967M40.94 48.754h-3.885l1.718-16.24a2.98 2.98 0 0 0-1.926-3.104l-4.9-1.829a.99.99 0 0 1-.622-1.149l.745-3.215a17.1 17.1 0 0 0 8.87 3.633zm14.586 11.218a4.413 4.413 0 0 1-4.961-4.86l.304-.38a11.08 11.08 0 0 1 7.676-1.51l.236.183a4.4 4.4 0 0 1-3.255 6.567"/></svg>
                                <span class="font-medium text-gray-900 dark:text-white text-sm">Base Delivery Price</span>
                            </div>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 text-sm"><?php echo e(restaurant()->currency->currency_symbol); ?></span>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'number','step' => '0.001','wire:model.live' => 'optionBaseDeliveryPrice.'.e($index).'','class' => 'block pl-8 pr-3 w-32','placeholder' => '0.00']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '0.001','wire:model.live' => 'optionBaseDeliveryPrice.'.e($index).'','class' => 'block pl-8 pr-3 w-32','placeholder' => '0.00']); ?>
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
                        </div>

                        <!-- Delivery Apps -->
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $deliveryApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8">
                                    <!--[if BLOCK]><![endif]--><?php if($app->logo): ?>
                                    <img class="w-8 h-8 rounded-lg object-cover border border-gray-200"
                                        src="<?php echo e($app->logo_url ?? asset('images/default-logo.png')); ?>"
                                        alt="<?php echo e($app->name); ?>">
                                    <?php else: ?>
                                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div>
                                    <span class="font-medium text-gray-900 dark:text-white text-sm"><?php echo e($app->name); ?></span>
                                    <div class="text-xs text-gray-500">
                                        Commission: <?php echo e($app->commission_value ?? 0); ?>%
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox"
                                        wire:model.live="optionPlatformAvailability.<?php echo e($index); ?>.<?php echo e($app->id); ?>"
                                        class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                                <div class="text-right">
                                    <div class="font-semibold text-sm text-gray-900 dark:text-white">
                                        <?php echo e(restaurant()->currency->currency_symbol); ?><?php echo e($optionDeliveryPrices[$index][$app->id] ?? '0.00'); ?>

                                    </div>
                                    <div class="text-xs text-gray-500">Final Price</div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                            </div>
                        </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <div class="mt-4">
                            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['type' => 'button','wire:click' => 'addModifierOption']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'addModifierOption']); ?><?php echo e(__('modules.modifier.addModifierOption')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/forms/create-modifier-group.blade.php ENDPATH**/ ?>