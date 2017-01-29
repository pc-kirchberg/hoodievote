<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Are you sure these are the designs and colours you want to vote
                            for?</h1></div>

                    <div class="panel-body">
                        <p>Once you confirm your vote, there's no going back! You can only vote once.</p>
                    </div>

                    <?php $__currentLoopData = $selectedDesigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <img src="<?php echo e($design); ?>" width="250">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                    <div class="designs">
                        <?php $__currentLoopData = $selectedColours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colour): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="colour" style="background-color: <?php echo e($colour); ?>"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <br>
                    <a class="button" href="<?php echo e(route('choices')); ?>">Go Back</a>
                    <a class="button danger" href="<?php echo e(route('submit')); ?>">Submit Vote</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>