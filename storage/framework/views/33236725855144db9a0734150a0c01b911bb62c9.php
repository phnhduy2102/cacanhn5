

<?php $__env->startSection('title','Order Detail'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card">
  <h5 class="card-header">Chỉnh sửa đơn hàng</h5>
  <div class="card-body">
    <form action="<?php echo e(route('order.update',$order->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PATCH'); ?>
      <div class="form-group">
        <label for="status">Trạng thái:</label>
        <select name="status" id="" class="form-control">
          <option value="new" <?php echo e(($order->status=='delivered' || $order->status=="process" || $order->status=="cancel") ? 'disabled' : ''); ?>  <?php echo e((($order->status=='new')? 'selected' : '')); ?>>Mới</option>
          <option value="process" <?php echo e(($order->status=='delivered'|| $order->status=="cancel") ? 'disabled' : ''); ?>  <?php echo e((($order->status=='process')? 'selected' : '')); ?>>Đang xử lí</option>
          <option value="delivered" <?php echo e(($order->status=="cancel") ? 'disabled' : ''); ?>  <?php echo e((($order->status=='delivered')? 'selected' : '')); ?>>Đã giao hàng</option>
          <option value="cancel" <?php echo e(($order->status=='delivered') ? 'disabled' : ''); ?>  <?php echo e((($order->status=='cancel')? 'selected' : '')); ?>>Hủy</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cacanhn5\resources\views/backend/order/edit.blade.php ENDPATH**/ ?>