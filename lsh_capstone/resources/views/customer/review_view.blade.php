@extends('customer.layout.app')

@section('heading', 'My Reviews')

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
                                        <th>Heading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rates as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->accommodation_id }}</td>
                                        <td>{{ $row->rate }}</td>
                                        <td>{{ $row->heading }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="" class="btn btn-info mb-md-0 mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="" class="btn btn-primary mb-md-0 mb-1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
