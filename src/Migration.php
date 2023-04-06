<?php

namespace Erykai\Migration;

class Migration extends Resource
{
    public function table(string $name): void
    {
        $this->setTable($name);
    }

    public function column(string $name): static
    {
        $this->setNull(" NOT NULL");
        $this->setColumns($name);
        return $this;
    }

    public function type(string $name): static
    {
        $this->setTypes($name);
        return $this;
    }

    public function null(): static
    {
        $key = count($this->null) - 1;
        $this->null[$key] = "";
        return $this;
    }

    public function default(bool|string $default = false): static
    {
        $this->setDefault($default);
        return $this;
    }

    public function primary(string $nameColumn)
    {
        $query = "ALTER TABLE `{$this->getTable()}` ADD PRIMARY KEY (`$nameColumn`)";
        $this->conn->query($query);
    }

    public function autoIncrement(string $nameColumn)
    {
        $query = "ALTER TABLE `{$this->getTable()}` MODIFY `$nameColumn` int(11) NOT NULL AUTO_INCREMENT;";
        $this->conn->query($query);
        $this->conn->query("COMMIT;");
    }

    public function addKey(string $nameKey, string $nameColumn, string $tableReference, string $idTableReference)
    {
        $this->setKey($nameKey);
        $this->conn->query("ALTER TABLE `{$this->getTable()}` ADD KEY `{$this->getKey()}` (`$nameColumn`);");
        $this->conn->query("ALTER TABLE `{$this->getTable()}` ADD CONSTRAINT `{$this->getKey()}` FOREIGN KEY (`$nameColumn`) REFERENCES `$tableReference` (`$idTableReference`) ON DELETE CASCADE ON UPDATE CASCADE;");
    }


    public function save(): void
    {
        $query = "(";
        $default = null;
        foreach ($this->getColumns() as $key => $column) {
            if ($this->getDefault()[$key]) {
                $default = ' DEFAULT ' . $this->getDefault()[$key];
            }
            $query .= "`$column` {$this->getTypes()[$key]}$default{$this->getNull()[$key]},";
        }
        $query = rtrim($query, ",");
        $query .= ") ";
        $query .= "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $data = "CREATE TABLE {$this->getTable()} $query";
        $this->conn->query($data);
    }
}