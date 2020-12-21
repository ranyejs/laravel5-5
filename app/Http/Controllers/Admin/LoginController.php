<?php

namespace App\Http\Controllers\Admin;
use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
class LoginController extends Controller
{
	// public function __construct(){
	// 	$user = \Session::get('admin');
	// 	dd($user);
	// }
    //
    public function index(){


//        $flight = AdminUser::where('id', 1)->first();
//        dd($flight);
    	$data = [
    		'title' => "我是页面标题",
    		'content' => "我是页面内容，我是内容，正文！"
    	];
        return view('admin.login.index',$data);
    }


    //验证登录
    public function doLogin(Request $request){
        $yzCode = $this->checkImgCode($request->post('yzcode'));
        if(!$yzCode){
            $html['code'] = 0;
            
        }
        $data = [
            'nick_name'=> $request->post('user'),
            'password'=> $request->post('pwd'),
        ];


        var_dump($data);exit;
	    $input = $request->input();//获取输入的数据
	 
	    dd($input);

    }


    # 生成图像验证码
    public function createImg( Request $request ){
        $obj = new CaptchaBuilder();
        $obj -> build( 92 , 30 );

        # 获取验证码内容
        $content = $obj -> getPhrase();

        # 存入缓存
        //$request -> session() -> put( 'milkcaptcha' , $content );
        \session('milkcaptcha',$content);
        # 将验证码以图片形式返回
        return response( $obj -> output() ) -> header( 'Content-type','image/jpeg' );
    }


    # 验证图像验证码
    public function checkImgCode( $code){
        # 取出图像验证码
        $imgCode = \session('milkcaptcha');
        //Session::flash( 'milkcaptcha' , $imgCode );

        if( $imgCode == $code ){
            return true;
        }else{
            return false;
        }
	}
}


