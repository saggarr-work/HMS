<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontPaymentController extends Controller
{
    public function index(){
        $member = Member::where('member_email', Auth::user()->email)->first();
        return view('frontend.payment.index', compact('member'));
    }
}
