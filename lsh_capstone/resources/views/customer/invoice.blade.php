@extends('customer.layout.app')

@section('heading', 'Order Invoice')

@section('main_content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order #{{ $order->order_no }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <address>
                                <strong>Invoice To</strong><br>
                                <img src="{{ asset('uploads/'.Auth::guard('customer')->user()->photo) }}" alt="profile photo" class="w_50" ><br>
                                {{ Auth::guard('customer')->user()->name }}<br>
                                {{ Auth::guard('customer')->user()->address }},<br>
                                {{ Auth::guard('customer')->user()->city }}, <br>
                                {{ Auth::guard('customer')->user()->province }}
                            </address>
                        </div>
                        <div class="col-md-4">
                            <address>
                                <strong>Invoice from:</strong><br>                    
                                <img src="{{ asset('uploads/logo.png') }}" alt="" class="w_100"><br>
                                Tandang Sora St., Antonino,<br>
                                Labason, Zamboanga del Norte, 7117 <br>
                                contact@labason.space <br>
                            </address>
                        </div>
                        <div class="col-md-4 text-md-right">
                            <address>
                                <strong>Invoice Date</strong><br>
                                {{ $order->booking_date }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Room information given below in detail:</p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Room Name</th>
                                <th class="text-center">Checkin Date</th>
                                <th class="text-center">Checkout date</th>
                                <th class="text-center">Number of Adult</th>
                                <th class="text-center">Number of Children</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            @php   $total = 0;   @endphp
                            @foreach($order_detail as $item)
                            @php
                            $room_data = \App\Models\Room::where('id',$item->room_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room_data->room_name }}</td>
                                <td class="text-center">{{ $item->checkin_date }}</td>
                                <td class="text-center">{{ $item->checkout_date }}</td>
                                <td class="text-center">{{ $item->adult }}</td>
                                <td class="text-center">{{ $item->children }}</td>
                                <td class="text-right">
                                    @php
                                        $d1 = explode('/',$item->checkin_date);
                                        $d2 = explode('/',$item->checkout_date);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        $sub = $room_data->price*$diff;
                                        echo '₱'.number_format($room_data->price*$diff, 2);
                                    @endphp
                                </td>
                            </tr>
                            @php
                            $total += $sub;
                            @endphp
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">₱{{ number_format($total, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-primary bg-website btn-icon icon-left text-white print-invoice-button"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection