<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    
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
