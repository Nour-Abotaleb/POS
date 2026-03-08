<?php $__env->startSection('content'); ?>


<!-- Contact -->
<div class="max-w-3xl px-4 py-16 mx-auto">
    <div class="mb-12 text-center">
        <h2 class="font-bold text-black text-3xl sm:text-4xl dark:text-white">
            <?php echo e(__('landing.contactTitle')); ?>

        </h2>
    </div>

    <div class="relative">
        <!-- Decorative elements -->
        <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 border-2 border-gray-100 dark:border-neutral-700">
            <div class="space-y-12">
                <!-- Address Section -->
                <div class="group">
                    <h3 class="mb-6 text-xl font-semibold text-black dark:text-white flex items-center gap-3">
                        <div class="p-2 bg-[#011646]/10 dark:bg-[#011646]/30 rounded-lg group-hover:bg-[#011646]/20 dark:group-hover:bg-[#011646]/40 transition-colors">
                            <svg class="size-5 text-[#011646] dark:text-[#011646]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <?php echo e(__('landing.addressTitle')); ?>

                    </h3>
                    <address class="text-gray-600 dark:text-gray-400 not-italic pl-12 leading-relaxed">
                        <?php echo nl2br(e($restaurant->address)); ?>

                    </address>
                </div>

                <!-- Contact Information -->
                <div class="grid sm:grid-cols-2 gap-8">
                    <!-- Email -->
                    <div class="group">
                        <h3 class="mb-4 text-xl font-semibold text-black dark:text-white flex items-center gap-3">
                            <div class="p-2 bg-[#011646]/10 dark:bg-[#011646]/30 rounded-lg group-hover:bg-[#011646]/20 dark:group-hover:bg-[#011646]/40 transition-colors">
                                <svg class="size-5 text-[#011646] dark:text-[#011646]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                                    <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                                </svg>
                            </div>
                            <?php echo e(__('landing.emailTitle')); ?>

                        </h3>
                        <a class="text-gray-600 dark:text-gray-400 hover:text-[#011646] dark:hover:text-[#011646] transition-colors pl-12 flex items-center gap-2" href="mailto:<?php echo e($restaurant->email); ?>">
                            <?php echo e($restaurant->email); ?>

                            <svg class="size-4 opacity-0 group-hover:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Phone -->
                    <div class="group">
                        <h3 class="mb-4 text-xl font-semibold text-black dark:text-white flex items-center gap-3">
                            <div class="p-2 bg-[#011646]/10 dark:bg-[#011646]/30 rounded-lg group-hover:bg-[#011646]/20 dark:group-hover:bg-[#011646]/40 transition-colors">
                                <svg class="size-5 text-[#011646] dark:text-[#011646]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <?php echo e(__('landing.callTitle')); ?>

                        </h3>
                        <a class="text-gray-600 dark:text-gray-400 hover:text-[#011646] dark:hover:text-[#011646] transition-colors pl-12 flex items-center gap-2" href="tel:<?php echo e($restaurant->phone_number); ?>">
                            <?php echo e($restaurant->phone_number); ?>

                            <svg class="size-4 opacity-0 group-hover:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\script\resources\views\shop\contact.blade.php ENDPATH**/ ?>