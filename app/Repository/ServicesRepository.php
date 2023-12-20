<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Models\Services;
use App\Interface\ServicesRepositoryInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ServicesRepository implements ServicesRepositoryInterface
{
    protected $data;
    protected $images = ['img'];

    public function __construct()
    {
        $this->data['services']  = Services::all();

    }

    public function index(){ //dd($id);
        Moving::getMoving('عرض الخدمات');
$unit_id=$_GET['unit_id'];
        $services=Services::where('unit_id',$unit_id)->get();
        
        return  view('pages.services.index',compact('services','unit_id'));
    }

    public function create(){ 
        $unit_id=$_GET['unit_id'];
        return view('pages.services.create',compact('unit_id'));
    }

    public function store($request){

         $data=$request->validated();
         foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'services', $image);
        }
         $data['userAdd']=auth()->user()->id;
         $data['unit_id'] = $_GET['unit_id'];
         Services::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ وحدة جديدة');

        return  redirect()->route('services.index','unit_id='.$data['unit_id']);
    }

    public function edit($service){
        $unit_id = $_GET['unit_id'];
        Moving::getMoving('تعديل وحدة ');
        // $this->data['sub']=$sub;
        return view('pages.services.edit',compact('service','unit_id'));
     }

    public function update($request,$service){
        $data=$request->validated();
        foreach ($this->images as $image) { 
            $data[$image] = Moving::upload($request, 'services', $image) ?? $service[$image];
        }
        $unit_id = $_GET['unit_id'];
       // dd($data);
        $data['userEdit']=auth()->user()->id;
        $data['unit_id'] = $unit_id;
      
        $service->update($data);
        if ($service)
           toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل وحدة ');
        return  redirect()->route('services.index','unit_id='.$unit_id);
    }
    public function destroy(services $service){
        $unit_id = $_GET['unit_id'];
        $service->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف وحدة ');
        return  redirect()->route('services.index','unit_id='.$unit_id);
    }

}
