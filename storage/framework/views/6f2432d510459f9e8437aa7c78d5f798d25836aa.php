<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Vote</h1></div>

                    <div class="panel-body">
                        <p>Now, please tap or click on each of the colours that you like.</p>
                        <p>Again, you can choose as many as you want, and the order does not matter.</p>
                        <div id="reactMountPoint"></div>
                        <react-component component="Votes">
                            <react-props>
                                <react-prop key="type" value="Colour" />
                                <react-prop key="votables" value="eval(<?php echo $colours; ?>)" />
                                <react-prop key="submitLocation" value="confirm" />
                            </react-props>
                        </react-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>