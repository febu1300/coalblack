<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsCatagories Model
 *
 * @property \App\Model\Table\ProductsCatagoriesTable|\Cake\ORM\Association\BelongsTo $ParentProductsCatagories
 * @property \App\Model\Table\ProductsCatagoriesTable|\Cake\ORM\Association\HasMany $ChildProductsCatagories
 * @property \App\Model\Table\SubCatagoriesTable|\Cake\ORM\Association\HasMany $SubCatagories
 *
 * @method \App\Model\Entity\ProductsCatagory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsCatagory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsCatagory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class ProductsCatagoriesTable extends Table
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

        $this->setTable('products_catagories');
        $this->setDisplayField('catagory_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentProductsCatagories', [
            'className' => 'ProductsCatagories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildProductsCatagories', [
            'className' => 'ProductsCatagories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('SubCatagories', [
            'foreignKey' => 'products_catagory_id'
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
            ->scalar('catagory_name')
            ->maxLength('catagory_name', 50)
            ->requirePresence('catagory_name', 'create')
            ->notEmpty('catagory_name');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 100)
            ->allowEmpty('photo_dir');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 100)
            ->allowEmpty('photo');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProductsCatagories'));

        return $rules;
    }
}
