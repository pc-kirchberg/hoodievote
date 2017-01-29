@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Sorry, seems like you've already voted.</h1></div>

                    <div class="panel-body">
                        <p>You can only vote once.</p>
                        <p>If this is a mistake, please let us know.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
