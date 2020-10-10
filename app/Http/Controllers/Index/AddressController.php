<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Address;
use App\Model\Region;
use App\Model\CartModel;
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

        $cartData = CartModel::select('ecs_goods.goods_id','ecs_goods.goods_name','ecs_goods.shop_price','ecs_goods.goods_thumb','ecs_cart.buy_number')
                    ->leftjoin('ecs_goods','ecs_cart.goods_id','=','ecs_goods.goods_id')
                    ->where(['user_id'=>$user_id,'is_on_sale'=>1])
                    ->get();
        // dd($cartData);


        $addressData = Address::where('user_id',$user_id)->get();

        $Region = new Region();
        foreach($addressData as $k=>$v){
            $addressData[$k]['country'] = $Region->where('region_id',$v->country)->value('region_name');
            $addressData[$k]['province'] = $Region->where('region_id',$v->province)->value('region_name');
            $addressData[$k]['city'] = $Region->where('region_id',$v->city)->value('region_name');
            $addressData[$k]['district'] = $Region->where('region_id',$v->district)->value('region_name');
            $addressData[$k]['tel'] = substr($v->tel, 0, 3).'****'.substr($v->tel, 7);
        }
        // dd($addressData);
       

    	return view('Index.index.address',['address'=>$address,'region'=>$region,'addressData'=>$addressData,'cartData'=>$cartData]);
    }

    public function getsondata(Request $request){
    	$region_id  = $request->region_id; 
    	$region_son = Region::where('parent_id',$region_id)->get();
    
    	return json_encode(['code'=>0,'msg'=>'OK','data'=>$region_son]);
    }

        public function profile(Request $request){
           $post = $request->except('_token');
           $user_id = session()->get('user_id');

           if(empty($post['address_name']) || empty($post['country']) || empty($post['province']) || empty($post['city']) || empty($post['district']) || empty($post['address']) || empty($post['tel']) || empty($post['email'])){
                echo "<script>alert('操作繁忙');location.href='/address'</script>";die;
           }

           $address = Address::where(['address_name'=>$post['address_name'],'user_id'=>$user_id,'email'=>$post['email'],'country'=>$post['country'],'province'=>$post['province'],'city'=>$post['city'],'district'=>$post['district'],'address'=>$post['address'],'tel'=>$post['tel'],'alias'=>$post['alias']])->first();
           if($address){
                echo "<script>alert('此收货地址以存在');location.href='/address'</script>";die;
           }

           $data = [
            'tel' => $post['tel'],
            'user_id' => $user_id,
            'city' => $post['city'],
            'email' => $post['email'],
            'alias' => $post['alias'],
            'address' => $post['address'],
            'country' => $post['country'],
            'province' => $post['province'],
            'district' => $post['district'],
            'address_name' => $post['address_name'],
           ];
           $crea = Address::create($data);
           if($crea){
                echo "<script>alert('添加成功');location.href='/address'</script>";

           }else{
                echo "<script>alert('添加失败，请稍后重试');location.href='/address'</script>";
           }
        }



}
