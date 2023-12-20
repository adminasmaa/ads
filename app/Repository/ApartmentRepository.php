<?php


namespace App\Repository;

use App\Helpers\Moving;
use App\Interface\PartmentRepositoryInterface;
use App\Models\Apartment;
use App\Interface\SubscriptionsRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ApartmentRepository implements PartmentRepositoryInterface
{
    protected $data;

    public function __construct(Request $request)
    {
        $this->data['partments'] = Apartment::where('unit_id','=',$request['unit_id'])->get();

    }

    public function index(Request $request)
    {
        session_start();
        Session::put('unit_id', $request['unit_id']);

        Moving::getMoving('عرض الفنادق');
        $this->data['partments'] = Apartment::where('unit_id','=',Session::get('unit_id'))->get();
        return view('pages.partments.index', $this->data);
    }

    public function create()
    {
        return view('pages.partments.create');
    }

    public function store($request)
    {

        $data = $request->all();
        $data['unit_id'] = Session::get('unit_id');
        Apartment::create($data);
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ وحدة جديدة');

        return redirect(url('partments?unit_id='.Session::get('unit_id')));
    }

    public function edit($id)
    {
        $partment = Apartment::find($id);
        Moving::getMoving('تعديل وحدة ');
        // $this->data['sub']=$sub;
        return view('pages.partments.edit', compact('partment'));
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $partment = Apartment::find($id);
        $partment->update($data);
        if ($partment)
            toastr()->success('تم التعديل بنجاح');
        Moving::getMoving('تعديل وحدة ');
        return redirect(url('partments?unit_id='.Session::get('unit_id')));

    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف وحدة ');
        return back();
    }

}
