<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Vote</h1></div>

                    <div class="panel-body">
                        <p>Please tap or click on each of the designs that you like.</p>
                        <p>You can choose as many designs as you want. The order does not matter.</p>
                        <react-component component="Votes">
                            <react-props>
                                <react-prop key="type" value="Design" />
                                <react-prop key="votables" value="eval(<?php echo $designs; ?>)" />
                                <react-prop key="submitLocation" value="choicesColours" />
                            </react-props>
                        </react-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>