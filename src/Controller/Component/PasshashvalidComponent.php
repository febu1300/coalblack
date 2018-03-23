<?php
namespace App\Controller\Component;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
/**
 * Passhashvalid component
 */
class PasshashvalidComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    
     public function checkpass($pass)
    {
    if (strlen($pass) > 0) {
    return (new DefaultPasswordHasher)->hash($pass);
    }
    }
}
