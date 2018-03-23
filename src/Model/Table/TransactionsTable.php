<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\TransactionTypesTable|\Cake\ORM\Association\BelongsTo $TransactionTypes
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TransactionTypes', [
            'foreignKey' => 'transaction_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
             $this->belongsTo('TransactionsStatus', [
            'foreignKey' => 'transaction_status_id',
            'joinType' => 'INNER'
        ]);
                $this->belongsTo('PaymentMethods', [
            'foreignKey' => 'payment_method_id',
                      'joinType' => 'INNER'
        ]);
    }
public function isOwnedBy($transactionId, $userId)
{
return $this->exists(['id' => $transactionId, 'user_id' => $userId]);
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
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->allowEmpty('created_date');
        $validator
            ->dateTime('updated_date')
            ->requirePresence('updated_date', 'create')
            ->allowEmpty('updated_date');
        $validator
            ->dateTime('canceled_date')
            ->requirePresence('canceled_date', 'create')
            ->allowEmpty('canceled_date');
        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmpty('quantity');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->allowEmpty('price');
        $validator
            ->scalar('order_number')
            ->requirePresence('order_number', 'create')
            ->allowEmpty('order_number');
 $validator
            ->boolean('sale')
            ->requirePresence('sale', 'create')
            ->allowEmpty('sale');
        $validator
            ->integer('transaction_status')
            ->requirePresence('transaction_status', 'create')
            ->allowEmpty('transaction_status');
        $validator
            ->scalar('transaction_number')
            ->requirePresence('transaction_number', 'create')
            ->allowEmpty('transaction_number');
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
        $rules->add($rules->existsIn(['transaction_type_id'], 'TransactionTypes'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['transaction_status_id'], 'TransactionsStatus'));
        return $rules;
    }
}
