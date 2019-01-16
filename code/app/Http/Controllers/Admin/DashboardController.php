<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Admin\Application;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newApplications = Application::where('status', 0)->count();
        $approvedApplications = Application::where('status', 1)->count();
        $rejectedApplications = Application::where('status', 2)->count();
        $completedApplications = Application::where('status', 3)->count();
        $deliveredApplications = Application::where('status', 4)->count();

        return view('admin.dashboard', compact('newApplications', 'approvedApplications', 'rejectedApplications', 'completedApplications', 'deliveredApplications'));
    }
    
    public function chart1()
    {
        
        /*$data = array(
            array("Element", 'Applications count', ""),
            array("Jan", 100, "#1B9E77"),
            array("Feb", 10, "#4285F4"),
            array("Mar", 200, "#BA3A2F"),
            array("Apr", 50, "#CF9900"),
            array("May", 0, "#D95F02"),
            array("Jun", 350, "#7570C5"),
            array("Jul", 0, "#336668"),
            array("Aug", 0, "#76A7FA"),
            array("Sep", 300, "#C5A5CF"),
            array("Oct", 0, "#703593"),
            array("Nov", 0, "#BC5679"),
            array("Dec", 250, "#871B47")
        );*/

        $colors = ["#871B47", "#BC5679", "#703593", "#C5A5CF", "#76A7FA", "#336668", "#7570C5", "#D95F02", "#CF9900", "#BA3A2F", "#4285F4", "#1B9E77"];
        $data = ['first' => ["Element", 'Applications count', ""]];
        for ($i=11; $i>0; $i--) {
            $date = Carbon::now();
            $month = $date->startOfMonth()->subMonth($i)->format('M');
            $data[$month] = [$month, 0, $colors[$i-1]];
        }
        $date = Carbon::now();
        $month = $date->format('M');
        $data[$month] = [$month, 0, "#1B9E77"];
        $applications = Application::selectRaw('DATE_FORMAT(created_at, "%b") as month, COUNT(*) as count')
            ->where( 'created_at', '>', Carbon::now()->subDays(365))
            ->groupBy(\DB::raw('YEAR(created_at)', 'MONTH(created_at)'))
            ->orderBy('created_at')
            ->get();
        foreach ($applications as $application) {
            $data[$application->month][1] = $application->count;
        }
        
        return response()->json(array_values($data));
    }
    
    public function chart2()
    {
        $data = array(
            array("Element", 'Journeys count', ""),
            array("Jan", 50, "#1B9E77"),
            array("Feb", 20, "#4285F4"),
            array("Mar", 10, "#BA3A2F"),
            array("Apr", 200, "#CF9900"),
            array("May", 40, "#D95F02"),
            array("Jun", 0, "#7570C5"),
            array("Jul", 1, "#336668"),
            array("Aug", 500, "#76A7FA"),
            array("Sep", 100, "#C5A5CF"),
            array("Oct", 10, "#703593"),
            array("Nov", 20, "#BC5679"),
            array("Dec", 50, "#871B47")
        );
        
        return response()->json($data);
    }
    
    public function chart3()
    {
        $data = array(
            array("Element", 'Journeys count', ""),
            array("Driver 1", 500, "#1B9E77"),
            array("Driver 2", 450, "#4285F4"),
            array("Driver 3", 400, "#BA3A2F"),
            array("Driver 4", 350, "#CF9900"),
            array("Driver 5", 300, "#D95F02"),
            array("Driver 6", 250, "#7570C5"),
            array("Driver 7", 200, "#336668"),
            array("Driver 8", 150, "#76A7FA"),
            array("Driver 9", 100, "#C5A5CF"),
            array("Driver 10", 50, "#703593")
        );
        
        return response()->json($data);
    }
    
    public function chart4()
    {
        $data = array(
            array("Element", 'Journeys count', ""),
            array("User 1", 500, "#1B9E77"),
            array("User 2", 450, "#4285F4"),
            array("User 3", 400, "#BA3A2F"),
            array("User 4", 350, "#CF9900"),
            array("User 5", 300, "#D95F02"),
            array("User 6", 250, "#7570C5"),
            array("User 7", 200, "#336668"),
            array("User 8", 150, "#76A7FA"),
            array("User 9", 100, "#C5A5CF"),
            array("User 10", 50, "#703593")
        );
        
        return response()->json($data);
    }
    
    public function chart5()
    {
        $data = array(
            array("Element", 'Journeys count', ""),
            array("BMW", 600, "#1B9E77"),
            array("Mercedes", 550, "#4285F4"),
            array("Audi", 500, "#BA3A2F"),
            array("Lamborghini", 450, "#CF9900"),
            array("Ferrari", 300, "#D95F02"),
            array("Porsche", 250, "#7570C5"),
            array("Ford", 200, "#336668"),
            array("Toyota", 150, "#76A7FA"),
            array("Hyundai", 100, "#C5A5CF"),
            array("Chevrolet", 50, "#703593")
        );
        
        return response()->json($data);
    }
    
    public function chart6()
    {
        $data = array(
            array("Element", 'Journeys count', ""),
            array("BMW G30", 220, "#1B9E77"),
            array("BMW G12", 200, "#4285F4"),
            array("BMW F87", 170, "#BA3A2F"),
            array("Toyota Zelas", 150, "#CF9900"),
            array("Toyota Vista", 130, "#D95F02"),
            array("Toyota FT-4X", 110, "#7570C5"),
            array("Hyundai Matrix", 100, "#336668"),
            array("Hyundai Verna", 80, "#76A7FA"),
            array("Chevrolet Lanos", 50, "#C5A5CF"),
            array("Chevrolet Optra", 20, "#703593")
        );
        
        return response()->json($data);
    }
    
    public function chart7()
    {
        $data = array(
            array('Year', 'Sales', 'Expenses'),
            array('2014',  1000,      400),
            array('2015',  1170,      460),
            array('2016',  660,       1120),
            array('2017',  1030,      540)
        );

        return response()->json($data);
    }
}
