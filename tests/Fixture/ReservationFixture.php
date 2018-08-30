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
        'idreservation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idFilm' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idUser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cart_film_idx' => ['type' => 'index', 'columns' => ['idFilm'], 'length' => []],
            'fk_cart_user1_idx' => ['type' => 'index', 'columns' => ['idUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idreservation', 'idFilm', 'idUser'], 'length' => []],
            'fk_cart_film' => ['type' => 'foreign', 'columns' => ['idFilm'], 'references' => ['film', 'idFilm'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_reservation_user1' => ['type' => 'foreign', 'columns' => ['idUser'], 'references' => ['user', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'idreservation' => 1,
                'idFilm' => 1,
                'idUser' => 1,
                'created' => '2018-08-30 12:53:26'
            ],
        ];
        parent::init();
    }
}
