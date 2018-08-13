<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsCatagory Entity
 *
 * @property int $id
 * @property string $catagory_name
 * @property string $photo_dir
 * @property string $photo
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 *
 * @property \App\Model\Entity\ProductsCatagory $parent_products_catagory
 * @property \App\Model\Entity\ProductsCatagory[] $child_products_catagories
 * @property \App\Model\Entity\SubCatagory[] $sub_catagories
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
        'catagory_name' => true,
        'photo_dir' => true,
        'photo' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'parent_products_catagory' => true,
        'child_products_catagories' => true,
        'sub_catagories' => true
    ];
}
