<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmIpTaskInchargeUnit;
use App\Models\iptbm\IptbmIpTaskPersonel;
use App\Models\iptbm\IptbmPatentAgent;
use App\Models\iptbm\TaskDeadline;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class IpTaskView extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IptbmIpAlertTask $id ): Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
    {

        $ip_task = $id->load("stage","attachments","ip_alert","ip_alert.technology", "ip_alert.ip_type", 'personnel', 'units','task_deadline','ip_task_stage_notifications');

        return view('iptbm.staff.ipmanagement.ip-task-view', [
            'ip_task' => $ip_task,
        ]);
    }

    public function update_priority(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'priority' => 'required',
        ]);

        $ip_task = IptbmIpAlertTask::find($id);
        $ip_task->priority = $request->priority;
        $ip_task->save();
        return redirect()->back()->with('priority-update', 'Success');
    }

    public function add_personnel(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'input_name' => [
                'required',
                Rule::unique(IptbmIpTaskPersonel::class, 'name')
                    ->where("ip_alert_task_id", $id)
            ],
            'input_email' => 'required|email',
        ]);
        $task = IptbmIpAlertTask::find($id);
        $task->personnel()->saveMany([
            new IptbmIpTaskPersonel([
                'name' => $request['input_name'],
                'email' => $request['input_email']
            ])
        ]);

        return redirect()->back()->with("add-personnel", "new data was added..!");
    }

    public function add_unit(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'input_unit' => [
                'required',
                Rule::unique(IptbmIpTaskInchargeUnit::class, 'name')
                    ->where("ip_alert_task_id", $id)
            ],

        ]);
        $task = IptbmIpAlertTask::find($id);
        $task->units()->saveMany([
            new IptbmIpTaskInchargeUnit([
                'name' => $request['input_unit'],
            ])
        ]);

        return redirect()->back()->with("add-unit", "new data was added..!");
    }

    public function delete_person(Request $request): RedirectResponse
    {
        $request->validate([
            'delPersonnel' => 'required',
        ]);
        IptbmIpTaskPersonel::find($request->delPersonnel)->delete();
        return redirect()->back()->with("delete-personnel-success", "Personnel deleted successfully");
    }

    public function delete_unit(Request $request): RedirectResponse
    {
        $request->validate([
            'delUnit' => 'required',
        ]);
        IptbmIpTaskInchargeUnit::find($request->delUnit)->delete();
        return redirect()->back()->with("delete-unit-success", "Unit deleted successfully");
    }

    public function update_status(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'stat' => 'required',
        ]);
        $ip_task = IptbmIpAlertTask::find($id);
        $ip_task->task_status = $request->stat;
        $ip_task->save();

        return redirect()->back()->with('update-task-status', 'Task Status updated successfully');
    }

    public function deadline(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'deadline_date'=>[
                'required',
                'after:'.now()
            ],
        ]);
        $ip_task=IptbmIpAlertTask::find($id);
        $ip_task->deadline=$request->deadline_date;
        $ip_task->save();
        return redirect()->back()->with('update-task-deadline', 'Task Deadline updated successfully');
    }

    public function delete_deadline(Request $request): RedirectResponse
    {
        $request->validate([
            'taskId'=>'required',
        ]);

        $ipTask=IptbmIpAlertTask::find($request->taskId);
        $ipTask->deadline=null;
        $ipTask->save();
        return redirect()->back();
    }

    public function update_description(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'task_desc'=>'required|min:10',
        ]);
        $task=IptbmIpAlertTask::find($id);
        $task->description=$request->task_desc;
        $task->save();
        return redirect()->back()->with('update-task-description', 'Task Description updated successfully');
    }

    public function upload_attachment(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'task_attachment'=>'required|mimes:pdf|max:2048',
        ]);
        $file=$request->task_attachment->hashName();
        $file_name='storage/attachment/'.$file;
        $task=IptbmIpAlertTask::find($id);
        $request->task_attachment->move(public_path('storage/attachment'),$file);
        if(File::exists(public_path($task->attachment))){
            File::delete(public_path($task->attachment));
        }
        $task->attachment=$file_name;
        $task->save();
        return redirect()->back()->with('update-task-attachment', 'Task Attachment updated successfully');
    }

    public function delete_attachment(Request $request): RedirectResponse
    {
        $request->validate([
            'task_id'=>'required'
        ]);

        $task=IptbmIpAlertTask::find($request->task_id);
        if(File::exists(public_path('storage/attachment/'.$task->attachment)))
        {
            File::delete(public_path('storage/attachment/'.$task->attachment));
            $task->attachment=null;
        }

        $task->save();
        return redirect()->back();
    }

    public function update_notification(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'notif_time'=>'required|date_format:H:i',
        ],[
            'notif_time.required'=>'Time must be required',
            'notif_time.date_format'=>'Wrong format of time',
        ]);
        $task=IptbmIpAlertTask::find($id);
        $task->notification_time=$request->notif_time;
        $task->save();
        return redirect()->back()->with('update-task-notification', 'Task Notification updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
