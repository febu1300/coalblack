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
                       ->add('title', 'notBlank', [
                'rule' => 'notBlank',
                'message' => __('bitte wählen Sie Ihre Titel'),
            ])
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
                        'message' => '<h1>Bitte Emailadresse eingeben!</h1>'
                    ],
                    'unique' => [
                        'message' => 'Diese Emailadresse ist nicht verfügbar!',
                        'provider' => 'table',
                        'rule' => 'validateUnique'
                    ]
                ]
            )
            ->requirePresence('username', 'create', 'Passwort ist erforderlich!')
            ->notEmpty('username', 'Bitte Emailadresse eingeben!');
        $validator
            ->add(
                'password',
                [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'message' => ' Passwortlänge muss mindestens 6 Zeichen betragen '
                    ],
                ]
            )
            ->requirePresence('password', 'create', 'Passwort Wählen!')
            ->notEmpty('password', 'Passwort ist erforderlich!');
        $validator
            ->requirePresence('cPassword', 'create', 'Passwort Wiederholen')
            ->notEmpty('cPassword', 'Passwort ist erforderlich!')
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
                    'message' => 'Passwort stimmt nicht überein'
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
