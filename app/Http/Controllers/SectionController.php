<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use App\Services\SectionService;


class SectionController extends Controller
{
    private $section;
    public function __construct(SectionService $section){
        $this->section = $section;
    }
    public function index()
    {
        $sections = $this->section->get();
         return view('sections.sections',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $this->section->store($request->all());
        return Redirect()->route('section')->with(['sucss'=>'تم الحفظ بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
        $section = $this->section->edit($id);
        return view('sections.edit',compact('section'));
        }catch(\EXEPTION $ex){
           return $ex;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->section->update($request);
        return Redirect()->route('section')->with(['sucss'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = $this->section->delete($id); 
        if($section == true){
        return Redirect()->route('section')->with(['sucss'=>'تم الحذف بنجاح']);
        }else{
        return Redirect()->route('section')->with(['error'=>'عفوا يحتوي القسم على منتجات']);   
        }
    }
}
