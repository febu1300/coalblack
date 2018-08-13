<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @method \App\Model\Entity\Content get($primaryKey, $options = [])
 * @method \App\Model\Entity\Content newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Content[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content findOrCreate($search, callable $callback = null, $options = [])
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('lable')
            ->maxLength('lable', 100)
            ->requirePresence('lable', 'create')
            ->notEmpty('lable');
        $validator
            ->scalar('link_page')
            ->maxLength('link_page', 100)
            ->requirePresence('link_page', 'create')
            ->notEmpty('link_page');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 100)
            ->allowEmpty('photo_dir');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 100)
            ->allowEmpty('photo')
    
            ->add('photo1', [
                'uploadError' => [
                'rule' => 'uploadError',
                'message' => 'The cover image upload failed.',
                'allowEmpty' => TRUE,
            ],
                        'fileSize' => [
                                'rule' => [
                                    'fileSize', '<', '5MB'
                                ],
                                'message' => 'Please upload file smaller than 5MB'
                            ],
                        'mimeType' => [
                            'rule' => [
                                'mimeType', ['image/jpeg']
                            ],
                            'message' => 'Please upload only jpg images'
                        ]
                    ]
            );
 

        return $validator;
    }
}
