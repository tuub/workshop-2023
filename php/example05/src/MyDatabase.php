<?php
namespace Library;

use Exception;
use Medoo\Medoo;

class MyDatabase
{
    private $db;

    public function __construct(string $type, string $host, string $name, array $credentials)
    {
        try {
            $this->db = new Medoo([
                'type' => $type,
                'database' => $name,
                'host' => $host,
                'username' => $credentials['username'] ?? '',
                'password' => $credentials['password'] ?? '',
            ]);
        } catch (Exception $exception) {
            print $exception;
        }
    }

    public function getInfo()
    {
        var_dump($this->db);
    }

    public function select(string $table, array $values, array $join, array $conditions): array
    {
        try {
            return $this->db->select($table, $values);
        } catch (Exception $exception) {
            print $exception;
            return [];
        }
    }

    public function insert(string $table, array $values): void
    {
        try {
            $this->db->insert($table, $values);
        } catch (Exception $exception) {
            print $exception;
        }
    }

    public function reset(string $table, array $where): void
    {
        $this->db->delete($table, $where);
    }

    public function sum(string $table, string $column): int
    {
        return intval($this->db->sum($table, $column));
    }
}