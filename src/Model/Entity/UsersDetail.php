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
 
        'is_similar' => true,
        'user_detail_type_id'=>true
    ];
}
