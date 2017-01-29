@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1 class="title m-b-md">Hoodie Logo Vote</h1></div>

                    <div class="subtitle">
                        <span class="smallsub">Votes close in</span>
                        <strong><react-component component="Countdown" /></strong>
                    </div>

                    <form method="post" action="{{ route('verify')  }}" class="panel-body" id="emailVerify"
                          onsubmit="saveEmail()">
                        <p>Please enter your school email address below.
                            (Please use your old <code>@euroschool.lu</code> address, <strong>not</strong> your new
                            <code>@student.eursc.eu</code> address.)</p>
                        <input type="email" id="email" name="email" placeholder="Email address" required>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="submitButton" type="submit">
                    </form>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <script>
                        function saveEmail() {
                            if (typeof mixpanel !== 'undefined') {
                                mixpanel.people.set({
                                    '$email': document.getElementById('email').value
                                });
                                mixpanel.register({
                                    'email': document.getElementById('email').value
                                });
                                mixpanel.identify(document.getElementById('email').value);
                            }
                            return true;
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
