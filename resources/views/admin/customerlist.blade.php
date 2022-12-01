@extends('layouts.admin')

@section('admin.customerlist')
<style>
    [x-cloak=""] {
        display: none;
    }
</style>

<div class="col-md-12 col-12 col-md-12 col-xl-12">
    <h1 class="head-title">Actual customer list</h1>
    <a  class="btn btn-hero-info js-click-ripple-enabled" href="#"><span class="fa fa-plus"></span> Add new customer</a>
      <livewire:customers-table />
</div>
    
@endsection
