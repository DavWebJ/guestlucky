@extends('layouts.admin')

@section('admin.rating')
<style>
  [x-cloak=""] { display: none; }
</style>
  <!-- Hero -->
  <div class="bg-body-light">
      <div class="content content-full">
          <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
              <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Sidebar - Dark</h1>
              <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">dashboard admin</a></li>
                      <li class="breadcrumb-item">Sidebar</li>
                      <li class="breadcrumb-item active" aria-current="page">Dark</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <!-- END Hero -->

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
        <div class="card-header bg-dark py-3 d-flex justify-content-center my-4">
        </div>
          <div class="card-body">
            <livewire:comment-table 
            searchable="comment"/>
          </div>
        </div>
      </div>
    </div>
@endsection
