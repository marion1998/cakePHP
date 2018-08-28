<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity
 *
 * @property int $idFilm
 * @property string $titre
 * @property \Cake\I18n\FrozenTime $dateSortie
 * @property \Cake\I18n\FrozenTime $duree
 * @property string $synopsis
 * @property string $DISPO
 */
class Film extends Entity
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
        'titre' => true,
        'dateSortie' => true,
        'duree' => true,
        'synopsis' => true,
        'DISPO' => true
    ];
}
