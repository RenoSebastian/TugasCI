<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DataException;

class ModelJual extends Model
{
    protected $table = 'jual';
    // Note: We do not set the primaryKey property since we are using composite keys
    protected $primaryKey = 'idtransaksi';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['idtransaksi', 'idbarang', 'harga', 'jumlah'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // Custom method to handle composite primary keys insert
    public function insert($data = null, bool $returnID = true)
    {
        if (is_array($data)) {
            $data = $this->cleanData($data);

            if (!isset($data['idtransaksi']) || !isset($data['idbarang'])) {
                throw DataException::forEmptyPrimaryKey('insert');
            }
        }

        return parent::insert($data, $returnID);
    }

    private function cleanData(array $data)
    {
        $cleaned = [];
        foreach ($this->allowedFields as $field) {
            if (isset($data[$field])) {
                $cleaned[$field] = $data[$field];
            }
        }
        return $cleaned;
    }
}
