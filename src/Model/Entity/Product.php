<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_title
 * @property string $product_description
 * @property int $sub_catagory_id
 * @property \Cake\I18n\FrozenTime $created_date
 * @property float $price
 * @property bool $online_vorhanden
 * @property bool $new_in
 * @property bool $sale
 * @property float $discount
 * @property int $discount_type_id
 * @property string $photo_dir
 * @property string $photo
 *
 * @property \App\Model\Entity\SubCatagory $sub_catagory
 * @property \App\Model\Entity\DiscountsType $discounts_type
 * @property \App\Model\Entity\ProductDetail[] $product_details
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\ProductPrice[] $product_prices
 */
class Product extends Entity
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
        'product_name' => true,
        'product_title' => true,
        'product_description' => true,
        'sub_catagory_id' => true,
        'created_date' => true,
        'price' => true,
        'online_vorhanden' => true,
        'new_in' => true,
        'sale' => true,
        'discount' => true,
        'discount_type_id' => true,
        'photo_dir' => true,
        'photo' => true,
        'sub_catagory' => true,
        'discounts_type' => true,
        'product_details' => true,
        'transactions' => true,
        'product_prices' => true
    ];
}
