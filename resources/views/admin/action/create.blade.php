@extends('layouts.admin')

@section('admin.create')
  <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"></h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Create new admin</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
        <!-- Page Content -->
    <div class="content">
        <!-- Info -->
       <div class="block">
            <div class="block-content">
                    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            @include('includes.errors')
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus placeholder="Admin name">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="apikey" class="form-control" name="apikey" required autocomplete="apikey" placeholder="paste your beds24 apikey here">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-key"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="role_id" class="form-control" value="1" name="role_id" required readonly>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <label for="role_id">role admin</label>
                        </span>
                    </div>
                </div>
            </div>
            @error('role_id')
                <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
            </div>
        </div> 
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
@endsection
