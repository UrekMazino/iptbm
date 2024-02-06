<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement\Iptask;

use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmIpTaskNotification;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class IpTask extends Component
{

    use WithFileUploads;

    public $task;
    public $ipAlert;
    public $stagesList;

//task_name

    public $noteModel;
    public $taskModel;
    public $attachmentModel;
    public $priorityModel;
    public $taskStatusModel;
    public $deadlineModel;
    public $stageId;


    public $taskStages;

    public function rules()
    {
        return [
            'taskModel' => [
                'required',
                'exists:iptbm_ip_task_stages,id',
                Rule::unique(IptbmIpAlertTask::class, 'stage_id')
                    ->where('ip_alert_id', $this->ipAlert->id),
            ],
            'priorityModel' => [
                'required',

            ],
            'taskStatusModel' => [
                'required',
            ],
            'deadlineModel' => [
                'required',
            ],
            'noteModel' => [
                'required',
                'min:10'
            ],
            'attachmentModel' => [
                'required_if:attachment,mime_type:application/pdf'
            ]
        ];
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }


    public function saveTask()
    {
        $this->validate();
        $path = $this->attachmentModel->store('public/ip-alert-attachment');

        $task = new IptbmIpAlertTask([
            'stage_id' => $this->taskModel,
            'task_group_name' => $this->task->task_name,
            'priority' => $this->priorityModel,
            'task_status' => $this->taskStatusModel,
            'description' => $this->noteModel,
            'deadline' => Carbon::parse($this->deadlineModel)->format('Y-n-j'),
            'attachment' => $path
        ]);


        $notif = new IptbmIpTaskNotification([]);
        $this->ipAlert->ip_task()->save($task);
        $task->ip_task_stage_notifications()->save($notif);


        $this->reset(
            'taskModel',
            'priorityModel',
            'taskStatusModel',
            'deadlineModel',
            'noteModel',
            'attachmentModel'
        );
        $this->resetValidation([
            'taskModel',
            'priorityModel',
            'taskStatusModel',
            'deadlineModel',
            'noteModel',
            'attachmentModel'
        ]);
        $this->emit('reloadPage');
    }

    public function deleteTask($id)
    {

        $this->emit('reloadPage');
    }


    public function mount($task, $ipAlert)
    {

        $tasks = IptbmIpAlertTask::with("stage", "task_deadline")
            ->where('ip_alert_id', $this->ipAlert->id)
            ->where('task_group_name', $this->task->task_name)->get();
        $this->stagesList = $tasks;
        $this->task = $task;
        $this->ipAlert = $ipAlert;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.iptask.ip-task');
    }
}
