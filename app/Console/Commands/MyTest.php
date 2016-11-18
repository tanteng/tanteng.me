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
        $array = [1, 5, 6, 7, 3, 98, 334, 2, 23, 54];
        $result = $this->bubbleSort($array);
        $this->comment(json_encode($result));
    }

    /**
     * 冒泡排序
     * @param $array
     * @return mixed
     */
    public function bubbleSort($array)
    {
        info('bubble', $array);
        $length = count($array);
        info('bubble', array('length' => $length));
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - 1 - $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }
        info('bubble', array('result' => $array));
        return $array;
    }
}
