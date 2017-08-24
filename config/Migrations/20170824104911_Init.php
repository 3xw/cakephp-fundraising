<?php
use Migrations\AbstractMigration;

class Init extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('contributions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('amount', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('thanks', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('donations')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('anonymous', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('street', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('city', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('zip', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('country', 'string', [
                'default' => 'Switzerland',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('amount', 'float', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('currency', 'string', [
                'default' => 'CHF',
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'pending',
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('payment_method', 'string', [
                'default' => 'invoice',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('transaction_nb', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('donationscol', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('contribution_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'contribution_id',
                ]
            )
            ->addIndex(
                [
                    'status',
                ]
            )
            ->addIndex(
                [
                    'currency',
                ]
            )
            ->create();

        $this->table('donations')
            ->addForeignKey(
                'contribution_id',
                'contributions',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('donations')
            ->dropForeignKey(
                'contribution_id'
            );

        $this->dropTable('contributions');
        $this->dropTable('donations');
    }
}
