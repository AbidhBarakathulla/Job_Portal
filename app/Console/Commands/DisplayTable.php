<?php

namespace App\Console\Commands;

use App\Models\Candidate;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class DisplayTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:display-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $register=new Candidate();
        $register->username = Str::random(8);
        $register->email = Str::random(8) . '@gmail.com';
        $register->password = Str::random(8);
        $register->role = 'job seeker';
        $register->save();
        info("Cron Job running at ");
    }
}
