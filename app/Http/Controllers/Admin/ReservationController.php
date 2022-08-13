<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index() {
         $reservations =  Reservation::all();
         return view('admin.reservation.index', compact('reservations'));
    }
    
    public function status($id){
        $reservation = Reservation::fine($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail', $reservation->email)
                ->notify(ReservationConfirmed());
        Toastr::success('Reservation Successfully confirmed','Success',["positionClass"=>"toast-top-right"]);
        return redirect()->back();
    }

        public function destroy($id){
        Reservation::find($id)->delete();
        Toastr::success('Reservation Delete Successfully','Success',["positionClass"=>"toast-top-right"]);
        return redirect()->back();
    }
}
