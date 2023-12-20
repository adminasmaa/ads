<?php

namespace App\Http\Controllers;

use App\Interface\PartmentRepositoryInterface;
use App\Models\Apartment;
use Illuminate\Http\Request;


class PartmentController extends Controller
{
    private $partmentRepository;

    public function __construct(PartmentRepositoryInterface $partmentRepository)
    {
        $this->partmentRepository = $partmentRepository;
    }

    public function index(Request $request){
      return $this->partmentRepository->index($request);
    }
    public function create(){
        return $this->partmentRepository->create();

    }
    public function store(Request $request){
       return $this->partmentRepository->store($request);
    }
    public function edit($id){
        return $this->partmentRepository->edit($id);

    }
    public function update(Request $request,$id){
        return $this->partmentRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->partmentRepository->destroy($id);
    }

}
