@extends('admin.layout.app')

@section('heading', 'Accommodation Reviews')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Accommodation</th>
                                        <th>Rate</th>
                                        <th>Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $row)
                                    @php 
                                    $accommodation = \App\Models\Accommodation::where('id', $row->accommodation_id)->first();
                                    $customer = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $accommodation->name }}</td>
                                        <td>
                                            @switch($row->rate)
                                                @case(1)
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    @break

                                                @case(2)
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    @break

                                                @case(3)
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    @break

                                                @case(4)
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    @break

                                                @case(5)
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    @break

                                                @default
                                                    <span class="text-muted">Unknown</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $customer->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="" class="btn btn-danger mb-md-0 mb-1" onClick="return confirm('Are you sure you want to delete this review?');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
