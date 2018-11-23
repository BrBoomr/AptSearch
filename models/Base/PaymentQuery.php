<?php

namespace Base;

use \Payment as ChildPayment;
use \PaymentQuery as ChildPaymentQuery;
use \Exception;
use \PDO;
use Map\PaymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'payment' table.
 *
 *
 *
 * @method     ChildPaymentQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPaymentQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildPaymentQuery orderBySenderid($order = Criteria::ASC) Order by the SenderID column
 * @method     ChildPaymentQuery orderByReceiverid($order = Criteria::ASC) Order by the ReceiverID column
 * @method     ChildPaymentQuery orderByOwedid($order = Criteria::ASC) Order by the OwedID column
 *
 * @method     ChildPaymentQuery groupById() Group by the ID column
 * @method     ChildPaymentQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildPaymentQuery groupBySenderid() Group by the SenderID column
 * @method     ChildPaymentQuery groupByReceiverid() Group by the ReceiverID column
 * @method     ChildPaymentQuery groupByOwedid() Group by the OwedID column
 *
 * @method     ChildPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPaymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPaymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPaymentQuery leftJoinUserRelatedByReceiverid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByReceiverid relation
 * @method     ChildPaymentQuery rightJoinUserRelatedByReceiverid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByReceiverid relation
 * @method     ChildPaymentQuery innerJoinUserRelatedByReceiverid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildPaymentQuery joinWithUserRelatedByReceiverid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildPaymentQuery leftJoinWithUserRelatedByReceiverid() Adds a LEFT JOIN clause and with to the query using the UserRelatedByReceiverid relation
 * @method     ChildPaymentQuery rightJoinWithUserRelatedByReceiverid() Adds a RIGHT JOIN clause and with to the query using the UserRelatedByReceiverid relation
 * @method     ChildPaymentQuery innerJoinWithUserRelatedByReceiverid() Adds a INNER JOIN clause and with to the query using the UserRelatedByReceiverid relation
 *
 * @method     ChildPaymentQuery leftJoinUserRelatedBySenderid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedBySenderid relation
 * @method     ChildPaymentQuery rightJoinUserRelatedBySenderid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedBySenderid relation
 * @method     ChildPaymentQuery innerJoinUserRelatedBySenderid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildPaymentQuery joinWithUserRelatedBySenderid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildPaymentQuery leftJoinWithUserRelatedBySenderid() Adds a LEFT JOIN clause and with to the query using the UserRelatedBySenderid relation
 * @method     ChildPaymentQuery rightJoinWithUserRelatedBySenderid() Adds a RIGHT JOIN clause and with to the query using the UserRelatedBySenderid relation
 * @method     ChildPaymentQuery innerJoinWithUserRelatedBySenderid() Adds a INNER JOIN clause and with to the query using the UserRelatedBySenderid relation
 *
 * @method     ChildPaymentQuery leftJoinOwedRelatedByOwedid($relationAlias = null) Adds a LEFT JOIN clause to the query using the OwedRelatedByOwedid relation
 * @method     ChildPaymentQuery rightJoinOwedRelatedByOwedid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OwedRelatedByOwedid relation
 * @method     ChildPaymentQuery innerJoinOwedRelatedByOwedid($relationAlias = null) Adds a INNER JOIN clause to the query using the OwedRelatedByOwedid relation
 *
 * @method     ChildPaymentQuery joinWithOwedRelatedByOwedid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OwedRelatedByOwedid relation
 *
 * @method     ChildPaymentQuery leftJoinWithOwedRelatedByOwedid() Adds a LEFT JOIN clause and with to the query using the OwedRelatedByOwedid relation
 * @method     ChildPaymentQuery rightJoinWithOwedRelatedByOwedid() Adds a RIGHT JOIN clause and with to the query using the OwedRelatedByOwedid relation
 * @method     ChildPaymentQuery innerJoinWithOwedRelatedByOwedid() Adds a INNER JOIN clause and with to the query using the OwedRelatedByOwedid relation
 *
 * @method     ChildPaymentQuery leftJoinOwedRelatedByPaymentid($relationAlias = null) Adds a LEFT JOIN clause to the query using the OwedRelatedByPaymentid relation
 * @method     ChildPaymentQuery rightJoinOwedRelatedByPaymentid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OwedRelatedByPaymentid relation
 * @method     ChildPaymentQuery innerJoinOwedRelatedByPaymentid($relationAlias = null) Adds a INNER JOIN clause to the query using the OwedRelatedByPaymentid relation
 *
 * @method     ChildPaymentQuery joinWithOwedRelatedByPaymentid($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OwedRelatedByPaymentid relation
 *
 * @method     ChildPaymentQuery leftJoinWithOwedRelatedByPaymentid() Adds a LEFT JOIN clause and with to the query using the OwedRelatedByPaymentid relation
 * @method     ChildPaymentQuery rightJoinWithOwedRelatedByPaymentid() Adds a RIGHT JOIN clause and with to the query using the OwedRelatedByPaymentid relation
 * @method     ChildPaymentQuery innerJoinWithOwedRelatedByPaymentid() Adds a INNER JOIN clause and with to the query using the OwedRelatedByPaymentid relation
 *
 * @method     \UserQuery|\OwedQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPayment findOne(ConnectionInterface $con = null) Return the first ChildPayment matching the query
 * @method     ChildPayment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPayment matching the query, or a new ChildPayment object populated from the query conditions when no match is found
 *
 * @method     ChildPayment findOneById(int $ID) Return the first ChildPayment filtered by the ID column
 * @method     ChildPayment findOneByTimestamp(string $Timestamp) Return the first ChildPayment filtered by the Timestamp column
 * @method     ChildPayment findOneBySenderid(int $SenderID) Return the first ChildPayment filtered by the SenderID column
 * @method     ChildPayment findOneByReceiverid(int $ReceiverID) Return the first ChildPayment filtered by the ReceiverID column
 * @method     ChildPayment findOneByOwedid(int $OwedID) Return the first ChildPayment filtered by the OwedID column *

 * @method     ChildPayment requirePk($key, ConnectionInterface $con = null) Return the ChildPayment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOne(ConnectionInterface $con = null) Return the first ChildPayment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPayment requireOneById(int $ID) Return the first ChildPayment filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByTimestamp(string $Timestamp) Return the first ChildPayment filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneBySenderid(int $SenderID) Return the first ChildPayment filtered by the SenderID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByReceiverid(int $ReceiverID) Return the first ChildPayment filtered by the ReceiverID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByOwedid(int $OwedID) Return the first ChildPayment filtered by the OwedID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPayment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPayment objects based on current ModelCriteria
 * @method     ChildPayment[]|ObjectCollection findById(int $ID) Return ChildPayment objects filtered by the ID column
 * @method     ChildPayment[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildPayment objects filtered by the Timestamp column
 * @method     ChildPayment[]|ObjectCollection findBySenderid(int $SenderID) Return ChildPayment objects filtered by the SenderID column
 * @method     ChildPayment[]|ObjectCollection findByReceiverid(int $ReceiverID) Return ChildPayment objects filtered by the ReceiverID column
 * @method     ChildPayment[]|ObjectCollection findByOwedid(int $OwedID) Return ChildPayment objects filtered by the OwedID column
 * @method     ChildPayment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PaymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Payment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentQuery) {
            return $criteria;
        }
        $query = new ChildPaymentQuery();
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
     * @return ChildPayment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PaymentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPayment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Timestamp, SenderID, ReceiverID, OwedID FROM payment WHERE ID = :p0';
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
            /** @var ChildPayment $obj */
            $obj = new ChildPayment();
            $obj->hydrate($row);
            PaymentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPayment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaymentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaymentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TIMESTAMP, $timestamp, $comparison);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterBySenderid($senderid = null, $comparison = null)
    {
        if (is_array($senderid)) {
            $useMinMax = false;
            if (isset($senderid['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_SENDERID, $senderid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderid['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_SENDERID, $senderid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_SENDERID, $senderid, $comparison);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByReceiverid($receiverid = null, $comparison = null)
    {
        if (is_array($receiverid)) {
            $useMinMax = false;
            if (isset($receiverid['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_RECEIVERID, $receiverid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiverid['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_RECEIVERID, $receiverid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_RECEIVERID, $receiverid, $comparison);
    }

    /**
     * Filter the query on the OwedID column
     *
     * Example usage:
     * <code>
     * $query->filterByOwedid(1234); // WHERE OwedID = 1234
     * $query->filterByOwedid(array(12, 34)); // WHERE OwedID IN (12, 34)
     * $query->filterByOwedid(array('min' => 12)); // WHERE OwedID > 12
     * </code>
     *
     * @see       filterByOwedRelatedByOwedid()
     *
     * @param     mixed $owedid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByOwedid($owedid = null, $comparison = null)
    {
        if (is_array($owedid)) {
            $useMinMax = false;
            if (isset($owedid['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_OWEDID, $owedid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($owedid['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_OWEDID, $owedid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_OWEDID, $owedid, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByUserRelatedByReceiverid($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(PaymentTableMap::COL_RECEIVERID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PaymentTableMap::COL_RECEIVERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
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
     * @return ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByUserRelatedBySenderid($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(PaymentTableMap::COL_SENDERID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PaymentTableMap::COL_SENDERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPaymentQuery The current query, for fluid interface
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
     * Filter the query by a related \Owed object
     *
     * @param \Owed|ObjectCollection $owed The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByOwedRelatedByOwedid($owed, $comparison = null)
    {
        if ($owed instanceof \Owed) {
            return $this
                ->addUsingAlias(PaymentTableMap::COL_OWEDID, $owed->getId(), $comparison);
        } elseif ($owed instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PaymentTableMap::COL_OWEDID, $owed->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOwedRelatedByOwedid() only accepts arguments of type \Owed or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OwedRelatedByOwedid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function joinOwedRelatedByOwedid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OwedRelatedByOwedid');

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
            $this->addJoinObject($join, 'OwedRelatedByOwedid');
        }

        return $this;
    }

    /**
     * Use the OwedRelatedByOwedid relation Owed object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OwedQuery A secondary query class using the current class as primary query
     */
    public function useOwedRelatedByOwedidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOwedRelatedByOwedid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OwedRelatedByOwedid', '\OwedQuery');
    }

    /**
     * Filter the query by a related \Owed object
     *
     * @param \Owed|ObjectCollection $owed the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByOwedRelatedByPaymentid($owed, $comparison = null)
    {
        if ($owed instanceof \Owed) {
            return $this
                ->addUsingAlias(PaymentTableMap::COL_ID, $owed->getPaymentid(), $comparison);
        } elseif ($owed instanceof ObjectCollection) {
            return $this
                ->useOwedRelatedByPaymentidQuery()
                ->filterByPrimaryKeys($owed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOwedRelatedByPaymentid() only accepts arguments of type \Owed or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OwedRelatedByPaymentid relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function joinOwedRelatedByPaymentid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OwedRelatedByPaymentid');

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
            $this->addJoinObject($join, 'OwedRelatedByPaymentid');
        }

        return $this;
    }

    /**
     * Use the OwedRelatedByPaymentid relation Owed object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OwedQuery A secondary query class using the current class as primary query
     */
    public function useOwedRelatedByPaymentidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOwedRelatedByPaymentid($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OwedRelatedByPaymentid', '\OwedQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPayment $payment Object to remove from the list of results
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function prune($payment = null)
    {
        if ($payment) {
            $this->addUsingAlias(PaymentTableMap::COL_ID, $payment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentTableMap::clearInstancePool();
            PaymentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentQuery
