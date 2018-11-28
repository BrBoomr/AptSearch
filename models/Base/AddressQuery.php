<?php

namespace Base;

use \Address as ChildAddress;
use \AddressQuery as ChildAddressQuery;
use \Exception;
use \PDO;
use Map\AddressTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'address' table.
 *
 *
 *
 * @method     ChildAddressQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildAddressQuery orderByContinenttypeid($order = Criteria::ASC) Order by the continentTypeID column
 * @method     ChildAddressQuery orderByCountrytypeid($order = Criteria::ASC) Order by the countryTypeID column
 * @method     ChildAddressQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildAddressQuery orderByLocality($order = Criteria::ASC) Order by the locality column
 * @method     ChildAddressQuery orderByZipcode($order = Criteria::ASC) Order by the zipCode column
 * @method     ChildAddressQuery orderByStreetname($order = Criteria::ASC) Order by the streetName column
 * @method     ChildAddressQuery orderByBuildingindentifier($order = Criteria::ASC) Order by the buildingIndentifier column
 * @method     ChildAddressQuery orderByApartmentidentifier($order = Criteria::ASC) Order by the apartmentIdentifier column
 *
 * @method     ChildAddressQuery groupById() Group by the ID column
 * @method     ChildAddressQuery groupByContinenttypeid() Group by the continentTypeID column
 * @method     ChildAddressQuery groupByCountrytypeid() Group by the countryTypeID column
 * @method     ChildAddressQuery groupByState() Group by the state column
 * @method     ChildAddressQuery groupByLocality() Group by the locality column
 * @method     ChildAddressQuery groupByZipcode() Group by the zipCode column
 * @method     ChildAddressQuery groupByStreetname() Group by the streetName column
 * @method     ChildAddressQuery groupByBuildingindentifier() Group by the buildingIndentifier column
 * @method     ChildAddressQuery groupByApartmentidentifier() Group by the apartmentIdentifier column
 *
 * @method     ChildAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAddressQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAddressQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAddressQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAddress findOne(ConnectionInterface $con = null) Return the first ChildAddress matching the query
 * @method     ChildAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAddress matching the query, or a new ChildAddress object populated from the query conditions when no match is found
 *
 * @method     ChildAddress findOneById(int $ID) Return the first ChildAddress filtered by the ID column
 * @method     ChildAddress findOneByContinenttypeid(int $continentTypeID) Return the first ChildAddress filtered by the continentTypeID column
 * @method     ChildAddress findOneByCountrytypeid(int $countryTypeID) Return the first ChildAddress filtered by the countryTypeID column
 * @method     ChildAddress findOneByState(string $state) Return the first ChildAddress filtered by the state column
 * @method     ChildAddress findOneByLocality(string $locality) Return the first ChildAddress filtered by the locality column
 * @method     ChildAddress findOneByZipcode(string $zipCode) Return the first ChildAddress filtered by the zipCode column
 * @method     ChildAddress findOneByStreetname(string $streetName) Return the first ChildAddress filtered by the streetName column
 * @method     ChildAddress findOneByBuildingindentifier(string $buildingIndentifier) Return the first ChildAddress filtered by the buildingIndentifier column
 * @method     ChildAddress findOneByApartmentidentifier(string $apartmentIdentifier) Return the first ChildAddress filtered by the apartmentIdentifier column *

 * @method     ChildAddress requirePk($key, ConnectionInterface $con = null) Return the ChildAddress by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOne(ConnectionInterface $con = null) Return the first ChildAddress matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAddress requireOneById(int $ID) Return the first ChildAddress filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByContinenttypeid(int $continentTypeID) Return the first ChildAddress filtered by the continentTypeID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByCountrytypeid(int $countryTypeID) Return the first ChildAddress filtered by the countryTypeID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByState(string $state) Return the first ChildAddress filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByLocality(string $locality) Return the first ChildAddress filtered by the locality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByZipcode(string $zipCode) Return the first ChildAddress filtered by the zipCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByStreetname(string $streetName) Return the first ChildAddress filtered by the streetName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByBuildingindentifier(string $buildingIndentifier) Return the first ChildAddress filtered by the buildingIndentifier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByApartmentidentifier(string $apartmentIdentifier) Return the first ChildAddress filtered by the apartmentIdentifier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAddress[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAddress objects based on current ModelCriteria
 * @method     ChildAddress[]|ObjectCollection findById(int $ID) Return ChildAddress objects filtered by the ID column
 * @method     ChildAddress[]|ObjectCollection findByContinenttypeid(int $continentTypeID) Return ChildAddress objects filtered by the continentTypeID column
 * @method     ChildAddress[]|ObjectCollection findByCountrytypeid(int $countryTypeID) Return ChildAddress objects filtered by the countryTypeID column
 * @method     ChildAddress[]|ObjectCollection findByState(string $state) Return ChildAddress objects filtered by the state column
 * @method     ChildAddress[]|ObjectCollection findByLocality(string $locality) Return ChildAddress objects filtered by the locality column
 * @method     ChildAddress[]|ObjectCollection findByZipcode(string $zipCode) Return ChildAddress objects filtered by the zipCode column
 * @method     ChildAddress[]|ObjectCollection findByStreetname(string $streetName) Return ChildAddress objects filtered by the streetName column
 * @method     ChildAddress[]|ObjectCollection findByBuildingindentifier(string $buildingIndentifier) Return ChildAddress objects filtered by the buildingIndentifier column
 * @method     ChildAddress[]|ObjectCollection findByApartmentidentifier(string $apartmentIdentifier) Return ChildAddress objects filtered by the apartmentIdentifier column
 * @method     ChildAddress[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AddressQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AddressQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Address', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAddressQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAddressQuery) {
            return $criteria;
        }
        $query = new ChildAddressQuery();
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
     * @return ChildAddress|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AddressTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AddressTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAddress A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, continentTypeID, countryTypeID, state, locality, zipCode, streetName, buildingIndentifier, apartmentIdentifier FROM address WHERE ID = :p0';
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
            /** @var ChildAddress $obj */
            $obj = new ChildAddress();
            $obj->hydrate($row);
            AddressTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAddress|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AddressTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AddressTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the continentTypeID column
     *
     * Example usage:
     * <code>
     * $query->filterByContinenttypeid(1234); // WHERE continentTypeID = 1234
     * $query->filterByContinenttypeid(array(12, 34)); // WHERE continentTypeID IN (12, 34)
     * $query->filterByContinenttypeid(array('min' => 12)); // WHERE continentTypeID > 12
     * </code>
     *
     * @param     mixed $continenttypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByContinenttypeid($continenttypeid = null, $comparison = null)
    {
        if (is_array($continenttypeid)) {
            $useMinMax = false;
            if (isset($continenttypeid['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_CONTINENTTYPEID, $continenttypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($continenttypeid['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_CONTINENTTYPEID, $continenttypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_CONTINENTTYPEID, $continenttypeid, $comparison);
    }

    /**
     * Filter the query on the countryTypeID column
     *
     * Example usage:
     * <code>
     * $query->filterByCountrytypeid(1234); // WHERE countryTypeID = 1234
     * $query->filterByCountrytypeid(array(12, 34)); // WHERE countryTypeID IN (12, 34)
     * $query->filterByCountrytypeid(array('min' => 12)); // WHERE countryTypeID > 12
     * </code>
     *
     * @param     mixed $countrytypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByCountrytypeid($countrytypeid = null, $comparison = null)
    {
        if (is_array($countrytypeid)) {
            $useMinMax = false;
            if (isset($countrytypeid['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_COUNTRYTYPEID, $countrytypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countrytypeid['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_COUNTRYTYPEID, $countrytypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_COUNTRYTYPEID, $countrytypeid, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the locality column
     *
     * Example usage:
     * <code>
     * $query->filterByLocality('fooValue');   // WHERE locality = 'fooValue'
     * $query->filterByLocality('%fooValue%', Criteria::LIKE); // WHERE locality LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locality The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByLocality($locality = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locality)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_LOCALITY, $locality, $comparison);
    }

    /**
     * Filter the query on the zipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipCode = 'fooValue'
     * $query->filterByZipcode('%fooValue%', Criteria::LIKE); // WHERE zipCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the streetName column
     *
     * Example usage:
     * <code>
     * $query->filterByStreetname('fooValue');   // WHERE streetName = 'fooValue'
     * $query->filterByStreetname('%fooValue%', Criteria::LIKE); // WHERE streetName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $streetname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByStreetname($streetname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($streetname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_STREETNAME, $streetname, $comparison);
    }

    /**
     * Filter the query on the buildingIndentifier column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingindentifier('fooValue');   // WHERE buildingIndentifier = 'fooValue'
     * $query->filterByBuildingindentifier('%fooValue%', Criteria::LIKE); // WHERE buildingIndentifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $buildingindentifier The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByBuildingindentifier($buildingindentifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($buildingindentifier)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_BUILDINGINDENTIFIER, $buildingindentifier, $comparison);
    }

    /**
     * Filter the query on the apartmentIdentifier column
     *
     * Example usage:
     * <code>
     * $query->filterByApartmentidentifier('fooValue');   // WHERE apartmentIdentifier = 'fooValue'
     * $query->filterByApartmentidentifier('%fooValue%', Criteria::LIKE); // WHERE apartmentIdentifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apartmentidentifier The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByApartmentidentifier($apartmentidentifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apartmentidentifier)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_APARTMENTIDENTIFIER, $apartmentidentifier, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAddress $address Object to remove from the list of results
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function prune($address = null)
    {
        if ($address) {
            $this->addUsingAlias(AddressTableMap::COL_ID, $address->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AddressTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AddressTableMap::clearInstancePool();
            AddressTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AddressTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AddressTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AddressTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AddressTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AddressQuery
