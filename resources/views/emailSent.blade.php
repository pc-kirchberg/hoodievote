@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Thank you!</h1></div>

                    <div class="panel-body">
                        <p>Please check your school email for further instructions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
<script>
    mixpanel.identify('{{ $email }}');
</script>
@endsection
