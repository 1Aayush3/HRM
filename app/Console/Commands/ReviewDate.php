<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Console\Command;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Controller;

class ReviewDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:review';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if its review date and update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Checking for review date \n";
        $this->sendmail();
    }

    public function sendmail(){
        $users = User::select('id','name','review')
        ->whereDate('review',now())->get();
        foreach($users as $user){
            $name=$user->name;
            Mail::to('aayush.sql@gmail.com')->queue(new SendMailable($name));
            echo "Email sent to ".$name."\n";
        }
        
    }
}
