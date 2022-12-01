@extends('layouts.admin')

@section('admin.adminlist')
<style>
    [x-cloak=""] {
        display: none;
    }
</style>

<div class="col-md-12 col-12 col-md-12 col-xl-12">
    <h1 class="head-title">Admin super list</h1>
    <a  class="btn btn-hero-info js-click-ripple-enabled" href="{{route('admin.create')}}"><span class="fa fa-plus"></span> Ajouter un Admin</a>
      <livewire:admintable />
</div>
    
@endsection