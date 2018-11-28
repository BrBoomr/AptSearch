<?php

namespace Base;

use \Appliance as ChildAppliance;
use \ApplianceQuery as ChildApplianceQuery;
use \Exception;
use \PDO;
use Map\ApplianceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'appliance' table.
 *
 *
 *
 * @method     ChildApplianceQuery orderByAppliancenumberid($order = Criteria::ASC) Order by the applianceNumberID column
 * @method     ChildApplianceQuery orderByPropertyid($order = Criteria::ASC) Order by the propertyID column
 * @method     ChildApplianceQuery orderByAppliancetypeid($order = Criteria::ASC) Order by the applianceTypeID column
 * @method     ChildApplianceQuery orderByDetails($order = Criteria::ASC) Order by the details column
 *
 * @method     ChildApplianceQuery groupByAppliancenumberid() Group by the applianceNumberID column
 * @method     ChildApplianceQuery groupByPropertyid() Group by the propertyID column
 * @method     ChildApplianceQuery groupByAppliancetypeid() Group by the applianceTypeID column
 * @method     ChildApplianceQuery groupByDetails() Group by the details column
 *
 * @method     ChildApplianceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildApplianceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildApplianceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildApplianceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildApplianceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildApplianceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAppliance findOne(ConnectionInterface $con = null) Return the first ChildAppliance matching the query
 * @method     ChildAppliance findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAppliance matching the query, or a new ChildAppliance object populated from the query conditions when no match is found
 *
 * @method     ChildAppliance findOneByAppliancenumberid(int $applianceNumberID) Return the first ChildAppliance filtered by the applianceNumberID column
 * @method     ChildAppliance findOneByPropertyid(int $propertyID) Return the first ChildAppliance filtered by the propertyID column
 * @method     ChildAppliance findOneByAppliancetypeid(int $applianceTypeID) Return the first ChildAppliance filtered by the applianceTypeID column
 * @method     ChildAppliance findOneByDetails(string $details) Return the first ChildAppliance filtered by the details column *

 * @method     ChildAppliance requirePk($key, ConnectionInterface $con = null) Return the ChildAppliance by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOne(ConnectionInterface $con = null) Return the first ChildAppliance matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppliance requireOneByAppliancenumberid(int $applianceNumberID) Return the first ChildAppliance filtered by the applianceNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByPropertyid(int $propertyID) Return the first ChildAppliance filtered by the propertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByAppliancetypeid(int $applianceTypeID) Return the first ChildAppliance filtered by the applianceTypeID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByDetails(string $details) Return the first ChildAppliance filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppliance[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAppliance objects based on current ModelCriteria
 * @method     ChildAppliance[]|ObjectCollection findByAppliancenumberid(int $applianceNumberID) Return ChildAppliance objects filtered by the applianceNumberID column
 * @method     ChildAppliance[]|ObjectCollection findByPropertyid(int $propertyID) Return ChildAppliance objects filtered by the propertyID column
 * @method     ChildAppliance[]|ObjectCollection findByAppliancetypeid(int $applianceTypeID) Return ChildAppliance objects filtered by the applianceTypeID column
 * @method     ChildAppliance[]|ObjectCollection findByDetails(string $details) Return ChildAppliance objects filtered by the details column
 * @method     ChildAppliance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ApplianceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ApplianceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Appliance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildApplianceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildApplianceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildApplianceQuery) {
            return $criteria;
        }
        $query = new ChildApplianceQuery();
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
     * @return ChildAppliance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ApplianceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ApplianceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAppliance A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT applianceNumberID, propertyID, applianceTypeID, details FROM appliance WHERE applianceNumberID = :p0';
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
            /** @var ChildAppliance $obj */
            $obj = new ChildAppliance();
            $obj->hydrate($row);
            ApplianceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAppliance|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the applianceNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByAppliancenumberid(1234); // WHERE applianceNumberID = 1234
     * $query->filterByAppliancenumberid(array(12, 34)); // WHERE applianceNumberID IN (12, 34)
     * $query->filterByAppliancenumberid(array('min' => 12)); // WHERE applianceNumberID > 12
     * </code>
     *
     * @param     mixed $appliancenumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByAppliancenumberid($appliancenumberid = null, $comparison = null)
    {
        if (is_array($appliancenumberid)) {
            $useMinMax = false;
            if (isset($appliancenumberid['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $appliancenumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($appliancenumberid['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $appliancenumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $appliancenumberid, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid, $comparison);
    }

    /**
     * Filter the query on the applianceTypeID column
     *
     * Example usage:
     * <code>
     * $query->filterByAppliancetypeid(1234); // WHERE applianceTypeID = 1234
     * $query->filterByAppliancetypeid(array(12, 34)); // WHERE applianceTypeID IN (12, 34)
     * $query->filterByAppliancetypeid(array('min' => 12)); // WHERE applianceTypeID > 12
     * </code>
     *
     * @param     mixed $appliancetypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByAppliancetypeid($appliancetypeid = null, $comparison = null)
    {
        if (is_array($appliancetypeid)) {
            $useMinMax = false;
            if (isset($appliancetypeid['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCETYPEID, $appliancetypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($appliancetypeid['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCETYPEID, $appliancetypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCETYPEID, $appliancetypeid, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAppliance $appliance Object to remove from the list of results
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function prune($appliance = null)
    {
        if ($appliance) {
            $this->addUsingAlias(ApplianceTableMap::COL_APPLIANCENUMBERID, $appliance->getAppliancenumberid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the appliance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApplianceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ApplianceTableMap::clearInstancePool();
            ApplianceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ApplianceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ApplianceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ApplianceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ApplianceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ApplianceQuery
