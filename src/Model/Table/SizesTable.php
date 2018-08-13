<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sizes Model
 *
 * @property \App\Model\Table\ProductDetailsTable|\Cake\ORM\Association\HasMany $ProductDetails
 * @property |\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Size get($primaryKey, $options = [])
 * @method \App\Model\Entity\Size newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Size[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Size|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Size patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Size[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Size findOrCreate($search, callable $callback = null, $options = [])
 */
class SizesTable extends Table
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

        $this->setTable('sizes');
        $this->setDisplayField('size');
        $this->setPrimaryKey('id');

      
        $this->hasMany('Products', [
            'foreignKey' => 'size_id'
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
            ->integer('size')
            ->requirePresence('size', 'create')
            ->notEmpty('size');

        return $validator;
    }
}
