 /**
 * Created by PhpStorm.
 * User: Nesa
 * Date: 6/27/2017
 * Time: 7:22 PM
 */


<?php $__env->startSection('content'); ?>
    <div  class="container text-center">
        <div id="welcome" class="jumbotron ">
            <h1 >Quantox</h1>
        </div>
    </div>
    <?php echo $__env->make('search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>