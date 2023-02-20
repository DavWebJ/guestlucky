<div class="block block-rounded">
    <div class="block-header block-header-default">
                <h3 class="block-title">Check In</h3>
                <div class="form-group">
                    <label for="filterby">Filter</label>
                    <select class="custom-select" id="filterby" name="filterby" wire:model="sorting">
                        <option value="all" selected="selected">All</option>
                        <option value="today">Today</option>
                        <option value="j+1">Tomorrow</option>
                        <option value="j+2">Day +2</option>
                        <option value="j-1">Yesterday</option>
                        
                    </select>   
                </div>  
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-vcenter js-dataTable-full thead-dark table-responsive table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th class="d-sm-table-cell">Property name</th>
                            <th class="d-sm-table-cell">Booking Id</th>
                            <th class="d-sm-table-cell">Api Reference</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
                            <th class="d-sm-table-cell">Arrival</th>
                            <th class="d-sm-table-cell">Departure</th>
                            <th class="d-sm-table-cell">Client</th>
                            <th class="d-sm-table-cell">numAdult</th>
                            <th class="d-sm-table-cell">numChild</th>
                            <th class="d-sm-table-cell">payement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bookings ?? '')
                        @if (count($bookings) > 0)
                            @foreach ($bookings as $booking)
                            <tr>
                                <td class="text-center">{{ $booking->id }}</td>
                                <td class="text-center">{{ $booking->property->name ?? 'No Name !!'}}</td>
                                <td class="text-center">{{ $booking->booking_id }}</td>
                                <td class="text-center">{{ $booking->apiReference }}</td>
                                <td class="text-center">
                                @if ($booking->status == 'new')
                                <span class="badge badge-warning">{{ $booking->status }}</span>
                                @elseif ($booking->status == 'confirmed')
                                <span class="badge badge-success">{{ $booking->status }}</span>
                                @elseif ($booking->status == 'request')
                                <span class="badge badge-info">{{ $booking->status }}</span>
                                @else
                                <span class="badge badge-primary">{{ $booking->status }}</span>
                                @endif
                                </td>
                                <td class="text-center text-danger">{{ $booking->arrival }}</td>
                                <td class="text-center">{{ $booking->departure }}</td>
                                <td class="text-center">{{ $booking->firstname }} {{ $booking->lastname }}</td>
                                <td class="text-center">{{ $booking->numAdult }}</td>
                                <td class="text-center">{{ $booking->numChild }}</td>
                                <td class="text-center">{{ $booking->price }} €</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        @if (isset($booking))
                                        <a class="btn btn-sm btn-outline-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Voir" href="{{route('admin.booking.show',['booking' => $booking])}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endif

                                    </div>     
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        @endif
                    </tbody>
                </table> 

            
            </div>

            <div class="block-header block-header-default">
                <h3 class="block-title">Check Out</h3>
            </div>
            <div class="block-content block-content-full">
               <table class="table table-bordered table-vcenter js-dataTable-full thead-dark table-responsive table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th class="d-sm-table-cell">Property name</th>
                            <th class="d-sm-table-cell">Booking Id</th>
                            <th class="d-sm-table-cell">Api Reference</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
                            <th class="d-sm-table-cell">Arrival</th>
                            <th class="d-sm-table-cell">Departure</th>
                            <th class="d-sm-table-cell">Client</th>
                            <th class="d-sm-table-cell">numAdult</th>
                            <th class="d-sm-table-cell">numChild</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($checkouts) > 0)
                            @foreach ($checkouts as $checkout)
                            <tr>
                                <td class="text-center">{{ $checkout->id }}</td>
                                <td class="text-center">{{ $checkout->property->name ?? 'No Name !!'}}</td>
                                <td class="text-center">{{ $checkout->booking_id }}</td>
                                <td class="text-center">{{ $checkout->apiReference }}</td>
                                <td class="text-center">
                                @if ($checkout->status == 'new')
                                <span class="badge badge-warning">{{ $checkout->status }}</span>
                                @elseif ($checkout->status == 'confirmed')
                                <span class="badge badge-success">{{ $checkout->status }}</span>
                                @elseif ($checkout->status == 'request')
                                <span class="badge badge-info">{{ $checkout->status }}</span>
                                @else
                                <span class="badge badge-primary">{{ $checkout->status }}</span>
                                @endif
                                </td>
                                <td class="text-center">{{ $checkout->arrival }}</td>
                                <td class="text-center text-danger">{{ $checkout->departure }}</td>
                                <td class="text-center">{{ $checkout->firstname }} {{ $checkout->lastname }}</td>
                                <td class="text-center">{{ $checkout->numAdult }}</td>
                                <td class="text-center">{{ $checkout->numChild }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                         @if (isset($checkout))
                                        <a class="btn btn-sm btn-outline-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Details" href="{{route('admin.booking.show',['booking' => $checkout])}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                    </div>     
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>


            </div>
</div>
