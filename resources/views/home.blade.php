@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    <iframe id="iframe-er" class="embed-responsive-item" src="http://test-lhrc-er-hsrc.pnu.edu.sa/EducationalResources/search" allowfullscreen="allowfullscreen" width="100%" scrolling="no" style="display: inline-block; overflow: hidden; line-height: 0; height: -webkit-fill-available;" ></iframe>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
