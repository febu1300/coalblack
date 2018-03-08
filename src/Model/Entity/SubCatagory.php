<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubCatagory Entity
 *
 * @property int $id
 * @property int $products_catagory_id
 * @property string $sub_catagory_name
 * @property string $photo_dir
 * @property string $photo
 *
 * @property \App\Model\Entity\ProductsCatagory $products_catagory
 * @property \App\Model\Entity\Product[] $products
 */
class SubCatagory extends Entity
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
        'products_catagory_id' => true,
        'sub_catagory_name' => true,
        'photo_dir' => true,
        'photo' => true,
        'products_catagory' => true,
        'products' => true
    ];
}
