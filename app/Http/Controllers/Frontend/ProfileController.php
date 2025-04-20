<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function UserProfile()
    {
        return view('frontend.dashboard.profile');
    }

    public function UserProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        if($request->hasFile('image')){
            if($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $image = $request->file('image');
            $imageName = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/" . $imageName;      
            $user->image = $path;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');    
        $user->save();
        toastr()->success('Profile updated successfully.');
        return redirect()->back();

    }

    public function UserPasswordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        toastr()->success('Password updated successfully.');
        return redirect()->back();
    }
      
    
}