<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public  function getAddNews()
    {

       $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;
       $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;
       $timeNow =  $hour .':'.$minute;
       $text =  '';
       $video  =  DB::table('videos')->where('created_at',date("Y-m-d"))->where('time',$timeNow)->get();
       foreach ($video as $key => $value) {
         $text =  $value->video;

       }
     
        return view('News.add',compact('video','text'));
    }
    public  function  postAddNews(Request $re)
    {
        $draft = $re->draft;
        if($draft == null)
        {
              $data =array('title'=>$re->titie,'content'=>$re->nd,'id_user'=>Auth::user()->id);
              $insert = DB::table('post')->insert($data);   
              return redirect('listnew');
        }else{
             $data =array('title'=>$re->titie,'content'=>$re->nd ,'draft'=>$re->draft,'id_user'=>Auth::user()->id);
             $insert = DB::table('post')->insert($data);
             return redirect('getDreft');
        }
       
      
    }
    public  function  getListNews()
    {
       $post = DB::table('post')->join('users','post.id_user','=','users.id')->where('draft',2)->get();
   
       return view('News.list',compact('post'));
    }
    public function  detailNews($id)
    {
        $post = DB::table('post')->join('users','post.id_user','=','users.id')->where('id_post',$id)->get();
        $ht =  '';
        foreach ($post as $key => $value) {
            $ht = $value->content;
        }
        // echo $ht;
        return  view('News.detail', compact('ht','post'));
    }
    public function getDreft()
    {
        $post = DB::table('post')->join('users','post.id_user','=','users.id')->where('draft',1)->get();
   
       return view('News.draft',compact('post'));
    }
    public function getEditNews($id)
    {
         $post = DB::table('post')->where('id_post',$id)->get();
         $new  =  '';
            foreach ($post as $key => $value) {
                $tities = $value->title;
                $new = $value->content;   
            }
      return view('News.edit',compact('new','tities'));
    }
    public function postEditNews(Request $re,$id)
    {
        $main  = $re->main_s;
        if($main == null){
              $data =array('title'=>$re->titie,'content'=>$re->nd,'id_user'=>Auth::user()->id);
          }else{
              $data =array('title'=>$re->titie,'content'=>$re->nd,'draft'=>$main,'id_user'=>Auth::user()->id);
          }
          $updata =  DB::table('post')->where('id_post',$id)->update($data);
          if($updata ==  true){
            return redirect('listnew');
        }else{
            return "khong  update dữ  liệu ";
        }
    
    }
    public  function listVideo()
    {
      $video  =  DB::table('videos')->get();
        return view('News.listvideo' , compact('video'));
    }
       public  function getVideo($name)
    {
         $video  =  DB::table('videos')->where('video',$name)->get();
        return view('News.seeVideo' , compact('video'));
    }
    public  function getAddVideo()
    {
      return  view('video.add');  
    }
    public function postAddVideo(Request $re)
    {
         if ($re->hasFile('file')) {
             $file  =  $re->file('file');
             $fileName  = $file->getClientOriginalName('file');
             $file->move('video',$fileName);
             $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;
             $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;
             $timeNow =  $hour .':'.$minute;
             $arrayName = array('video' =>$fileName ,'user'=>Auth::user()->id,'created_at'=>date("Y-m-d") , 'time'=>$timeNow );
             $insert  = DB::table('videos')->insert($arrayName);
              return redirect('News');
          }else{
            echo "chưa có file";
          }
    }
    public function detailVideo($name)
    {
       $video  =  DB::table('videos')->where('video',$name)->get();
        return view('News.detailVideo' , compact('video'));
    }
    
    public  function  getCheckVideo()
    {

       $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;
       $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;
       $timeNow =  $hour .':'.$minute;
       $video  =  DB::table('videos')->where('created_at',date("Y-m-d"))->where('time',$timeNow)->get()->toArray();

       return view('video.checkboxvideo' , compact('video'));

    }
   
   
}
