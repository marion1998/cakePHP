<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationFixture
 *
 */
class ReservationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reservation';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idReservation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'idFilm' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idUser' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idFilm' => ['type' => 'index', 'columns' => ['idFilm'], 'length' => []],
            'idUser' => ['type' => 'index', 'columns' => ['idUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idReservation'], 'length' => []],
            'reservation_ibfk_1' => ['type' => 'foreign', 'columns' => ['idFilm'], 'references' => ['film', 'idFilm'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'reservation_ibfk_2' => ['type' => 'foreign', 'columns' => ['idUser'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'idReservation' => 1,
                'idFilm' => 1,
                'idUser' => 1
            ],
        ];
        parent::init();
    }
}
