<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:generate-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate token quickly!';

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
        //
        $userId = $this->ask('输入用户ID');
        $user = User::find($userId);
        if (!$user){
            return $this->error('用户不存在!');
        }
        $ttl = 365*24*60;
        return $this->info(auth('api')->setTTL($ttl)->login($user));
    }
}
