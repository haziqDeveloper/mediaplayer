<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deviceinfo;
use App\Models\Checksum;
use App\Models\Movie;
use Illuminate\Support\Collection;

class DeviceController extends Controller
{

function indexDevice()
{
    $checksum = Checksum::all();
    $deviceinfo = Deviceinfo::orderBy('created_at', 'desc')->paginate(15);
   
    $newitems = [];

    foreach ($deviceinfo as $key => $item) {

        $matchingChecksum = false;
        foreach($checksum as $check)
           {
              if($item->cavalue == $check->checksum && $item->version == $check->version)
               {
                  $matchingChecksum = true;   
               }
           }
        $newitems = array_merge($item->toArray(), [
            'checksumMatch' => !empty($matchingChecksum),
        ]);
        $deviceinfo[$key] = $newitems;
    }

    return response()->json($deviceinfo);
}


   public function indexDevicesearch($macid)
   {
       return Deviceinfo::where("macid","like","%".$macid."%")->get();
   }

   public function indexMoviesearch($movies_name)
   {
       return Movie::where("movies_name","like","%".$movies_name."%")->get();
   }

    function indexSeriesDevice()
    {
      $series = Movie::orderBy('created_at', 'desc')->paginate(15);     
      return response()->json($series);
    }

    function editSeriesDevice($id)
    {
      $series = Movie::find($id);     
      return response()->json($series);
    }

    function updateSeriesDevice(Request $request, $id)
    {
      $series = Movie::find($id);
      $series->tmdbid = $request->tmdbid;
      $series->update();
      return response()->json($series);
    }

    function deleteSeriesDevice($id)
    {
      $series = Movie::find($id);
      $series->delete();
      return response()->json($series);
    }


    function seriesDevice(Request $request)
    {
      $series = new Movie();
      $series->movies_name = $request->movies_name;
      $series->tmdbid = $request->tmdbid ? $request->tmdbid : '';
      $series->save();
      return response()->json($series);
    }	
    
    function storeDevice(Request $request)
    {
        $device = Deviceinfo::where('macid', $request->macid)->first();
        if($device)
        {
            $device->deviceinfo = $request->deviceinfo;
            $device->isnotified = $request->isnotified;
            $device->cavalue = $request->cavalue;
            $device->update();
            return response()->json($device);
        }
        else
        {
            $device  = new Deviceinfo();
            $device->macid = $request->macid;
            $device->deviceinfo = $request->deviceinfo;
            $device->isnotified = $request->isnotified;
            $device->cavalue = $request->cavalue;
            $device->version = $request->version;
            $device->status = 'true';
            $device->save();
            return response()->json($device);
        }
    }


    function changeItemStatus(Request $request,$id)
    {
       $mac = Deviceinfo::find($id);
       $mac->status = $request->status == 'true' ? 'true' : 'false';
       $mac->update();
       return response()->json($mac);
    }

     
    function storeChecksum(Request $request)
   {
        $check = Checksum::where('version', $request->version)->first();
        if($check)
        {
            $check->checksum = $request->checksum;
            $check->version = $request->version;
            $check->update();
            return response()->json($check);
        }
        else
        {
        $check = new Checksum();
        $check->version = $request->version;
        $check->checksum= $request->checksum;
        $check->save();
        return response()->json($check);
      }
   }

   function indexChecksum()
    {
      $check = Checksum::orderBy('created_at', 'desc')->paginate(15);
      return response()->json($check);
    }

    function deleteDeviceinfo($id)
    {
      $device = Deviceinfo::find($id);
      $device->delete();
      return response()->json($device);
    }

    function deleteChecksum($id)
    {
      $check = Checksum::find($id);
      $check->delete();
      return response()->json($check);
    }
 
}
