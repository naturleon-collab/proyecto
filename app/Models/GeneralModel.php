<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneralModel extends Model
{
    public function selectData(string $columnselect, string $fromtable, array $arrWhere, array $arrCond, array $arrJoin = [], array $arrCondJoin = [], array $arrOrder = [], array $arrTypeJoin = [])
    {
        $builder = $this->db->table($fromtable);
        $builder->select($columnselect);
        
        // JOIN DINAMICOS MEJORADOS
        if (!empty($arrJoin) && !empty($arrCondJoin)) {
            for ($i = 0; $i < count($arrJoin); $i++) {
                // Si existe un tipo definido para este join, lo usamos; si no, por defecto es 'inner'
                $type = isset($arrTypeJoin[$i]) ? $arrTypeJoin[$i] : 'inner';
                $builder->join($arrJoin[$i], $arrCondJoin[$i], $type);
            }
        }

        // ... (el resto de tu código de WHERES y ORDER BY se queda igual)
        
        // WHERES DINAMICOS
        if (!empty($arrWhere) && !empty($arrCond)) {
            for ($i = 0; $i < count($arrWhere); $i++) {
                $builder->where($arrWhere[$i], $arrCond[$i]);
            }
        }

        if (!empty($arrOrder)) {
            foreach ($arrOrder as $campo => $direccion) {
                $dir = strtoupper($direccion) === 'DESC' ? 'DESC' : 'ASC';
                $builder->orderBy($campo, $dir);
            }
        }

        $query = $builder->get();
        return ($query->getNumRows() > 0) ? $query->getResultArray() : false;
    }

    public function selectDataWithOptions(array $options)
    {
        if (empty($options[0]) || empty($options[1])) {
            return false; // Asegura que al menos haya SELECT y FROM
        }

        $builder = $this->db->table($options[1]);
        $builder->select($options[0]);

        // WHERES DINAMICOS [2: arrWhere, 3: arrCond]
        if (!empty($options[2]) && !empty($options[3]) && count($options[2]) === count($options[3])) {
            for ($i = 0; $i < count($options[2]); $i++) {
                $builder->where($options[2][$i], $options[3][$i]);
            }
        }

        // JOINS DINAMICOS [4: arrJoin, 5: arrCondJoin]
        if (!empty($options[4]) && !empty($options[5]) && count($options[4]) === count($options[5])) {
            for ($i = 0; $i < count($options[4]); $i++) {
                $builder->join($options[4][$i], $options[5][$i]);
            }
        }

        // GROUP BY [6]
        if (!empty($options[6])) {
            $builder->groupBy($options[6]);
        }

        // ORDER BY [7]
        if (!empty($options[7])) {
            $builder->orderBy($options[7]);
        }

        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // getResultArray() para devolver un array de arrays; getResult() para objetos
            return $query->getResultArray();
        }
        
        return false;
    }

    public function insertData(array $data, string $table): bool
    {
        return $this->db->table($table)->insert($data);
    }
    
    public function insertDataReturn(array $data, string $table)
    {
        if ($this->db->table($table)->insert($data)) {
            // Obtiene el ID insertado
            return $this->db->insertID(); 
        }
        return false;
    }

    public function updateData(array $data, string $table, array $arrWhere, array $arrCond): bool
    {
        $builder = $this->db->table($table);
        for ($i = 0; $i < count($arrWhere); $i++) {
            $builder->where($arrWhere[$i], $arrCond[$i]);
        }
        return $builder->update($data);
    }
    
    public function deleteData(string $table, array $arrWhere, array $arrCond): bool
    {
        $builder = $this->db->table($table);
        for ($i = 0; $i < count($arrWhere); $i++) {
            $builder->where($arrWhere[$i], $arrCond[$i]);
        }
        return $builder->delete();
    }
}