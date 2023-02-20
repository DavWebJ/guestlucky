<x-admin-layout>
  <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"></h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Properties</li>
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
                 <h1 class="block-title text-center text-primary">Properties List</h1>
            </div>
        </div>
        <!-- END Info -->

         <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Your Properties</h3>
                <button class="btn btn-hero-primary mr-1 mb-3"> 
                    <i class="fa fa-fw fa-plus mr-1"></i> Add new property                     
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-vcenter js-dataTable-full thead-dark table-responsive table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th class="d-sm-table-cell">Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">propId</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">ownerId</th>
                            <th style="width: 15%;">City</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Qty</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">minPrice</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">roomId</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">maxPeople</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">maxAdult</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">maxChildren</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($properties ?? '')
                        @foreach ($properties as $property)
                        <tr>
                            <td class="text-center">{{ $property->id }}</td>
                            <td class="font-w600">
                                <a href="javascript:void(0)">{{$property->name}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{ $property->propId }}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{ $property->ownerId }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->city }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->qty }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->minPrice }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->roomId }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->maxPeople }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->maxAdult }}</em>
                            </td>
                            <td>
                                <em class="text-muted"> {{ $property->maxChildren }}</em>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>     
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

         <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                 <h1 class="block-title text-center text-primary">Prop Key List</h1>
            </div>
        </div>
        <!-- END Info -->

         <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Your property api key (propKey)</h3>
                    <a class="btn btn-hero-primary mr-1 mb-3" href="{{route('properties.create.propkey')}}">
                       <i class="fa fa-fw fa-plus mr-1"></i> Add new propKey
                    </a>                 
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-vcenter js-dataTable-full thead-dark table-responsive table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th class="d-sm-table-cell">Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">propKey</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($propkeys) > 0)
                            @foreach ($propkeys as $propkey)
                            <tr>
                                <td class="text-center">{{ $propkey->id }}</td>
                                <td class="font-w600">
                                    <a href="javascript:void(0)">{{$propkey->properties->name}}</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{ $propkey->propkey }}</em>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>     
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>

    $(function () {

    });

</script>    
</x-admin-layout>