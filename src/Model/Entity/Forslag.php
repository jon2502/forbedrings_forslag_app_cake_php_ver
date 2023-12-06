<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Forslag Entity
 *
 * @property int $ID
 * @property string $title
 * @property string $name
 * @property string $email
 * @property string $kategori
 * @property string $comments
 * @property int $state
 * @property string $jirakey
 * @property \Cake\I18n\DateTime $Dateadded
 * @property \Cake\I18n\DateTime $updatedate
 */
class Forslag extends Entity
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
        'title' => true,
        'name' => true,
        'email' => true,
        'kategori' => true,
        'comments' => true,
        'state' => true,
        'jirakey' => true,
        'Dateadded' => true,
        'updatedate' => true,
    ];
}
