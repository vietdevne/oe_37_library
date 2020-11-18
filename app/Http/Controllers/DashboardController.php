<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin');
    }   
    
    public function userCountChart(){
        $user_count_chart = User::all()
                        ->groupBy(function ($user) {
                            return $user->created_at->month;
                        })
                        ->map(function ($group) {
                            return $group->count();
                        });
        $arrLabels = [];
        $arrData = [];
        foreach ($user_count_chart as $labels => $data) {
            $arrLabels[] = trans('admin.chart.month'). $labels;
            $arrData[] = $data;
        }

        return response()->json(array("labels" => $arrLabels, "data" => $arrData));

    } 
}
