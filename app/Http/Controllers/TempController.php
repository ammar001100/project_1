<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\TempService;
use App\Services\TemppService;
use App\Http\Requests\TemppRequest;
use App\Http\Requests\TempRequest;

class TempController extends Controller
{
    private $product;
    private $temp;
    private $tempp;
    public function __construct(ProductService $product,TempService $temp,TemppService $tempp){
        $this->product = $product;
        $this->temp = $temp;
        $this->tempp = $tempp;
    }
    public function create()
    {
        $products = $this->product->get();
        $temp = $this->temp->first();
        $tempp = $this->tempp->get();
        return view('orders.create',compact('products','temp','tempp'));
    }

    public function createClient(TempRequest $request){
        
        $this->temp->store($request->except('_token'));
       return Redirect()->route('temp.add');
    }
    public function createAxing(Request $request){
        $this->temp->addAxing($request->axing);
       return Redirect()->route('temp.add');
    }

    public function createProduct(TemppRequest $request){
        $product = $this->product->getById($request->product_id);
        $tempps = $this->tempp->get();
        if($request->quantity > $product->stock){
            return Redirect()->route('temp.add')->with(['error'=>'الكمية المطلوبة اكبر من كمية المنتج الموجودة']);  
        }
        foreach($tempps as $tempp){
            
        if($tempp->product_id == $product->id){
            return Redirect()->route('temp.add')->with(['error'=>'المنتج موجود مسبقا']);  
        }
        }
        $this->tempp->store($request->except('_token'));
        return Redirect()->route('temp.add');
    }

    public function destroy(string $id)
    {
        $this->tempp->delete($id);
        return Redirect()->route('temp.add')->with(['sucss'=>'تم الحذف بنجاح']);
    }
}
