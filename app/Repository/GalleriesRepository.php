<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Models\Galleries;
use App\Interface\GalleriesRepositoryInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GalleriesRepository implements GalleriesRepositoryInterface
{
    protected $data;
    protected $images = ['img'];

    public function __construct()
    {
        $this->data['galleries']  = Galleries::all();

    }

    public function index(){ //dd($id);
        Moving::getMoving('عرض الخدمات');
$unit_id=$_GET['unit_id'];
        $galleries=Galleries::where('unit_id',$unit_id)->get();
        
        return  view('pages.galleries.index',compact('galleries','unit_id'));
    }

    public function create(){ 
        $unit_id=$_GET['unit_id'];
        return view('pages.galleries.create',compact('unit_id'));
    }

    public function store($request){

         $data=$request->validated();
         foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'galleries', $image);
        }
         $data['userAdd']=auth()->user()->id;
         $data['unit_id'] = $_GET['unit_id'];
         Galleries::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ وحدة جديدة');

        return  redirect()->route('galleries.index','unit_id='.$data['unit_id']);
    }

    public function edit($gallery){
        $unit_id = $_GET['unit_id'];
        Moving::getMoving('تعديل وحدة ');
        // $this->data['sub']=$sub;
        return view('pages.galleries.edit',compact('gallery','unit_id'));
     }

    public function update($request,$gallery){
        $data=$request->validated();
        foreach ($this->images as $image) { 
            $data[$image] = Moving::upload($request, 'galleries', $image) ?? $service[$image];
        }
        $unit_id = $_GET['unit_id'];
       // dd($data);
        $data['userEdit']=auth()->user()->id;
        $data['unit_id'] = $unit_id;
      
        $gallery->update($data);
        if ($gallery)
           toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل وحدة ');
        return  redirect()->route('galleries.index','unit_id='.$unit_id);
    }
    public function destroy(galleries $gallery){
        $unit_id = $_GET['unit_id'];
        $gallery->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف وحدة ');
        return  redirect()->route('galleries.index','unit_id='.$unit_id);
    }
}
