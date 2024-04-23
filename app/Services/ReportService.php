<?php

namespace App\Services;

use App\Repositorys\ReportOrderRepository;
use App\Repositorys\ReportProductRepository;
use Illuminate\Support\Facades\Validator;

class ReportService
{
    private $report_order;

    private $report_product;

    public function __construct(ReportOrderRepository $report_order, ReportProductRepository $report_product)
    {
        $this->report_order = $report_order;
        $this->report_product = $report_product;
    }

    public function getReportOrder()
    {
        return $this->report_order->get();
    }
    public function getReportOrderWonSum()
    {
        return $this->report_order->getReportOrderWonSum();
    }

    public function getReactedOrders()
    {
        return $this->report_order->getReactedOrders();
    }

    public function getReportOrderSearch($data)
    {
        $data = $data->all();
        Validator::validate($data, [
            'date_from' => ['date'],
            'date_to' => ['date'],
        ], [
            'date_from.date' => 'حقل من يجب ان يكون تاريخ',
            'date_to.date' => 'حقل الى يجب ان يكون تاريخ',
        ]);

        return $this->report_order->getReportOrderSearch($data);
    }

    public function getReportEmployeeOrder($id)
    {
        return $this->report_order->getReportEmployeeOrder($id);
    }

    public function getReportEmployeeOrderSearch($data)
    {
        $data = $data->all();
        Validator::validate($data, [
            'date_from' => ['date'],
            'date_to' => ['date'],
        ], [
            'date_from.date' => 'حقل من يجب ان يكون تاريخ',
            'date_to.date' => 'حقل الى يجب ان يكون تاريخ',
        ]);

        return $this->report_order->getReportEmployeeOrderSearch($data);
    }

    public function getHomeReportOrder($month)
    {

        return $this->report_order->getHomeReportOrder($month);
    }

    public function getWeekReportOrder()
    {

        return $this->report_order->getWeekReportOrder();
    }

    public function getReportProduct()
    {
        return $this->report_product->get();
    }

    public function storeReportOrder($report_order)
    {
        return $this->report_order->store($report_order);
    }

    public function storeReportProduct($report_product)
    {
        return $this->report_product->store($report_product);
    }
}
