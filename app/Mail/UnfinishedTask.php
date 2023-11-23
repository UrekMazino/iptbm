<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UnfinishedTask extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $task;
    private $deadline;
    private $url;
    private $iptype;
    private $stage;
    private $technology;
    private $applicationnumber;

    public function __construct($technology, $iptype, $applicationnumber, $task, $stage, $deadline, $url)
    {
        $this->technology = $technology;
        $this->applicationnumber = $applicationnumber;
        $this->iptype = $iptype;
        $this->stage = $stage;
        $this->task = $task;
        $this->deadline = $deadline;
        $this->url = $url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Unfinished Task',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'iptbm.mail.unfinished',
            with: [
                'technologyname' => $this->technology,
                'applicationnumber' => $this->applicationnumber,
                'iptype' => $this->iptype,
                'task' => $this->task,
                'stage' => $this->stage,
                'deadline' => $this->deadline,
                'url' => $this->url,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
