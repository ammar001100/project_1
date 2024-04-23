<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\ReportService;
use App\Services\TemppService;
use App\Services\TempService;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $product;

    private $order;

    private $client;

    private $temp;

    private $tempp;

    private $report;

    public function __construct(ProductService $product, OrderService $order, ClientService $client, TempService $temp, TemppService $tempp, ReportService $report)
    {
        $this->product = $product;
        $this->order = $order;
        $this->client = $client;
        $this->temp = $temp;
        $this->tempp = $tempp;
        $this->report = $report;

        $this->middleware('auth');
    }

    // Mon - Tue - Thu
    public function index()
    {
        $month = Carbon::now()->month;
        $report_month = $this->report->getHomeReportOrder($month);
        $weeks = $this->report->getWeekReportOrder();
        $arry_days['sun'] = 0;
        $arry_days['mun'] = 0;
        $arry_days['tue'] = 0;
        $arry_days['wed'] = 0;
        $arry_days['thu'] = 0;
        $arry_days['fri'] = 0;
        $arry_days['sat'] = 0;
        foreach ($weeks as $week) {
            $day = new Carbon($week->order_date);
            if ($day->format('D') == 'Sun') {
                $arry_days['sun'] = $arry_days['sun'] + $week->won;

            }
            if ($day->format('D') == 'Mon') {
                $arry_days['mun'] = $arry_days['mun'] + $week->won;

            }
            if ($day->format('D') == 'Tue') {
                $arry_days['tue'] = $arry_days['tue'] + $week->won;

            }
            if ($day->format('D') == 'Wed') {
                $arry_days['wed'] = $arry_days['wed'] + $week->won;

            }
            if ($day->format('D') == 'Thu') {
                $arry_days['thu'] = $arry_days['thu'] + $week->won;

            }
            if ($day->format('D') == 'Fri') {
                $arry_days['fri'] = $arry_days['fri'] + $week->won;

            }

            if ($day->format('D') == 'Sat') {
                $arry_days['sat'] = $arry_days['sat'] + $week->won;

            }

        }

        //return dd($week);

        return view('home', compact('report_month', 'weeks', 'arry_days'));
    }

    public function calendar()
    {

        return view('calendar');
    }
}
