<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index');
    }
    public function ProfileUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:Users,email,' . auth()->id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the admin profile
        $admin = auth()->user();
        if($request->hasFile('image')) {
            // Delete old image if exists
            if ($admin->image && file_exists(public_path($admin->image))) {
                unlink(public_path($admin->image));
            }
            $image = $request->file('image');
            $imageName = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/" . $imageName;
            $admin->image = $path;
          
        }
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function PasswordUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:8',
        ]);
        // Update the password
        $admin = auth()->user();
        $admin->password = bcrypt($request->input('password'));
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully.');
    }
}