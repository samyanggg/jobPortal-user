<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function viewNotification()
    {
        if (!auth()->check()) {
            return redirect()->route('viewLogin')->withErrors([
                'auth' => 'You must be logged in to access the dashboard.'
            ]);
        }

        $notifications = Notification::where('receiver_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notification', compact('notifications'));
    }
}
