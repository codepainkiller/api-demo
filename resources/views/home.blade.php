@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <pusher-events></pusher-events>
            <track-list></track-list>
        </div>
        <div class="col-md-4">
            <api-doc></api-doc>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Powered by</h4>
                </div>
                <div class="panel-body text-center">
                    <ul class="list-inline">
                        <li><a href="https://laravel.com" target="_blank">Laravel</a></li>
                        <li><a href="https://vuejs.org" target="_blank">Vue.js</a></li>
                        <li><a href="https://pusher.com" target="_blank">Pusher</a></li>
                        <li><a href="http://getbootstrap.com/" target="_blank">Booststrap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
