<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOngkirTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kodepos_asal' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'kode_pos_tujuan' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'ongkir_per_kg' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('ongkir');
    }

    public function down()
    {
        $this->forge->dropTable('ongkir');
    }
}
