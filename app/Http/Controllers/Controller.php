<?php

namespace App\Http\Controllers;

use Elearn\Foundation\Controller\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;
}
