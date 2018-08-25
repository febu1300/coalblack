<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $transaction_type_id
 * @property int $product_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $transaction_date
 * @property int $quantity
 * @property float $price
 * @property int $transaction_status
 *
 * @property \App\Model\Entity\TransactionType $transaction_type
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\User $user
 */
class Transaction extends Entity
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
        'transaction_type_id' => true,
        'product_id' => true,
        'user_id' => true,
        'created_date'=> true,
        'updated_date'=> true,
        'canceled_date'=> true,
        'quantity' => true,
        'price' => true,
        'shipping'=>true,
        'order_number'=>true,
        'transaction_number' => true,
        'transaction_status_id' => true,
        'payment_method_id' => true,
      
        'sent'=>true
    ];
}
