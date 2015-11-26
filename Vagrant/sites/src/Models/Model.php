<?php namespace Models;

class Model
{
    /**
     * @var null|PDO
     */
    private $pdo = null;

    /**
     * @var null
     */
    protected $table = null;

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

    /**
     * @var int
     */
    protected $limit = 10;

    /**
     * @var string
     */
    protected $order = 'id';

    /**
     * @var string
     */
    protected $orderDirection = 'DESC';

    /**
     * @var array
     */
    protected $fillable = [];


    public function __construct()
    {
        $this->pdo = Connect::getDB();

        if (empty($this->pdo)) die('no database connection...');

        if (empty($this->table)) die('table name is null, you must set a table name into Entity model...');
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
        } else {
            die(sprintf('method select Model invalid argument method %s', $args));
        }
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($field, $operator, $value)
    {
        $value = is_numeric($value) ? (int)$value : $this->pdo->quote($value);

        if (in_array($operator, $this->operators)) {
            $this->whereAnd[] = "`$field` $operator $value";

            return $this;
        }

        die(sprintf('unsupported operator %s', $operator));
    }

    public function count()
    {

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
        $where = $this->buildWhere(); // factoring
        $select = $this->select;

        $this->select = '';
        $this->whereAnd = [];

        $sql = sprintf(
            'SELECT %s FROM %s WHERE %s ORDER By %s %s LIMIT 0, %s',
            $select,
            "`" . $this->table . "`",
            $where,
            $this->order,
            $this->orderDirection,
            $this->limit
        );

        return $this->pdo->query($sql);

    }

    /**
     * refactoring
     *
     * @return string
     */
    private function buildWhere()
    {
        $where = ' 1=1 ';

        if (!empty($this->whereAnd))
            $where .= "AND " . implode(' AND ', $this->whereAnd);

        return $where;
    }

    /**
     * assignation mass fillable security
     *
     * @param $data
     */
    public function create($data)
    {
        $fields = [];
        $values = [];

        while ($current = current($data)) {
            $values[] = (is_numeric($current)) ? (int)$current : $this->pdo->quote($current);
            $key = key($data);

            if (!in_array($key, $this->fillable)) return;

            $fields[] = $key;
            next($data);
        }

        $fields = "(`" . implode('`, `', $fields) . "`)";
        $values = "(" . implode(',', $values) . ")";

        $sql = sprintf("INSERT INTO %s %s VALUES %s",
            $this->table,
            $fields,
            $values
        );

        $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @param $data
     * @return PDOStatement|void
     */
    public function update($id, $data)
    {
        $sets = [];

        while ($current = current($data)) {
            $value = (is_numeric($current)) ? (int)$current : $this->pdo->quote($current);
            $key = key($data);

            if (!in_array($key, $this->fillable)) return;

            $sets[] = "`" . $key . "`=$value";
            next($data);
        }

        $sets = implode(', ', $sets);

        $sql = sprintf("UPDATE %s SET %s WHERE id=%d",
            $this->table,
            $sets,
            (int)$id
        );

        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @return PDOStatement
     */
    public function destroy($id)
    {
        $sql = sprintf("DELETE FROM %s WHERE id=%s",
            $this->table,
            (int)$id
        );

        return $this->pdo->query($sql);
    }

    /**
     * @param string $args
     * @return array
     */
    public function all($args = '*')
    {
        $stmt = $this->select($args)->get();

        return $stmt->fetchAll();
    }

    /**
     * @param $id
     * @param string $args
     * @return mixed
     */
    public function find($id, $args = '*')
    {
        $stmt = $this->select($args)->where('id', '=', $id)->get();

        return $stmt->fetch();
    }

    public function belongsTo($entity)
    {
        $className = get_class($this);

        if (class_exists($entity)) {
            $reflection = new $entity;

            $tableJoin = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);
        }
    }

}