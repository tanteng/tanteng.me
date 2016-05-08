<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/5/8
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Models\Destination;

class TravelController extends Controller
{
    public function __construct(Destination $destination)
    {
        $this->destination = $destination;
    }

    public function index()
    {
        $navFlag = 'travel';

        $list = $this->destination->getList();
        dump($list);
        return view('travel.index', compact('navFlag'));
    }
}