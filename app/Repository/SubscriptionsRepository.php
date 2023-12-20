<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Models\Subscriptions;
use App\Interface\SubscriptionsRepositoryInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SubscriptionsRepository implements SubscriptionsRepositoryInterface
{
    protected $data;
    protected $images = ['img'];

    public function __construct()
    {
        $this->data['Subscriptions']  = Subscriptions::all();

    }

    public function index(){
        Moving::getMoving('عرض الفنادق');
        return  view('pages.subscriptions.index',$this->data);
    }

    public function create(){
        return view('pages.subscriptions.create');
    }

    public function store($request){

         $data=$request->validated();
         foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'subs', $image);
        }
         $data['userAdd']=auth()->user()->id;
         $data['agz_num'] = $request->agz_num;
         $data['description'] = $request->description;
         $data['details'] = $request->details;
         $data['location'] = $request->location;

         $data['iphone_application'] = $request->iphone_application;

         $data['galaxy_application'] = $request->galaxy_application;
         $data['menu'] = $request->menu;


         $data['link_insta'] = $request->link_insta;
         $data['area'] = $request->area;
        Subscriptions::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ وحدة جديدة');

        return  redirect()->route('subscriptions.index');
    }

    public function edit($subscription){
        Moving::getMoving('تعديل وحدة ');
        // $this->data['sub']=$sub;
        return view('pages.subscriptions.edit',compact('subscription'));
     }

    public function update($request,$subscription){
        $data=$request->validated();
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'subs', $image) ?? $subscription[$image];
        }
       // dd($data);
        $data['location'] = $request->location;
        $data['userEdit']=auth()->user()->id;
        $data['agz_num'] = $request->agz_num;
        $data['description'] = $request->description;
        $data['details'] = $request->details;
        $data['iphone_application'] = $request->iphone_application;

        $data['galaxy_application'] = $request->galaxy_application;
        $data['menu'] = $request->menu;
        $data['link_insta'] = $request->link_insta;
        $data['area'] = $request->area;
        $subscription->update($data);
        if ($subscription)
           toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل وحدة ');
        return redirect()->route('subscriptions.index');
    }
    public function destroy(Subscriptions $subscription){
        $subscription->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف وحدة ');
        return back();
    }

}
