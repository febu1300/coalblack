<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\SubCatagoriesTable|\Cake\ORM\Association\BelongsTo $SubCatagories
 * @property |\Cake\ORM\Association\BelongsTo $DiscountTypes
 * @property \App\Model\Table\ProductDetailsTable|\Cake\ORM\Association\HasMany $ProductDetails
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
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
        $this->addBehavior('Translate', ['fields' => ['title']]);
        $this->setTable('products');
        $this->setDisplayField('product_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('SubCatagories', [
            'foreignKey' => 'sub_catagory_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('DiscountsTypes', [
            'foreignKey' => 'discount_type_id',
            'joinType' => 'LEFT'
        ]);
        
        $this->hasMany('ProductsDetails', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'product_id'
        ]);
          $this->hasMany('Pictures', [
            'foreignKey' => 'product_id'
        ]);
   // Add the behaviour to your table
        //$this->addBehavior('Search.Search');

        // Setup search filter using search manager
//        $this->searchManager()
//            ->value('product_id')
//            // Here we will alias the 'q' query param to search the `Articles.title`
//            // field and the `Articles.content` field, using a LIKE match, with `%`
//            // both before and after.
//            ->add('q', 'Search.Like', [
//                'before' => true,
//                'after' => true,
//                'fieldMode' => 'OR',
//                'comparison' => 'LIKE',
//                'wildcardAny' => '*',
//                'wildcardOne' => '?',
//                'field' => ['product_name', 'id']
//            ]);
    }
// public function searchManager()
//    {
//        $searchManager = $this->behaviors()->Search->searchManager();
//        $searchManager
//            ->like('product_name')
//            ->value('id');
//
//        return $searchManager;
//    }
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
            ->scalar('product_name')
            ->maxLength('product_name', 100)
            ->requirePresence('product_name', 'create')
            ->notEmpty('product_name');

        $validator
            ->scalar('product_title')
            ->maxLength('product_title', 150)
            ->allowEmpty('product_title');
        $validator
            ->integer('initial_stock')
            ->maxLength('initial_stock', 100)
            ->allowEmpty('initial_stock');

        $validator
            ->scalar('product_description')
            ->maxLength('product_description', 1000)
            ->allowEmpty('product_description');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->boolean('online_vorhanden')
            ->requirePresence('online_vorhanden', 'create')
            ->notEmpty('online_vorhanden');

        $validator
            ->boolean('new_in')
            ->requirePresence('new_in', 'create')
            ->notEmpty('new_in');

        $validator
            ->boolean('sale')
            ->requirePresence('sale', 'create')
            ->notEmpty('sale');

        $validator
            ->decimal('discount')
            ->requirePresence('discount', 'create')
            ->allowEmpty('discount');
        $validator
            ->boolean('coalblack_produkte')
            ->requirePresence('coalblack_produkte', 'create')
            ->notEmpty('coalblack_produkte');
        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 100)
            ->requirePresence('photo_dir', 'create')
            ->notEmpty('photo_dir');

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
        $rules->add($rules->existsIn(['sub_catagory_id'], 'SubCatagories'));
        $rules->add($rules->existsIn(['discount_type_id'], 'DiscountsTypes'));

        return $rules;
    }
}
