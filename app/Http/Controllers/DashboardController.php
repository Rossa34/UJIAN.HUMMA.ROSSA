<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalCustomers' => Customer::count(),
            'totalServices' => Service::count(),
            'totalBookings' => Booking::count(),
            'totalPayments' => Payment::count(),
        ]);
    }
}
