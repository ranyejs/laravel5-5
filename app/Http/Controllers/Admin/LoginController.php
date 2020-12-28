<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
	// public function __construct(){
	// 	$user = \Session::get('admin');
	// 	dd($user);
	// }
    //
    public function index(){

//        $flight = AdminUser::created(['']);
//        dd($flight);
    	$data = [
    		'title' => "我是页面标题",
    		'content' => "我是页面内容，我是内容，正文！"
    	];
        return view('admin.login',$data);
    }


    //验证登录
    public function doLogin(Request $request){
        $input = $request->except('_token');
        $rule = [
            'username' => 'required|between:4,18',
            'password' => 'alpha_dash|required|between:4,18',
            'yzCode'   => 'required',
        ];
        $msg = [
            'username.required'=>'用户名必须输入',
            'username.between'=>'用户名长度必须在4~18之间',
            'password.required'=>'密码不能为空',
            'password.alpha_dash' => '密码字符只能是字母、数字、下划线',
            'password.between'=>'密码长度必须在4~18之间',
        ];
        $validator = Validator::make($input,$rule,$msg);
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        $yzCode = $this->checkImgCode($input['yzCode']);
        if(!$yzCode){
            return redirect('admin/login')->with('errors','验证码输入错误');
        }

        $adminUser = AdminUser::where(['username'=>$input['username'],'status'=>0])
            ->first();

        if(!$adminUser){
            return redirect('admin/login')->with('errors','该用户不存在');
        }
        //密码验证
        if($input['password']!=Crypt::decrypt($adminUser->password)){
            return redirect('admin/login')->with('errors','密码输入错误');
        }
        //\session('user',$adminUser->username);
        $request->session()->put('user' , $adminUser->username);
        return redirect('admin/index');
    }


    # 生成图像验证码
    public function createImg(Request $request){
        $obj = new CaptchaBuilder();
        $obj -> build( 100 , 50 );

        # 获取验证码内容
        $content = $obj -> getPhrase();
        # 存入缓存
        $request->session()->put('milkcaptcha' , $content );
        //\session('milkcaptcha',$content);
        # 将验证码以图片形式返回
        return response( $obj -> output() ) -> header( 'Content-type','image/jpeg' );
    }


    # 验证图像验证码
    public function checkImgCode($code){
        # 取出图像验证码
        $imgCode = session('milkcaptcha');
        //Session::flash( 'milkcaptcha' , $imgCode );
        //dd(strtolower($imgCode).'=='.strtolower($code));
        if( strtolower($imgCode)  == strtolower($code) ){
            return true;
        }else{
            return false;
        }
	}


	//加密算法
    public function encrypt(){
//        $salt = 'HJKhh,,';
//        1.MD5
//
//        $str = md5($salt.'123456');
//          2.hash
//        $salt = 'HJKhh,,';
//        $str = Hash::make($salt.'123456');
//        Hash::check($getStr,$str);

        //crypt
        $str = Crypt::encrypt('123456');
        //$jiami = Crypt::encrypt($str);
        //$crtpt_str = 'dkfjdsklfjd;lsf;dskfldskfksflldadas';
        //$jiemi = Crypt::decrypt($str);
        echo $str.'<br>';
        echo Crypt::decrypt($str);

    }


}


