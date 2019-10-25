<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

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
        $tickets = Ticket::where('user_id',auth()->user()->id)->get();
        foreach ($tickets as $ticket) {
            if ($ticket->type == $request->type && $ticket->user_id == auth()->user()->id) {
                if ($ticket->type ==1) {
                    $type = 'student';
                }
                else{
                    $type = 'normal';
                }
            }
            return redirect('/events?id='.$request->event_id)->with('failed','You already have a '.$type.' ticket reserved ');
        }
        $ticket = new Ticket;
        $ticket->user_id= auth()->user()->id;
        $ticket->event_id= $request->event_id;
        $ticket->type=$request->type;
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
