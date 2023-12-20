<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GalleriesRequest;
use App\Models\Galleries;
use App\Interface\GalleriesRepositoryInterface;

class GalleriesController extends Controller
{
    private $galleriesRepository;

    public function __construct(GalleriesRepositoryInterface $galleriesRepository)
    {
        $this->galleriesRepository = $galleriesRepository;
    }

    public function index(){
      return $this->galleriesRepository->index();
    }
    public function create(){
        return $this->galleriesRepository->create();

    }
    public function store(GalleriesRequest $request){
       return $this->galleriesRepository->store($request);
    }
    public function edit(Galleries $gallery){
        return $this->galleriesRepository->edit($gallery);

    }
    public function update(GalleriesRequest $request,Galleries $gallery){
        return $this->galleriesRepository->update($request,$gallery);
    }
    public function destroy(Galleries $gallery){
        return $this->galleriesRepository->destroy($gallery);
    }

}
