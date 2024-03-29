<?php $__env->startSection('main-content'); ?>
<div class="card">
  <div class="row">
    <div class="col-md-12">
       <?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <h5 class="card-header">Tin nhắn</h5>
  <div class="card-body">
    <?php if(count($messages)>0): ?>
    <table class="table message-table" id="message-dataTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên</th>
          <th scope="col">Chủ đề</th>
          <th scope="col">Ngày</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr class="<?php if($message->read_at): ?> border-left-success <?php else: ?> bg-light border-left-warning <?php endif; ?>">
          <td scope="row"><?php echo e($loop->index +1); ?></td>
          <td><?php echo e($message->name); ?> <?php echo e($message->read_at); ?></td>
          <td><?php echo e($message->subject); ?></td>
          <td><?php echo e($message->created_at->format('F d, Y h:i A')); ?></td>
          <td>
            <a href="<?php echo e(route('message.show',$message->id)); ?>" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Xem" data-placement="bottom"><i class="fas fa-eye"></i></a>
            <form method="POST" action="<?php echo e(route('message.destroy',[$message->id])); ?>">
              <?php echo csrf_field(); ?> 
              <?php echo method_field('delete'); ?>
                  <button class="btn btn-danger btn-sm dltBtn" data-id=<?php echo e($message->id); ?> style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <nav class="blog-pagination justify-content-center d-flex">
      <?php echo e($messages->links()); ?>

    </nav>
    <?php else: ?>
      <h2>Messages Empty!</h2>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
  <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('backend/js/demo/datatables-demo.js')); ?>"></script>
  <script>
      
      $('#message-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[4]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                  title: "Bạn chắc chắn chứ?",
                  text: "Dữ liệu sẽ không thể khôi phục khi bạn đã xóa!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                    form.submit();
                  } else {
                      swal("Dữ liệu của bạn đã an toàn!");
                  }
              });
        })
    })
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\Ecommerce-Laravel\resources\views/backend/message/index.blade.php ENDPATH**/ ?>