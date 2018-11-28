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
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'utility' table.
 *
 *
 *
 * @method     ChildUtilityQuery orderByUtilitynumberid($order = Criteria::ASC) Order by the utilityNumberID column
 * @method     ChildUtilityQuery orderByPropertyid($order = Criteria::ASC) Order by the propertyID column
 * @method     ChildUtilityQuery orderByUtilitytypeid($order = Criteria::ASC) Order by the utilityTypeID column
 * @method     ChildUtilityQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     ChildUtilityQuery orderByAvailable($order = Criteria::ASC) Order by the available column
 * @method     ChildUtilityQuery orderByIncludedinrent($order = Criteria::ASC) Order by the includedInRent column
 * @method     ChildUtilityQuery orderByExpectedcostpermonth($order = Criteria::ASC) Order by the expectedCostPerMonth column
 *
 * @method     ChildUtilityQuery groupByUtilitynumberid() Group by the utilityNumberID column
 * @method     ChildUtilityQuery groupByPropertyid() Group by the propertyID column
 * @method     ChildUtilityQuery groupByUtilitytypeid() Group by the utilityTypeID column
 * @method     ChildUtilityQuery groupByDetails() Group by the details column
 * @method     ChildUtilityQuery groupByAvailable() Group by the available column
 * @method     ChildUtilityQuery groupByIncludedinrent() Group by the includedInRent column
 * @method     ChildUtilityQuery groupByExpectedcostpermonth() Group by the expectedCostPerMonth column
 *
 * @method     ChildUtilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUtilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUtilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUtilityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUtilityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUtilityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUtility findOne(ConnectionInterface $con = null) Return the first ChildUtility matching the query
 * @method     ChildUtility findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUtility matching the query, or a new ChildUtility object populated from the query conditions when no match is found
 *
 * @method     ChildUtility findOneByUtilitynumberid(int $utilityNumberID) Return the first ChildUtility filtered by the utilityNumberID column
 * @method     ChildUtility findOneByPropertyid(int $propertyID) Return the first ChildUtility filtered by the propertyID column
 * @method     ChildUtility findOneByUtilitytypeid(int $utilityTypeID) Return the first ChildUtility filtered by the utilityTypeID column
 * @method     ChildUtility findOneByDetails(string $details) Return the first ChildUtility filtered by the details column
 * @method     ChildUtility findOneByAvailable(boolean $available) Return the first ChildUtility filtered by the available column
 * @method     ChildUtility findOneByIncludedinrent(boolean $includedInRent) Return the first ChildUtility filtered by the includedInRent column
 * @method     ChildUtility findOneByExpectedcostpermonth(double $expectedCostPerMonth) Return the first ChildUtility filtered by the expectedCostPerMonth column *

 * @method     ChildUtility requirePk($key, ConnectionInterface $con = null) Return the ChildUtility by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOne(ConnectionInterface $con = null) Return the first ChildUtility matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtility requireOneByUtilitynumberid(int $utilityNumberID) Return the first ChildUtility filtered by the utilityNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByPropertyid(int $propertyID) Return the first ChildUtility filtered by the propertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByUtilitytypeid(int $utilityTypeID) Return the first ChildUtility filtered by the utilityTypeID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByDetails(string $details) Return the first ChildUtility filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByAvailable(boolean $available) Return the first ChildUtility filtered by the available column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByIncludedinrent(boolean $includedInRent) Return the first ChildUtility filtered by the includedInRent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtility requireOneByExpectedcostpermonth(double $expectedCostPerMonth) Return the first ChildUtility filtered by the expectedCostPerMonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtility[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUtility objects based on current ModelCriteria
 * @method     ChildUtility[]|ObjectCollection findByUtilitynumberid(int $utilityNumberID) Return ChildUtility objects filtered by the utilityNumberID column
 * @method     ChildUtility[]|ObjectCollection findByPropertyid(int $propertyID) Return ChildUtility objects filtered by the propertyID column
 * @method     ChildUtility[]|ObjectCollection findByUtilitytypeid(int $utilityTypeID) Return ChildUtility objects filtered by the utilityTypeID column
 * @method     ChildUtility[]|ObjectCollection findByDetails(string $details) Return ChildUtility objects filtered by the details column
 * @method     ChildUtility[]|ObjectCollection findByAvailable(boolean $available) Return ChildUtility objects filtered by the available column
 * @method     ChildUtility[]|ObjectCollection findByIncludedinrent(boolean $includedInRent) Return ChildUtility objects filtered by the includedInRent column
 * @method     ChildUtility[]|ObjectCollection findByExpectedcostpermonth(double $expectedCostPerMonth) Return ChildUtility objects filtered by the expectedCostPerMonth column
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
        $sql = 'SELECT utilityNumberID, propertyID, utilityTypeID, details, available, includedInRent, expectedCostPerMonth FROM utility WHERE utilityNumberID = :p0';
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

        return $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $key, Criteria::EQUAL);
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

        return $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the utilityNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByUtilitynumberid(1234); // WHERE utilityNumberID = 1234
     * $query->filterByUtilitynumberid(array(12, 34)); // WHERE utilityNumberID IN (12, 34)
     * $query->filterByUtilitynumberid(array('min' => 12)); // WHERE utilityNumberID > 12
     * </code>
     *
     * @param     mixed $utilitynumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByUtilitynumberid($utilitynumberid = null, $comparison = null)
    {
        if (is_array($utilitynumberid)) {
            $useMinMax = false;
            if (isset($utilitynumberid['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $utilitynumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($utilitynumberid['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $utilitynumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $utilitynumberid, $comparison);
    }

    /**
     * Filter the query on the propertyID column
     *
     * Example usage:
     * <code>
     * $query->filterByPropertyid(1234); // WHERE propertyID = 1234
     * $query->filterByPropertyid(array(12, 34)); // WHERE propertyID IN (12, 34)
     * $query->filterByPropertyid(array('min' => 12)); // WHERE propertyID > 12
     * </code>
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
     * Filter the query on the utilityTypeID column
     *
     * Example usage:
     * <code>
     * $query->filterByUtilitytypeid(1234); // WHERE utilityTypeID = 1234
     * $query->filterByUtilitytypeid(array(12, 34)); // WHERE utilityTypeID IN (12, 34)
     * $query->filterByUtilitytypeid(array('min' => 12)); // WHERE utilityTypeID > 12
     * </code>
     *
     * @param     mixed $utilitytypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByUtilitytypeid($utilitytypeid = null, $comparison = null)
    {
        if (is_array($utilitytypeid)) {
            $useMinMax = false;
            if (isset($utilitytypeid['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_UTILITYTYPEID, $utilitytypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($utilitytypeid['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_UTILITYTYPEID, $utilitytypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_UTILITYTYPEID, $utilitytypeid, $comparison);
    }

    /**
     * Filter the query on the details column
     *
     * Example usage:
     * <code>
     * $query->filterByDetails('fooValue');   // WHERE details = 'fooValue'
     * $query->filterByDetails('%fooValue%', Criteria::LIKE); // WHERE details LIKE '%fooValue%'
     * </code>
     *
     * @param     string $details The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Filter the query on the available column
     *
     * Example usage:
     * <code>
     * $query->filterByAvailable(true); // WHERE available = true
     * $query->filterByAvailable('yes'); // WHERE available = true
     * </code>
     *
     * @param     boolean|string $available The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByAvailable($available = null, $comparison = null)
    {
        if (is_string($available)) {
            $available = in_array(strtolower($available), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UtilityTableMap::COL_AVAILABLE, $available, $comparison);
    }

    /**
     * Filter the query on the includedInRent column
     *
     * Example usage:
     * <code>
     * $query->filterByIncludedinrent(true); // WHERE includedInRent = true
     * $query->filterByIncludedinrent('yes'); // WHERE includedInRent = true
     * </code>
     *
     * @param     boolean|string $includedinrent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByIncludedinrent($includedinrent = null, $comparison = null)
    {
        if (is_string($includedinrent)) {
            $includedinrent = in_array(strtolower($includedinrent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UtilityTableMap::COL_INCLUDEDINRENT, $includedinrent, $comparison);
    }

    /**
     * Filter the query on the expectedCostPerMonth column
     *
     * Example usage:
     * <code>
     * $query->filterByExpectedcostpermonth(1234); // WHERE expectedCostPerMonth = 1234
     * $query->filterByExpectedcostpermonth(array(12, 34)); // WHERE expectedCostPerMonth IN (12, 34)
     * $query->filterByExpectedcostpermonth(array('min' => 12)); // WHERE expectedCostPerMonth > 12
     * </code>
     *
     * @param     mixed $expectedcostpermonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilityQuery The current query, for fluid interface
     */
    public function filterByExpectedcostpermonth($expectedcostpermonth = null, $comparison = null)
    {
        if (is_array($expectedcostpermonth)) {
            $useMinMax = false;
            if (isset($expectedcostpermonth['min'])) {
                $this->addUsingAlias(UtilityTableMap::COL_EXPECTEDCOSTPERMONTH, $expectedcostpermonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expectedcostpermonth['max'])) {
                $this->addUsingAlias(UtilityTableMap::COL_EXPECTEDCOSTPERMONTH, $expectedcostpermonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilityTableMap::COL_EXPECTEDCOSTPERMONTH, $expectedcostpermonth, $comparison);
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
            $this->addUsingAlias(UtilityTableMap::COL_UTILITYNUMBERID, $utility->getUtilitynumberid(), Criteria::NOT_EQUAL);
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
