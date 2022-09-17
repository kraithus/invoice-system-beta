<?php

namespace App\Http\Controllers;

use App\Mail\NotificationDelivery;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $userID = Auth::user()->id;

        $notifications = Notification::where('technician_id', $userID)->get();

        $data = [
            'notifications' => $notifications
        ];

        return view('notification.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get technician list
        $technicians = User::where('role_id', 2)->get(); // 2 is the id for role Technician
        return view('notification.add', [
            'technicians' => $technicians
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'maX:255',
            'body' => 'required',
            'technician_id' => 'required', 'integer', 'number',
        ]);

        $notification = new Notification;

        $notification->title = $request->title;
        $notification->body = $request->body;
        $notification->technician_id = $request->technician_id;
        $notification->controller_id = Auth::user()->id;

        $notification->save();

        // Get technician email
        $userID = $request->technician_id;
        $user = User::find($userID);
        $userEmail = $user->email;

        // Send an email to technician
        $subject = $request->title;
        $message = $request->body;

        Mail::to($userEmail)->send(new NotificationDelivery($subject, $message));

        return redirect()->route('cpanel')->with('message', 'Notification Sent! Have a good day');
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
