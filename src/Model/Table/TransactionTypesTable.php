<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransactionTypes Model
 *
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\TransactionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransactionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TransactionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransactionType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransactionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionType findOrCreate($search, callable $callback = null, $options = [])
 */
class TransactionTypesTable extends Table
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

        $this->setTable('transaction_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Transactions', [
            'foreignKey' => 'transaction_type_id'
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
            ->scalar('transaction_type_name')
            ->maxLength('transaction_type_name', 100)
            ->requirePresence('transaction_type_name', 'create')
            ->notEmpty('transaction_type_name');

        return $validator;
    }
}
