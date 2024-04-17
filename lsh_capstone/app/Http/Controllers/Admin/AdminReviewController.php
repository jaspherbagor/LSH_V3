<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccommodationRate;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = AccommodationRate::get();
        return view('admin.review_view', compact('reviews'));
    }
}
