<?php

namespace App\Repositorys;

use App\Models\ReportOrder;
use Carbon\Carbon;

class ReportOrderRepository
{
    private $report_order;

    public function __construct(ReportOrder $report_order)
    {
        $this->report_order = $report_order;
    }

    public function get()
    {
        return $this->report_order->where('active', '1')->paginate(20);
    }

    public function getById($id)
    {
        return $this->report_order->where('id', $id)->firstOrfail();
    }
    public function getReportOrderWonSum()
    {
        return $this->report_order->where('active', '1')->sum('won');
    }

    public function getReactedOrders()
    {
        return $this->report_order->where('active', '0')->get();
    }

    public function getReportOrderSearch($data)
    {
        $date_from = new Carbon($data['date_from']);
        $date_to = new Carbon($data['date_to']);

        return $this->report_order
            ->where(['active' => '1'])
            ->whereBetween('order_date', [$date_from, $date_to])
            ->paginate(100);
    }

    public function getReportEmployeeOrder($id)
    {
        return $this->report_order->where(['user_id' => $id, 'active' => '1'])->paginate(20);
    }

    public function getReportEmployeeOrderSearch($data)
    {
        $date_from = new Carbon($data['date_from']);
        $date_to = new Carbon($data['date_to']);

        return $this->report_order
            ->where(['user_id' => $data['id'], 'active' => '1'])
            ->whereBetween('order_date', [$date_from, $date_to])
            ->paginate(100);
    }

    public function getHomeReportOrder($month)
    {
        return $this->report_order->where(['active' => '1'], function ($q) use ($month) {
            return $q->whereMonth('created_at', $month);
        })->sum('total');
    }

    public function getWeekReportOrder()
    {
        $start_week = now()->startOfWeek();
        $end_week = now()->endOfWeek();
        //return dd( $end_week);
        $request = $this->report_order
            ->where(['active' => '1'])
            ->whereBetween('order_date', [$start_week, $end_week])
            ->get();

        return $request;
    }

    public function store($report_order)
    {
        return $this->report_order->create($report_order);
    }

    public function updateActive($id)
    {

        $report_order = $this->report_order->where('client_id', $id)->firstOrfail();

        return $report_order->update(['active' => '0']);
    }

    public function delete($id)
    {

        $report_order = $this->getById($id);

        return $report_order->delete();
    }
}
