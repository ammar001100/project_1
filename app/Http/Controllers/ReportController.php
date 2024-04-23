<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Services\EmployeeService;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $report;

    private $client;

    private $employee;

    public function __construct(ReportService $report, ClientService $client, EmployeeService $employee)
    {
        $this->report = $report;
        $this->client = $client;
        $this->employee = $employee;
    }

    // show report orders and search
    public function ReportOrder(Request $request)
    {
        if ($request->date_from and $request->date_to) {

            $reports = $this->report->getReportOrderSearch($request);
            $totals[0] = $reports->sum('total');
            $wons[0] = $reports->sum('won');
            $counts[0] = $reports->count();

            return view('reports.report_orders', compact('reports', 'request', 'totals', 'wons', 'counts'));
        }
        $reports = $this->report->getReportOrder();
        $totals[0] = $reports->map(function ($chunk) {
            return $chunk->sum('total');
        });
        $wons[0] = $reports->map(function ($chunk) {
            return $chunk->sum('won');
        });
        $counts[0] = $reports->map(function ($chunk) {
            return $chunk->count();
        });

        return view('reports.report_orders', compact('reports', 'totals', 'wons', 'counts'));
    }

    // show report products and --search
    public function ReportProduct()
    {
        $reports = $this->report->getReportProduct();

        return view('reports.report_products', compact('reports'));
    }

    // show report reacteds and --search
    public function reportReactedOrder(Request $request)
    {
        $reports = $this->report->getReactedOrders();

        return view('reports.report_reacted_orders', compact('reports'));
    }

    // show report empoloyees
    public function reportEmployee()
    {
        $employees = $this->employee->get();

        return view('reports.employee', compact('employees'));
    }

    // show report employees and search
    public function reportEmployeeOrder(Request $request)
    {
        if ($request->date_from and $request->date_to) {
            $reports = $this->report->getReportEmployeeOrderSearch($request);
            $employee = $this->employee->getById($request->id);

            return view('reports.report_employee', compact('reports', 'request', 'employee'));
        }
        $reports = $this->report->getReportEmployeeOrder($request->id);
        $employee = $this->employee->getById($request->id);

        return view('reports.report_employee', compact('reports', 'employee'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
