<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\ReportService;
use App\Services\TemppService;
use App\Services\TempService;

class OrderController extends Controller
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
    }

    public function index()
    {
        $clients = $this->client->get();

        return view('orders.orders', compact('clients'));
    }

    public function invoice($id)
    {
        $orders = $this->order->getClient($id);
        $client = $this->client->getByTemp($id);

        return view('invoice', compact('orders', 'client'));
    }

    public function create()
    {
        $products = $this->tempp->get();
        if (! $products->all()) {
            return Redirect()->route('temp.add')->with(['error' => '   الرجاء ادخال المنتجات ']);
        }
        // save client
        $client = $this->temp->first();
        $arry_client['temp_id'] = $client->id;
        $arry_client['user_id'] = auth()->user()->id;
        $arry_client['name'] = $client->client_name;
        $arry_client['phone'] = $client->client_number;
        $arry_client['address'] = $client->client_address;
        $arry_client['axing'] = $client->axing;
        $arry_client['email'] = null;
        if ($arry_client['name'] == null) {
            return Redirect()->route('temp.add')->with(['error' => '   الرجاء ادخال اسم العميل']);
        }
        $client = $this->client->store($arry_client);
        $this->temp->store($arry_client);
        $this->temp->addAxing('0');

        // save product
        $products = $this->tempp->get();
        foreach ($products as $index => $product) {
            $arry_tempps[$index]['tempp_id'] = $product->id;
            $arry_product[$index]['client_id'] = $client->id;
            $arry_product[$index]['product_id'] = $product->product_id;
            $arry_product[$index]['quantity'] = $product->quantity;
            $arry_product[$index]['total'] = $product->total;
            $arry_product[$index]['product_name'] = $product->product_name;
            $arry_product[$index]['product_unit'] = $product->product_unit;
            $arry_product[$index]['price'] = $product->product_price;
            $arry_product[$index]['price_sale'] = $product->product_price_sale;
            //update product stock
            $stock['id'] = $product->product_id;
            $stock['stock'] = $product->quantity;
            //$product = $this->product->getById($product->product_id);
            $this->product->updateStock($stock);
        }

        $this->order->insert($arry_product);

        // save report order
        $won = 0;
        $wons = 0;

        foreach ($products as $product) {
            $won = $product->product_price_sale - $product->product_price;
            $wons = $wons + ($won * $product->quantity);
        }
        $wons = $wons - $client->axing;
        $arry_report_order['order_num'] = $client->id;
        $arry_report_order['client_name'] = $client->name;
        $arry_report_order['client_id'] = $client->id;
        $arry_report_order['user_id'] = auth()->user()->id;
        $arry_report_order['user_name'] = auth()->user()->name;
        $arry_report_order['total'] = collect($products)->sum('total') - $client->axing;
        $arry_report_order['order_date'] = $client->created_at;
        $arry_report_order['won'] = $wons;
        $arry_report_order['axing'] = $client->axing;
        $arry_report_order['active'] = 1;

        $report_order = $this->report->storeReportOrder($arry_report_order);

        // save report product
        foreach ($products as $index => $product) {
            $report_product[$index]['report_order_id'] = $report_order->id;
            $report_product[$index]['order_num'] = $client->id;
            $report_product[$index]['client_name'] = $client->name;
            $report_product[$index]['client_id'] = $client->id;
            $report_product[$index]['product_name'] = $product->product_name;
            $report_product[$index]['product_id'] = $product->product_id;
            $report_product[$index]['product_price'] = $product->product_price;
            $report_product[$index]['product_price_sale'] = $product->product_price_sale;
            $report_product[$index]['product_unit'] = $product->product_unit;
            $report_product[$index]['product_quantity'] = $product->quantity;
            $report_product[$index]['product_total'] = $product->total;
            $report_product[$index]['won'] = (($product->product_price_sale - $product->product_price) * $product->quantity); //- $client->axing / $product->quantity;
            $report_product[$index]['order_date'] = $client->created_at;
        }
        $this->report->storeReportProduct($report_product);

        // delete tempp
        foreach ($arry_tempps as $index => $arry_tempp) {
            $this->tempp->delete($arry_tempp['tempp_id']);
        }

        return Redirect()->route('invoice', $client->id);
    }

    public function daySale()
    {
        $client_count = 0;
        $client_arry = null;
        $clients = $this->client->get();
        foreach ($clients as $index => $client) {
            if ($client->created_at->format('y-m-d') == date('y-m-d')) {
                $client_count = $client_count + 1;
                $client_arry[$index]['client_name'] = $client->name;
                $client_arry[$index]['date'] = $client->created_at;
                $client_arry[$index]['id'] = $client->id;
            } else {
            }
        }

        return view('orders.day_sale', compact('client_arry', 'client_count'));
    }

    public function myOrder($id)
    {
        $clients = $this->client->myOrder($id);

        return view('orders.my_order', compact('clients'));
    }

    public function destroy($id)
    {
        $this->order->delete($id);

        return Redirect()->route('order')->with(['sucss' => 'تم التراجع عن الطلب بنحاح']);
    }
    public function Search(){
        $output = 123;
        return response()->json(['cost' =>$output]);
    }
}
