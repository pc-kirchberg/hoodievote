

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Vote</h1></div>

                    <div class="panel-body">
                        <p>Please tap or click on each of the designs that you like.</p>
                        <p>You can choose as many designs as you want. The order does not matter.</p>
                        <div id="reactMountPoint"></div>
                    </div>
                    <script type="text/javascript">
                        window.designs = <?php echo $designs; ?>;
                        window.shouldMountDesignPicker = true;
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>