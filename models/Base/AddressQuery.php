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
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'address' table.
 *
 *
 *
 * @method     ChildAddressQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildAddressQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildAddressQuery orderByContinent($order = Criteria::ASC) Order by the Continent column
 * @method     ChildAddressQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ChildAddressQuery orderByState($order = Criteria::ASC) Order by the State column
 * @method     ChildAddressQuery orderByCity($order = Criteria::ASC) Order by the City column
 * @method     ChildAddressQuery orderByZip($order = Criteria::ASC) Order by the Zip column
 * @method     ChildAddressQuery orderByStreetname($order = Criteria::ASC) Order by the StreetName column
 * @method     ChildAddressQuery orderByBuildingnumber($order = Criteria::ASC) Order by the BuildingNumber column
 * @method     ChildAddressQuery orderByApartmentid($order = Criteria::ASC) Order by the ApartmentID column
 *
 * @method     ChildAddressQuery groupById() Group by the ID column
 * @method     ChildAddressQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildAddressQuery groupByContinent() Group by the Continent column
 * @method     ChildAddressQuery groupByCountry() Group by the Country column
 * @method     ChildAddressQuery groupByState() Group by the State column
 * @method     ChildAddressQuery groupByCity() Group by the City column
 * @method     ChildAddressQuery groupByZip() Group by the Zip column
 * @method     ChildAddressQuery groupByStreetname() Group by the StreetName column
 * @method     ChildAddressQuery groupByBuildingnumber() Group by the BuildingNumber column
 * @method     ChildAddressQuery groupByApartmentid() Group by the ApartmentID column
 *
 * @method     ChildAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAddressQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAddressQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAddressQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAddressQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildAddressQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildAddressQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildAddressQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildAddressQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildAddressQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildAddressQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     \PropertyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAddress findOne(ConnectionInterface $con = null) Return the first ChildAddress matching the query
 * @method     ChildAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAddress matching the query, or a new ChildAddress object populated from the query conditions when no match is found
 *
 * @method     ChildAddress findOneById(int $ID) Return the first ChildAddress filtered by the ID column
 * @method     ChildAddress findOneByTimestamp(string $Timestamp) Return the first ChildAddress filtered by the Timestamp column
 * @method     ChildAddress findOneByContinent(string $Continent) Return the first ChildAddress filtered by the Continent column
 * @method     ChildAddress findOneByCountry(string $Country) Return the first ChildAddress filtered by the Country column
 * @method     ChildAddress findOneByState(string $State) Return the first ChildAddress filtered by the State column
 * @method     ChildAddress findOneByCity(string $City) Return the first ChildAddress filtered by the City column
 * @method     ChildAddress findOneByZip(int $Zip) Return the first ChildAddress filtered by the Zip column
 * @method     ChildAddress findOneByStreetname(string $StreetName) Return the first ChildAddress filtered by the StreetName column
 * @method     ChildAddress findOneByBuildingnumber(int $BuildingNumber) Return the first ChildAddress filtered by the BuildingNumber column
 * @method     ChildAddress findOneByApartmentid(int $ApartmentID) Return the first ChildAddress filtered by the ApartmentID column *

 * @method     ChildAddress requirePk($key, ConnectionInterface $con = null) Return the ChildAddress by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOne(ConnectionInterface $con = null) Return the first ChildAddress matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAddress requireOneById(int $ID) Return the first ChildAddress filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByTimestamp(string $Timestamp) Return the first ChildAddress filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByContinent(string $Continent) Return the first ChildAddress filtered by the Continent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByCountry(string $Country) Return the first ChildAddress filtered by the Country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByState(string $State) Return the first ChildAddress filtered by the State column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByCity(string $City) Return the first ChildAddress filtered by the City column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByZip(int $Zip) Return the first ChildAddress filtered by the Zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByStreetname(string $StreetName) Return the first ChildAddress filtered by the StreetName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByBuildingnumber(int $BuildingNumber) Return the first ChildAddress filtered by the BuildingNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAddress requireOneByApartmentid(int $ApartmentID) Return the first ChildAddress filtered by the ApartmentID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAddress[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAddress objects based on current ModelCriteria
 * @method     ChildAddress[]|ObjectCollection findById(int $ID) Return ChildAddress objects filtered by the ID column
 * @method     ChildAddress[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildAddress objects filtered by the Timestamp column
 * @method     ChildAddress[]|ObjectCollection findByContinent(string $Continent) Return ChildAddress objects filtered by the Continent column
 * @method     ChildAddress[]|ObjectCollection findByCountry(string $Country) Return ChildAddress objects filtered by the Country column
 * @method     ChildAddress[]|ObjectCollection findByState(string $State) Return ChildAddress objects filtered by the State column
 * @method     ChildAddress[]|ObjectCollection findByCity(string $City) Return ChildAddress objects filtered by the City column
 * @method     ChildAddress[]|ObjectCollection findByZip(int $Zip) Return ChildAddress objects filtered by the Zip column
 * @method     ChildAddress[]|ObjectCollection findByStreetname(string $StreetName) Return ChildAddress objects filtered by the StreetName column
 * @method     ChildAddress[]|ObjectCollection findByBuildingnumber(int $BuildingNumber) Return ChildAddress objects filtered by the BuildingNumber column
 * @method     ChildAddress[]|ObjectCollection findByApartmentid(int $ApartmentID) Return ChildAddress objects filtered by the ApartmentID column
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
        $sql = 'SELECT ID, Timestamp, Continent, Country, State, City, Zip, StreetName, BuildingNumber, ApartmentID FROM address WHERE ID = :p0';
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
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the Continent column
     *
     * Example usage:
     * <code>
     * $query->filterByContinent('fooValue');   // WHERE Continent = 'fooValue'
     * $query->filterByContinent('%fooValue%', Criteria::LIKE); // WHERE Continent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $continent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByContinent($continent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($continent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_CONTINENT, $continent, $comparison);
    }

    /**
     * Filter the query on the Country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE Country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE Country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the State column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE State = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE State LIKE '%fooValue%'
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
     * Filter the query on the City column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE City = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE City LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the Zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip(1234); // WHERE Zip = 1234
     * $query->filterByZip(array(12, 34)); // WHERE Zip IN (12, 34)
     * $query->filterByZip(array('min' => 12)); // WHERE Zip > 12
     * </code>
     *
     * @param     mixed $zip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (is_array($zip)) {
            $useMinMax = false;
            if (isset($zip['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_ZIP, $zip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zip['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_ZIP, $zip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the StreetName column
     *
     * Example usage:
     * <code>
     * $query->filterByStreetname('fooValue');   // WHERE StreetName = 'fooValue'
     * $query->filterByStreetname('%fooValue%', Criteria::LIKE); // WHERE StreetName LIKE '%fooValue%'
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
     * Filter the query on the BuildingNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingnumber(1234); // WHERE BuildingNumber = 1234
     * $query->filterByBuildingnumber(array(12, 34)); // WHERE BuildingNumber IN (12, 34)
     * $query->filterByBuildingnumber(array('min' => 12)); // WHERE BuildingNumber > 12
     * </code>
     *
     * @param     mixed $buildingnumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByBuildingnumber($buildingnumber = null, $comparison = null)
    {
        if (is_array($buildingnumber)) {
            $useMinMax = false;
            if (isset($buildingnumber['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_BUILDINGNUMBER, $buildingnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($buildingnumber['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_BUILDINGNUMBER, $buildingnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_BUILDINGNUMBER, $buildingnumber, $comparison);
    }

    /**
     * Filter the query on the ApartmentID column
     *
     * Example usage:
     * <code>
     * $query->filterByApartmentid(1234); // WHERE ApartmentID = 1234
     * $query->filterByApartmentid(array(12, 34)); // WHERE ApartmentID IN (12, 34)
     * $query->filterByApartmentid(array('min' => 12)); // WHERE ApartmentID > 12
     * </code>
     *
     * @param     mixed $apartmentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAddressQuery The current query, for fluid interface
     */
    public function filterByApartmentid($apartmentid = null, $comparison = null)
    {
        if (is_array($apartmentid)) {
            $useMinMax = false;
            if (isset($apartmentid['min'])) {
                $this->addUsingAlias(AddressTableMap::COL_APARTMENTID, $apartmentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apartmentid['max'])) {
                $this->addUsingAlias(AddressTableMap::COL_APARTMENTID, $apartmentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressTableMap::COL_APARTMENTID, $apartmentid, $comparison);
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(AddressTableMap::COL_ID, $property->getAddressid(), $comparison);
        } elseif ($property instanceof ObjectCollection) {
            return $this
                ->usePropertyQuery()
                ->filterByPrimaryKeys($property->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildAddressQuery The current query, for fluid interface
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
