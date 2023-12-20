<?php


namespace App\Interface;
use App\Http\Requests\GalleriesRequest;
use App\Models\Galleries;


interface GalleriesRepositoryInterface
{
   public function index();
   public function create();

    public function store(GalleriesRequest $request);
    public function edit(Galleries $Gallery);

    public function update(GalleriesRequest $request,Galleries $Gallery);

    public function destroy(Galleries $Gallery);

}