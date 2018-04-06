<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersDetailsTypes Model
 *
 * @method \App\Model\Entity\UsersDetailsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersDetailsType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersDetailsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetailsType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersDetailsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetailsType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetailsType findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersDetailsTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users_details_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
                 $this->hasMany('UsersDetails', [
            'foreignKey' => 'user_detail_type_id'
       
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('addres_type')
            ->maxLength('addres_type', 10)
            ->requirePresence('addres_type', 'create')
            ->notEmpty('addres_type');

        return $validator;
    }
}
