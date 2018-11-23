<?php

namespace Base;

use \Issue as ChildIssue;
use \IssueQuery as ChildIssueQuery;
use \Exception;
use \PDO;
use Map\IssueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'issue' table.
 *
 *
 *
 * @method     ChildIssueQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildIssueQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildIssueQuery orderByPropertyid($order = Criteria::ASC) Order by the PropertyID column
 * @method     ChildIssueQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildIssueQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     ChildIssueQuery orderByFound($order = Criteria::ASC) Order by the Found column
 * @method     ChildIssueQuery orderByRepaired($order = Criteria::ASC) Order by the Repaired column
 * @method     ChildIssueQuery orderByCost($order = Criteria::ASC) Order by the Cost column
 *
 * @method     ChildIssueQuery groupById() Group by the ID column
 * @method     ChildIssueQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildIssueQuery groupByPropertyid() Group by the PropertyID column
 * @method     ChildIssueQuery groupByName() Group by the Name column
 * @method     ChildIssueQuery groupByDescription() Group by the Description column
 * @method     ChildIssueQuery groupByFound() Group by the Found column
 * @method     ChildIssueQuery groupByRepaired() Group by the Repaired column
 * @method     ChildIssueQuery groupByCost() Group by the Cost column
 *
 * @method     ChildIssueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIssueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIssueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIssueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIssueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIssueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIssueQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildIssueQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildIssueQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildIssueQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildIssueQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildIssueQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildIssueQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     \PropertyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildIssue findOne(ConnectionInterface $con = null) Return the first ChildIssue matching the query
 * @method     ChildIssue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIssue matching the query, or a new ChildIssue object populated from the query conditions when no match is found
 *
 * @method     ChildIssue findOneById(int $ID) Return the first ChildIssue filtered by the ID column
 * @method     ChildIssue findOneByTimestamp(string $Timestamp) Return the first ChildIssue filtered by the Timestamp column
 * @method     ChildIssue findOneByPropertyid(int $PropertyID) Return the first ChildIssue filtered by the PropertyID column
 * @method     ChildIssue findOneByName(string $Name) Return the first ChildIssue filtered by the Name column
 * @method     ChildIssue findOneByDescription(string $Description) Return the first ChildIssue filtered by the Description column
 * @method     ChildIssue findOneByFound(string $Found) Return the first ChildIssue filtered by the Found column
 * @method     ChildIssue findOneByRepaired(string $Repaired) Return the first ChildIssue filtered by the Repaired column
 * @method     ChildIssue findOneByCost(int $Cost) Return the first ChildIssue filtered by the Cost column *

 * @method     ChildIssue requirePk($key, ConnectionInterface $con = null) Return the ChildIssue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOne(ConnectionInterface $con = null) Return the first ChildIssue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssue requireOneById(int $ID) Return the first ChildIssue filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByTimestamp(string $Timestamp) Return the first ChildIssue filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByPropertyid(int $PropertyID) Return the first ChildIssue filtered by the PropertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByName(string $Name) Return the first ChildIssue filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByDescription(string $Description) Return the first ChildIssue filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByFound(string $Found) Return the first ChildIssue filtered by the Found column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByRepaired(string $Repaired) Return the first ChildIssue filtered by the Repaired column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByCost(int $Cost) Return the first ChildIssue filtered by the Cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIssue objects based on current ModelCriteria
 * @method     ChildIssue[]|ObjectCollection findById(int $ID) Return ChildIssue objects filtered by the ID column
 * @method     ChildIssue[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildIssue objects filtered by the Timestamp column
 * @method     ChildIssue[]|ObjectCollection findByPropertyid(int $PropertyID) Return ChildIssue objects filtered by the PropertyID column
 * @method     ChildIssue[]|ObjectCollection findByName(string $Name) Return ChildIssue objects filtered by the Name column
 * @method     ChildIssue[]|ObjectCollection findByDescription(string $Description) Return ChildIssue objects filtered by the Description column
 * @method     ChildIssue[]|ObjectCollection findByFound(string $Found) Return ChildIssue objects filtered by the Found column
 * @method     ChildIssue[]|ObjectCollection findByRepaired(string $Repaired) Return ChildIssue objects filtered by the Repaired column
 * @method     ChildIssue[]|ObjectCollection findByCost(int $Cost) Return ChildIssue objects filtered by the Cost column
 * @method     ChildIssue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IssueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\IssueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Issue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIssueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIssueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIssueQuery) {
            return $criteria;
        }
        $query = new ChildIssueQuery();
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
     * @return ChildIssue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IssueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = IssueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildIssue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, PropertyID, Name, Description, Found, Repaired, Cost FROM issue WHERE ID = :p0';
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
            /** @var ChildIssue $obj */
            $obj = new ChildIssue();
            $obj->hydrate($row);
            IssueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildIssue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IssueTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IssueTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the PropertyID column
     *
     * Example usage:
     * <code>
     * $query->filterByPropertyid(1234); // WHERE PropertyID = 1234
     * $query->filterByPropertyid(array(12, 34)); // WHERE PropertyID IN (12, 34)
     * $query->filterByPropertyid(array('min' => 12)); // WHERE PropertyID > 12
     * </code>
     *
     * @see       filterByProperty()
     *
     * @param     mixed $propertyid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid, $comparison);
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE Description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE Description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the Found column
     *
     * Example usage:
     * <code>
     * $query->filterByFound('2011-03-14'); // WHERE Found = '2011-03-14'
     * $query->filterByFound('now'); // WHERE Found = '2011-03-14'
     * $query->filterByFound(array('max' => 'yesterday')); // WHERE Found > '2011-03-13'
     * </code>
     *
     * @param     mixed $found The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByFound($found = null, $comparison = null)
    {
        if (is_array($found)) {
            $useMinMax = false;
            if (isset($found['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_FOUND, $found['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($found['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_FOUND, $found['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_FOUND, $found, $comparison);
    }

    /**
     * Filter the query on the Repaired column
     *
     * Example usage:
     * <code>
     * $query->filterByRepaired('2011-03-14'); // WHERE Repaired = '2011-03-14'
     * $query->filterByRepaired('now'); // WHERE Repaired = '2011-03-14'
     * $query->filterByRepaired(array('max' => 'yesterday')); // WHERE Repaired > '2011-03-13'
     * </code>
     *
     * @param     mixed $repaired The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByRepaired($repaired = null, $comparison = null)
    {
        if (is_array($repaired)) {
            $useMinMax = false;
            if (isset($repaired['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_REPAIRED, $repaired['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($repaired['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_REPAIRED, $repaired['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_REPAIRED, $repaired, $comparison);
    }

    /**
     * Filter the query on the Cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE Cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE Cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE Cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildIssueQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(IssueTableMap::COL_PROPERTYID, $property->getId(), $comparison);
        } elseif ($property instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(IssueTableMap::COL_PROPERTYID, $property->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProperty() only accepts arguments of type \Property or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Property relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function joinProperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Property');

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
            $this->addJoinObject($join, 'Property');
        }

        return $this;
    }

    /**
     * Use the Property relation Property object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PropertyQuery A secondary query class using the current class as primary query
     */
    public function usePropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Property', '\PropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIssue $issue Object to remove from the list of results
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function prune($issue = null)
    {
        if ($issue) {
            $this->addUsingAlias(IssueTableMap::COL_ID, $issue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the issue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IssueTableMap::clearInstancePool();
            IssueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IssueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IssueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IssueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IssueQuery
