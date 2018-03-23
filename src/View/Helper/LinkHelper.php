<?php
namespace App\View\Helper;

use Cake\View\Helper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkHelper
 *
 * @author buruk
 */
class LinkHelper extends Helper{
    public $helpers = ['Html'];
    //put your code here
      public function someMethod()
    {
        // set meta description
        echo $this->Html->link(
          'Home',
    '/',
    ['class' => 'button']
        );
    }
       public function makeEdit($title, $url)
    {
        $link = $this->Html->link($title, $url, ['class' => 'edit']);

        return '<div class="editOuter">' . $link . '</div>';
           // Logic to create specially formatted link goes here...
    }
}
