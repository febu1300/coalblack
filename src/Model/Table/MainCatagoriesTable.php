<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MainCatagories Model
 *
 * @property \App\Model\Table\ProductsCatagoriesTable|\Cake\ORM\Association\HasMany $ProductsCatagories
 *
 * @method \App\Model\Entity\MainCatagory get($primaryKey, $options = [])
 * @method \App\Model\Entity\MainCatagory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MainCatagory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MainCatagory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MainCatagory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MainCatagory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MainCatagory findOrCreate($search, callable $callback = null, $options = [])
 */
class MainCatagoriesTable extends Table
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

        $this->setTable('main_catagories');
        $this->setDisplayField('main_catagory_name');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductsCatagories', [
            'foreignKey' => 'main_catagory_id'
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
            ->scalar('main_catagory_name')
            ->maxLength('main_catagory_name', 200)
            ->requirePresence('main_catagory_name', 'create')
            ->notEmpty('main_catagory_name');

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
}
