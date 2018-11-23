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
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'property' table.
 *
 *
 *
 * @method     ChildPropertyQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPropertyQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildPropertyQuery orderByLandlordid($order = Criteria::ASC) Order by the LandlordID column
 * @method     ChildPropertyQuery orderByAddressid($order = Criteria::ASC) Order by the AddressID column
 * @method     ChildPropertyQuery orderByFpl($order = Criteria::ASC) Order by the FPL column
 * @method     ChildPropertyQuery orderBySquarefootage($order = Criteria::ASC) Order by the SquareFootage column
 * @method     ChildPropertyQuery orderByRooms($order = Criteria::ASC) Order by the Rooms column
 * @method     ChildPropertyQuery orderByBathrooms($order = Criteria::ASC) Order by the Bathrooms column
 * @method     ChildPropertyQuery orderByDetails($order = Criteria::ASC) Order by the Details column
 *
 * @method     ChildPropertyQuery groupById() Group by the ID column
 * @method     ChildPropertyQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildPropertyQuery groupByLandlordid() Group by the LandlordID column
 * @method     ChildPropertyQuery groupByAddressid() Group by the AddressID column
 * @method     ChildPropertyQuery groupByFpl() Group by the FPL column
 * @method     ChildPropertyQuery groupBySquarefootage() Group by the SquareFootage column
 * @method     ChildPropertyQuery groupByRooms() Group by the Rooms column
 * @method     ChildPropertyQuery groupByBathrooms() Group by the Bathrooms column
 * @method     ChildPropertyQuery groupByDetails() Group by the Details column
 *
 * @method     ChildPropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPropertyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPropertyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPropertyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPropertyQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method     ChildPropertyQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method     ChildPropertyQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method     ChildPropertyQuery joinWithAddress($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Address relation
 *
 * @method     ChildPropertyQuery leftJoinWithAddress() Adds a LEFT JOIN clause and with to the query using the Address relation
 * @method     ChildPropertyQuery rightJoinWithAddress() Adds a RIGHT JOIN clause and with to the query using the Address relation
 * @method     ChildPropertyQuery innerJoinWithAddress() Adds a INNER JOIN clause and with to the query using the Address relation
 *
 * @method     ChildPropertyQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildPropertyQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildPropertyQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildPropertyQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildPropertyQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildPropertyQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildPropertyQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildPropertyQuery leftJoinAmenity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Amenity relation
 * @method     ChildPropertyQuery rightJoinAmenity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Amenity relation
 * @method     ChildPropertyQuery innerJoinAmenity($relationAlias = null) Adds a INNER JOIN clause to the query using the Amenity relation
 *
 * @method     ChildPropertyQuery joinWithAmenity($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Amenity relation
 *
 * @method     ChildPropertyQuery leftJoinWithAmenity() Adds a LEFT JOIN clause and with to the query using the Amenity relation
 * @method     ChildPropertyQuery rightJoinWithAmenity() Adds a RIGHT JOIN clause and with to the query using the Amenity relation
 * @method     ChildPropertyQuery innerJoinWithAmenity() Adds a INNER JOIN clause and with to the query using the Amenity relation
 *
 * @method     ChildPropertyQuery leftJoinAppliance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Appliance relation
 * @method     ChildPropertyQuery rightJoinAppliance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Appliance relation
 * @method     ChildPropertyQuery innerJoinAppliance($relationAlias = null) Adds a INNER JOIN clause to the query using the Appliance relation
 *
 * @method     ChildPropertyQuery joinWithAppliance($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Appliance relation
 *
 * @method     ChildPropertyQuery leftJoinWithAppliance() Adds a LEFT JOIN clause and with to the query using the Appliance relation
 * @method     ChildPropertyQuery rightJoinWithAppliance() Adds a RIGHT JOIN clause and with to the query using the Appliance relation
 * @method     ChildPropertyQuery innerJoinWithAppliance() Adds a INNER JOIN clause and with to the query using the Appliance relation
 *
 * @method     ChildPropertyQuery leftJoinCost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cost relation
 * @method     ChildPropertyQuery rightJoinCost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cost relation
 * @method     ChildPropertyQuery innerJoinCost($relationAlias = null) Adds a INNER JOIN clause to the query using the Cost relation
 *
 * @method     ChildPropertyQuery joinWithCost($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cost relation
 *
 * @method     ChildPropertyQuery leftJoinWithCost() Adds a LEFT JOIN clause and with to the query using the Cost relation
 * @method     ChildPropertyQuery rightJoinWithCost() Adds a RIGHT JOIN clause and with to the query using the Cost relation
 * @method     ChildPropertyQuery innerJoinWithCost() Adds a INNER JOIN clause and with to the query using the Cost relation
 *
 * @method     ChildPropertyQuery leftJoinIssue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Issue relation
 * @method     ChildPropertyQuery rightJoinIssue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Issue relation
 * @method     ChildPropertyQuery innerJoinIssue($relationAlias = null) Adds a INNER JOIN clause to the query using the Issue relation
 *
 * @method     ChildPropertyQuery joinWithIssue($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Issue relation
 *
 * @method     ChildPropertyQuery leftJoinWithIssue() Adds a LEFT JOIN clause and with to the query using the Issue relation
 * @method     ChildPropertyQuery rightJoinWithIssue() Adds a RIGHT JOIN clause and with to the query using the Issue relation
 * @method     ChildPropertyQuery innerJoinWithIssue() Adds a INNER JOIN clause and with to the query using the Issue relation
 *
 * @method     ChildPropertyQuery leftJoinLimitation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Limitation relation
 * @method     ChildPropertyQuery rightJoinLimitation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Limitation relation
 * @method     ChildPropertyQuery innerJoinLimitation($relationAlias = null) Adds a INNER JOIN clause to the query using the Limitation relation
 *
 * @method     ChildPropertyQuery joinWithLimitation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Limitation relation
 *
 * @method     ChildPropertyQuery leftJoinWithLimitation() Adds a LEFT JOIN clause and with to the query using the Limitation relation
 * @method     ChildPropertyQuery rightJoinWithLimitation() Adds a RIGHT JOIN clause and with to the query using the Limitation relation
 * @method     ChildPropertyQuery innerJoinWithLimitation() Adds a INNER JOIN clause and with to the query using the Limitation relation
 *
 * @method     ChildPropertyQuery leftJoinPicture($relationAlias = null) Adds a LEFT JOIN clause to the query using the Picture relation
 * @method     ChildPropertyQuery rightJoinPicture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Picture relation
 * @method     ChildPropertyQuery innerJoinPicture($relationAlias = null) Adds a INNER JOIN clause to the query using the Picture relation
 *
 * @method     ChildPropertyQuery joinWithPicture($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Picture relation
 *
 * @method     ChildPropertyQuery leftJoinWithPicture() Adds a LEFT JOIN clause and with to the query using the Picture relation
 * @method     ChildPropertyQuery rightJoinWithPicture() Adds a RIGHT JOIN clause and with to the query using the Picture relation
 * @method     ChildPropertyQuery innerJoinWithPicture() Adds a INNER JOIN clause and with to the query using the Picture relation
 *
 * @method     ChildPropertyQuery leftJoinTenant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tenant relation
 * @method     ChildPropertyQuery rightJoinTenant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tenant relation
 * @method     ChildPropertyQuery innerJoinTenant($relationAlias = null) Adds a INNER JOIN clause to the query using the Tenant relation
 *
 * @method     ChildPropertyQuery joinWithTenant($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tenant relation
 *
 * @method     ChildPropertyQuery leftJoinWithTenant() Adds a LEFT JOIN clause and with to the query using the Tenant relation
 * @method     ChildPropertyQuery rightJoinWithTenant() Adds a RIGHT JOIN clause and with to the query using the Tenant relation
 * @method     ChildPropertyQuery innerJoinWithTenant() Adds a INNER JOIN clause and with to the query using the Tenant relation
 *
 * @method     ChildPropertyQuery leftJoinUtility($relationAlias = null) Adds a LEFT JOIN clause to the query using the Utility relation
 * @method     ChildPropertyQuery rightJoinUtility($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Utility relation
 * @method     ChildPropertyQuery innerJoinUtility($relationAlias = null) Adds a INNER JOIN clause to the query using the Utility relation
 *
 * @method     ChildPropertyQuery joinWithUtility($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Utility relation
 *
 * @method     ChildPropertyQuery leftJoinWithUtility() Adds a LEFT JOIN clause and with to the query using the Utility relation
 * @method     ChildPropertyQuery rightJoinWithUtility() Adds a RIGHT JOIN clause and with to the query using the Utility relation
 * @method     ChildPropertyQuery innerJoinWithUtility() Adds a INNER JOIN clause and with to the query using the Utility relation
 *
 * @method     \AddressQuery|\UserQuery|\AmenityQuery|\ApplianceQuery|\CostQuery|\IssueQuery|\LimitationQuery|\PictureQuery|\TenantQuery|\UtilityQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProperty findOne(ConnectionInterface $con = null) Return the first ChildProperty matching the query
 * @method     ChildProperty findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProperty matching the query, or a new ChildProperty object populated from the query conditions when no match is found
 *
 * @method     ChildProperty findOneById(int $ID) Return the first ChildProperty filtered by the ID column
 * @method     ChildProperty findOneByTimestamp(string $Timestamp) Return the first ChildProperty filtered by the Timestamp column
 * @method     ChildProperty findOneByLandlordid(int $LandlordID) Return the first ChildProperty filtered by the LandlordID column
 * @method     ChildProperty findOneByAddressid(int $AddressID) Return the first ChildProperty filtered by the AddressID column
 * @method     ChildProperty findOneByFpl(int $FPL) Return the first ChildProperty filtered by the FPL column
 * @method     ChildProperty findOneBySquarefootage(int $SquareFootage) Return the first ChildProperty filtered by the SquareFootage column
 * @method     ChildProperty findOneByRooms(int $Rooms) Return the first ChildProperty filtered by the Rooms column
 * @method     ChildProperty findOneByBathrooms(int $Bathrooms) Return the first ChildProperty filtered by the Bathrooms column
 * @method     ChildProperty findOneByDetails(string $Details) Return the first ChildProperty filtered by the Details column *

 * @method     ChildProperty requirePk($key, ConnectionInterface $con = null) Return the ChildProperty by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOne(ConnectionInterface $con = null) Return the first ChildProperty matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProperty requireOneById(int $ID) Return the first ChildProperty filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByTimestamp(string $Timestamp) Return the first ChildProperty filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByLandlordid(int $LandlordID) Return the first ChildProperty filtered by the LandlordID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByAddressid(int $AddressID) Return the first ChildProperty filtered by the AddressID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByFpl(int $FPL) Return the first ChildProperty filtered by the FPL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneBySquarefootage(int $SquareFootage) Return the first ChildProperty filtered by the SquareFootage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByRooms(int $Rooms) Return the first ChildProperty filtered by the Rooms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByBathrooms(int $Bathrooms) Return the first ChildProperty filtered by the Bathrooms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProperty requireOneByDetails(string $Details) Return the first ChildProperty filtered by the Details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProperty[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProperty objects based on current ModelCriteria
 * @method     ChildProperty[]|ObjectCollection findById(int $ID) Return ChildProperty objects filtered by the ID column
 * @method     ChildProperty[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildProperty objects filtered by the Timestamp column
 * @method     ChildProperty[]|ObjectCollection findByLandlordid(int $LandlordID) Return ChildProperty objects filtered by the LandlordID column
 * @method     ChildProperty[]|ObjectCollection findByAddressid(int $AddressID) Return ChildProperty objects filtered by the AddressID column
 * @method     ChildProperty[]|ObjectCollection findByFpl(int $FPL) Return ChildProperty objects filtered by the FPL column
 * @method     ChildProperty[]|ObjectCollection findBySquarefootage(int $SquareFootage) Return ChildProperty objects filtered by the SquareFootage column
 * @method     ChildProperty[]|ObjectCollection findByRooms(int $Rooms) Return ChildProperty objects filtered by the Rooms column
 * @method     ChildProperty[]|ObjectCollection findByBathrooms(int $Bathrooms) Return ChildProperty objects filtered by the Bathrooms column
 * @method     ChildProperty[]|ObjectCollection findByDetails(string $Details) Return ChildProperty objects filtered by the Details column
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
        $sql = 'SELECT ID, Timestamp, LandlordID, AddressID, FPL, SquareFootage, Rooms, Bathrooms, Details FROM property WHERE ID = :p0';
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the LandlordID column
     *
     * Example usage:
     * <code>
     * $query->filterByLandlordid(1234); // WHERE LandlordID = 1234
     * $query->filterByLandlordid(array(12, 34)); // WHERE LandlordID IN (12, 34)
     * $query->filterByLandlordid(array('min' => 12)); // WHERE LandlordID > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $landlordid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByLandlordid($landlordid = null, $comparison = null)
    {
        if (is_array($landlordid)) {
            $useMinMax = false;
            if (isset($landlordid['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_LANDLORDID, $landlordid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($landlordid['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_LANDLORDID, $landlordid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_LANDLORDID, $landlordid, $comparison);
    }

    /**
     * Filter the query on the AddressID column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressid(1234); // WHERE AddressID = 1234
     * $query->filterByAddressid(array(12, 34)); // WHERE AddressID IN (12, 34)
     * $query->filterByAddressid(array('min' => 12)); // WHERE AddressID > 12
     * </code>
     *
     * @see       filterByAddress()
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
     * Filter the query on the FPL column
     *
     * Example usage:
     * <code>
     * $query->filterByFpl(1234); // WHERE FPL = 1234
     * $query->filterByFpl(array(12, 34)); // WHERE FPL IN (12, 34)
     * $query->filterByFpl(array('min' => 12)); // WHERE FPL > 12
     * </code>
     *
     * @param     mixed $fpl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByFpl($fpl = null, $comparison = null)
    {
        if (is_array($fpl)) {
            $useMinMax = false;
            if (isset($fpl['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_FPL, $fpl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fpl['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_FPL, $fpl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_FPL, $fpl, $comparison);
    }

    /**
     * Filter the query on the SquareFootage column
     *
     * Example usage:
     * <code>
     * $query->filterBySquarefootage(1234); // WHERE SquareFootage = 1234
     * $query->filterBySquarefootage(array(12, 34)); // WHERE SquareFootage IN (12, 34)
     * $query->filterBySquarefootage(array('min' => 12)); // WHERE SquareFootage > 12
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
     * Filter the query on the Rooms column
     *
     * Example usage:
     * <code>
     * $query->filterByRooms(1234); // WHERE Rooms = 1234
     * $query->filterByRooms(array(12, 34)); // WHERE Rooms IN (12, 34)
     * $query->filterByRooms(array('min' => 12)); // WHERE Rooms > 12
     * </code>
     *
     * @param     mixed $rooms The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByRooms($rooms = null, $comparison = null)
    {
        if (is_array($rooms)) {
            $useMinMax = false;
            if (isset($rooms['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ROOMS, $rooms['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rooms['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_ROOMS, $rooms['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_ROOMS, $rooms, $comparison);
    }

    /**
     * Filter the query on the Bathrooms column
     *
     * Example usage:
     * <code>
     * $query->filterByBathrooms(1234); // WHERE Bathrooms = 1234
     * $query->filterByBathrooms(array(12, 34)); // WHERE Bathrooms IN (12, 34)
     * $query->filterByBathrooms(array('min' => 12)); // WHERE Bathrooms > 12
     * </code>
     *
     * @param     mixed $bathrooms The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByBathrooms($bathrooms = null, $comparison = null)
    {
        if (is_array($bathrooms)) {
            $useMinMax = false;
            if (isset($bathrooms['min'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BATHROOMS, $bathrooms['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bathrooms['max'])) {
                $this->addUsingAlias(PropertyTableMap::COL_BATHROOMS, $bathrooms['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PropertyTableMap::COL_BATHROOMS, $bathrooms, $comparison);
    }

    /**
     * Filter the query on the Details column
     *
     * Example usage:
     * <code>
     * $query->filterByDetails('fooValue');   // WHERE Details = 'fooValue'
     * $query->filterByDetails('%fooValue%', Criteria::LIKE); // WHERE Details LIKE '%fooValue%'
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
     * Filter the query by a related \Address object
     *
     * @param \Address|ObjectCollection $address The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAddress($address, $comparison = null)
    {
        if ($address instanceof \Address) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ADDRESSID, $address->getId(), $comparison);
        } elseif ($address instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PropertyTableMap::COL_ADDRESSID, $address->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAddress() only accepts arguments of type \Address or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Address relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Address');

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
            $this->addJoinObject($join, 'Address');
        }

        return $this;
    }

    /**
     * Use the Address relation Address object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AddressQuery A secondary query class using the current class as primary query
     */
    public function useAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Address', '\AddressQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_LANDLORDID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PropertyTableMap::COL_LANDLORDID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPropertyQuery The current query, for fluid interface
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
     * Filter the query by a related \Amenity object
     *
     * @param \Amenity|ObjectCollection $amenity the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAmenity($amenity, $comparison = null)
    {
        if ($amenity instanceof \Amenity) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $amenity->getPropertyid(), $comparison);
        } elseif ($amenity instanceof ObjectCollection) {
            return $this
                ->useAmenityQuery()
                ->filterByPrimaryKeys($amenity->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAmenity() only accepts arguments of type \Amenity or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Amenity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinAmenity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Amenity');

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
            $this->addJoinObject($join, 'Amenity');
        }

        return $this;
    }

    /**
     * Use the Amenity relation Amenity object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AmenityQuery A secondary query class using the current class as primary query
     */
    public function useAmenityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAmenity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Amenity', '\AmenityQuery');
    }

    /**
     * Filter the query by a related \Appliance object
     *
     * @param \Appliance|ObjectCollection $appliance the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByAppliance($appliance, $comparison = null)
    {
        if ($appliance instanceof \Appliance) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $appliance->getPropertyid(), $comparison);
        } elseif ($appliance instanceof ObjectCollection) {
            return $this
                ->useApplianceQuery()
                ->filterByPrimaryKeys($appliance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAppliance() only accepts arguments of type \Appliance or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Appliance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinAppliance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Appliance');

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
            $this->addJoinObject($join, 'Appliance');
        }

        return $this;
    }

    /**
     * Use the Appliance relation Appliance object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ApplianceQuery A secondary query class using the current class as primary query
     */
    public function useApplianceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAppliance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Appliance', '\ApplianceQuery');
    }

    /**
     * Filter the query by a related \Cost object
     *
     * @param \Cost|ObjectCollection $cost the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByCost($cost, $comparison = null)
    {
        if ($cost instanceof \Cost) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $cost->getPropertyid(), $comparison);
        } elseif ($cost instanceof ObjectCollection) {
            return $this
                ->useCostQuery()
                ->filterByPrimaryKeys($cost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCost() only accepts arguments of type \Cost or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinCost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cost');

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
            $this->addJoinObject($join, 'Cost');
        }

        return $this;
    }

    /**
     * Use the Cost relation Cost object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CostQuery A secondary query class using the current class as primary query
     */
    public function useCostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cost', '\CostQuery');
    }

    /**
     * Filter the query by a related \Issue object
     *
     * @param \Issue|ObjectCollection $issue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByIssue($issue, $comparison = null)
    {
        if ($issue instanceof \Issue) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $issue->getPropertyid(), $comparison);
        } elseif ($issue instanceof ObjectCollection) {
            return $this
                ->useIssueQuery()
                ->filterByPrimaryKeys($issue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByIssue() only accepts arguments of type \Issue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Issue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinIssue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Issue');

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
            $this->addJoinObject($join, 'Issue');
        }

        return $this;
    }

    /**
     * Use the Issue relation Issue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \IssueQuery A secondary query class using the current class as primary query
     */
    public function useIssueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinIssue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Issue', '\IssueQuery');
    }

    /**
     * Filter the query by a related \Limitation object
     *
     * @param \Limitation|ObjectCollection $limitation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByLimitation($limitation, $comparison = null)
    {
        if ($limitation instanceof \Limitation) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $limitation->getPropertyid(), $comparison);
        } elseif ($limitation instanceof ObjectCollection) {
            return $this
                ->useLimitationQuery()
                ->filterByPrimaryKeys($limitation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLimitation() only accepts arguments of type \Limitation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Limitation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinLimitation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Limitation');

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
            $this->addJoinObject($join, 'Limitation');
        }

        return $this;
    }

    /**
     * Use the Limitation relation Limitation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LimitationQuery A secondary query class using the current class as primary query
     */
    public function useLimitationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLimitation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Limitation', '\LimitationQuery');
    }

    /**
     * Filter the query by a related \Picture object
     *
     * @param \Picture|ObjectCollection $picture the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByPicture($picture, $comparison = null)
    {
        if ($picture instanceof \Picture) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $picture->getPropertyid(), $comparison);
        } elseif ($picture instanceof ObjectCollection) {
            return $this
                ->usePictureQuery()
                ->filterByPrimaryKeys($picture->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPicture() only accepts arguments of type \Picture or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Picture relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinPicture($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Picture');

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
            $this->addJoinObject($join, 'Picture');
        }

        return $this;
    }

    /**
     * Use the Picture relation Picture object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PictureQuery A secondary query class using the current class as primary query
     */
    public function usePictureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPicture($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Picture', '\PictureQuery');
    }

    /**
     * Filter the query by a related \Tenant object
     *
     * @param \Tenant|ObjectCollection $tenant the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByTenant($tenant, $comparison = null)
    {
        if ($tenant instanceof \Tenant) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $tenant->getPropertyid(), $comparison);
        } elseif ($tenant instanceof ObjectCollection) {
            return $this
                ->useTenantQuery()
                ->filterByPrimaryKeys($tenant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTenant() only accepts arguments of type \Tenant or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tenant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinTenant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tenant');

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
            $this->addJoinObject($join, 'Tenant');
        }

        return $this;
    }

    /**
     * Use the Tenant relation Tenant object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TenantQuery A secondary query class using the current class as primary query
     */
    public function useTenantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTenant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tenant', '\TenantQuery');
    }

    /**
     * Filter the query by a related \Utility object
     *
     * @param \Utility|ObjectCollection $utility the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPropertyQuery The current query, for fluid interface
     */
    public function filterByUtility($utility, $comparison = null)
    {
        if ($utility instanceof \Utility) {
            return $this
                ->addUsingAlias(PropertyTableMap::COL_ID, $utility->getPropertyid(), $comparison);
        } elseif ($utility instanceof ObjectCollection) {
            return $this
                ->useUtilityQuery()
                ->filterByPrimaryKeys($utility->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUtility() only accepts arguments of type \Utility or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Utility relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPropertyQuery The current query, for fluid interface
     */
    public function joinUtility($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Utility');

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
            $this->addJoinObject($join, 'Utility');
        }

        return $this;
    }

    /**
     * Use the Utility relation Utility object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UtilityQuery A secondary query class using the current class as primary query
     */
    public function useUtilityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUtility($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Utility', '\UtilityQuery');
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
