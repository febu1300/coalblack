<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property string $link_page
 * @property string $photo_dir
 * @property string $photo
 *
 * @property \App\Model\Entity\Column $column
 */
class Content extends Entity
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
        'lable' => true,
        'link_page' => true,
        'photo_dir' => true,
        'photo' => true,
          'photo1' => true
    ];
}
