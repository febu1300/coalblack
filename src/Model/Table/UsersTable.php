<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\UsersDetailTable|\Cake\ORM\Association\HasMany $UsersDetail
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Transactions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UsersDetail', [
            'foreignKey' => 'user_id'
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
            ->boolean('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');
 $validator
            ->scalar('fname')
            ->maxLength('fname', 50)
            ->requirePresence('fname', 'create')
            ->allowEmpty('fname');
  $validator
            ->scalar('lname')
            ->maxLength('lname', 50)
            ->requirePresence('lname', 'create')
            ->allowEmpty('lname');
     
        $validator
            ->add(
                'username',
                [
                    'validEmail' => [
                        'rule' => ['email'],
                        'message' => 'Please provide valid email address!'
                    ],
                    'unique' => [
                        'message' => 'Sorry, this email address is already taken!',
                        'provider' => 'table',
                        'rule' => 'validateUnique'
                    ]
                ]
            )
            ->requirePresence('username', 'create', 'Email address must be required!')
            ->notEmpty('username', 'Email address must be required!');
        $validator
            ->add(
                'password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => 'Password must contain at least 6 character'
                    ],
                ]
            )
            ->requirePresence('password', 'create', 'Password must be required!')
            ->notEmpty('password', 'Password must be required!');
        $validator
            ->requirePresence('cPassword', 'create', 'cPassword must be required!')
            ->notEmpty('cPassword', 'Confirm password must be required!')
            ->add(
                'cPassword',
                'custom',
                [
                    'rule' => function ($value, $context) {
                            if (isset($context['data']['password']) && $value == $context['data']['password']) {
                                return true;
                            }
                            return false;
                        },
                    'message' => 'Sorry, password and confirm password does not matched'
                ]
            );
        return $validator;
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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
