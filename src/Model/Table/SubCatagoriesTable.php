<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubCatagories Model
 *
 * @property \App\Model\Table\ProductsCatagoriesTable|\Cake\ORM\Association\BelongsTo $ProductsCatagories
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\SubCatagory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubCatagory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubCatagory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubCatagory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubCatagory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubCatagory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubCatagory findOrCreate($search, callable $callback = null, $options = [])
 */
class SubCatagoriesTable extends Table
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

        $this->setTable('sub_catagories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProductsCatagories', [
            'foreignKey' => 'products_catagory_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'sub_catagory_id'
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
            ->scalar('sub_catagory_name')
            ->maxLength('sub_catagory_name', 100)
            ->requirePresence('sub_catagory_name', 'create')
            ->notEmpty('sub_catagory_name');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 100)
            ->requirePresence('photo_dir', 'create')
            ->allowEmpty('photo_dir');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 100)
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

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
        $rules->add($rules->existsIn(['products_catagory_id'], 'ProductsCatagories'));

        return $rules;
    }
}
