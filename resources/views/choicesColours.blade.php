@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Vote</h1></div>

                    <div class="panel-body">
                        <p>Now, please tap or click on each of the colours that you like.</p>
                        <p>Again, you can choose as many as you want, and the order does not matter.</p>
                        <react-component component="Votes">
                            <react-props>
                                <react-prop key="type" value="Colour" />
                                <react-prop key="votables" value="eval({!! $colours !!})" />
                                <react-prop key="submitLocation" value="confirm" />
                            </react-props>
                        </react-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script>
//        window.onbeforeunload = function(e) {
//            var dialogText = 'Your vote has not yet been saved! Are you sure you want to cancel?';
//            e.returnValue = dialogText;
//            return dialogText;
//        };
    </script>
@endsection
