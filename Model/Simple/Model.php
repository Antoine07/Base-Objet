<?php

class Model
{
    /**
     * @var null|PDO
     */
    private $pdo = null;

    /**
     * @var null
     */
    private $table = null;

    /**
     * @var array
     */
    private $whereAnd = [];

    /**
     * @var string
     */
    private $select = '';

    /**
     * @var array
     */
    private $operators = ['=', '>', '<', '!=', '<>'];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $name
     * @param $table
     */
    public function __set($name, $table)
    {
        $method = 'set' . ucfirst(strtolower($name));

        if (!method_exists($this, $method)) throw new BadFunctionCallException(sprintf('this method doesnt exist %s', $method));

        $this->$method($table);
    }

    /**
     * @param null $table
     */
    public function setTable($table)
    {
        $this->table = (string)$table;
    }

    /**
     * @param string|array $args
     * @return $this
     */
    public function select($args = '*')
    {
        if (is_array($args)) {
            $this->select = "`" . implode('`,`', $args) . "`";

            return $this;
        } elseif ($args == '*') {
            $this->select = '*';

            return $this;
        }

        die(sprintf('method select Model invalid argument method %s', $args));
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($field, $operator, $value)
    {
        $value = is_numeric($value) ? $value : $this->pdo->quote($value);

        if (in_array($operator, $this->operators)) {
            $this->whereAnd[] = "`$field` $operator $value";

            return $this;
        }

        die(sprintf('unsupported operator %s', $operator));
    }

    public function count()
    {
        if (empty($this->table)) die('table name is null, you must set a table name');

        $where = $this->buildWhere();

        $res = $this->pdo->query(sprintf(
            'SELECT count(*) as c FROM %s WHERE %s',
            "`" . $this->table . "`",
            $where
        ));

        return $res->fetchColumn();
    }

    /**
     * @return PDOStatement
     */
    public function get()
    {
        if (empty($this->table)) die('table name is null, you must set a table name');

        $where = $this->buildWhere();
        $select = $this->select;

        $this->select = '';
        $this->whereAnd = [];

        return $this->pdo->query(sprintf(
            'SELECT %s FROM %s WHERE %s',
            $select,
            "`" . $this->table . "`",
            $where));

    }

    /**
     * @return string
     */
    private function buildWhere()
    {
        $where = ' 1=1 ';

        if (!empty($this->whereAnd))
            $where .= "AND " . implode(' AND ', $this->whereAnd);

        return $where;
    }

}