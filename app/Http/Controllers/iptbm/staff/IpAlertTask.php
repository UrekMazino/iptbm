<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmIpTask;
use App\Models\iptbm\IptbmIpTaskNotification;
use App\Models\iptbm\IptbmIpTaskStage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class IpAlertTask extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): Application|Factory|View|RedirectResponse
    {

        $ip_alert = IptbmIpAlert::with("technology", "ip_type", "patent_agent", "ip_task")->find($id);
        if (!$ip_alert) {
            return redirect()->route("iptbm.staff.ip-management");
        }


        $task = IptbmIpTask::with('stages')->where("ip_type_id", $ip_alert->ip_type->id)->get();


        return view('iptbm.staff.ipmanagement.ip-alert-task', [
            'id' => $id,
            'ip_alert' => $ip_alert,
            'tasks' => $task
        ]);
    }

    public function add_task($id): Application|Factory|View|RedirectResponse
    {
        $ip_alert = IptbmIpAlert::with("technology", "ip_type", "patent_agent", "ip_task")->find($id);
        if (!$ip_alert) {
            return redirect()->route("iptbm.staff.ip-management");
        }
        $task = IptbmIpTask::where("ip_type_id", $ip_alert->ip_type->id)->get();
        return view('iptbm.staff.ipmanagement.add-task', [
            'ip_alert' => $ip_alert,
            'tasks' => $task
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     *
     * retrieval using AJAX request to create new task for Ip-Protection
     */

    public function get_stages(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'task_id' => 'required',
                'ip_type_id' => 'required',
            ]);
            $stages = IptbmIpTaskStage::where("ip_task_id", $request->task_id)->get();
            return response()->json(['stages' => $stages]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id): RedirectResponse
    {

        $request->validate([


            'taskNem' => [
                'required',
                Rule::unique(IptbmIpAlertTask::class, "ip_alert_task_id")
                    ->where("ip_alert_id", $id)
            ],
            'urgent' => 'required',
            'stat' => 'required',
            'task_desc' => 'required|min:20',
        ], [
            'taskNem' => 'Task name is empty..!'
        ]);

        $ipAlert = IptbmIpAlert::find($id);
        $ipAlert->ip_task()->saveMany([
            new IptbmIpAlertTask([
                'task_name' => $request->task_name,
                'priority' => $request->urgent,
                'task_status' => $request->stat,
                'description' => $request->task_desc
            ])
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'taskNem' => [
                'required',
                Rule::unique(IptbmIpAlertTask::class, 'stage_id')
                    ->where('ip_alert_id', $id),
            ],
            'urgent' => 'required',
            'stat' => 'required',
            'task_desc' => 'required|min:20',
            'deadline' => [
                'required',
                'after:' . now()
            ],
            'stage_attachment' => 'required|mimes:pdf|max:5048',
        ], [
            'task_desc.required' => 'Task Description is empty...!',
            'deadline.required' => 'deadline is empty...!',
            'stage_attachment.required' => 'Missing attachment...!',
        ]);
        $ip_alert = IptbmIpAlert::find($id);
        $file_name = 'storage/attachment/' . $request->stage_attachment->hashName();


        $request->stage_attachment->move(public_path('storage/attachment'), $file_name);
        $task = new IptbmIpAlertTask([
            'stage_id' => $request->taskNem,
            'task_group_name' => $request->task_name,
            'priority' => $request->urgent,
            'task_status' => $request->stat,
            'description' => $request->task_desc,
            'deadline' => $request->deadline,
            'attachment' => $file_name,
        ]);
        $notif = new IptbmIpTaskNotification([]);
        $ip_alert->ip_task()->save($task);
        $task->ip_task_stage_notifications()->save($notif);

        return redirect()->back()->with("add-task-success", "Task Successfully Added");
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
