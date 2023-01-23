<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    static function getCurrentRoleID()
    {
        return  \Auth::user()->role;
    }

    static function getHakAkses($id)
    {
        $hakAkses = array( 'BAWAHAN','ATASAN', 'ADMIN');
        return   $hakAkses[$id - 1];
    }
    static function getDistribusi($id)
    {
        $hakAkses = array('A', 'A1');
        return   $hakAkses[$id];
    }
    
}
