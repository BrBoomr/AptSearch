<?php

namespace Base;

use \Utility as ChildUtility;
use \UtilityQuery as ChildUtilityQuery;
use \Exception;
use \PDO;
use Map\UtilityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'utility' table.
 *
 *
 *
 * @method     ChildUtilityQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildUtilityQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildUtilityQuery orderByPropertyid($order = Criteria::ASC) Order by the PropertyID column
 * @method     ChildUtilityQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildUtilityQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     ChildUtilityQuery orderByIncluded($order = Criteria::ASC) Order by the Included column
 * @method     ChildUtilityQuery orderByCost($order = Criteria::ASC) Order by the Cost column
 *
 * @method     ChildUtilityQuery groupById() Group by the ID column
 * @method     ChildUtilityQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildUtilityQuery groupByPropertyid() Group by the PropertyID column
 * @method     ChildUtilityQuery groupByName() Group by the Name column
 * @method     ChildUtilityQuery groupByDescription() Group by the Description column
 * @method     ChildUtilityQuery groupByIncluded() Group by the Included column
 * @method     ChildUtilityQuery groupByCost() Group by the Cost column
 *
 * @method     ChildUtilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUtilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUtilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUtilityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUtilityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUtilityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUtilityQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildUtilityQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildUtilityQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildUtilityQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildUtilityQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildUtilityQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildUtilityQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     \PropertyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUtility findOne(ConnectionInterface $con = null) Return the first ChildUtility matching the query
 * @method     ChildUtility findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUtility matching the query, or a new ChildUtility object populated from the query conditions when no match is found
 *
 * @method     ChildUtility findOneById(int $ID) Return the first ChildUtility filtered by the ID column
 * @method     ChildUtility findOneByTimestamp(string $Timestamp) Return the first ChildUtility filtered by the Timestamp column
 * @method     ChildUtility findOneByPropertyid(int $PropertyID) Return the first ChildUtility filtered by the PropertyID column
 * @method     ChildUtility findOneByName(string $Name) Return the first ChildUtility filtered by the Name column
 * @method     ChildUtility findOneByDescription(string $Description) Return the first ChildUtility filtered by the Description column
 * @method     ChildUtility findOneByIncluded(boolean $Included) Return the first ChildUtility filtered by the Included column
 * @method     ChildUtility findOneByCost(int $Cost) Return the first ChildUtility filtered by the Cost column *

 * @method     ChildUtility requirePk($key, ConnectionInterface $con = null) Return the ChildUtility by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOne(ConnectionInterface $con = null) Return the first ChildUtility matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtility requireOneById(int $ID) Return the first ChildUtility filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByTimestamp(string $Timestamp) Return the first ChildUtility filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByPropertyid(int $PropertyID) Return the first ChildUtility filtered by the PropertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByName(string $Name) Return the first ChildUtility filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByDescription(string $Description) Return the first ChildUtility filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByIncluded(boolean $Included) Return the first ChildUtility filtered by the Included column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByCost(int $Cost) Return the first ChildUtility filtered by the Cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtility[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUtility objects based on current ModelCriteria
 * @method     ChildUtility[]|ObjectCollection findById(int $ID) Return ChildUtility objects filtered by the ID column
 * @method     ChildUtility[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildUtility objects filtered by the Timestamp column
 * @method     ChildUtility[]|ObjectCollection findByPropertyid(int $PropertyID) Return ChildUtility objects filtered by the PropertyID column
 * @method     ChildUtility[]|ObjectCollection findByName(string $Name) Return ChildUtility objects filtered by the Name column
 * @method     ChildUtility[]|ObjectCollection findByDescription(string $Description) Return ChildUtility objects filtered by the Description column
 * @method     ChildUtility[]|ObjectCollection findByIncluded(boolean $Included) Return ChildUtility objects filtered by the Included column
 * @method     ChildUtility[]|ObjectCollection findByCost(int $Cost) Return ChildUtility objects filtered by the Cost column
 * @method     ChildUtility[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UtilityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UtilityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Utility', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUtilityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUtilityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUtilityQuery) {
            return $criteria;
        }
        $query = new ChildUtilityQuery();
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
     * @return ChildUtility|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UtilityTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UtilityTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUtility A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, PropertyID, Name, Description, Included, Cost FROM utility WHERE ID = :p0';
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
            /** @var ChildUtility $obj */
            $obj = new ChildUtility();
            $obj->hydrate($row);
            UtilityTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUtility|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UtilityTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UtilityTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_TIMESTAMP, $timestamp, $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_PROPERTYID, $propertyid, $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the Included column
     *
     * Example usage:
     * <code>
     * $query->filterByIncluded(true); // WHERE Included = true
     * $query->filterByIncluded('yes'); // WHERE Included = true
     * </code>
     *
     * @param     boolean|string $included The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByIncluded($included = null, $comparison = null)
    {
        if (is_string($included)) {
            $included = in_array(strtolower($included), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UtilityTableMap::COL_INCLUDED, $included, $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(UtilityTableMap::COL_PROPERTYID, $property->getId(), $comparison);
        } elseif ($property instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UtilityTableMap::COL_PROPERTYID, $property->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildUtilityQuery The current query, for fluid interface
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
     * @param   ChildUtility $utility Object to remove from the list of results
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function prune($utility = null)
    {
        if ($utility) {
            $this->addUsingAlias(UtilityTableMap::COL_ID, $utility->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the utility table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtilityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UtilityTableMap::clearInstancePool();
            UtilityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UtilityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UtilityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UtilityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UtilityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UtilityQuery
