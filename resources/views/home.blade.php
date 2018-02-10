@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/publisher/export">publisher EXport/</a><br>
                        <a href="/advertiser/export">advertiser/ EXport</a><br>
                        <a href="/publisher">publisher/</a><br>
                        <a href="/advertiser">advertiser/</a><br>
                        <a href="/publisher/payments">publisher/payments</a><br>
                        <a href="/advertiser/payments">advertiser/payments</a><br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
