<?php
namespace App\Helper;
use DB;
class Helper
{

  public static function getUserPermissions($user_id = 0){
            $assigned_permissions =array();
            $data = DB::table('module_permissions_users')->where('user_id' , $user_id)->pluck('allowed_module');
            if($data != null){
                 foreach ($data as $value) {
            
                $assigned_permissions = explode(',',$value); 
               }
            }
                // dd($assigned_permissions);
           return $assigned_permissions;
  }  

public static function test(){
		return "inhelper";
	}



public static function resizeImage($file, $w, $h, $crop=FALSE) {
	
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    return $dst;
}
}