<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TimerController extends Controller
{
    public function index(Request $request)
    {
        $startTime = session('start_time', null);
        $elapsedTime = session('elapsed_time', 0);
        $isRunning = session('is_running', false);
        $laps = session('laps', []);

        if ($request->has('action')) {
            $action = $request->input('action');

            if ($action == 'start' && !$isRunning) {
                session(['start_time' => Carbon::now()->format('Y-m-d H:i:s.u')]);
                session(['is_running' => true]);
            }

            if ($action == 'stop' && $isRunning) {
                $now = Carbon::now();
                $startTimeCarbon = Carbon::parse($startTime);
                $diffInSeconds = $startTimeCarbon->diffInSeconds($now);
                $microseconds = $now->microsecond - $startTimeCarbon->microsecond;
                if ($microseconds < 0) {
                    $microseconds += 1000000;
                    $diffInSeconds -= 1;
                }
                $diffInMicroseconds = $diffInSeconds + ($microseconds / 1000000);
                session(['elapsed_time' => $elapsedTime + $diffInMicroseconds]);
                session(['is_running' => false]);
                session(['start_time' => null]);
            }

            if ($action == 'reset') {
                session([
                    'start_time' => null,
                    'elapsed_time' => 0,
                    'is_running' => false,
                    'laps' => []
                ]);
            }

            if ($action == 'lap' && $isRunning) {
                $now = Carbon::now();
                $startTimeCarbon = Carbon::parse($startTime);
                $diffInSeconds = $startTimeCarbon->diffInSeconds($now);
                $microseconds = $now->microsecond - $startTimeCarbon->microsecond;
                if ($microseconds < 0) {
                    $microseconds += 1000000;
                    $diffInSeconds -= 1;
                }
                $diffInMicroseconds = $diffInSeconds + ($microseconds / 1000000);
                $currentLapTime = $elapsedTime + $diffInMicroseconds;
                $laps[] = $currentLapTime;
                session(['laps' => $laps]);
            }

            return redirect()->route('timer.index');
        }

        $currentTime = $elapsedTime;
        if ($isRunning && $startTime) {
            $now = Carbon::now();
            $startTimeCarbon = Carbon::parse($startTime);
            $diffInSeconds = $startTimeCarbon->diffInSeconds($now);
            $microseconds = $now->microsecond - $startTimeCarbon->microsecond;
            if ($microseconds < 0) {
                $microseconds += 1000000;
                $diffInSeconds -= 1;
            }
            $diffInMicroseconds = $diffInSeconds + ($microseconds / 1000000);
            $currentTime += $diffInMicroseconds;
        }

        return view('timer.index', compact('currentTime', 'isRunning', 'laps'));
    }
}
