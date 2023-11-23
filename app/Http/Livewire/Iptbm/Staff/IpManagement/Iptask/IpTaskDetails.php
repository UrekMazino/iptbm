<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement\Iptask;

use App\Models\iptbm\IptbmIpTaskAttachement;
use App\Models\iptbm\IptbmIpTaskInchargeUnit;
use App\Models\iptbm\IptbmIpTaskPersonel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class IpTaskDetails extends Component
{
    use WithFileUploads;

    public $ip_task;
    public $notesModel;
    public $showNoteModelForm = false;
    public $showInChargeForm = false;
    public $showUnitInChargeForm = false;

    public $inChargeNameModel;
    public $inChargeEmailModel;
    public $unitInChargeModel;


    //for right layout

    public $deadLineModel;

    public $showDeadLineForm = false;
    public $noteDescModel;


    //Ip Alert notification
    public $frequencyModel;
    public $weeklyModel;
    public $dailyModel;
    public $priorityModel;

    //Priorities
    public $showPriorityForm = false;
    public $taskStatusModel;
    public $showTaskStatusForm = false;
    public $attachmentModel;
    public $descriptionModel;
    public $showAttachmentForm = false;
    public $validationAttributes = [
        'notesModel' => 'Notes / Description',
        'inChargeNameModel' => 'Name',
        'inChargeEmailModel' => 'Email'
    ];

    public function toggleShowDeadLineForm()
    {
        $this->showDeadLineForm = !$this->showDeadLineForm;
    }

    public function toggleShowPriorityForm()
    {
        $this->showPriorityForm = !$this->showPriorityForm;
    }

    public function toggleShowTaskStatusForm()
    {
        $this->showTaskStatusForm = !$this->showTaskStatusForm;
    }

    public function toggleShowAttachmentForm()
    {
        $this->showAttachmentForm = !$this->showAttachmentForm;
    }

    public function saveAttachment()
    {

        $this->validateOnly('attachmentModel');
        $this->validateOnly('descriptionModel');
        $path = $this->attachmentModel->store('public/task-attachment');
        $this->ip_task->attachments()->save(new IptbmIpTaskAttachement([
            'type' => $this->attachmentModel->extension(),
            'file' => $path,
            'description' => $this->descriptionModel,
        ]));
        $this->emit('reloadPage');
    }

    public function saveAttachments()
    {
        $this->validateOnly('attachmentModel');

        if (Storage::exists($this->ip_task->attachment)) {
            Storage::delete($this->ip_task->attachment);
        }
        $path = $this->attachmentModel->store('public/ip-alert-attachement');

        $this->ip_task->attachment = $path;
        $this->ip_task->save();
        $this->emit('reloadPage');

    }

    public function delete($id, $data)
    {
        $val = $data->find($id);

        if (Storage::exists($val->file)) {
            Storage::delete($val->file);
        }

        $val->delete();
    }

    public function updatedFrequencyModel()
    {
        $this->validateOnly('frequencyModel');
        $this->reset('weeklyModel');
        $this->reset('dailyModel');
        $this->resetValidation([
            'weeklyModel', 'dailyModel'
        ]);
    }

    public function toggleShowNoteModelForm()
    {
        $this->showNoteModelForm = !$this->showNoteModelForm;

    }

    public function toggleShowInChargeForm()
    {
        $this->showInChargeForm = !$this->showInChargeForm;
    }

    public function toggleShowUnitInChargeForm()
    {
        $this->showUnitInChargeForm = !$this->showUnitInChargeForm;
    }

    public function deleteData($id)
    {


        $this->delete($id, $this->ip_task->attachments);
        $this->emit('reloadPage');
    }

    public function saveNote()
    {
        $this->validate([
            'notesModel' => [
                'required',
                'min:20'
            ],
        ]);
        $this->ip_task->description = $this->notesModel;
        $this->ip_task->save();
        $this->emit('reloadPage');
    }

    public function savePersonel()
    {
        $this->validate([
            'inChargeNameModel' => [
                'required',
                'min:5',
                Rule::unique(IptbmIpTaskPersonel::class, 'name')->where('ip_alert_task_id', $this->ip_task->id)
            ],
            'inChargeEmailModel' => [
                'required',
                'min:5',
                'email',
                Rule::unique(IptbmIpTaskPersonel::class, 'email')->where('ip_alert_task_id', $this->ip_task->id)
            ],
        ]);
        $this->ip_task->personnel()->save(new IptbmIpTaskPersonel([
            'name' => $this->inChargeNameModel,
            'email' => $this->inChargeEmailModel
        ]));
        $this->emit('reloadPage');
    }

    public function saveUnit()
    {
        $this->validate([
            'unitInChargeModel' => [
                'required',
                'min:5',
                Rule::unique(IptbmIpTaskInchargeUnit::class, 'name')->where('ip_alert_task_id', $this->ip_task->id)
            ]
        ]);
        $this->ip_task->units()->save(new IptbmIpTaskInchargeUnit([
            'name' => $this->unitInChargeModel
        ]));
        $this->emit('reloadPage');
    }

    public function saveDeadline()
    {
        $this->validate([
            'deadLineModel' => [
                'required',
                'date_format:Y-m-d H:i',
            ]
        ]);
        $this->ip_task->deadline = $this->deadLineModel;
        $this->ip_task->save();
        $this->emit('reloadPage');
    }

    public function saveNotification()
    {
        $this->validate([
            'frequencyModel' => 'required|in:weekly,daily',
            'noteDescModel' => 'required|min:10',
            'weeklyModel' => 'required_if:frequency,weekly',
            'dailyModel' => 'required|date_format:g:i A'
        ]);

        $this->ip_task->ip_task_stage_notifications->notification_details = $this->noteDescModel;
        $this->ip_task->ip_task_stage_notifications->frequency = $this->frequencyModel;
        $this->ip_task->ip_task_stage_notifications->day_of_week = $this->weeklyModel;
        $this->ip_task->ip_task_stage_notifications->time_of_day = Carbon::createFromFormat('h:i A', $this->dailyModel)->format('H:i:s');
        $this->ip_task->ip_task_stage_notifications->save();
        $this->emit('reloadPage');
    }

    public function SaveStatus()
    {
        $this->validateOnly('taskStatusModel');
        $this->ip_task->task_status = $this->taskStatusModel;
        $this->ip_task->save();
        $this->emit('reloadPage');

    }

    public function rules()
    {
        return [
            'notesModel' => [
                'required',
                'min:20'
            ],
            'inChargeNameModel' => [
                'required',
                'min:5',
                Rule::unique(IptbmIpTaskPersonel::class, 'name')->where('ip_alert_task_id', $this->ip_task->id)
            ],
            'inChargeEmailModel' => [
                'required',
                'min:5',
                'email',
                Rule::unique(IptbmIpTaskPersonel::class, 'email')->where('ip_alert_task_id', $this->ip_task->id)
            ],
            'unitInChargeModel' => [
                'required',
                'min:5',
                Rule::unique(IptbmIpTaskInchargeUnit::class, 'name')->where('ip_alert_task_id', $this->ip_task->id)
            ],

            'deadLineModel' => [
                'required',
                'date_format:Y-m-d H:i',
            ],
            'frequencyModel' => 'required|in:weekly,daily',
            'noteDescModel' => 'required|min:10',
            'weeklyModel' => 'required_if:frequency,weekly',
            'dailyModel' => 'required|date_format:g:i A',
            'priorityModel' => 'required|in:HIGH,LOW',
            'taskStatusModel' => 'required|in:DONE,ONGOING',
            'attachmentModel' => [
                'required',
                'mimes:pdf,png,jpg,jpeg',
                'max:20048'
            ],
            'descriptionModel' => [
                'required',
                'max:100'
            ]


        ];
    }

    public function updatePriority()
    {
        $this->validateOnly('priorityModel');
        $this->ip_task->priority = $this->priorityModel;
        $this->ip_task->save();
        $this->emit('reloadPage');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($ipTask)
    {

        $this->ip_task = $ipTask;
        $this->deadLineModel = $this->ip_task->deadline;
        $this->notesModel = $ipTask->description;
        $this->priorityModel = $ipTask->priority;
        $this->taskStatusModel = $ipTask->task_status;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.iptask.ip-task-details');
    }
}
