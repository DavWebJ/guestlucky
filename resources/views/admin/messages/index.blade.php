@extends('layouts.admin')
@section('css_message')
    <link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('messages')
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

                                <!-- Messages -->
                                <div class="list-group font-size-sm">
                                     @if ($messages ?? 'aucun message')
                                        @foreach ($messages as $message)
                                    <a class="list-group-item list-group-item-action" href="{{ route('messages.show',$message->id) }}">
                                        @if( $message->read == 0)
                                        <span class="badge badge-pill badge-dark m-1 float-right">unread</span>
                                        @else
                                        <span class="badge badge-pill badge-success m-1 float-right">read</span>
                                        @endif
                                        <p class="font-size-h6 font-w700 mb-0">
                                            Message from 
                                        </p>
                                        <p class="text-muted mb-2">
                                            {{ Str::limit($message->message,$limit = 100, $end = '...')}}
                                        </p>
                                        <p class="font-size-sm text-muted mb-0">
                                            <strong>{{ $message->booking->firstname ?? '' }}</strong> <strong>{{ $message->booking->lastname ?? '' }}</strong>, {{ \Carbon\Carbon::parse($message->time)->diffForHumans() }}
                                        </p>
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                                <!-- END Messages -->
                            </div>
                            <!-- END Side Content -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-7 col-xl-9 bg-body-dark">
                        <!-- Main Content -->
                        <div class="content">
                           


                            </div>
                            <!-- END Message -->

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