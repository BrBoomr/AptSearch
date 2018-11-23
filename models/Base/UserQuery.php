<?php

namespace Base;

use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user' table.
 *
 *
 *
 * @method     ChildUserQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildUserQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildUserQuery orderByFirstname($order = Criteria::ASC) Order by the FirstName column
 * @method     ChildUserQuery orderByMiddlename($order = Criteria::ASC) Order by the MiddleName column
 * @method     ChildUserQuery orderByLastname($order = Criteria::ASC) Order by the LastName column
 * @method     ChildUserQuery orderByHashedpassword($order = Criteria::ASC) Order by the HashedPassword column
 *
 * @method     ChildUserQuery groupById() Group by the ID column
 * @method     ChildUserQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildUserQuery groupByFirstname() Group by the FirstName column
 * @method     ChildUserQuery groupByMiddlename() Group by the MiddleName column
 * @method     ChildUserQuery groupByLastname() Group by the LastName column
 * @method     ChildUserQuery groupByHashedpassword() Group by the HashedPassword column
 *
 * @method     ChildUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserQuery leftJoinEmail($relationAlias = null) Adds a LEFT JOIN clause to the query using the Email relation
 * @method     ChildUserQuery rightJoinEmail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Email relation
 * @method     ChildUserQuery innerJoinEmail($relationAlias = null) Adds a INNER JOIN clause to the query using the Email relation
 *
 * @method     ChildUserQuery joinWithEmail($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Email relation
 *
 * @method     ChildUserQuery leftJoinWithEmail() Adds a LEFT JOIN clause and with to the query using the Email relation
 * @method     ChildUserQuery rightJoinWithEmail() Adds a RIGHT JOIN clause and with to the query using the Email relation
 * @method     ChildUserQuery innerJoinWithEmail() Adds a INNER JOIN clause and with to the query using the Email relation
 *
 * @method     ChildUserQuery leftJoinLives($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lives relation
 * @method     ChildUserQuery rightJoinLives($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lives relation
 * @method     ChildUserQuery innerJoinLives($relationAlias = null) Adds a INNER JOIN clause to the query using the Lives relation
 *
 * @method     ChildUserQuery joinWithLives($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Lives relation
 *
 * @method     ChildUserQuery leftJoinWithLives() Adds a LEFT JOIN clause and with to the query using the Lives relation
 * @method     ChildUserQuery rightJoinWithLives() Adds a RIGHT JOIN clause and with to the query using the Lives relation
 * @method     ChildUserQuery innerJoinWithLives() Adds a INNER JOIN clause and with to the query using the Lives relation
 *
 * @method     ChildUserQuery leftJoinOwedRelatedByReceiverid($relationAlias = null) Adds a LEFT JOIN clause to the query using the OwedRelatedByReceiverid relation
 * @method     ChildUserQuery rightJoinOwedRelatedByReceiverid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OwedRelatedByReceiverid relation
 * @method     ChildUserQuery innerJoinOwedRelatedByReceiverid($relationAlias = null) Adds a INNER JOIN clause to the query using the OwedRelatedByReceiverid relation
 *
 * @method     ChildUserQuery joinWithOwedRelatedByReceiverid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OwedRelatedByReceiverid relation
 *
 * @method     ChildUserQuery leftJoinWithOwedRelatedByReceiverid() Adds a LEFT JOIN clause and with to the query using the OwedRelatedByReceiverid relation
 * @method     ChildUserQuery rightJoinWithOwedRelatedByReceiverid() Adds a RIGHT JOIN clause and with to the query using the OwedRelatedByReceiverid relation
 * @method     ChildUserQuery innerJoinWithOwedRelatedByReceiverid() Adds a INNER JOIN clause and with to the query using the OwedRelatedByReceiverid relation
 *
 * @method     ChildUserQuery leftJoinOwedRelatedBySenderid($relationAlias = null) Adds a LEFT JOIN clause to the query using the OwedRelatedBySenderid relation
 * @method     ChildUserQuery rightJoinOwedRelatedBySenderid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OwedRelatedBySenderid relation
 * @method     ChildUserQuery innerJoinOwedRelatedBySenderid($relationAlias = null) Adds a INNER JOIN clause to the query using the OwedRelatedBySenderid relation
 *
 * @method     ChildUserQuery joinWithOwedRelatedBySenderid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OwedRelatedBySenderid relation
 *
 * @method     ChildUserQuery leftJoinWithOwedRelatedBySenderid() Adds a LEFT JOIN clause and with to the query using the OwedRelatedBySenderid relation
 * @method     ChildUserQuery rightJoinWithOwedRelatedBySenderid() Adds a RIGHT JOIN clause and with to the query using the OwedRelatedBySenderid relation
 * @method     ChildUserQuery innerJoinWithOwedRelatedBySenderid() Adds a INNER JOIN clause and with to the query using the OwedRelatedBySenderid relation
 *
 * @method     ChildUserQuery leftJoinPaymentRelatedByReceiverid($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentRelatedByReceiverid relation
 * @method     ChildUserQuery rightJoinPaymentRelatedByReceiverid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentRelatedByReceiverid relation
 * @method     ChildUserQuery innerJoinPaymentRelatedByReceiverid($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentRelatedByReceiverid relation
 *
 * @method     ChildUserQuery joinWithPaymentRelatedByReceiverid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PaymentRelatedByReceiverid relation
 *
 * @method     ChildUserQuery leftJoinWithPaymentRelatedByReceiverid() Adds a LEFT JOIN clause and with to the query using the PaymentRelatedByReceiverid relation
 * @method     ChildUserQuery rightJoinWithPaymentRelatedByReceiverid() Adds a RIGHT JOIN clause and with to the query using the PaymentRelatedByReceiverid relation
 * @method     ChildUserQuery innerJoinWithPaymentRelatedByReceiverid() Adds a INNER JOIN clause and with to the query using the PaymentRelatedByReceiverid relation
 *
 * @method     ChildUserQuery leftJoinPaymentRelatedBySenderid($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentRelatedBySenderid relation
 * @method     ChildUserQuery rightJoinPaymentRelatedBySenderid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentRelatedBySenderid relation
 * @method     ChildUserQuery innerJoinPaymentRelatedBySenderid($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentRelatedBySenderid relation
 *
 * @method     ChildUserQuery joinWithPaymentRelatedBySenderid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PaymentRelatedBySenderid relation
 *
 * @method     ChildUserQuery leftJoinWithPaymentRelatedBySenderid() Adds a LEFT JOIN clause and with to the query using the PaymentRelatedBySenderid relation
 * @method     ChildUserQuery rightJoinWithPaymentRelatedBySenderid() Adds a RIGHT JOIN clause and with to the query using the PaymentRelatedBySenderid relation
 * @method     ChildUserQuery innerJoinWithPaymentRelatedBySenderid() Adds a INNER JOIN clause and with to the query using the PaymentRelatedBySenderid relation
 *
 * @method     ChildUserQuery leftJoinPhone($relationAlias = null) Adds a LEFT JOIN clause to the query using the Phone relation
 * @method     ChildUserQuery rightJoinPhone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Phone relation
 * @method     ChildUserQuery innerJoinPhone($relationAlias = null) Adds a INNER JOIN clause to the query using the Phone relation
 *
 * @method     ChildUserQuery joinWithPhone($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Phone relation
 *
 * @method     ChildUserQuery leftJoinWithPhone() Adds a LEFT JOIN clause and with to the query using the Phone relation
 * @method     ChildUserQuery rightJoinWithPhone() Adds a RIGHT JOIN clause and with to the query using the Phone relation
 * @method     ChildUserQuery innerJoinWithPhone() Adds a INNER JOIN clause and with to the query using the Phone relation
 *
 * @method     ChildUserQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildUserQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildUserQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildUserQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildUserQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildUserQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildUserQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     ChildUserQuery leftJoinTenant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tenant relation
 * @method     ChildUserQuery rightJoinTenant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tenant relation
 * @method     ChildUserQuery innerJoinTenant($relationAlias = null) Adds a INNER JOIN clause to the query using the Tenant relation
 *
 * @method     ChildUserQuery joinWithTenant($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tenant relation
 *
 * @method     ChildUserQuery leftJoinWithTenant() Adds a LEFT JOIN clause and with to the query using the Tenant relation
 * @method     ChildUserQuery rightJoinWithTenant() Adds a RIGHT JOIN clause and with to the query using the Tenant relation
 * @method     ChildUserQuery innerJoinWithTenant() Adds a INNER JOIN clause and with to the query using the Tenant relation
 *
 * @method     \EmailQuery|\LivesQuery|\OwedQuery|\PaymentQuery|\PhoneQuery|\PropertyQuery|\TenantQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUser findOne(ConnectionInterface $con = null) Return the first ChildUser matching the query
 * @method     ChildUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUser matching the query, or a new ChildUser object populated from the query conditions when no match is found
 *
 * @method     ChildUser findOneById(int $ID) Return the first ChildUser filtered by the ID column
 * @method     ChildUser findOneByTimestamp(string $Timestamp) Return the first ChildUser filtered by the Timestamp column
 * @method     ChildUser findOneByFirstname(string $FirstName) Return the first ChildUser filtered by the FirstName column
 * @method     ChildUser findOneByMiddlename(string $MiddleName) Return the first ChildUser filtered by the MiddleName column
 * @method     ChildUser findOneByLastname(string $LastName) Return the first ChildUser filtered by the LastName column
 * @method     ChildUser findOneByHashedpassword(string $HashedPassword) Return the first ChildUser filtered by the HashedPassword column *

 * @method     ChildUser requirePk($key, ConnectionInterface $con = null) Return the ChildUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOne(ConnectionInterface $con = null) Return the first ChildUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser requireOneById(int $ID) Return the first ChildUser filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByTimestamp(string $Timestamp) Return the first ChildUser filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByFirstname(string $FirstName) Return the first ChildUser filtered by the FirstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByMiddlename(string $MiddleName) Return the first ChildUser filtered by the MiddleName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByLastname(string $LastName) Return the first ChildUser filtered by the LastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByHashedpassword(string $HashedPassword) Return the first ChildUser filtered by the HashedPassword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUser objects based on current ModelCriteria
 * @method     ChildUser[]|ObjectCollection findById(int $ID) Return ChildUser objects filtered by the ID column
 * @method     ChildUser[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildUser objects filtered by the Timestamp column
 * @method     ChildUser[]|ObjectCollection findByFirstname(string $FirstName) Return ChildUser objects filtered by the FirstName column
 * @method     ChildUser[]|ObjectCollection findByMiddlename(string $MiddleName) Return ChildUser objects filtered by the MiddleName column
 * @method     ChildUser[]|ObjectCollection findByLastname(string $LastName) Return ChildUser objects filtered by the LastName column
 * @method     ChildUser[]|ObjectCollection findByHashedpassword(string $HashedPassword) Return ChildUser objects filtered by the HashedPassword column
 * @method     ChildUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserQuery) {
            return $criteria;
        }
        $query = new ChildUserQuery();
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, FirstName, MiddleName, LastName, HashedPassword FROM user WHERE ID = :p0';
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
            /** @var ChildUser $obj */
            $obj = new ChildUser();
            $obj->hydrate($row);
            UserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(UserTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(UserTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the FirstName column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE FirstName = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE FirstName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the MiddleName column
     *
     * Example usage:
     * <code>
     * $query->filterByMiddlename('fooValue');   // WHERE MiddleName = 'fooValue'
     * $query->filterByMiddlename('%fooValue%', Criteria::LIKE); // WHERE MiddleName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $middlename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByMiddlename($middlename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($middlename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_MIDDLENAME, $middlename, $comparison);
    }

    /**
     * Filter the query on the LastName column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE LastName = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE LastName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the HashedPassword column
     *
     * Example usage:
     * <code>
     * $query->filterByHashedpassword('fooValue');   // WHERE HashedPassword = 'fooValue'
     * $query->filterByHashedpassword('%fooValue%', Criteria::LIKE); // WHERE HashedPassword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hashedpassword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByHashedpassword($hashedpassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hashedpassword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_HASHEDPASSWORD, $hashedpassword, $comparison);
    }

    /**
     * Filter the query by a related \Email object
     *
     * @param \Email|ObjectCollection $email the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByEmail($email, $comparison = null)
    {
        if ($email instanceof \Email) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $email->getUserid(), $comparison);
        } elseif ($email instanceof ObjectCollection) {
            return $this
                ->useEmailQuery()
                ->filterByPrimaryKeys($email->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEmail() only accepts arguments of type \Email or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Email relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinEmail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Email');

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
            $this->addJoinObject($join, 'Email');
        }

        return $this;
    }

    /**
     * Use the Email relation Email object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EmailQuery A secondary query class using the current class as primary query
     */
    public function useEmailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmail($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Email', '\EmailQuery');
    }

    /**
     * Filter the query by a related \Lives object
     *
     * @param \Lives|ObjectCollection $lives the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByLives($lives, $comparison = null)
    {
        if ($lives instanceof \Lives) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $lives->getUserid(), $comparison);
        } elseif ($lives instanceof ObjectCollection) {
            return $this
                ->useLivesQuery()
                ->filterByPrimaryKeys($lives->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLives() only accepts arguments of type \Lives or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Lives relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinLives($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Lives');

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
            $this->addJoinObject($join, 'Lives');
        }

        return $this;
    }

    /**
     * Use the Lives relation Lives object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LivesQuery A secondary query class using the current class as primary query
     */
    public function useLivesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLives($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Lives', '\LivesQuery');
    }

    /**
     * Filter the query by a related \Owed object
     *
     * @param \Owed|ObjectCollection $owed the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByOwedRelatedByReceiverid($owed, $comparison = null)
    {
        if ($owed instanceof \Owed) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $owed->getReceiverid(), $comparison);
        } elseif ($owed instanceof ObjectCollection) {
            return $this
                ->useOwedRelatedByReceiveridQuery()
                ->filterByPrimaryKeys($owed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOwedRelatedByReceiverid() only accepts arguments of type \Owed or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OwedRelatedByReceiverid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinOwedRelatedByReceiverid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OwedRelatedByReceiverid');

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
            $this->addJoinObject($join, 'OwedRelatedByReceiverid');
        }

        return $this;
    }

    /**
     * Use the OwedRelatedByReceiverid relation Owed object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OwedQuery A secondary query class using the current class as primary query
     */
    public function useOwedRelatedByReceiveridQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOwedRelatedByReceiverid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OwedRelatedByReceiverid', '\OwedQuery');
    }

    /**
     * Filter the query by a related \Owed object
     *
     * @param \Owed|ObjectCollection $owed the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByOwedRelatedBySenderid($owed, $comparison = null)
    {
        if ($owed instanceof \Owed) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $owed->getSenderid(), $comparison);
        } elseif ($owed instanceof ObjectCollection) {
            return $this
                ->useOwedRelatedBySenderidQuery()
                ->filterByPrimaryKeys($owed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOwedRelatedBySenderid() only accepts arguments of type \Owed or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OwedRelatedBySenderid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinOwedRelatedBySenderid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OwedRelatedBySenderid');

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
            $this->addJoinObject($join, 'OwedRelatedBySenderid');
        }

        return $this;
    }

    /**
     * Use the OwedRelatedBySenderid relation Owed object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OwedQuery A secondary query class using the current class as primary query
     */
    public function useOwedRelatedBySenderidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOwedRelatedBySenderid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OwedRelatedBySenderid', '\OwedQuery');
    }

    /**
     * Filter the query by a related \Payment object
     *
     * @param \Payment|ObjectCollection $payment the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByPaymentRelatedByReceiverid($payment, $comparison = null)
    {
        if ($payment instanceof \Payment) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $payment->getReceiverid(), $comparison);
        } elseif ($payment instanceof ObjectCollection) {
            return $this
                ->usePaymentRelatedByReceiveridQuery()
                ->filterByPrimaryKeys($payment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentRelatedByReceiverid() only accepts arguments of type \Payment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentRelatedByReceiverid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinPaymentRelatedByReceiverid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentRelatedByReceiverid');

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
            $this->addJoinObject($join, 'PaymentRelatedByReceiverid');
        }

        return $this;
    }

    /**
     * Use the PaymentRelatedByReceiverid relation Payment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentRelatedByReceiveridQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentRelatedByReceiverid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentRelatedByReceiverid', '\PaymentQuery');
    }

    /**
     * Filter the query by a related \Payment object
     *
     * @param \Payment|ObjectCollection $payment the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByPaymentRelatedBySenderid($payment, $comparison = null)
    {
        if ($payment instanceof \Payment) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $payment->getSenderid(), $comparison);
        } elseif ($payment instanceof ObjectCollection) {
            return $this
                ->usePaymentRelatedBySenderidQuery()
                ->filterByPrimaryKeys($payment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentRelatedBySenderid() only accepts arguments of type \Payment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentRelatedBySenderid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinPaymentRelatedBySenderid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentRelatedBySenderid');

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
            $this->addJoinObject($join, 'PaymentRelatedBySenderid');
        }

        return $this;
    }

    /**
     * Use the PaymentRelatedBySenderid relation Payment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentRelatedBySenderidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentRelatedBySenderid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentRelatedBySenderid', '\PaymentQuery');
    }

    /**
     * Filter the query by a related \Phone object
     *
     * @param \Phone|ObjectCollection $phone the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByPhone($phone, $comparison = null)
    {
        if ($phone instanceof \Phone) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $phone->getUserid(), $comparison);
        } elseif ($phone instanceof ObjectCollection) {
            return $this
                ->usePhoneQuery()
                ->filterByPrimaryKeys($phone->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPhone() only accepts arguments of type \Phone or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Phone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinPhone($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Phone');

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
            $this->addJoinObject($join, 'Phone');
        }

        return $this;
    }

    /**
     * Use the Phone relation Phone object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PhoneQuery A secondary query class using the current class as primary query
     */
    public function usePhoneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Phone', '\PhoneQuery');
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $property->getLandlordid(), $comparison);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
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
     * Filter the query by a related \Tenant object
     *
     * @param \Tenant|ObjectCollection $tenant the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByTenant($tenant, $comparison = null)
    {
        if ($tenant instanceof \Tenant) {
            return $this
                ->addUsingAlias(UserTableMap::COL_ID, $tenant->getUserid(), $comparison);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildUser $user Object to remove from the list of results
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserTableMap::COL_ID, $user->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserTableMap::clearInstancePool();
            UserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserQuery
