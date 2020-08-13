<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Jobs\EmailJob;
use App\Mail\SendMessageMail;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('id','!=',Auth::id())->paginate(10);
        return view('site.pages.chat.index',compact('users'));
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
        $data = $request->validate([
           'user_id'=>'required|numeric|exists:users,id',
           'message'=>'required|string',
        ]);
        $user =User::find($data['user_id']);
        event(new ChatMessage($data['message'],$user));
        Message::create([
            'from_id'=>Auth::id(),
            'to_id'=>$data['user_id'],
            'message'=>$data['message']
        ]);
        dispatch(new EmailJob($user));
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $owner_id= Auth::id();
        $messages = Message::where(function ($q)use($id,$owner_id){
            $q->where('from_id',$owner_id)->where('to_id',$id);
        })->orWhere(function ($q)use($id,$owner_id){
            $q->where('to_id',$owner_id)->where('from_id',$id);
        })->latest()->paginate(50);
        $user = User::find($id);
        return view('site.pages.chat.show',compact('messages','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
