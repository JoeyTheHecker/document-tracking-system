<?php
use App\Models\DocumentTracking;
use App\Models\Outgoing;

function receivedTotal()
{
    $total = DocumentTracking::where('office_division', auth()->user()->office_division)
    ->where('status', 'received')
    ->get()
    ->count();

    return $total;
}

function rejectedTotal()
{
    $total = DocumentTracking::where('office_division', auth()->user()->office_division)
    ->where('status', 'rejected')
    ->get()
    ->count();
    return $total;
}

function incomingTotal()
{
    // $documentTrackings = DocumentTracking::all();

    // $total = $documentTrackings->filter(function($d){
    //                 return $d->office_division == auth()->user()->office_division &&  $d->status == 'released';
    //             })->count();

    $total = DocumentTracking::where('office_division', auth()->user()->office_division)
    ->where('status', 'incoming')
    ->get()
    ->count();

    return $total;

}

function outgoingTotal()
{
    $total = Outgoing::with('user')->get()->filter(function($o){
                    return $o->user->office_division == auth()->user()->office_division;
                })->count();
    return $total;
}



?>
