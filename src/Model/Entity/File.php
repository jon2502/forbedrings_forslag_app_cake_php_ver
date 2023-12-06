<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * File Entity
 *
 * @property int $ID
 * @property string $parthname
 * @property string $filename
 * @property string $filetype
 * @property string $extension
 * @property string $forslagid
 */
class File extends Entity
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
        'parthname' => true,
        'filename' => true,
        'filetype' => true,
        'extension' => true,
        'forslagid' => true,
    ];
}
