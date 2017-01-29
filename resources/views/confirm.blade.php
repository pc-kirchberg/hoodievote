@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Are you sure these are the designs and colours you want to vote
                            for?</h1></div>

                    <div class="panel-body">
                        <p>Once you confirm your vote, there's no going back! You can only vote once.</p>
                    </div>

                    @foreach($selectedDesigns as $design)
                        <img src="{{$design}}" width="250">
                    @endforeach

                    <div class="designs">
                        @foreach($selectedColours as $colour)
                            <div class="colour" style="background-color: {{$colour}}"></div>
                        @endforeach
                    </div>
                    <br>
                    <a class="button" href="{{ route('choices') }}">Go Back</a>
                    <a class="button danger" href="{{ route('submit') }}">Submit Vote</a>
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
