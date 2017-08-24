<?php
namespace Trois\Fundraising\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DonationsFixture
 *
 */
class DonationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'anonymous' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'first_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'last_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'street' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'city' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'zip' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => 'Switzerland', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'amount' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'currency' => ['type' => 'string', 'length' => 3, 'null' => false, 'default' => 'CHF', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => 'pending', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'payment_method' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => 'invoice', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'transaction_nb' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'donationscol' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'contribution_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'status' => ['type' => 'index', 'columns' => ['status'], 'length' => []],
            'currency' => ['type' => 'index', 'columns' => ['currency'], 'length' => []],
            'fk_donations_contributions1_idx' => ['type' => 'index', 'columns' => ['contribution_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_donations_contributions1' => ['type' => 'foreign', 'columns' => ['contribution_id'], 'references' => ['contributions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'created' => '2017-08-24 16:37:59',
            'modified' => '2017-08-24 16:37:59',
            'anonymous' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'street' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'zip' => 'Lorem ip',
            'country' => 'Lorem ipsum dolor sit amet',
            'amount' => 1,
            'currency' => 'L',
            'status' => 'Lorem ipsum dolor sit amet',
            'payment_method' => 'Lorem ipsum dolor sit amet',
            'transaction_nb' => 'Lorem ipsum dolor sit amet',
            'donationscol' => 'Lorem ipsum dolor sit amet',
            'contribution_id' => 1
        ],
    ];
}
