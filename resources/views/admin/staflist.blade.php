@extends('layouts.admin')

@section('admin.staflist')
<style>
    [x-cloak=""] {
        display: none;
    }
</style>

<div class="col-md-12 col-12 col-md-12 col-xl-12">
    <h1 class="head-title">Actual Staf List</h1>
    <a  class="btn btn-hero-info js-click-ripple-enabled" href="#"><span class="fa fa-plus"></span> Add new staf</a>
      <livewire:stafs-table />
</div>
    
@endsection
