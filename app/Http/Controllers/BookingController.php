<?php

namespace App\Http\Controllers;

use App\Events\BookingCreated;
use Illuminate\Http\Request;

class BookingController
{
    public function __invoke(Request $request)
    {
        BookingCreated::dispatch(
            $request->get('hotel_uuid'),
            $request->get('user_name'),
            $request->get('user_email')
        );
    }
}
