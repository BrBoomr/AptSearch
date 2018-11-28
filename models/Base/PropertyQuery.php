<?php

namespace Base;

use \Property as ChildProperty;
use \PropertyQuery as ChildPropertyQuery;
use \Exception;
use \PDO;
use Map\PropertyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'property' table.
 *
 *
 *
 * @method     ChildPropertyQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPropertyQuery orderByAddressid($order = Criteria::ASC) Order by the addressID column
 * @method     ChildPropertyQuery orderByUserid($order = Criteria::ASC) Order by the userID column
 * @method     ChildPropertyQuery orderByAdddate($order = Criteria::ASC) Order by the addDate column
 * @method     ChildPropertyQuery orderByLastupdated($order = Criteria::ASC) Order by the lastUpdated column
 * @method     ChildPropertyQuery orderByPostname($order = Criteria::ASC) Order by the postName column
 * @method     ChildPropertyQuery orderByAvailable($order = Criteria::ASC) Order by the available column
 * @method     ChildPropertyQuery orderByExpectedrentpermonth($order = Criteria::ASC) Order by the expectedRentPerMonth column
 * @method     ChildPropertyQuery orderBySquarefootage($order = Criteria::ASC) Order by the squareFootage column
 * @method     ChildPropertyQuery orderByBedroomcount($order = Criteria::ASC) Order by the bedroomCount column
 * @method     ChildPropertyQuery orderByBathroomcount($order = Criteria::ASC) Order by the bathroomCount column
 * @method     ChildPropertyQuery orderByDetails($order = Criteria::ASC) Order by the details column
 *
 * @method     ChildPropertyQuery groupById() Group by the ID column
 * @method     ChildPropertyQuery groupByAddressid() Group by the addressID column
 * @method     ChildPropertyQuery groupByUserid() Group by the userID column
 * @method     ChildPropertyQuery groupByAdddate() Group by the addDate column
 * @method     ChildPropertyQuery groupByLastupdated() Group by the lastUpdated column
 * @method     ChildPropertyQuery groupByPostname() Group by the postName column
 * @method     ChildPropertyQuery groupByAvailable() Group by the available column
 * @method     ChildPropertyQuery groupByExpectedrentpermonth() Group by the expectedRentPerMonth column
 * @method     ChildPropertyQuery groupBySquarefootage() Group by the squareFootage column
 * @method     ChildPropertyQuery groupByBedroomcount() Group by the bedroomCount column
 * @method     ChildPropertyQuery groupByBathroomcount() Group by the bathroomCount column
 * @method     ChildPropertyQuery groupByDetails() Group by the details column
 *
 * @method     ChildPropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPropertyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPropertyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPropertyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProperty findOne(ConnectionInterface $con = null) Return the first ChildProperty matching the query
 * @method     ChildProperty findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProperty matching the query, or a new ChildProperty object populated from the query conditions when no match is found
 *
 * @method     ChildProperty findOneById(int $ID) Return the first ChildProperty filtered by the ID column
 * @method     ChildProperty findOneByAddressid(int $addressID) Return the first ChildProperty filtered by the addressID column
 * @method     ChildProperty findOneByUserid(int $userID) Return the first ChildProperty filtered by the userID column
 * @method     ChildProperty findOneByAdddate(string $addDate) Return the first ChildProperty filtered by the addDate column
 * @method     ChildProperty findOneByLastupdated(string $lastUpdated) Return the first ChildProperty filtered by the lastUpdated column
 * @method     ChildProperty findOneByPostname(string $postName) Return the first ChildProperty filtered by the postName column
 * @method     ChildProperty findOneByAvailable(boolean $available) Return the first ChildProperty filtered by the available column
 * @method     ChildProperty findOneByExpectedrentpermonth(double $expectedRentPerMonth) Return the first ChildProperty filtered by the expectedRentPerMonth column
 * @method     ChildProperty findOneBySquarefootage(int $squareFootage) Return the first ChildProperty filtered by the squareFootage column
 * @method     ChildProperty findOneByBedroomcount(int $bedroomCount) Return the first ChildProperty filtered by the bedroomCount column
 * @method     ChildProperty findOneByBathroomcount(int $bathroomCount) Return the first ChildProperty filtered by the bathroomCount column
 * @method     ChildProperty findOneByDetails(string $details) Return the first ChildProperty filtered by the details column *

 * @method     ChildProperty requirePk($key, ConnectionInterface $con = null) Return the ChildProperty by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOne(ConnectionInterface $con = null) Return the first ChildProperty matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProperty requireOneById(int $ID) Return the first ChildProperty filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByAddressid(int $addressID) Return the first ChildProperty filtered by the addressID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByUserid(int $userID) Return the first ChildProperty filtered by the userID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByAdddate(string $addDate) Return the first ChildProperty filtered by the addDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByLastupdated(string $lastUpdated) Return the first ChildProperty filtered by the lastUpdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByPostname(string $postName) Return the first ChildProperty filtered by the postName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByAvailable(boolean $available) Return the first ChildProperty filtered by the available column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByExpectedrentpermonth(double $expectedRentPerMonth) Return the first ChildProperty filtered by the expectedRentPerMonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneBySquarefootage(int $squareFootage) Return the first ChildProperty filtered by the squareFootage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByBedroomcount(int $bedroomCount) Return the first ChildProperty filtered by the bedroomCount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByBathroomcount(int $bathroomCount) Return the first ChildProperty filtered by the bathroomCount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByDetails(string $details) Return the first ChildProperty filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProperty[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProperty objects based on current ModelCriteria
 * @method     ChildProperty[]|ObjectCollection findById(int $ID) Return ChildProperty objects filtered by the ID column
 * @method     ChildProperty[]|ObjectCollection findByAddressid(int $addressID) Return ChildProperty objects filtered by the addressID column
 * @method     ChildProperty[]|ObjectCollection findByUserid(int $userID) Return ChildProperty objects filtered by the userID column
 * @method     ChildProperty[]|ObjectCollection findByAdddate(string $addDate) Return ChildProperty objects filtered by the addDate column
 * @method     ChildProperty[]|ObjectCollection findByLastupdated(string $lastUpdated) Return ChildProperty objects filtered by the lastUpdated column
 * @method     ChildProperty[]|ObjectCollection findByPostname(string $postName) Return ChildProperty objects filtered by the postName column
 * @method     ChildProperty[]|ObjectCollection findByAvailable(boolean $available) Return ChildProperty objects filtered by the available column
 * @method     ChildProperty[]|ObjectCollection findByExpectedrentpermonth(double $expectedRentPerMonth) Return ChildProperty objects filtered by the expectedRentPerMonth column
 * @method     ChildProperty[]|ObjectCollection findBySquarefootage(int $squareFootage) Return ChildProperty objects filtered by the squareFootage column
 * @method     ChildProperty[]|ObjectCollection findByBedroomcount(int $bedroomCount) Return ChildProperty objects filtered by the bedroomCount column
 * @method     ChildProperty[]|ObjectCollection findByBathroomcount(int $bathroomCount) Return ChildProperty objects filtered by the bathroomCount column
 * @method     ChildProperty[]|ObjectCollection findByDetails(string $details) Return ChildProperty objects filtered by the details column
 * @method     ChildProperty[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PropertyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PropertyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Property', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPropertyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPropertyQuery) {
            return $criteria;
        }
        $query = new ChildPropertyQuery();
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
     * @return ChildProperty|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PropertyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PropertyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProperty A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, addressID, userID, addDate, lastUpdated, postName, available, expectedRentPerMonth, squareFootage, bedroomCount, bathroomCount, details FROM property WHERE ID = :p0';
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
            /** @var ChildProperty $obj */
            $obj = new ChildProperty();
            $obj->hydrate($row);
            PropertyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProperty|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PropertyTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PropertyTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the addressID column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressid(1234); // WHERE addressID = 1234
     * $query->filterByAddressid(array(12, 34)); // WHERE addressID IN (12, 34)
     * $query->filterByAddressid(array('min' => 12)); // WHERE addressID > 12
     * </code>
     *
     * @param     mixed $addressid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAddressid($addressid = null, $comparison = null)
    {
        if (is_array($addressid)) {
            $useMinMax = false;
            if (isset($addressid['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ADDRESSID, $addressid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($addressid['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ADDRESSID, $addressid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_ADDRESSID, $addressid, $comparison);
    }

    /**
     * Filter the query on the userID column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userID = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userID IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userID > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the addDate column
     *
     * Example usage:
     * <code>
     * $query->filterByAdddate('2011-03-14'); // WHERE addDate = '2011-03-14'
     * $query->filterByAdddate('now'); // WHERE addDate = '2011-03-14'
     * $query->filterByAdddate(array('max' => 'yesterday')); // WHERE addDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $adddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAdddate($adddate = null, $comparison = null)
    {
        if (is_array($adddate)) {
            $useMinMax = false;
            if (isset($adddate['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ADDDATE, $adddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adddate['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ADDDATE, $adddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_ADDDATE, $adddate, $comparison);
    }

    /**
     * Filter the query on the lastUpdated column
     *
     * Example usage:
     * <code>
     * $query->filterByLastupdated('2011-03-14'); // WHERE lastUpdated = '2011-03-14'
     * $query->filterByLastupdated('now'); // WHERE lastUpdated = '2011-03-14'
     * $query->filterByLastupdated(array('max' => 'yesterday')); // WHERE lastUpdated > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastupdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByLastupdated($lastupdated = null, $comparison = null)
    {
        if (is_array($lastupdated)) {
            $useMinMax = false;
            if (isset($lastupdated['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_LASTUPDATED, $lastupdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastupdated['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_LASTUPDATED, $lastupdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_LASTUPDATED, $lastupdated, $comparison);
    }

    /**
     * Filter the query on the postName column
     *
     * Example usage:
     * <code>
     * $query->filterByPostname('fooValue');   // WHERE postName = 'fooValue'
     * $query->filterByPostname('%fooValue%', Criteria::LIKE); // WHERE postName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByPostname($postname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_POSTNAME, $postname, $comparison);
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAvailable($available = null, $comparison = null)
    {
        if (is_string($available)) {
            $available = in_array(strtolower($available), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PropertyTableMap::COL_AVAILABLE, $available, $comparison);
    }

    /**
     * Filter the query on the expectedRentPerMonth column
     *
     * Example usage:
     * <code>
     * $query->filterByExpectedrentpermonth(1234); // WHERE expectedRentPerMonth = 1234
     * $query->filterByExpectedrentpermonth(array(12, 34)); // WHERE expectedRentPerMonth IN (12, 34)
     * $query->filterByExpectedrentpermonth(array('min' => 12)); // WHERE expectedRentPerMonth > 12
     * </code>
     *
     * @param     mixed $expectedrentpermonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByExpectedrentpermonth($expectedrentpermonth = null, $comparison = null)
    {
        if (is_array($expectedrentpermonth)) {
            $useMinMax = false;
            if (isset($expectedrentpermonth['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_EXPECTEDRENTPERMONTH, $expectedrentpermonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expectedrentpermonth['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_EXPECTEDRENTPERMONTH, $expectedrentpermonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_EXPECTEDRENTPERMONTH, $expectedrentpermonth, $comparison);
    }

    /**
     * Filter the query on the squareFootage column
     *
     * Example usage:
     * <code>
     * $query->filterBySquarefootage(1234); // WHERE squareFootage = 1234
     * $query->filterBySquarefootage(array(12, 34)); // WHERE squareFootage IN (12, 34)
     * $query->filterBySquarefootage(array('min' => 12)); // WHERE squareFootage > 12
     * </code>
     *
     * @param     mixed $squarefootage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterBySquarefootage($squarefootage = null, $comparison = null)
    {
        if (is_array($squarefootage)) {
            $useMinMax = false;
            if (isset($squarefootage['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_SQUAREFOOTAGE, $squarefootage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($squarefootage['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_SQUAREFOOTAGE, $squarefootage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_SQUAREFOOTAGE, $squarefootage, $comparison);
    }

    /**
     * Filter the query on the bedroomCount column
     *
     * Example usage:
     * <code>
     * $query->filterByBedroomcount(1234); // WHERE bedroomCount = 1234
     * $query->filterByBedroomcount(array(12, 34)); // WHERE bedroomCount IN (12, 34)
     * $query->filterByBedroomcount(array('min' => 12)); // WHERE bedroomCount > 12
     * </code>
     *
     * @param     mixed $bedroomcount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByBedroomcount($bedroomcount = null, $comparison = null)
    {
        if (is_array($bedroomcount)) {
            $useMinMax = false;
            if (isset($bedroomcount['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BEDROOMCOUNT, $bedroomcount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bedroomcount['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BEDROOMCOUNT, $bedroomcount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_BEDROOMCOUNT, $bedroomcount, $comparison);
    }

    /**
     * Filter the query on the bathroomCount column
     *
     * Example usage:
     * <code>
     * $query->filterByBathroomcount(1234); // WHERE bathroomCount = 1234
     * $query->filterByBathroomcount(array(12, 34)); // WHERE bathroomCount IN (12, 34)
     * $query->filterByBathroomcount(array('min' => 12)); // WHERE bathroomCount > 12
     * </code>
     *
     * @param     mixed $bathroomcount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByBathroomcount($bathroomcount = null, $comparison = null)
    {
        if (is_array($bathroomcount)) {
            $useMinMax = false;
            if (isset($bathroomcount['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BATHROOMCOUNT, $bathroomcount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bathroomcount['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BATHROOMCOUNT, $bathroomcount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_BATHROOMCOUNT, $bathroomcount, $comparison);
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProperty $property Object to remove from the list of results
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function prune($property = null)
    {
        if ($property) {
            $this->addUsingAlias(PropertyTableMap::COL_ID, $property->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the property table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PropertyTableMap::clearInstancePool();
            PropertyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PropertyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PropertyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PropertyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PropertyQuery
