@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $accommodation->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="" class="w-100">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-start">
            <div>
                <h3 class="fw-bold mb-4">Contact Information</h3>
                <p><span class="fw-bold">Name:</span> {{ $accommodation->name }}</p>
                <p><span class="fw-bold">Contact Number:</span> {{ $accommodation->contact_number }}</p>
                <p><span class="fw-bold">Contact Email:</span> {{ $accommodation->contact_email }}</p>
                <p><span class="fw-bold">Address:</span> {{ $accommodation->address }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="map">
                {!! $accommodation->map !!}
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center fw-bold">
        AVAILABLE ROOMS
    </h2>
</div>

<div class="home-rooms">
    <div class="container">
        <div class="row">
            @foreach($room_all as $item)
            <div class="col-md-3">
                <div class="inner">
                    <div class="card room-card mb-4">
                        <div class="photo card-img-top">
                            <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="" class="img-fluid">
                        </div>
                        <div class="text card-body">
                            <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->room_name }}</a></h2>
                            <div class="price">
                                @if($accommodation_type->name !== 'Hotel')
                                ₱{{ $item->price }}/month
                                @else
                                ₱{{ $item->price }}/night
                                @endif
    
                            </div>
                            <div class="button">
                                <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                {{ $room_all->links() }}
            </div>
        </div>
    </div>
    
    <div class="container py-5 mb-4">
        <h2 class="text-center mb-5">HAPPY CUSTOMERS</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card bg-danger" style="width: 18rem;">
                        <div class="card-body">
                            
                            <h5 class="card-title mb-3">Awesome! Excellent! Amazing!</h5>
                            <div class="text-start mb-4">
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                            </div>
                            <img src="{{ asset('/uploads/user.jpg') }}" alt="" class="w-25 img-fluid rounded-circle">
                            <p class="card-text mt-3">I really love the services offered at Bayangan Hotel and Beach Resort. I really enjoy my stay at Labason. </p>
                            <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection