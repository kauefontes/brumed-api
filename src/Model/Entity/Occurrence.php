<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Occurrence Entity
 *
 * @property int $id
 * @property string $description
 * @property string $severity
 * @property string $todo
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string|resource $image
 * @property string $correction
 * @property int $regulation_id
 * @property int $inspection_id
 *
 * @property \App\Model\Entity\Regulation $regulation
 * @property \App\Model\Entity\Inspection $inspection
 */
class Occurrence extends Entity
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
        '*' => true,
        'id' => false
    ];
}
