<?php

namespace Base;

use \Owed as ChildOwed;
use \OwedQuery as ChildOwedQuery;
use \Exception;
use \PDO;
use Map\OwedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'owed' table.
 *
 *
 *
 * @method     ChildOwedQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildOwedQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildOwedQuery orderBySenderid($order = Criteria::ASC) Order by the SenderID column
 * @method     ChildOwedQuery orderByReceiverid($order = Criteria::ASC) Order by the ReceiverID column
 * @method     ChildOwedQuery orderByAmount($order = Criteria::ASC) Order by the Amount column
 * @method     ChildOwedQuery orderByDatedue($order = Criteria::ASC) Order by the DateDue column
 * @method     ChildOwedQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildOwedQuery orderByDetails($order = Criteria::ASC) Order by the Details column
 * @method     ChildOwedQuery orderByPaymentid($order = Criteria::ASC) Order by the PaymentID column
 *
 * @method     ChildOwedQuery groupById() Group by the ID column
 * @method     ChildOwedQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildOwedQuery groupBySenderid() Group by the SenderID column
 * @method     ChildOwedQuery groupByReceiverid() Group by the ReceiverID column
 * @method     ChildOwedQuery groupByAmount() Group by the Amount column
 * @method     ChildOwedQuery groupByDatedue() Group by the DateDue column
 * @method     ChildOwedQuery groupByName() Group by the Name column
 * @method     ChildOwedQuery groupByDetails() Group by the Details column
 * @method     ChildOwedQuery groupByPaymentid() Group by the PaymentID column
 *
 * @method     ChildOwedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOwedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOwedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOwedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOwedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOwedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOwedQuery leftJoinPaymentRelatedByPaymentid($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentRelatedByPaymentid relation
 * @method     ChildOwedQuery rightJoinPaymentRelatedByPaymentid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentRelatedByPaymentid relation
 * @method     ChildOwedQuery innerJoinPaymentRelatedByPaymentid($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentRelatedByPaymentid relation
 *
 * @method     ChildOwedQuery joinWithPaymentRelatedByPaymentid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PaymentRelatedByPaymentid relation
 *
 * @method     ChildOwedQuery leftJoinWithPaymentRelatedByPaymentid() Adds a LEFT JOIN clause and with to the query using the PaymentRelatedByPaymentid relation
 * @method     ChildOwedQuery rightJoinWithPaymentRelatedByPaymentid() Adds a RIGHT JOIN clause and with to the query using the PaymentRelatedByPaymentid relation
 * @method     ChildOwedQuery innerJoinWithPaymentRelatedByPaymentid() Adds a INNER JOIN clause and with to the query using the PaymentRelatedByPaymentid relation
 *
 * @method     ChildOwedQuery leftJoinUserRelatedByReceiverid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByReceiverid relation
 * @method     ChildOwedQuery rightJoinUserRelatedByReceiverid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByReceiverid relation
 * @method     ChildOwedQuery innerJoinUserRelatedByReceiverid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildOwedQuery joinWithUserRelatedByReceiverid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildOwedQuery leftJoinWithUserRelatedByReceiverid() Adds a LEFT JOIN clause and with to the query using the UserRelatedByReceiverid relation
 * @method     ChildOwedQuery rightJoinWithUserRelatedByReceiverid() Adds a RIGHT JOIN clause and with to the query using the UserRelatedByReceiverid relation
 * @method     ChildOwedQuery innerJoinWithUserRelatedByReceiverid() Adds a INNER JOIN clause and with to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildOwedQuery leftJoinUserRelatedBySenderid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedBySenderid relation
 * @method     ChildOwedQuery rightJoinUserRelatedBySenderid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedBySenderid relation
 * @method     ChildOwedQuery innerJoinUserRelatedBySenderid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildOwedQuery joinWithUserRelatedBySenderid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildOwedQuery leftJoinWithUserRelatedBySenderid() Adds a LEFT JOIN clause and with to the query using the UserRelatedBySenderid relation
 * @method     ChildOwedQuery rightJoinWithUserRelatedBySenderid() Adds a RIGHT JOIN clause and with to the query using the UserRelatedBySenderid relation
 * @method     ChildOwedQuery innerJoinWithUserRelatedBySenderid() Adds a INNER JOIN clause and with to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildOwedQuery leftJoinPaymentRelatedByOwedid($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentRelatedByOwedid relation
 * @method     ChildOwedQuery rightJoinPaymentRelatedByOwedid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentRelatedByOwedid relation
 * @method     ChildOwedQuery innerJoinPaymentRelatedByOwedid($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentRelatedByOwedid relation
 *
 * @method     ChildOwedQuery joinWithPaymentRelatedByOwedid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PaymentRelatedByOwedid relation
 *
 * @method     ChildOwedQuery leftJoinWithPaymentRelatedByOwedid() Adds a LEFT JOIN clause and with to the query using the PaymentRelatedByOwedid relation
 * @method     ChildOwedQuery rightJoinWithPaymentRelatedByOwedid() Adds a RIGHT JOIN clause and with to the query using the PaymentRelatedByOwedid relation
 * @method     ChildOwedQuery innerJoinWithPaymentRelatedByOwedid() Adds a INNER JOIN clause and with to the query using the PaymentRelatedByOwedid relation
 *
 * @method     \PaymentQuery|\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOwed findOne(ConnectionInterface $con = null) Return the first ChildOwed matching the query
 * @method     ChildOwed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOwed matching the query, or a new ChildOwed object populated from the query conditions when no match is found
 *
 * @method     ChildOwed findOneById(int $ID) Return the first ChildOwed filtered by the ID column
 * @method     ChildOwed findOneByTimestamp(int $Timestamp) Return the first ChildOwed filtered by the Timestamp column
 * @method     ChildOwed findOneBySenderid(int $SenderID) Return the first ChildOwed filtered by the SenderID column
 * @method     ChildOwed findOneByReceiverid(int $ReceiverID) Return the first ChildOwed filtered by the ReceiverID column
 * @method     ChildOwed findOneByAmount(int $Amount) Return the first ChildOwed filtered by the Amount column
 * @method     ChildOwed findOneByDatedue(string $DateDue) Return the first ChildOwed filtered by the DateDue column
 * @method     ChildOwed findOneByName(string $Name) Return the first ChildOwed filtered by the Name column
 * @method     ChildOwed findOneByDetails(string $Details) Return the first ChildOwed filtered by the Details column
 * @method     ChildOwed findOneByPaymentid(int $PaymentID) Return the first ChildOwed filtered by the PaymentID column *

 * @method     ChildOwed requirePk($key, ConnectionInterface $con = null) Return the ChildOwed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOne(ConnectionInterface $con = null) Return the first ChildOwed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOwed requireOneById(int $ID) Return the first ChildOwed filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByTimestamp(int $Timestamp) Return the first ChildOwed filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneBySenderid(int $SenderID) Return the first ChildOwed filtered by the SenderID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByReceiverid(int $ReceiverID) Return the first ChildOwed filtered by the ReceiverID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByAmount(int $Amount) Return the first ChildOwed filtered by the Amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByDatedue(string $DateDue) Return the first ChildOwed filtered by the DateDue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByName(string $Name) Return the first ChildOwed filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByDetails(string $Details) Return the first ChildOwed filtered by the Details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOwed requireOneByPaymentid(int $PaymentID) Return the first ChildOwed filtered by the PaymentID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOwed[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOwed objects based on current ModelCriteria
 * @method     ChildOwed[]|ObjectCollection findById(int $ID) Return ChildOwed objects filtered by the ID column
 * @method     ChildOwed[]|ObjectCollection findByTimestamp(int $Timestamp) Return ChildOwed objects filtered by the Timestamp column
 * @method     ChildOwed[]|ObjectCollection findBySenderid(int $SenderID) Return ChildOwed objects filtered by the SenderID column
 * @method     ChildOwed[]|ObjectCollection findByReceiverid(int $ReceiverID) Return ChildOwed objects filtered by the ReceiverID column
 * @method     ChildOwed[]|ObjectCollection findByAmount(int $Amount) Return ChildOwed objects filtered by the Amount column
 * @method     ChildOwed[]|ObjectCollection findByDatedue(string $DateDue) Return ChildOwed objects filtered by the DateDue column
 * @method     ChildOwed[]|ObjectCollection findByName(string $Name) Return ChildOwed objects filtered by the Name column
 * @method     ChildOwed[]|ObjectCollection findByDetails(string $Details) Return ChildOwed objects filtered by the Details column
 * @method     ChildOwed[]|ObjectCollection findByPaymentid(int $PaymentID) Return ChildOwed objects filtered by the PaymentID column
 * @method     ChildOwed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OwedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OwedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Owed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOwedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOwedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOwedQuery) {
            return $criteria;
        }
        $query = new ChildOwedQuery();
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
     * @return ChildOwed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OwedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OwedTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOwed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, SenderID, ReceiverID, Amount, DateDue, Name, Details, PaymentID FROM owed WHERE ID = :p0';
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
            /** @var ChildOwed $obj */
            $obj = new ChildOwed();
            $obj->hydrate($row);
            OwedTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOwed|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OwedTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OwedTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp(1234); // WHERE Timestamp = 1234
     * $query->filterByTimestamp(array(12, 34)); // WHERE Timestamp IN (12, 34)
     * $query->filterByTimestamp(array('min' => 12)); // WHERE Timestamp > 12
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the SenderID column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderid(1234); // WHERE SenderID = 1234
     * $query->filterBySenderid(array(12, 34)); // WHERE SenderID IN (12, 34)
     * $query->filterBySenderid(array('min' => 12)); // WHERE SenderID > 12
     * </code>
     *
     * @see       filterByUserRelatedBySenderid()
     *
     * @param     mixed $senderid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterBySenderid($senderid = null, $comparison = null)
    {
        if (is_array($senderid)) {
            $useMinMax = false;
            if (isset($senderid['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_SENDERID, $senderid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderid['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_SENDERID, $senderid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_SENDERID, $senderid, $comparison);
    }

    /**
     * Filter the query on the ReceiverID column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiverid(1234); // WHERE ReceiverID = 1234
     * $query->filterByReceiverid(array(12, 34)); // WHERE ReceiverID IN (12, 34)
     * $query->filterByReceiverid(array('min' => 12)); // WHERE ReceiverID > 12
     * </code>
     *
     * @see       filterByUserRelatedByReceiverid()
     *
     * @param     mixed $receiverid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByReceiverid($receiverid = null, $comparison = null)
    {
        if (is_array($receiverid)) {
            $useMinMax = false;
            if (isset($receiverid['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_RECEIVERID, $receiverid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiverid['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_RECEIVERID, $receiverid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_RECEIVERID, $receiverid, $comparison);
    }

    /**
     * Filter the query on the Amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE Amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE Amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE Amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the DateDue column
     *
     * Example usage:
     * <code>
     * $query->filterByDatedue('2011-03-14'); // WHERE DateDue = '2011-03-14'
     * $query->filterByDatedue('now'); // WHERE DateDue = '2011-03-14'
     * $query->filterByDatedue(array('max' => 'yesterday')); // WHERE DateDue > '2011-03-13'
     * </code>
     *
     * @param     mixed $datedue The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByDatedue($datedue = null, $comparison = null)
    {
        if (is_array($datedue)) {
            $useMinMax = false;
            if (isset($datedue['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_DATEDUE, $datedue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datedue['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_DATEDUE, $datedue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_DATEDUE, $datedue, $comparison);
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
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Filter the query on the PaymentID column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentid(1234); // WHERE PaymentID = 1234
     * $query->filterByPaymentid(array(12, 34)); // WHERE PaymentID IN (12, 34)
     * $query->filterByPaymentid(array('min' => 12)); // WHERE PaymentID > 12
     * </code>
     *
     * @see       filterByPaymentRelatedByPaymentid()
     *
     * @param     mixed $paymentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function filterByPaymentid($paymentid = null, $comparison = null)
    {
        if (is_array($paymentid)) {
            $useMinMax = false;
            if (isset($paymentid['min'])) {
                $this->addUsingAlias(OwedTableMap::COL_PAYMENTID, $paymentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentid['max'])) {
                $this->addUsingAlias(OwedTableMap::COL_PAYMENTID, $paymentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OwedTableMap::COL_PAYMENTID, $paymentid, $comparison);
    }

    /**
     * Filter the query by a related \Payment object
     *
     * @param \Payment|ObjectCollection $payment The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOwedQuery The current query, for fluid interface
     */
    public function filterByPaymentRelatedByPaymentid($payment, $comparison = null)
    {
        if ($payment instanceof \Payment) {
            return $this
                ->addUsingAlias(OwedTableMap::COL_PAYMENTID, $payment->getId(), $comparison);
        } elseif ($payment instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OwedTableMap::COL_PAYMENTID, $payment->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPaymentRelatedByPaymentid() only accepts arguments of type \Payment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentRelatedByPaymentid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function joinPaymentRelatedByPaymentid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentRelatedByPaymentid');

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
            $this->addJoinObject($join, 'PaymentRelatedByPaymentid');
        }

        return $this;
    }

    /**
     * Use the PaymentRelatedByPaymentid relation Payment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentRelatedByPaymentidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPaymentRelatedByPaymentid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentRelatedByPaymentid', '\PaymentQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOwedQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByReceiverid($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(OwedTableMap::COL_RECEIVERID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OwedTableMap::COL_RECEIVERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByReceiverid() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByReceiverid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function joinUserRelatedByReceiverid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByReceiverid');

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
            $this->addJoinObject($join, 'UserRelatedByReceiverid');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByReceiverid relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByReceiveridQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserRelatedByReceiverid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByReceiverid', '\UserQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOwedQuery The current query, for fluid interface
     */
    public function filterByUserRelatedBySenderid($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(OwedTableMap::COL_SENDERID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OwedTableMap::COL_SENDERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedBySenderid() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedBySenderid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function joinUserRelatedBySenderid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedBySenderid');

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
            $this->addJoinObject($join, 'UserRelatedBySenderid');
        }

        return $this;
    }

    /**
     * Use the UserRelatedBySenderid relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedBySenderidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserRelatedBySenderid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedBySenderid', '\UserQuery');
    }

    /**
     * Filter the query by a related \Payment object
     *
     * @param \Payment|ObjectCollection $payment the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOwedQuery The current query, for fluid interface
     */
    public function filterByPaymentRelatedByOwedid($payment, $comparison = null)
    {
        if ($payment instanceof \Payment) {
            return $this
                ->addUsingAlias(OwedTableMap::COL_ID, $payment->getOwedid(), $comparison);
        } elseif ($payment instanceof ObjectCollection) {
            return $this
                ->usePaymentRelatedByOwedidQuery()
                ->filterByPrimaryKeys($payment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentRelatedByOwedid() only accepts arguments of type \Payment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentRelatedByOwedid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function joinPaymentRelatedByOwedid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentRelatedByOwedid');

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
            $this->addJoinObject($join, 'PaymentRelatedByOwedid');
        }

        return $this;
    }

    /**
     * Use the PaymentRelatedByOwedid relation Payment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentRelatedByOwedidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentRelatedByOwedid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentRelatedByOwedid', '\PaymentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOwed $owed Object to remove from the list of results
     *
     * @return $this|ChildOwedQuery The current query, for fluid interface
     */
    public function prune($owed = null)
    {
        if ($owed) {
            $this->addUsingAlias(OwedTableMap::COL_ID, $owed->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the owed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OwedTableMap::clearInstancePool();
            OwedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OwedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OwedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OwedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OwedQuery
