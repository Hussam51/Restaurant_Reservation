<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        return view('admin.setting');
    }
    public function settingStore(Request $request, Setting $setting)
    {
        $request->validate([
            'phone_number' => 'required',
        ]);
        $imageName = $setting->image;
        if ($request->hasFile('image')) {
            Storage::delete($setting->image);

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageUrl = $image->storeAs('public/settings', $imageName);
        }

        $setting->update([
            'phone_number' => $request->name,
            'about_us' => $request->description,
            'image' => $imageUrl
        ]);

        return view('admin.index')->with('success', 'Created setting Successfully');
    }


    public function markAllAsReadnotifications()
    {

        $user = User::first();
        $unread = $user->unreadNotifications->markAsRead();
        return redirect()->route('admin.index');
    }
}
