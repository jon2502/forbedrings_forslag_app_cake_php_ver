<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Internalcomment Entity
 *
 * @property int $ID
 * @property string $user
 * @property string $Content
 * @property string $forslagid
 * @property \Cake\I18n\DateTime $TIMESTAMP
 */
class Internalcomment extends Entity
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
        'user' => true,
        'Content' => true,
        'forslagid' => true,
        'TIMESTAMP' => true,
    ];
}
