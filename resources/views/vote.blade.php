@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Welcome. Ready to vote?</h1></div>

                    <div class="panel-body">
                        <a href="{{ route('choices') }}" class="button">Vote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
