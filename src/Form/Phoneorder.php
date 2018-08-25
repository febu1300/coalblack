<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of PhoneorderForm
 *
 * @author buruk
 */
class Phoneorder extends Form
{
     protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('fname', 'string')
                ->addField('lname', 'string')
            ->addField('username', ['type' => 'string']);
 
    }

    protected function _buildValidator(Validator $validator)
    {
        $validator->add('fname', 'length', [
                'rule' => ['minLength', 3],
                'message' => 'A name is required'
            ])
                ->add('lname', 'length', [
                'rule' => ['minLength', 3],
                'message' => 'A name is required'
            ])
                ->add('username', 'format', [
                'rule' => 'email',
                'message' => 'A valid email address is required',
            ]);

        return $validator;
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    } 
    

    //put your code here
}
