<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function appLog($env, $action, $message)
    {

        $log = Log::create([
            'env' => $env,
            'action' => $action,
            'message' => $message,
            'timestamp' => now()
        ]);

        return $log;

    }

}
