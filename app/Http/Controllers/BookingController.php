<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\BookingModel;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->get('type'))
        {
            $booking = BookingModel::create([
                'UUID_BOOKING' => $request->get('UUID_BOOKING'),
                'PHONE_BOOKING' => $request->get('PHONE_BOOKING'),
                'ACTION_BOOKING' => $request->get('ACTION_BOOKING')
            ]);
            return response()->json($booking, 200);
        }
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
        if($request->has("action"))
        {
            if($request->get('action') == 2)
            {
                $booking = BookingModel::where('UUID_BOOKING',$id)->update([
                    'NOTE_BOOKING' => $request->get('NOTE_BOOKING'),
                    'ACTION_BOOKING' => $request->get('action')
                ]);
                return response()->json($booking, 200);
            }
            else {  
                $booking = BookingModel::where('UUID_BOOKING',$id)->update($request->all());
                return response()->json($booking, 200);
            }
        }
        else if($request->has('token')) {
            $booking = BookingModel::where('UUID_BOOKING',$id)->update([
                'NOTIFY_TOKEN' => $request->get('token')
            ]);
            return response()->json($booking, 200);
        }
        
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
