<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Address;
use App\Model\Region;
class AddressController extends Controller
{
    public function address(Request $request){
    	$cart_id  = $request->cart_id;
    	$address  = $request->address;
    	$user_id = session()->get('user_id');

    	if(!$user_id){
    		return redirect('login');die;
    	}
		$address = Address::where('user_id',$user_id)->get();
		$address = $address?$address->toArray():[];
		$region = Region::where('parent_id',0)->get();

    	return view('Index.index.address',['address'=>$address,'region'=>$region]);
    }

    public function getsondata(Request $request){
    	$region_id  = $request->region_id;
    	$region_son = Region::where('parent_id',$region_id)->get();
    
    	return json_encode(['code'=>0,'msg'=>'OK','data'=>$region_son]);
    	


    }
}
