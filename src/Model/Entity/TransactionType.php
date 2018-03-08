<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransactionType Entity
 *
 * @property int $id
 * @property string $transaction_type_name
 *
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class TransactionType extends Entity
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
        'transaction_type_name' => true,
        'transactions' => true
    ];
}
