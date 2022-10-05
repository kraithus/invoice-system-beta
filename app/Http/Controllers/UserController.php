<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

    public function changePassword()
    {
        return view('user-settings.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8|string',
        ]);

        $userAuth = Auth::user();

        // Ensure password is correct
        if (!Hash::check($request->get('current_password'), $userAuth->password))
        {
            return back()->with('message', 'Incorrect password');
        }

        // Ensure current and new password do not match
        if(strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return back()->with('message', 'You cannot use your old password');
        }

        $user = User::find($userAuth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('dashboard')->with('message', 'Password Updated.');

    }
}
