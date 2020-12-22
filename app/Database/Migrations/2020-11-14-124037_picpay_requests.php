<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PicpayRequests extends Migration
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
			'firstname' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'lastname' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'document' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'phone' => [
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
				'constraint' => '100',
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
		$this->forge->createTable('picpay_requests');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('picpay_requests');
	}
}
