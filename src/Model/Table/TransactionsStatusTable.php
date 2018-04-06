<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransactionsStatus Model
 *
 * @method \App\Model\Entity\TransactionsStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransactionsStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TransactionsStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransactionsStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransactionsStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionsStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionsStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class TransactionsStatusTable extends Table
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

        $this->setTable('transactions_status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
         $this->hasMany('Transactions', [
            'foreignKey' => 'transaction_status_id'
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
            ->scalar('status')
            ->maxLength('status', 15)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
