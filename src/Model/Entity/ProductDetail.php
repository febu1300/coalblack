<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDetail Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $description
 * @property int $color_id
 * @property int $size_id
 * @property string $photo_dir
 * @property string $photo
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Color $color
 * @property \App\Model\Entity\Size $size
 */
class ProductDetail extends Entity
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
        'product_id' => true,
        'description' => true,
        'color_id' => true,
        'size_id' => true,
        'photo_dir' => true,
        'photo' => true,
        'product' => true,
        'color' => true,
        'size' => true
    ];
}
