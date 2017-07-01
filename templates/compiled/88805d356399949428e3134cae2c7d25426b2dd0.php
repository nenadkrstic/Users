<?php $__env->startSection('content'); ?>
<?php echo $__env->make('search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="container">
          <?php if($searchResults): ?>
               <h5>Rezultat pretrage : </h5><hr>
                <?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-3">
                   <h5>Name : <?php echo e(print_r($user->name)); ?></h5>
                    <h5>Mail :<?php echo e(print_r($user->email)); ?></h5>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
              <h5>Pretraga za kriterium je prazna</h5><hr>

          <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>