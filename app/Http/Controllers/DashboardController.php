<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateChart;
use App\Site;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private static $outputFormat = 'Y-m-d H:i:s';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::with(['clickAnalytics'])->get();
        $chart = self::getCartsData($sites->first());
        $chart = json_encode($chart);

        return view('dashboard', compact('sites', 'chart'));
    }

    public function updateChart(StoreUpdateChart $request)
    {
        $sites = Site::with(['clickAnalytics'])->find($request->siteId);
        $chart = self::getCartsData($sites);

        return response()->json($chart);
    }

    public static function getCartsData($sites)
    {
        $dates = self::generateDates();
        $dates =  self::getHoursOfRange($dates);
        $collections = self::combineCollection($sites->clickAnalytics, $dates['range'], 'created_at');
        $result = [];
        foreach ($collections as $collection){
            $result[] = $collection->count();
        }

        $chart = [];
        $chart['labels'] = $dates['labels'];
        $chart['data'] = $result;
        return $chart;
    }

    private static function combineCollection($collection, array $dates, $field) {
        $combined = [];
        foreach($dates as $date){
            $combined[] = $collection->where($field, '>=', $date[0])
                ->where($field, '<', $date[1]);
        }
        return $combined;
    }

    public static function generateDates()
    {
        $dates['start_date'] = Carbon::now()->startOfDay()->format(self::$outputFormat);
        $dates['end_date'] = Carbon::now()->endOfDay()->format(self::$outputFormat);
        return $dates;
    }

    private static function parseToCarbon(array $dates){
        $result['start_date'] = Carbon::createFromFormat(self::$outputFormat, $dates['start_date']);
        $result['end_date'] = Carbon::createFromFormat(self::$outputFormat, $dates['end_date']);
        return $result;
    }
    public static function getHoursOfRange(array $dates){
        $dates = self::parseToCarbon($dates);
        for($date = $dates['start_date']; $date->lte($dates['end_date']); $date->addHour()) {
            $cloneDate = clone $date;
            $cloneDate = $cloneDate->addHour();
            $result['formatted'][] = $date->format('H:i') . ' - ' . $cloneDate->format('H:i');
            $result['labels'][] = $date->format('H:i');
            $result['range'][] = [$date->format(self::$outputFormat), $cloneDate->format(self::$outputFormat)];
        }
        return $result;
    }





}
