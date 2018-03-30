<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiscountsTypes Model
 *
 * @method \App\Model\Entity\DiscountsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiscountsType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DiscountsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiscountsType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiscountsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiscountsType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiscountsType findOrCreate($search, callable $callback = null, $options = [])
 */
class DiscountsTypesTable extends Table
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

        $this->setTable('discounts_types');
        $this->setDisplayField('discount_type');
        $this->setPrimaryKey('id');
          $this->hasMany('Products', [
            'foreignKey' => 'discount_type_id'
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
            ->scalar('discount_type')
            ->maxLength('discount_type', 15)
            ->requirePresence('discount_type', 'create')
            ->notEmpty('discount_type');

        return $validator;
    }
}
