@extends('layouts.admin')
@section('admin.propkey')
<!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"></h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create prop key</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
        <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
            @if (count($properties) > 0 )
                <div>
                    <h1 class="block-title">Set your prop key for your property from your beds24 account</h1>
                </div>
                @else
                <div>
                    <h1 class="block-title text-danger">houston ! we have a problem with your properties</h1>
                    <span class="text-danger">make sur, you have more than one property in database</span>
                </div>
            @endif
                 
            </div>
            <div class="block-content">

                <!-- Form Labels on top - Default Style -->
                <form class="mb-5" method="POST" action="{{ route('properties.store.propkey') }}">
                    @csrf
                    @if (count($properties) > 0 )
                    <div class="form-group">
                        <label>Select your property</label>
                        <select class="custom-select" id="prop_id" name="prop_id" required>
                            <option value="" selected="selected">Please select</option>
                            @foreach ($properties as $property)
                            <option value="{{$property->id}}">{{$property->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="propkey">Copy and Paste your Prop Key here:</label>
                        <input type="text" class="form-control" id="propkey" name="propkey" placeholder="Your PropKey goes here" autofocus required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Validate propkey</button>
                    </div>
                        @else
                        <div>
                            <span class="text-danger">sorry, we have not found any properties</span>
                        </div>
                    @endif

                </form>
                <!-- END Form Labels on top - Default Style -->             
            </div>
        </div>
        <!-- END Info -->
@endsection