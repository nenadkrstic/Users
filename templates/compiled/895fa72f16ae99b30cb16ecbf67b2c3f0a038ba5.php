<div class="container">


    <?php if(isset($_SESSION['user_id'])): ?>
       <?php echo $__env->make('search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>



</div>