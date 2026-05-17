<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('pages.payment.checkout');
    }

    public function success()
    {
        return view('pages.payment.success');
    }

    public function failed()
    {
        return view('pages.payment.failed');
    }
}