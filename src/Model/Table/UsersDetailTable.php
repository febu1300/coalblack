<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersDetail Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UsersDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersDetailTable extends Table
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

        $this->setTable('users_detail');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('UsersDetailsTypes', [
            'foreignKey' => 'user_detail_type_id',
            'joinType' => 'INNER'
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
            ->scalar('studio_name')
            ->maxLength('studio_name', 100)
            ->requirePresence('studio_name', 'create')
            ->allowEmpty('studio_name');
 
        $validator
            ->scalar('address_line_1')
            ->maxLength('address_line_1', 100)
            ->requirePresence('address_line_1', 'create')
            ->notEmpty('address_line_1');

        $validator
            ->scalar('address_line_2')
            ->maxLength('address_line_2', 100)
            ->allowEmpty('address_line_2');
        $validator
            ->scalar('zusatz')
            ->maxLength('zusatz', 255)
            ->allowEmpty('zusatz');
        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 50)
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 40)
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code');

        $validator
            ->scalar('country')
            ->maxLength('country', 25)
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->boolean('main_address')
            ->allowEmpty('main_address');


   $validator
            ->boolean('is_similar')
            ->allowEmpty('is_similar');
        return $validator;
    }
public function isOwnedBy($usersDetailId, $userId)
{
return
$this->exists(['id' => $usersDetailId, 'user_id' => $userId]);
}
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
    $rules->add($rules->existsIn(['user_detail_type_id'], 'UsersDetailsTypes'));
        return $rules;
    }
}
