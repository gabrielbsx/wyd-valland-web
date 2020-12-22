<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MercadopagoPincode extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				//'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'referenceId' => [ //referenceId
				'type' => 'BIGINT',
				'unsigned' => true
			],
			'status' => [
				'type' => 'INT'
			],
			'pincode' => [
				'type' => 'INT'
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
		//$this->forge->addForeignKey('id_user', 'users', 'id');
		$this->forge->createTable('mercadopago_pincode');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('mercadopago_pincode');
	}
}
