<?php

namespace App\Interface\Ads;

use App\Http\Requests\ads\adsRequest;
use App\Models\Ads\AdsType;
use Illuminate\Http\Request;

interface AdsRepositoryInterface
{
    public function index();
    public function stat($id);
    public function stat_all($id);
    public function stat_all_details($date, $id2, $id);
    public function create();

    public function store(adsRequest $request);
    public function edit($adsType);
    public function show($id);
    public function update(adsRequest $request, AdsType $adsType);
    public function visitors(Request $request);
    public function visitors_all(Request $request);
    public function destroy($adsType);

}
