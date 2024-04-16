<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerReviewController extends Controller
{
    public function index()
    {
        $rates = AccommodationRate::get();

        $accommodation = Accommodation::where('id', $rates->accommodation_id)->first();

        return view('customer.rate_view', compact('rates', 'accommodation'));
    }
}
