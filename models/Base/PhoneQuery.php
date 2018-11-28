<?php

namespace Base;

use \Phone as ChildPhone;
use \PhoneQuery as ChildPhoneQuery;
use \Exception;
use \PDO;
use Map\PhoneTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'phone' table.
 *
 *
 *
 * @method     ChildPhoneQuery orderByPhonenumberid($order = Criteria::ASC) Order by the phoneNumberID column
 * @method     ChildPhoneQuery orderByUserid($order = Criteria::ASC) Order by the userID column
 * @method     ChildPhoneQuery orderByAdddate($order = Criteria::ASC) Order by the addDate column
 * @method     ChildPhoneQuery orderByAreacode($order = Criteria::ASC) Order by the areaCode column
 * @method     ChildPhoneQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     ChildPhoneQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildPhoneQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildPhoneQuery groupByPhonenumberid() Group by the phoneNumberID column
 * @method     ChildPhoneQuery groupByUserid() Group by the userID column
 * @method     ChildPhoneQuery groupByAdddate() Group by the addDate column
 * @method     ChildPhoneQuery groupByAreacode() Group by the areaCode column
 * @method     ChildPhoneQuery groupByNumber() Group by the number column
 * @method     ChildPhoneQuery groupByExtension() Group by the extension column
 * @method     ChildPhoneQuery groupByDescription() Group by the description column
 *
 * @method     ChildPhoneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhoneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhoneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhoneQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhoneQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhoneQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhone findOne(ConnectionInterface $con = null) Return the first ChildPhone matching the query
 * @method     ChildPhone findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhone matching the query, or a new ChildPhone object populated from the query conditions when no match is found
 *
 * @method     ChildPhone findOneByPhonenumberid(int $phoneNumberID) Return the first ChildPhone filtered by the phoneNumberID column
 * @method     ChildPhone findOneByUserid(int $userID) Return the first ChildPhone filtered by the userID column
 * @method     ChildPhone findOneByAdddate(string $addDate) Return the first ChildPhone filtered by the addDate column
 * @method     ChildPhone findOneByAreacode(string $areaCode) Return the first ChildPhone filtered by the areaCode column
 * @method     ChildPhone findOneByNumber(string $number) Return the first ChildPhone filtered by the number column
 * @method     ChildPhone findOneByExtension(string $extension) Return the first ChildPhone filtered by the extension column
 * @method     ChildPhone findOneByDescription(string $description) Return the first ChildPhone filtered by the description column *

 * @method     ChildPhone requirePk($key, ConnectionInterface $con = null) Return the ChildPhone by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOne(ConnectionInterface $con = null) Return the first ChildPhone matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhone requireOneByPhonenumberid(int $phoneNumberID) Return the first ChildPhone filtered by the phoneNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByUserid(int $userID) Return the first ChildPhone filtered by the userID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByAdddate(string $addDate) Return the first ChildPhone filtered by the addDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByAreacode(string $areaCode) Return the first ChildPhone filtered by the areaCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByNumber(string $number) Return the first ChildPhone filtered by the number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByExtension(string $extension) Return the first ChildPhone filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhone requireOneByDescription(string $description) Return the first ChildPhone filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhone[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhone objects based on current ModelCriteria
 * @method     ChildPhone[]|ObjectCollection findByPhonenumberid(int $phoneNumberID) Return ChildPhone objects filtered by the phoneNumberID column
 * @method     ChildPhone[]|ObjectCollection findByUserid(int $userID) Return ChildPhone objects filtered by the userID column
 * @method     ChildPhone[]|ObjectCollection findByAdddate(string $addDate) Return ChildPhone objects filtered by the addDate column
 * @method     ChildPhone[]|ObjectCollection findByAreacode(string $areaCode) Return ChildPhone objects filtered by the areaCode column
 * @method     ChildPhone[]|ObjectCollection findByNumber(string $number) Return ChildPhone objects filtered by the number column
 * @method     ChildPhone[]|ObjectCollection findByExtension(string $extension) Return ChildPhone objects filtered by the extension column
 * @method     ChildPhone[]|ObjectCollection findByDescription(string $description) Return ChildPhone objects filtered by the description column
 * @method     ChildPhone[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhoneQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PhoneQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Phone', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhoneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhoneQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhoneQuery) {
            return $criteria;
        }
        $query = new ChildPhoneQuery();
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
     * @return ChildPhone|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhoneTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhoneTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPhone A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT phoneNumberID, userID, addDate, areaCode, number, extension, description FROM phone WHERE phoneNumberID = :p0';
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
            /** @var ChildPhone $obj */
            $obj = new ChildPhone();
            $obj->hydrate($row);
            PhoneTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPhone|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the phoneNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByPhonenumberid(1234); // WHERE phoneNumberID = 1234
     * $query->filterByPhonenumberid(array(12, 34)); // WHERE phoneNumberID IN (12, 34)
     * $query->filterByPhonenumberid(array('min' => 12)); // WHERE phoneNumberID > 12
     * </code>
     *
     * @param     mixed $phonenumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByPhonenumberid($phonenumberid = null, $comparison = null)
    {
        if (is_array($phonenumberid)) {
            $useMinMax = false;
            if (isset($phonenumberid['min'])) {
                $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $phonenumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phonenumberid['max'])) {
                $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $phonenumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $phonenumberid, $comparison);
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
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(PhoneTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(PhoneTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_USERID, $userid, $comparison);
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
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByAdddate($adddate = null, $comparison = null)
    {
        if (is_array($adddate)) {
            $useMinMax = false;
            if (isset($adddate['min'])) {
                $this->addUsingAlias(PhoneTableMap::COL_ADDDATE, $adddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adddate['max'])) {
                $this->addUsingAlias(PhoneTableMap::COL_ADDDATE, $adddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_ADDDATE, $adddate, $comparison);
    }

    /**
     * Filter the query on the areaCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAreacode('fooValue');   // WHERE areaCode = 'fooValue'
     * $query->filterByAreacode('%fooValue%', Criteria::LIKE); // WHERE areaCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $areacode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByAreacode($areacode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($areacode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_AREACODE, $areacode, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%', Criteria::LIKE); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extension The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByExtension($extension = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_EXTENSION, $extension, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhoneTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhone $phone Object to remove from the list of results
     *
     * @return $this|ChildPhoneQuery The current query, for fluid interface
     */
    public function prune($phone = null)
    {
        if ($phone) {
            $this->addUsingAlias(PhoneTableMap::COL_PHONENUMBERID, $phone->getPhonenumberid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the phone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhoneTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhoneTableMap::clearInstancePool();
            PhoneTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PhoneTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhoneTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhoneTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhoneTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhoneQuery
