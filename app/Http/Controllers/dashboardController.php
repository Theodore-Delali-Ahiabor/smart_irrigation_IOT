<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\SensorsLog;

class dashboardController extends Controller
{
    public static function index(Request $request){
        return Inertia::render('Dashboard', [
            'page' => "Dashboard",
        ]);
    }

    public static function getArduinoReadings(){
        $sensorLogs = SensorsLog::all()->take(-30);
        $latest = SensorsLog::latest()->first();

        $humidityArray = $moistureArray = $timestampArray = [];

        foreach($sensorLogs as $row){
            array_push($humidityArray, $row->humidity);
            array_push($moistureArray, $row->moisture);
            array_push($timestampArray, date("Y-m-d h:i:s", strtotime($row->created_at)));
        }

        return response()->json([
            'humidityArray' => $humidityArray,
            'moistureArray' => $moistureArray,
            'timestampArray' => $timestampArray,
            'humidity' => $latest['humidity'],
            'moisture' => $latest['moisture'],
            'pump' => $latest['pump'],
        ]);
    }

    public static function setArduinoReadings(Request $request){
        $validated = $request->validate([
            'humidity' => '',
            'moisture' => '',
            'pump' => '',
        ]);
        SensorsLog::create($validated);
    }
}
