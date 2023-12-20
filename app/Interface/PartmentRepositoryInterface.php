<?php


namespace App\Interface;
use App\Models\Apartment;
use Illuminate\Http\Request;


interface PartmentRepositoryInterface
{
   public function index(Request $request);
   public function create();

    public function store(Request $request);
    public function edit(Apartment $apartment);

    public function update(Request $request,Apartment $apartment);

    public function destroy(Apartment $apartment);

}
