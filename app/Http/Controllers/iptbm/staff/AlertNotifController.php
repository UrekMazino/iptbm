<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmIpTaskNotification;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AlertNotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $name): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $ip_task = IptbmIpAlertTask::with("stage", "ip_alert", "ip_alert.ip_type", 'personnel', 'units', 'task_deadline', 'ip_task_stage_notifications')->find($id);
        return view('iptbm.staff.ipmanagement.notification', [
            'ip_task' => $ip_task,
            'name' => $name
        ]);
    }

    public function update_notification(Request $request, $id)
    {
        //   $time= Carbon::createFromFormat('h:i A', $request->notif_hour)->format('H:i:s');

        $request->validate([
            'notification_description' => 'required|min:10',
            'frequency' => 'required|in:weekly,daily',
            'weekly_notif_day' => 'required_if:frequency,weekly',
            'notif_hour' => 'required|date_format:g:i A',
        ]);
        $notification = IptbmIpTaskNotification::where('ip_alert_task_id', $id)->first();
        $notification->frequency = $request['frequency'];
        $notification->notification_details = $request['notification_description'];
        if ($request->frequency === 'weekly') {
            $notification->day_of_week = $request['weekly_notif_day'];
        } else {
            $notification->day_of_week = null;
        }
        $notification->time_of_day = Carbon::createFromFormat('h:i A', $request['notif_hour'])->format('H:i:s');

        $notification->save();
        return redirect()->back();
    }
}
