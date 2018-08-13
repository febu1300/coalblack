<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsCatagories Model
 *
 * @property |\Cake\ORM\Association\HasMany $SubCatagories
 *
 * @method \App\Model\Entity\ProductsCatagory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsCatagory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsCatagory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsCatagory findOrCreate($search, callable $callback = null, $options = [])
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
    
        
        
    

        $this->belongsTo('MainCatagories', [
         
            'foreignKey' => 'main_catagory_id',
            'joinType' => 'LEFT'
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
            ->allowEmpty('photo');

        return $validator;
    }
    
        public function buildRules(RulesChecker $rules)
    {
      
       $rules->add($rules->existsIn(['main_catagory_id'], 'MainCatagories'));
        return $rules;
    }
}
