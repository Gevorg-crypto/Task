<?php

namespace App\Console\Commands;

use App\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Message if diff 1 day';

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
        $dayAgo = 1;
        $dayToCheck = Carbon::now()->subDays($dayAgo);
        Message::where('created_at','<=', $dayToCheck)->delete();
        echo  'success';
    }
}
