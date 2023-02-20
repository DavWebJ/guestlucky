@extends('layouts.admin')

@section('token')
      <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"></h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Token Manager</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
        <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <p>Create new apiKey</p>
            </div>
            <div class="block-content">
                <form action="{{route('admin.store.token')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" id="apikey" name="apikey" placeholder="Your ApiKey goes here" autofocus required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-outline-info mr-1 mb-3">
                            <i class="fa fa-fw fa-refresh mr-1"></i> Save your api key
                        </button>
                    </div>
                </form>  
            </div>
        </div>
        <!-- END Info -->
@endsection