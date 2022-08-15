<?php

namespace Erykai\Migration;

use PDO;

class Resource
{
    use TraitMigration;

    /**
     * @var PDO
     */
    protected PDO $conn;
    private string $table;
    private array $columns;
    private array $types;
    protected array $null;
    private array $default;
    private string $key;

    public function __construct()
    {
        $this->conn();
    }

    /**
     * @return string
     */
    protected function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    protected function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * @return array
     */
    protected function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param string $column
     */
    protected function setColumns(string $column): void
    {
        $this->columns[] = $column;
    }

    /**
     * @return array
     */
    protected function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param string $type
     */
    protected function setTypes(string $type): void
    {
        $this->types[] = $type;
    }

    /**
     * @return array
     */
    protected function getNull(): array
    {
        return $this->null;
    }

    /**
     * @param string $null
     */
    protected function setNull(string $null): void
    {
        $this->null[] = $null;
    }

    /**
     * @return array
     */
    protected function getDefault(): array
    {
        return $this->default;
    }

    /**
     * @param bool|string $default
     */
    protected function setDefault(bool|string $default): void
    {
        $this->default[] = $default;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }
}