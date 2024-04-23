<?php
namespace App\Services;
use App\Repositorys\SectionRepository;

class SectionService{
    private $section;
    public function __construct(SectionRepository $section){
        $this->section = $section;
    }

    public function get(){
        return $this->section->get();
    }
    public function store($section){
        return $this->section->store($section);
    }
    public function edit($id){
        return $this->section->edit($id);
    }
    public function update($request){
        return $this->section->update($request);
    }
    public function delete($id){
        $section = $this->section->getById($id);
        if(count($section->products) <= 0){
            return $this->section->delete($id);
        }
        return false;
    }
}