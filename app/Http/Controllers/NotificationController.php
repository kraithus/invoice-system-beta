<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Mail\NotificationDelivery;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
        $notifications = Notification::where('technician_id', $userID);
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
            'message' => 'required',
            'technician_id' => 'required', 'integer', 'number',
        ]);

        $notification = new Notification;

        $notification->message = $request->message;
        $notification->technician_id = $request->technician_id;
        $notification->controller_id = Auth::user()->id;

        $notification->save();

        // Get technician email
        $userID = $request->technician_id;
        $user = User::find($userID);
        $userEmail = $user->email;

        // Send an email to technician
        $message = $request->message;

        Mail::to($userEmail)->send(new NotificationDelivery($message));

        return redirect()->route('dashboard')->with('message', 'Notification Sent! Have a good day');
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
