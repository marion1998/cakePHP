<?php
namespace App\Test\TestCase\Form;

use App\Form\FilmForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\FilmForm Test Case
 */
class FilmFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\FilmForm
     */
    public $Film;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Film = new FilmForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Film);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
