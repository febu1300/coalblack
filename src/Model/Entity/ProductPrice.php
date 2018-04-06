<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductPrice Entity
 *
 * @property int $id
 * @property int $products_id
 * @property \Cake\I18n\FrozenTime $valid_from
 * @property \Cake\I18n\FrozenTime $Expire_at
 * @property float $price
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductPrice extends Entity
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
        'products_id' => true,
        'valid_from' => true,
        'Expire_at' => true,
        'price' => true,
        'product' => true
    ];
}
