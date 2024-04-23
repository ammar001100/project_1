<?php
namespace App\Repositorys;
use App\Models\Section;

class SectionRepository implements RepositoryInterface
{
    
    private $section;
    public function __construct(Section $section){
        $this->section = $section;
    }
    public function get(){
        return $this->section->paginate(10);
    }
    public function getById($id){
        return $this->section->where('id',$id)->firstOrfail();
    }
    public function store($section){
        return $this->section->create($section);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $section = $this->getById($request->id);
        return $section->update($request->all());
    }
    public function delete($id){
        
        $section = $this->getById($id);
        return $section->delete();
    }
}