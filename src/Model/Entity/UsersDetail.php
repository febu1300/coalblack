<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 * @property bool $main_address
 * @property string $billing_adress_1
 * @property string $billing_adress_2
 * @property string $billing_postal_code
 * @property string $billing_city
 * @property string $billing_state
 * @property string $billing_country
 *
 * @property \App\Model\Entity\User $user
 */
class UsersDetail extends Entity
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
        'user_id' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'city' => true,
        'state' => true,
        'postal_code' => true,
        'country' => true,
        'main_address' => true,
        'billing_adress_1' => true,
        'billing_adress_2' => true,
        'billing_postal_code' => true,
        'billing_city' => true,
        'billing_state' => true,
        'billing_country' => true,
        'user' => true
    ];
}
