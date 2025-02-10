<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NewItemAddedNotification;


class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    }

    public static function sendNotification($message, $url)
    {
        $roles = ['super-admin', 'director', 'deputy-director', 'officer', 'staff'];
        $notifiableUsers = User::role($roles)->get(); // Using Spatie's helper function

        foreach ($notifiableUsers as $user) {
            // Pass message and URL to the notification
            $user->notify(new NewItemAddedNotification($message, $url));
        }
    }
}
