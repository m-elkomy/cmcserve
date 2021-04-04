<?php

namespace App\Console\Commands;

use App\model\AssessmentQuestion;
use App\model\Permits;
use App\model\Regulations;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notify;

class notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify User With Changes';

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
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $permits = Permits::where('updated_at','!=','')->get();
            $regulations = Regulations::where('updated_at','!=','')->get();
            $question = AssessmentQuestion::where('updated_at','!=','')->get();
            Mail::to($user->email)->send(new Notify(['data'=>$user,'permits'=>$permits,'regulations'=>$regulations,'question'=>$question]));
        }
    }
}
