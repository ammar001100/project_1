<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\SectionService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\StockService;

class ProductController extends Controller
{
    private $product;
    private $section;
    private $order;
    private $stock;
    public function __construct(ProductService $product , SectionService $sectin,OrderService $order,StockService $stock){
        $this->product = $product;
        $this->section = $sectin;
        $this->order = $order;
        $this->stock = $stock;
    }
                          
    public function index()
    {
        $products = $this->product->get();
        return view('products.products',compact('products'));
    }
    public function create()
    {
        $sections = $this->section->get();
        return view('products.create',compact('sections'));
    }
    public function store(ProductRequest $request)
    {   
        if($request->price > $request->price_sale){
            return Redirect()->back()->withInput($request->all())->with(['error'=>'لا يجب ان يكون سعر الشراء اكبر من سعر البيع']);
        }
        $this->product->store($request->all());
        $capital = $request->price * $request->stock;
        $prof = $request->price_sale - $request->price;
        $profits = $prof * $request->stock;
        $this->stock->updateCapital($capital);
        $this->stock->updateProfits($profits);
        return Redirect()->route('product')->with(['sucss'=>'تم الحفظ بنجاح']);
    }
    public function edit(string $id)
    {
        $product = $this->product->edit($id);
        $sections = $this->section->get();
        return view('products.edit',compact('product','sections'));
    }
    public function update(Request $request)
    {
        $product = $this->product->getById($request->id);
        if($request->price > $request->price_sale){
            return Redirect()->back()->withInput($request->all())->with(['error'=>'لا يجب ان يكون سعر الشراء اكبر من سعر البيع']);
        }
        if($product->stock == $request->stock){
            $this->product->update($request);
            return Redirect()->route('product')->with(['sucss'=>'تم التعديل بنجاح']);
          }
          
            $this->product->update($request);
            
            return Redirect()->route('product')->with(['sucss'=>'تم التعديل بنجاح']);  
        
        return Redirect()->route('product')->with(['sucss'=>'تم التعديل بنجاح']);
    }
    public function destroy(string $id)
    {
        $this->product->delete($id);
        return Redirect()->route('product')->with(['sucss'=>'تم الحذف بنجاح']);
    }
    public function report()
    {
        $products = $this->product->get();
        $orders = $this->order->get();
        return view('products.report',compact('products','orders'));
    }
}
