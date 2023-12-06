<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Logging Entity
 *
 * @property int $ID
 * @property string $username
 * @property string $forslagid
 * @property string $status
 * @property \Cake\I18n\DateTime $TIMESTAMP
 */
class Logging extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'username' => true,
        'forslagid' => true,
        'status' => true,
        'TIMESTAMP' => true,
    ];
}
