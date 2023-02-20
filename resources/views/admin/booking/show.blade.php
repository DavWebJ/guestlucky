@extends('layouts.admin')
@section('css_message')
    <link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('booking')


                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Booking n° <span class="text-danger">{{$booking->booking_id}}</span></h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Booking</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                 <!-- Reply -->
                 <div class="content">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <!-- Summernote (.js-summernote class is initialized in Helpers.summernote()) -->
                            <!-- For more info and examples you can check out http://summernote.org/ -->
                            <form action="{{route('admin.send')}}" method="post">
                                @csrf
                                <textarea class="js-summernote" id="message" name="message" data-height="200"></textarea>
                            <div class="row justify-between">
                                <button type="submit" class="btn btn-rounded btn-primary mx-2 mb-3 mt-4">
                                    <i class="fa fa-fw fa-paper-plane mr-1"></i> Send Message
                                </button>
                                <a class="btn btn-rounded btn-danger mx-2 mb-3 mt-4" href="#">
                                    <i class="fa fa-fw fa-trash mr-1"></i>
                                    Supprimer la réservation
                                </a>
                            </div>
                            </form>
                            


                        </div>
                    </div>
                    <!-- END Reply -->
                 </div>


                <!-- Page Content -->
                <div class="content">
                    <div class="block block-rounded text-center js-wizard-simple">
                    
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#user" data-toggle="tab">
                                            <i class="fa fa-fw fa-user mr-1"></i>
                                            Infos client</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#facture" data-toggle="tab">
                                            <i class="fa fa-fw fa-pen mr-1"></i>
                                            Nouvelle Facture</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                            <i class="fa fa-fw fa-envelope mr-1"></i>
                                            Messages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#booking" data-toggle="tab">
                                            <i class="fa fa-fw fa-book-open mr-1"></i>
                                            Info booking</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form action="be_forms_wizard.html" method="POST">
                                    <!-- Steps Content -->
                                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="user" role="tabpanel">
                                            
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Nom
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->lastname}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Prénom
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->firstname}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Adresse
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->address}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Code postale
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->postcode}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Ville
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->city}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Pays
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->country}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Email
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Telephone
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$booking->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Nombre de personne
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="{{$total}}">
                                            </div>
                                        </div>
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane" id="facture" role="tabpanel">
                                            <div class="form-group">
                                                <label for="wizard-simple-bio">Bio</label>
                                                <textarea class="form-control" id="wizard-simple-bio" name="wizard-simple-bio" rows="7"></textarea>
                                            </div>
                                        </div>
                                        <!-- END Step 2 -->

                                        <!-- Step 3 -->
                                        <div class="tab-pane" id="messages" role="tabpanel">
                                                @if($booking)
                                                    <p>pas de messages pour cette réservation</p>
                                                @else
                                                
                                                @foreach ($messages as $message)
                                                @if ($message->source == 'host')
                                            <div class="block block-rounded">
                                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                                    <div class="media py-3">
                                                        <div class="mr-3 ml-2 overlay-container overlay-right">
                                                            <img src="{{asset('media/icon/logoguestlucky.png')}}" class="img-avatar img-avatar48">
                                                            <i class="far fa-circle text-white overlay-item font-size-sm bg-success rounded-circle"></i>
                                                        </div>
                                                        
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                    <span class="font-w600 link-fx">{{ auth()->user()->name}}</span>
                                                                    
                                                                </div>
                                                                <div class="col-sm-5 d-sm-flex align-items-sm-center">
                                                                    <div class="font-size-sm font-italic text-muted text-sm-right w-100 mt-2 mt-sm-0">
                                                                        <p class="mb-0"> {{ \Carbon\Carbon::parse($message->time)->format('d-m-Y h:i') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-content">
                                                    <p>{{$message->message}}</p>
                                                </div>
                                            </div>
                                            @else
                                            <div class="block block-rounded">
                                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                                    <div class="media py-3">
                                                        <div class="mr-3 ml-2 overlay-container overlay-right">
                                                            <img src="{{asset('media/icon/guest.png')}}" class="img-avatar img-avatar48">
                                                            <i class="far fa-circle text-white overlay-item font-size-sm bg-success rounded-circle"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                    <span class="font-w600 link-fx">{{ $message->booking->firstname ?? 'guest'}} {{ $message->booking->lastname ?? ''}}</span>
                                                                    <div class="font-size-sm text-muted">{{ $message->booking->email ?? '' }}</div>
                                                                </div>
                                                                <div class="col-sm-5 d-sm-flex align-items-sm-center">
                                                                    <div class="font-size-sm font-italic text-muted text-sm-right w-100 mt-2 mt-sm-0">
                                                                        <p class="mb-0"> {{ \Carbon\Carbon::parse($message->time)->format('d-m-Y h:i') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-content">
                                                    <p>{{$message->message}}</p>
                                                </div>  
                                            </div>
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                        <!-- END Step 3 -->
                                        <!-- Step 4 -->
                                        <div class="tab-pane" id="booking" role="tabpanel">
                                            <div class="form-group">
                                                <label for="wizard-simple-bio">Booking</label>
                                                <textarea class="form-control" id="wizard-simple-bio" name="wizard-simple-bio" rows="7"></textarea>
                                            </div>
                                        </div>
                                        <!-- END Step 4 -->
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary disabled" data-wizard="prev">
                                                    <i class="fa fa-angle-left mr-1"></i> Previous
                                                </button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-secondary" data-wizard="next">
                                                    Next <i class="fa fa-angle-right ml-1"></i>
                                                </button>
                                                <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                                    <i class="fa fa-check mr-1"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            
                            
                    </div>
                </div>
                <!-- END Page Content -->
            @endsection
                

@section('js_message')
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>jQuery(function(){Dashmix.helpers('summernote');});</script>
@endsection