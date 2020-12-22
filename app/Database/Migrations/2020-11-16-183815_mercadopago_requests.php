<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MercadopagoRequests extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'referenceId' => [ //referenceId
				'type' => 'BIGINT',
				'unsigned' => true
			],
			'referenceIdBox' => [ //referenceIdBox
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'value' => [
				'type' => 'INT'
			],
			'status' => [
				'type' => 'INT'
			],
			'id_user' => [
				'type' => 'INT'
			],
			'url_payment' => [
				'type' => 'TEXT',
				'constraint' => '150',
				'null' => true
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
		$this->forge->createTable('mercadopago_requests');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('mercadopago_requests');
	}
}
