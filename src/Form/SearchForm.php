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
 * Description of SearchForm
 *
 * @author buruk
 */
class SearchForm extends Form {
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string');
     
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minLength', 10],

            ]);
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    }
}
