<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => route('shop_restaurant', ['hash' => $settings->hash])]); ?>
<?php echo e($settings->name); ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

# <?php echo e(__('app.hello')); ?> <?php echo e($notifiable->name); ?>,

<?php echo e(__('email.reservation.text4')); ?>


## <?php echo e(__('email.reservation.text2')); ?>


**<?php echo e(__('modules.customer.name')); ?>**: <?php echo e($reservation->customer->name); ?>


**<?php echo e(__('app.date')); ?>**: <?php echo e($reservation->reservation_date_time->translatedFormat('d M (l)')); ?>


**<?php echo e(__('app.time')); ?>**: <?php echo e($reservation->reservation_date_time->translatedFormat('h:i A')); ?>


**<?php echo e(__('modules.reservation.guests')); ?>**: <?php echo e($reservation->party_size); ?>


<?php
    $actionText = __('email.reservation.action');
    $actionUrl = route('my_bookings', ['hash' => $settings->hash]);
?>

<?php $__env->startComponent('mail::button', ['url' => $actionUrl]); ?>
<?php echo e($actionText); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('app.regards'); ?>,<br>
<?php echo e($settings->name); ?>


---

<?php if(isset($actionText)): ?>
 <?php $__env->slot('subcopy', null, []); ?> 
<?php echo app('translator')->get(
    'messages.troubleClickingButton',
    [
        'actionText' => $actionText,
    ]
); ?> <span class="break-all"> <?php echo e($actionUrl); ?> </span>
 <?php $__env->endSlot(); ?>
<?php endif; ?>


<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
    © <?php echo e(date('Y')); ?> <?php echo e($settings->name); ?>. <?php echo app('translator')->get('app.allRightsReserved'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\script\resources\views\emails\table-reservation.blade.php ENDPATH**/ ?>