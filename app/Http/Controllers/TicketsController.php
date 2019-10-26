<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('user_id',auth()->user()->id)->get();
        // $tickets = Ticket::all();
       return $tickets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check())
        {
            return redirect('/events?id='.$request->event_id)->with('failed','Please Login to book');
        }
        $tickets = Ticket::where('user_id',auth()->user()->id)->get();
        foreach ($tickets as $ticket) {
            
            if ($ticket->event_id == $request->event_id && $ticket->type == $request->type) {
                if ($ticket->type == 1) {
                    return redirect('/events?id='.$request->event_id)->with('failed','You already have a Student ticket reserved ');
                }
                else if ($ticket->type == 2) {
                    return redirect('/events?id='.$request->event_id)->with('failed','You already have a Normal ticket reserved ');
                }
            }
            
        }
        $events = Event::where('id',$request->event_id)->get();
        foreach ($events as  $event) {

            if ($request->type == 1) {
                if($event->rem_std>0)
                    $event->rem_std --;
                else
                    return redirect('/events?id='.$request->event_id)->with('failed','There are no more Student tickets left for this event! ');
  
            }
            else if ($request->type == 2) {
                if($event->rem_nrm>0)
                    $event->rem_nrm --;
                else
                    return redirect('/events?id='.$request->event_id)->with('failed','There are no more Normal tickets left for this event! ');
            }
        }
        $event->save();
        $ticket = new Ticket;
        $ticket->user_id= auth()->user()->id;
        $ticket->event_id= $request->event_id;
        $ticket->type=$request->type;
        $ticket->created_at=now();
        $ticket->updated_at=now();
        
        $ticket->save();





        return redirect('/events?id='.$request->event_id)->with('success','Reservation Complete!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
