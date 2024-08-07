<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deviceinfo;

class DeviceController extends Controller
{
    function indexDevice()
    {
        $devices = Deviceinfo::orderBy('created_at', 'desc')->paginate(15);
        return response()->json($devices);        
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
            $device->save();
            return response()->json($device);
        }
    }
}
