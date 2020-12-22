<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PicpayRequests extends Model
{
    protected $table = 'picpay_requests';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['referenceId', 'firstname', 'lastname', 'document', 'email', 'phone', 'value', 'status', 'id_user', 'url_payment'];
    protected $useTimestamps = false;
    protected $createdFields = 'created_at';
    protected $updatedFields = 'updated_at';
    protected $deletedFields = 'deleted_at';

    protected $validationRules = [
        'referenceId' => 'required|is_natural|is_unique[picpay_requests.referenceId]',
        'firstname' => 'required|min_length[4]|max_length[50]|alpha_numeric_space',
        'lastname' => 'required|min_length[4]|max_length[50]|alpha_numeric_space',
        'document' => 'required|min_length[12]|max_length[20]|regex_match[/^([0-9a-zA-Z\ \.\-]+)$/]',
        'email' => 'required|min_length[10]|max_length[100]|valid_email',
        'phone' => 'required|regex_match[/^[0-9\(\ \)\-\[\]]+$/]|min_length[8]|max_length[20]',
        'value' => 'required|is_natural_no_zero',
        'status' => 'required|is_natural',
        'id_user' => 'required|is_natural'
    ];

    protected $validationMessages = [
        'referenceId' => [
            'required' => 'Id de referência obrigatório!',
            'is_natural' => 'O id de referência está inválido!',
            'is_unique' => 'O id de referência não é único!'
        ], 
        'firstname' => [
            'required' => 'Nome obrigatório!',
            'min_length' => 'Mínimo 4 caracteres para o nome!',
            'max_length' => 'Máximo 50 caracteres para o nome!',
            'alpha_numeric_space' => 'Caracter(es) do nome inválido!'
        ], 
        'lastname' => [
            'required' => 'Sobrenome obrigatório!',
            'min_length' => 'Mínimo 4 caracteres para o sobrenome!',
            'max_length' => 'Máximo 50 caracteres para o sobrenome!',
            'alpha_numeric_space' => 'Caracter(es) do sobrenome inválido!'
        ], 
        'document' => [
            'required' => 'CPF obrigatório!',
            'min_length' => 'Mínimo 12 caracteres para o CPF!',
            'max_length' => 'Máximo 20 caracteres para o CPF!',
            'regex_match' => 'CPF inválido!'
        ], 
        'email' => [
            'required' => 'Email obrigatório!',
            'min_length' => 'Mínimo 10 caracteres para o email!',
            'max_length' => 'Máximo 20 caracteres para o email!',
            'valid_email' => 'Email inválido!'
        ], 
        'phone' => [
            'required' => 'Telefone obrigatório!',
            'min_length' => 'Mínimo 8 caracteres para o telefone!',
            'max_length' => 'Máximo 20 caracteres para o telefone!',
            'regex_match' => 'Telefone inválido!'
        ], 
        'value' => [
            'required' => 'Valor obrigatório!',
            'is_natural_no_zero' => 'Valor inválido, apenas números inteiros naturais!'
        ], 
        'status' => [
            'required' => 'Telefone obrigatório!',
            'is_natural' => 'Status inválido, apenas núnmeros naturais!'
        ], 
        'id_user' => [
            'required' => 'Id do usuário obrigatório!',
            'is_natural' => 'Id do usuário inválido, apenas núnmeros naturais!'
        ]
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $beforeDelete = ['beforeDelete'];

    protected $skipValidation = false;

    protected function beforeInsert(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeDelete(array $data)
    {
        $data['data']['deleted_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
