<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentMethods Model
 *
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\PaymentMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentMethod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PaymentMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentMethod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentMethod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentMethod findOrCreate($search, callable $callback = null, $options = [])
 */
class PaymentMethodsTable extends Table
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

        $this->setTable('payment_methods');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Transactions', [
            'foreignKey' => 'payment_method_id'
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
            ->scalar('method')
            ->maxLength('method', 50)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        $validator
            ->scalar('cridential1')
            ->maxLength('cridential1', 100)
            ->requirePresence('cridential1', 'create')
            ->notEmpty('cridential1');

        $validator
            ->scalar('cridential2')
            ->maxLength('cridential2', 100)
            ->requirePresence('cridential2', 'create')
            ->notEmpty('cridential2');

        $validator
            ->scalar('credential3')
            ->maxLength('credential3', 100)
            ->requirePresence('credential3', 'create')
            ->notEmpty('credential3');

        return $validator;
    }
}
