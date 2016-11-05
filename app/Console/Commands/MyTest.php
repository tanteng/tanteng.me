<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My console test.';

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
        $this->comment('begin');
        $bankCardNo = '3445590948739874';
        $bankCardNoEncrypt = encrypt($bankCardNo);
        $this->comment('encrypt:' . $bankCardNoEncrypt);
        $decrypt = decrypt($bankCardNoEncrypt);
        $this->comment('decrypt:'.$decrypt);
    }
}
