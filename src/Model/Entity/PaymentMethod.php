<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentMethod Entity
 *
 * @property int $id
 * @property string $method
 * @property string $cridential1
 * @property string $cridential2
 * @property string $credential3
 *
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class PaymentMethod extends Entity
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
        'method' => true,
        'cridential1' => true,
        'cridential2' => true,
        'credential3' => true,
        'transactions' => true
    ];
}
