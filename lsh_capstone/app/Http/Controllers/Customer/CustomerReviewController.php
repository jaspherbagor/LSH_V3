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
        $rates = AccommodationRate::where('customer_id', Auth::guard('customer')->user()->id)->get();

        return view('customer.review_view', compact('rates'));
    }

    public function  add($id)
    {
        return view('customer.review_add');
    }
}
