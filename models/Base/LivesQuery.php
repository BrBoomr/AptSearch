<?php

namespace Base;

use \Lives as ChildLives;
use \LivesQuery as ChildLivesQuery;
use \Exception;
use \PDO;
use Map\LivesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'lives' table.
 *
 *
 *
 * @method     ChildLivesQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildLivesQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildLivesQuery orderByUserid($order = Criteria::ASC) Order by the UserID column
 * @method     ChildLivesQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildLivesQuery orderByTenantrelation($order = Criteria::ASC) Order by the TenantRelation column
 * @method     ChildLivesQuery orderByStart($order = Criteria::ASC) Order by the Start column
 * @method     ChildLivesQuery orderByEnd($order = Criteria::ASC) Order by the End column
 * @method     ChildLivesQuery orderByActualend($order = Criteria::ASC) Order by the ActualEnd column
 *
 * @method     ChildLivesQuery groupById() Group by the ID column
 * @method     ChildLivesQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildLivesQuery groupByUserid() Group by the UserID column
 * @method     ChildLivesQuery groupByName() Group by the Name column
 * @method     ChildLivesQuery groupByTenantrelation() Group by the TenantRelation column
 * @method     ChildLivesQuery groupByStart() Group by the Start column
 * @method     ChildLivesQuery groupByEnd() Group by the End column
 * @method     ChildLivesQuery groupByActualend() Group by the ActualEnd column
 *
 * @method     ChildLivesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLivesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLivesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLivesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLivesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLivesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLivesQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildLivesQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildLivesQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildLivesQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildLivesQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildLivesQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildLivesQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLives findOne(ConnectionInterface $con = null) Return the first ChildLives matching the query
 * @method     ChildLives findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLives matching the query, or a new ChildLives object populated from the query conditions when no match is found
 *
 * @method     ChildLives findOneById(int $ID) Return the first ChildLives filtered by the ID column
 * @method     ChildLives findOneByTimestamp(string $Timestamp) Return the first ChildLives filtered by the Timestamp column
 * @method     ChildLives findOneByUserid(int $UserID) Return the first ChildLives filtered by the UserID column
 * @method     ChildLives findOneByName(string $Name) Return the first ChildLives filtered by the Name column
 * @method     ChildLives findOneByTenantrelation(string $TenantRelation) Return the first ChildLives filtered by the TenantRelation column
 * @method     ChildLives findOneByStart(string $Start) Return the first ChildLives filtered by the Start column
 * @method     ChildLives findOneByEnd(string $End) Return the first ChildLives filtered by the End column
 * @method     ChildLives findOneByActualend(string $ActualEnd) Return the first ChildLives filtered by the ActualEnd column *

 * @method     ChildLives requirePk($key, ConnectionInterface $con = null) Return the ChildLives by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOne(ConnectionInterface $con = null) Return the first ChildLives matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLives requireOneById(int $ID) Return the first ChildLives filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByTimestamp(string $Timestamp) Return the first ChildLives filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByUserid(int $UserID) Return the first ChildLives filtered by the UserID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByName(string $Name) Return the first ChildLives filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByTenantrelation(string $TenantRelation) Return the first ChildLives filtered by the TenantRelation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByStart(string $Start) Return the first ChildLives filtered by the Start column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByEnd(string $End) Return the first ChildLives filtered by the End column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLives requireOneByActualend(string $ActualEnd) Return the first ChildLives filtered by the ActualEnd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLives[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLives objects based on current ModelCriteria
 * @method     ChildLives[]|ObjectCollection findById(int $ID) Return ChildLives objects filtered by the ID column
 * @method     ChildLives[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildLives objects filtered by the Timestamp column
 * @method     ChildLives[]|ObjectCollection findByUserid(int $UserID) Return ChildLives objects filtered by the UserID column
 * @method     ChildLives[]|ObjectCollection findByName(string $Name) Return ChildLives objects filtered by the Name column
 * @method     ChildLives[]|ObjectCollection findByTenantrelation(string $TenantRelation) Return ChildLives objects filtered by the TenantRelation column
 * @method     ChildLives[]|ObjectCollection findByStart(string $Start) Return ChildLives objects filtered by the Start column
 * @method     ChildLives[]|ObjectCollection findByEnd(string $End) Return ChildLives objects filtered by the End column
 * @method     ChildLives[]|ObjectCollection findByActualend(string $ActualEnd) Return ChildLives objects filtered by the ActualEnd column
 * @method     ChildLives[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LivesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LivesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Lives', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLivesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLivesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLivesQuery) {
            return $criteria;
        }
        $query = new ChildLivesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLives|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LivesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LivesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLives A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, UserID, Name, TenantRelation, Start, End, ActualEnd FROM lives WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLives $obj */
            $obj = new ChildLives();
            $obj->hydrate($row);
            LivesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLives|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LivesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LivesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp('2011-03-14'); // WHERE Timestamp = '2011-03-14'
     * $query->filterByTimestamp('now'); // WHERE Timestamp = '2011-03-14'
     * $query->filterByTimestamp(array('max' => 'yesterday')); // WHERE Timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the UserID column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE UserID = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE UserID IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE UserID > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE Name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the TenantRelation column
     *
     * Example usage:
     * <code>
     * $query->filterByTenantrelation('fooValue');   // WHERE TenantRelation = 'fooValue'
     * $query->filterByTenantrelation('%fooValue%', Criteria::LIKE); // WHERE TenantRelation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tenantrelation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByTenantrelation($tenantrelation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tenantrelation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_TENANTRELATION, $tenantrelation, $comparison);
    }

    /**
     * Filter the query on the Start column
     *
     * Example usage:
     * <code>
     * $query->filterByStart('2011-03-14'); // WHERE Start = '2011-03-14'
     * $query->filterByStart('now'); // WHERE Start = '2011-03-14'
     * $query->filterByStart(array('max' => 'yesterday')); // WHERE Start > '2011-03-13'
     * </code>
     *
     * @param     mixed $start The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByStart($start = null, $comparison = null)
    {
        if (is_array($start)) {
            $useMinMax = false;
            if (isset($start['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_START, $start['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($start['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_START, $start['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_START, $start, $comparison);
    }

    /**
     * Filter the query on the End column
     *
     * Example usage:
     * <code>
     * $query->filterByEnd('2011-03-14'); // WHERE End = '2011-03-14'
     * $query->filterByEnd('now'); // WHERE End = '2011-03-14'
     * $query->filterByEnd(array('max' => 'yesterday')); // WHERE End > '2011-03-13'
     * </code>
     *
     * @param     mixed $end The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByEnd($end = null, $comparison = null)
    {
        if (is_array($end)) {
            $useMinMax = false;
            if (isset($end['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_END, $end['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($end['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_END, $end['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_END, $end, $comparison);
    }

    /**
     * Filter the query on the ActualEnd column
     *
     * Example usage:
     * <code>
     * $query->filterByActualend('2011-03-14'); // WHERE ActualEnd = '2011-03-14'
     * $query->filterByActualend('now'); // WHERE ActualEnd = '2011-03-14'
     * $query->filterByActualend(array('max' => 'yesterday')); // WHERE ActualEnd > '2011-03-13'
     * </code>
     *
     * @param     mixed $actualend The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function filterByActualend($actualend = null, $comparison = null)
    {
        if (is_array($actualend)) {
            $useMinMax = false;
            if (isset($actualend['min'])) {
                $this->addUsingAlias(LivesTableMap::COL_ACTUALEND, $actualend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actualend['max'])) {
                $this->addUsingAlias(LivesTableMap::COL_ACTUALEND, $actualend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivesTableMap::COL_ACTUALEND, $actualend, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLivesQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(LivesTableMap::COL_USERID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LivesTableMap::COL_USERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLives $lives Object to remove from the list of results
     *
     * @return $this|ChildLivesQuery The current query, for fluid interface
     */
    public function prune($lives = null)
    {
        if ($lives) {
            $this->addUsingAlias(LivesTableMap::COL_ID, $lives->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the lives table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LivesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LivesTableMap::clearInstancePool();
            LivesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LivesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LivesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LivesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LivesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LivesQuery
