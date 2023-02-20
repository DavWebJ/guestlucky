@extends('layouts.admin')
@section('message.count')

@endsection
@section('unread')

@endsection
@section('admin.dashboard')
  <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"></h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
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
                 <h1 class="block-title">dernier appelle API: <span>il y à {{$diff ?? 'null'}} minutes </span></h1>
            </div>
            <div class="block-content">
                <p>
                    @if ($diff < 5)<span class="text-danger small">vous devez attendre quelques minutes</span>@else <span class="text-success small">vous pouvez faire un call API</span> <a class="btn btn-success" href="{{route('admin.refresh')}}">refresh database</a>@endif
                    
                </p>

            </div>
        </div>
        <!-- END Info -->
             <!-- Dynamic Table Full -->
        <livewire:checkin-component/> 

    </div>
    <!-- END Page Content -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>

    $(function () {

    });

</script>    
@endsection
