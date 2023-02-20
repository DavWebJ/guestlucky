@extends('layouts.admin')
@section('css_message')
    <link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('message')
<!-- Page Content -->
                <div class="row no-gutters flex-md-10-auto">
                    <div class="col-md-4 col-lg-5 col-xl-3">
                        <div class="content">
                            <!-- Toggle Side Content -->
                            <div class="d-md-none push">
                                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                                <button type="button" class="btn btn-block btn-alt-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                                    Inbox Menu
                                </button>
                            </div>
                            <!-- END Toggle Side Content -->

                            <!-- Side Content -->
                            <div id="side-content" class="d-none d-md-block push">
                                <!-- New Message -->
                                <button type="button" class="btn btn-block btn-alt-success mb-3">
                                    <i class="fa fa-plus mr-1"></i> New Message
                                </button>
                                <!-- END New Message -->

                                <!-- Search Messages -->
                                <form action="be_pages_generic_inbox.html" method="POST" onsubmit="return false;">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0" placeholder="Search Messages..">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-0 bg-white">
                                                    <i class="fa fa-fw fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Search Messages -->

                                <!-- Sorting/Filtering -->
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-link font-w600 dropdown-toggle" id="inbox-msg-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sort by
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="inbox-msg-sort">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-sort-amount-down mr-1"></i> Newest
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-sort-amount-up mr-1"></i> Oldest
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-link font-w600 dropdown-toggle" id="inbox-msg-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Filter by
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="inbox-msg-filter">
                                            <a class="dropdown-item active" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-asterisk mr-1"></i> New
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-archive mr-1"></i> Archived
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-times-circle mr-1"></i> Deleted
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sorting/Filtering -->

                                <livewire:messenger/>
                            </div>
                            <!-- END Side Content -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-7 col-xl-9 bg-body-dark">
                        <!-- Main Content -->
                        <div class="content">
                            @if($bookings_messages ?? '')
                            @foreach ($bookings_messages as $message)
                            @if ($message->source == 'host')
                            <!-- Message -->
                            <div class="block block-rounded">
                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                    <div class="media py-3">
                                        <div class="mr-3 ml-2 overlay-container overlay-right">
                                            <i class="far fa-circle text-white overlay-item font-size-sm bg-success rounded-circle"></i>
                                        </div>
                                        
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <span class="font-w600 link-fx">Moi</span>
                                                    <div class="font-size-sm text-muted">{{ $message->booking->email ?? '' }}</div>
                                                </div>
                                                <div class="col-sm-5 d-sm-flex align-items-sm-center">
                                                    <div class="font-size-sm font-italic text-muted text-sm-right w-100 mt-2 mt-sm-0">
                                                        <p class="mb-0"> {{ \Carbon\Carbon::parse($message->time) }}</p>
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
                                                        <p class="mb-0"> {{ \Carbon\Carbon::parse($message->time) }}</p>
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
                            <!-- END Message -->

                            <!-- Reply -->
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <!-- Summernote (.js-summernote class is initialized in Helpers.summernote()) -->
                                    <!-- For more info and examples you can check out http://summernote.org/ -->
                                    <div class="js-summernote" data-height="200"></div>
                                    <button type="button" class="btn btn-rounded btn-primary mr-1 mb-3 mt-4">
                                        <i class="fa fa-fw fa-paper-plane mr-1"></i> Send Message
                                        </button>
                                </div>
                            </div>
                            <!-- END Reply -->
                        </div>
                        <!-- END Main Content -->
                    </div>
                </div>
                <!-- END Page Content -->
@endsection

@section('js_message')
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>jQuery(function(){Dashmix.helpers('summernote');});</script>
@endsection