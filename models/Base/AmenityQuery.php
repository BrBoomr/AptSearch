<?php

namespace Base;

use \Amenity as ChildAmenity;
use \AmenityQuery as ChildAmenityQuery;
use \Exception;
use \PDO;
use Map\AmenityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'amenity' table.
 *
 *
 *
 * @method     ChildAmenityQuery orderByAmenitynumberid($order = Criteria::ASC) Order by the amenityNumberID column
 * @method     ChildAmenityQuery orderByPropertyid($order = Criteria::ASC) Order by the propertyID column
 * @method     ChildAmenityQuery orderByAmenitytypeid($order = Criteria::ASC) Order by the amenityTypeID column
 * @method     ChildAmenityQuery orderByDetails($order = Criteria::ASC) Order by the details column
 *
 * @method     ChildAmenityQuery groupByAmenitynumberid() Group by the amenityNumberID column
 * @method     ChildAmenityQuery groupByPropertyid() Group by the propertyID column
 * @method     ChildAmenityQuery groupByAmenitytypeid() Group by the amenityTypeID column
 * @method     ChildAmenityQuery groupByDetails() Group by the details column
 *
 * @method     ChildAmenityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAmenityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAmenityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAmenityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAmenityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAmenityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAmenity findOne(ConnectionInterface $con = null) Return the first ChildAmenity matching the query
 * @method     ChildAmenity findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAmenity matching the query, or a new ChildAmenity object populated from the query conditions when no match is found
 *
 * @method     ChildAmenity findOneByAmenitynumberid(int $amenityNumberID) Return the first ChildAmenity filtered by the amenityNumberID column
 * @method     ChildAmenity findOneByPropertyid(int $propertyID) Return the first ChildAmenity filtered by the propertyID column
 * @method     ChildAmenity findOneByAmenitytypeid(int $amenityTypeID) Return the first ChildAmenity filtered by the amenityTypeID column
 * @method     ChildAmenity findOneByDetails(string $details) Return the first ChildAmenity filtered by the details column *

 * @method     ChildAmenity requirePk($key, ConnectionInterface $con = null) Return the ChildAmenity by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmenity requireOne(ConnectionInterface $con = null) Return the first ChildAmenity matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmenity requireOneByAmenitynumberid(int $amenityNumberID) Return the first ChildAmenity filtered by the amenityNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmenity requireOneByPropertyid(int $propertyID) Return the first ChildAmenity filtered by the propertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmenity requireOneByAmenitytypeid(int $amenityTypeID) Return the first ChildAmenity filtered by the amenityTypeID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmenity requireOneByDetails(string $details) Return the first ChildAmenity filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmenity[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAmenity objects based on current ModelCriteria
 * @method     ChildAmenity[]|ObjectCollection findByAmenitynumberid(int $amenityNumberID) Return ChildAmenity objects filtered by the amenityNumberID column
 * @method     ChildAmenity[]|ObjectCollection findByPropertyid(int $propertyID) Return ChildAmenity objects filtered by the propertyID column
 * @method     ChildAmenity[]|ObjectCollection findByAmenitytypeid(int $amenityTypeID) Return ChildAmenity objects filtered by the amenityTypeID column
 * @method     ChildAmenity[]|ObjectCollection findByDetails(string $details) Return ChildAmenity objects filtered by the details column
 * @method     ChildAmenity[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AmenityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AmenityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Amenity', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAmenityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAmenityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAmenityQuery) {
            return $criteria;
        }
        $query = new ChildAmenityQuery();
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
     * @return ChildAmenity|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AmenityTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AmenityTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAmenity A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT amenityNumberID, propertyID, amenityTypeID, details FROM amenity WHERE amenityNumberID = :p0';
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
            /** @var ChildAmenity $obj */
            $obj = new ChildAmenity();
            $obj->hydrate($row);
            AmenityTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAmenity|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the amenityNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByAmenitynumberid(1234); // WHERE amenityNumberID = 1234
     * $query->filterByAmenitynumberid(array(12, 34)); // WHERE amenityNumberID IN (12, 34)
     * $query->filterByAmenitynumberid(array('min' => 12)); // WHERE amenityNumberID > 12
     * </code>
     *
     * @param     mixed $amenitynumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByAmenitynumberid($amenitynumberid = null, $comparison = null)
    {
        if (is_array($amenitynumberid)) {
            $useMinMax = false;
            if (isset($amenitynumberid['min'])) {
                $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $amenitynumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amenitynumberid['max'])) {
                $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $amenitynumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $amenitynumberid, $comparison);
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
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(AmenityTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(AmenityTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmenityTableMap::COL_PROPERTYID, $propertyid, $comparison);
    }

    /**
     * Filter the query on the amenityTypeID column
     *
     * Example usage:
     * <code>
     * $query->filterByAmenitytypeid(1234); // WHERE amenityTypeID = 1234
     * $query->filterByAmenitytypeid(array(12, 34)); // WHERE amenityTypeID IN (12, 34)
     * $query->filterByAmenitytypeid(array('min' => 12)); // WHERE amenityTypeID > 12
     * </code>
     *
     * @param     mixed $amenitytypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByAmenitytypeid($amenitytypeid = null, $comparison = null)
    {
        if (is_array($amenitytypeid)) {
            $useMinMax = false;
            if (isset($amenitytypeid['min'])) {
                $this->addUsingAlias(AmenityTableMap::COL_AMENITYTYPEID, $amenitytypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amenitytypeid['max'])) {
                $this->addUsingAlias(AmenityTableMap::COL_AMENITYTYPEID, $amenitytypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmenityTableMap::COL_AMENITYTYPEID, $amenitytypeid, $comparison);
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
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmenityTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAmenity $amenity Object to remove from the list of results
     *
     * @return $this|ChildAmenityQuery The current query, for fluid interface
     */
    public function prune($amenity = null)
    {
        if ($amenity) {
            $this->addUsingAlias(AmenityTableMap::COL_AMENITYNUMBERID, $amenity->getAmenitynumberid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the amenity table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmenityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AmenityTableMap::clearInstancePool();
            AmenityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AmenityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AmenityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AmenityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AmenityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AmenityQuery
