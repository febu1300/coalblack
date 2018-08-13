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


class CmsFileManagerComponent extends Component{
    public function doUpload($toupload){
      //  pr($toupload);die();		$imagecache = new ImageCache\ImageCache();
		
        $desired_width=75;
        $tempdir_main=$toupload->photo_dir.'/main/';
        $tempdir_thumb=$toupload->photo_dir.'/thumb/';
          if (!file_exists($tempdir_main)) {
            mkdir($tempdir_main, 0777, true);
            mkdir($tempdir_thumb,0777,true);		
        }

        //$target_dir = $toupload->photo_dir;
        $target_file = $tempdir_main . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        
        $source_image=imagecreatefromjpeg($tempdir_main.$toupload->photo);

        $width=imagesx($source_image);
        $height=imagesy($source_image);
        
        $desired_height = floor($height * ($desired_width / $width));
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        imagejpeg($virtual_image, $tempdir_thumb.$toupload->photo);
        
     
      return 0;
    }
    
      public function doChange($toupload){
      //  pr($toupload);die();
        $desired_width=75;
        $tempdir_main=$toupload->photo_dir.'/main/';
        $tempdir_thumb=$toupload->photo_dir.'/thumb/';
          if (!file_exists($tempdir_main)) {
            mkdir($tempdir_main, 0755, true);
            mkdir($tempdir_thumb,0755,true);
        }
      
        //$extension = pathinfo($toupload->photo, PATHINFO_EXTENSION);
        
      // $imagecreate='imagecreatefrom'.$extension;


        
        //$target_dir = $toupload->photo_dir;
        $target_file = $tempdir_main . basename($_FILES["photo1"]["name"]);

        move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file);
        
        $source_image=imagecreatefromjpeg($tempdir_main.$toupload->photo);

      imagejpeg($source_image, $tempdir_main.$toupload->photo,37);
        $width=imagesx($source_image);
        $height=imagesy($source_image);
        
        $desired_height = floor($height * ($desired_width / $width));
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        imagejpeg($virtual_image, $tempdir_thumb.$toupload->photo,50);

      return 0;
      
      
      

		//$cached_src_one = $imagecache->cache( 'images/unsplash1.jpeg' );
		//echo '<p>Original file size: ' . filesize($imagecache->image_src) . ' bytes</p>';
		//echo '<p>PHPImageCach-ified file size: ' . filesize($imagecache->cached_filename) . ' bytes</p>';
		//echo '<p>Total image size reduction: ' . (((filesize($imagecache->image_src) - filesize($imagecache->cached_filename)) / filesize($imagecache->image_src))*100) . '%</p>';
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
    
  


}
