<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use Symfony\Component\HttpFoundation\Session\Session;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
class LoginController extends Controller
{
    
    public function login(){
        return view('Index.login.login');
    }

    public function reg(){
        return view('Index.login.reg');
    }


    public function regdo(Request $request){
        //        dd($user_plone);
                $user_name = $request->post('user_name');
                $user_pwd = $request->post('user_pwd');
                $user_plone = $request->post('user_plone');
                $user_code = $request->post('user_code');
                $code = session('code');
                // dd($code);
                $len = strlen($user_pwd);
                $t = UserModel::where(['user_plone'=>$user_plone])->first();
                $a = UserModel::where(['user_name'=>$user_name])->first();
                if($a){
                    echo "<script>alert('用户名已存在');location.href='/reg'</script>";die;

                }
                if($t){
                    echo "<script>alert('此手机号已存在');location.href='/reg'</script>";die;
                }
               
                if($len<6){
                    echo "<script>alert('密码长度不能小于六位');location.href='/reg'</script>";die;

                }
                if($code != $user_code){
                    echo "<script>alert('验证码错误');location.href='/reg'</script>";die;

                }
                $user_pwd = password_hash($user_pwd,PASSWORD_BCRYPT);
                $data = [
                    'user_name' => $user_name,
                    'user_plone' => $user_plone,
                    'user_pwd'=>$user_pwd,
                    // 'create_at'=>time(),
                ];
                $res = UserModel::create($data);
                if(!$res){
                    echo "<script>alert('操作繁忙');location.href='/reg'</script>";die;

                }else{
                    return redirect('/login');die;
                }
    }
    public function putcode(){
        $user_plone = request()->input('user_plone');
        $code = rand(100000,999999);
        $ret = $this->Sendsms($user_plone,$code);
        if($ret['Code']=='OK'){
            session(['code' => $code]);
            return json_encode(['code'=>'0','msg'=>'发送成功']);die;
        }else{
            return json_encode(['code'=>'1','msg'=>'操作繁忙请稍后重试']);die;

        }
    }

    public function Sendsms($plone,$code){
        AlibabaCloud::accessKeyClient('LTAI4GKUL2eV8oTANoktK9kw', 'mgHXMZQUPpsGGW1mpnyRHFiszok61w')
        ->regionId('cn-hangzhou')
        ->asDefaultClient();
            try {
            $result = AlibabaCloud::rpc()
                    ->product('Dysmsapi')
                    // ->scheme('https') // https | http
                    ->version('2017-05-25')
                    ->action('SendSms')
                    ->method('POST')
                    ->host('dysmsapi.aliyuncs.com')
                    ->options([
                                    'query' => [
                                    'RegionId' => "cn-hangzhou",
                                    'PhoneNumbers' => $plone,
                                    'SignName' => "笑里有清风",
                                    'TemplateCode' => "SMS_182680110",
                                    'TemplateParam' => "{code:$code}",
                                    ],
                                ])
                    ->request();
             return $result->toArray();
            } catch (ClientException $e) {
                return $e->getErrorMessage() . PHP_EOL;
            } catch (ServerException $e) {
                return $e->getErrorMessage() . PHP_EOL;
            }
    }


    //执行登录
    public function logindo(Request $request){
        $user_name = request()->input('user_name');
        $user_pwd = request()->input('user_pwd');
        if(empty($user_name) || empty($user_pwd)){
            echo "<script>alert('用户名或密码不能为空');location.href='/login'</script>";die;
        }
        $u = UserModel::where(['user_name'=>$user_name])->first();
        // dd($u);
        if(!$u){
            echo "<script>alert('用户名不存在');location.href='/login'</script>";die;

        }else{
            $res = password_verify($user_pwd,$u->user_pwd);
            if(!$res){
            echo "<script>alert('密码错误，请重试');location.href='/login'</script>";die;

            }else{

                session(['user_plone' => $u['user_plone'],'user_id' => $u['user_id'],'user_name' => $u['user_name']]);
                $request->session()->save();
                return redirect('/');die;
            }
            echo "<script>alert('操作繁忙..');location.href='/login'</script>";die;

        }
    }

        //退出
        public function logout(){
            request()->session()->forget(['user_id', 'user_name','user_plone']);
            return redirect('/login');
        }

}
