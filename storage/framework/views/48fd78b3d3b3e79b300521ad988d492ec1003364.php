<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1 class="title m-b-md">Hoodie Logo Vote</h1></div>

                    <form method="post" action="<?php echo e(route('verify')); ?>" class="panel-body">
                        <p>Please enter your school email address below.
                            (Please use your old <code>@euroschool.lu</code> address, <strong>not</strong> your new <code>@student.eursc.eu</code> address.)</p>
                        <input type="email" id="email" name="email" placeholder="Email address" required>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input class="submitButton" type="submit">
                    </form>
                    <?php if(count($errors) > 0): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="alert alert-danger">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>