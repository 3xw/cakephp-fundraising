<?php
namespace Trois\FR\Model\Entity;

use Cake\ORM\Entity;

/**
 * Donation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $anonymous
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $street
 * @property string $city
 * @property string $zip
 * @property string $country
 * @property float $amount
 * @property string $currency
 * @property string $status
 * @property string $payment_method
 * @property string $transaction_nb
 * @property string $donationscol
 * @property int $contribution_id
 *
 * @property \App\Model\Entity\Contribution $contribution
 */
class Donation extends Entity
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
