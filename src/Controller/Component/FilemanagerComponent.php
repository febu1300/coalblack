<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filemanager
 *
 * @author buruk
 */
class FilemanagerComponent extends Component{
    public function doUpload($toupload){
      //  pr($toupload);die();
        $desired_width=75;
        $tempdir_main=$toupload->photo_dir.'/main/';
        $tempdir_thumb=$toupload->photo_dir.'/thumb/';
          if (!file_exists($tempdir_main)) {
            mkdir($tempdir_main, 0777, true);
            mkdir($tempdir_thumb,0777,true);
        }
      
        //$extension = pathinfo($toupload->photo, PATHINFO_EXTENSION);
        
      // $imagecreate='imagecreatefrom'.$extension;
        
     
        
        //$target_dir = $toupload->photo_dir;
        $target_file = $tempdir_main . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        
        $source_image=imagecreatefromjpeg($tempdir_main.$toupload->photo);
        //pr($source_image);die();
        $width=imagesx($source_image);
        $height=imagesy($source_image);
        
        $desired_height = floor($height * ($desired_width / $width));
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        imagejpeg($virtual_image, $tempdir_thumb.$toupload->photo);
      return 0;
    }
    public function doDelete($todelete){
             $dir =new Folder($todelete->photo_dir);
            //pr()
          $dir->delete();
           // $dir->close();
     //$files = $dir->find($todelete->photo);
    // pr($files);die();
      //  pr($files);die();
//        $files=$productsCatagory->photo;
        
//        foreach($dir as $file){
//            $file=new File($dir->pwd() .DS. $file);
//            $file->delete();
//            $file->close();
//        } 
        return 0;
    }
    //put your code here
}
