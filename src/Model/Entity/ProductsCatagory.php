<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsCatagory Entity
 *
 * @property int $id
 * @property string $catagory_name
 * @property string $photo_dir
 * @property $photo
 */
class ProductsCatagory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'main_catagory_id' => true,
        'catagory_name' => true,
        'photo_dir' => true,
        'photo' => true,
      
        ];

}
