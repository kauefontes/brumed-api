<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $email
 * @property string $encrypted_password
 * @property string $reset_password_token
 * @property \Cake\I18n\FrozenTime $reset_password_sent_at
 * @property \Cake\I18n\FrozenTime $remember_created_at
 * @property int $sing_in_count
 * @property \Cake\I18n\FrozenTime $current_sign_in_at
 * @property \Cake\I18n\FrozenTime $last_sign_in_at
 * @property string $current_sign_in_ip
 * @property string $last_sign_in_ip
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 */
class User extends Entity
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
