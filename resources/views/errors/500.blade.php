@extends('layouts.guest')
@section('500')
                <div class="bg-image" style="background-image: url('assets/media/photos/photo19@2x.jpg');">
                    <div class="hero bg-white-95">
                        <div class="hero-inner">
                            <div class="content content-full">
                                <div class="px-3 py-5 text-center">
                                    <div class="row invisible" data-toggle="appear">
                                        <div class="col-sm-6 text-center text-sm-right">
                                            <div class="display-1 text-danger font-w700">500</div>
                                        </div>
                                        <div class="col-sm-6 text-center d-sm-flex align-items-sm-center">
                                            <div class="display-1 text-muted font-w300">Error</div>
                                        </div>
                                    </div>
                                    <h1 class="h2 font-w700 mt-5 mb-3 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">Oops.. You just found an error page..</h1>
                                    <h2 class="h3 font-w400 text-muted mb-5 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="450">We are sorry but the page we encounter problem with our server please retry in few minutes</h2>
                                    <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                        @auth
                                            @if (auth->user()->role_id == 1)
                                            <a class="btn btn-hero-secondary" href="{{ route('admin.dashboard') }}">
                                                <i class="fa fa-arrow-left mr-1"></i> Back to your dashbord
                                            </a>
                                            @elseif (auth->user()->role_id == 2)
                                            <a class="btn btn-hero-secondary" href="{{ route('staf.dashboard') }}">
                                                <i class="fa fa-arrow-left mr-1"></i> Back to your dashbord
                                            </a>
                                            @else
                                            <a class="btn btn-hero-secondary" href="{{ route('dashboard') }}">
                                                <i class="fa fa-arrow-left mr-1"></i> Back to your dashbord
                                            </a>
                                            @endif
                                        @endauth
                                        @guest
                                            <a class="btn btn-hero-secondary" href="{{ route('login') }}">
                                                <i class="fa fa-arrow-left mr-1"></i> Back to login page
                                            </a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
@endsection