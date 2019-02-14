<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;

class MessageC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $contact_id = $request->contact_id;
        $messages = Message::select(
            'id',
            'from_id',
            'content',
            'created_at')
            ->where(function ($query) use ($user_id,$contact_id){
                $query->where('from_id',$user_id)->where('to_id',$contact_id);
            })->orWhere(function ($query) use ($user_id,$contact_id){
                $query->where('from_id',$contact_id)->where('to_id',$user_id);
            })
            ->get();

        foreach ($messages as $k) {
            if($k->from_id == $user_id){
                $k->written_by_me = true;
            }else{
                $k->written_by_me = false;
            }
        }
        return $messages;              
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->from_id = auth()->id();
        $message->to_id = $request->to_id;
        $message->content = $request->content;
        $saved = $message->save();

        $data=[];
        $data['success'] = $saved;
        return $data;
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
