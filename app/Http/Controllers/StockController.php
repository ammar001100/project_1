<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Services\OrderService;
use App\Services\ReportService;

class StockController extends Controller
{
    private $stock;
    private $product;
    private $report;
    private $order;
    public function __construct(StockService $stock,ProductService $product,OrderService $order ,ReportService $report){
        $this->stock = $stock;
        $this->product = $product;
        $this->order = $order;
        $this->report = $report;
    }
    public function index()
    {
        $products = $this->product->get();
        $orders = $this->order->get();
        $stock = $this->stock->first();
        $report_total = $this->report->getReportOrderWonSum();
        $capital = 0;
        $profits = 0;
        $cash = 0;
        $products = $this->product->get();
        foreach($products as $product){
            $capital = $capital + ($product->stock * $product->price);
            //$capital = $capital * $product->price;
            $prof = $profits + $product->price_sale - $product->price;
            $profits = $prof * $product->stock;
            //$cash = $cash + $product->price_sale;
        }
        return view('stocks.stocks',compact('capital','profits','cash','products','orders','stock','report_total'));
    }

    public function create()
    {
        //
    }
    public function addCash(Request $request)
    {
        $this->validate($request,[
           'add_cash' => 'required | integer'
        ],[
            'add_cash.required' => 'الرجاء ادخال المبلغ',
            'add_cash.integer' => 'ادخل المبلغ بالارقام',
        ]);
        $this->stock->addCash($request->add_cash);
        return Redirect()->route('stock')->with(['sucss'=>'تم بنجاح']);
    }
    public function pullCash(Request $request)
    {
        $this->validate($request,[
            'pull_cash' => 'required | integer'
         ],[
             'pull_cash.required' => 'الرجاء ادخال المبلغ',
             'pull_cash.integer' => 'ادخل المبلغ بالارقام',
         ]);
         $stock = $this->stock->first();
         if($request->pull_cash == 0 and $stock->cash == 0){
            return Redirect()->route('stock')->with(['error'=>'عفواء لا يمكن']);
          }
         if($request->pull_cash > $stock->cash){
           return Redirect()->route('stock')->with(['error'=>'عفواء المبلغ الموجود لا يكفي']);
         }
        $this->stock->pullCash($request->pull_cash);
        return Redirect()->route('stock')->with(['sucss'=>'تم بنجاح']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
