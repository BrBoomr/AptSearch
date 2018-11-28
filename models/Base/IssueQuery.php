<?php

namespace Base;

use \Issue as ChildIssue;
use \IssueQuery as ChildIssueQuery;
use \Exception;
use \PDO;
use Map\IssueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'issue' table.
 *
 *
 *
 * @method     ChildIssueQuery orderByIssuenumberid($order = Criteria::ASC) Order by the issueNumberID column
 * @method     ChildIssueQuery orderByPropertyid($order = Criteria::ASC) Order by the propertyID column
 * @method     ChildIssueQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildIssueQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     ChildIssueQuery orderByFounddate($order = Criteria::ASC) Order by the foundDate column
 * @method     ChildIssueQuery orderByRepairdate($order = Criteria::ASC) Order by the repairDate column
 *
 * @method     ChildIssueQuery groupByIssuenumberid() Group by the issueNumberID column
 * @method     ChildIssueQuery groupByPropertyid() Group by the propertyID column
 * @method     ChildIssueQuery groupByName() Group by the name column
 * @method     ChildIssueQuery groupByDetails() Group by the details column
 * @method     ChildIssueQuery groupByFounddate() Group by the foundDate column
 * @method     ChildIssueQuery groupByRepairdate() Group by the repairDate column
 *
 * @method     ChildIssueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIssueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIssueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIssueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIssueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIssueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIssue findOne(ConnectionInterface $con = null) Return the first ChildIssue matching the query
 * @method     ChildIssue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIssue matching the query, or a new ChildIssue object populated from the query conditions when no match is found
 *
 * @method     ChildIssue findOneByIssuenumberid(int $issueNumberID) Return the first ChildIssue filtered by the issueNumberID column
 * @method     ChildIssue findOneByPropertyid(int $propertyID) Return the first ChildIssue filtered by the propertyID column
 * @method     ChildIssue findOneByName(string $name) Return the first ChildIssue filtered by the name column
 * @method     ChildIssue findOneByDetails(string $details) Return the first ChildIssue filtered by the details column
 * @method     ChildIssue findOneByFounddate(string $foundDate) Return the first ChildIssue filtered by the foundDate column
 * @method     ChildIssue findOneByRepairdate(string $repairDate) Return the first ChildIssue filtered by the repairDate column *

 * @method     ChildIssue requirePk($key, ConnectionInterface $con = null) Return the ChildIssue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOne(ConnectionInterface $con = null) Return the first ChildIssue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssue requireOneByIssuenumberid(int $issueNumberID) Return the first ChildIssue filtered by the issueNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByPropertyid(int $propertyID) Return the first ChildIssue filtered by the propertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByName(string $name) Return the first ChildIssue filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByDetails(string $details) Return the first ChildIssue filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByFounddate(string $foundDate) Return the first ChildIssue filtered by the foundDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssue requireOneByRepairdate(string $repairDate) Return the first ChildIssue filtered by the repairDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIssue objects based on current ModelCriteria
 * @method     ChildIssue[]|ObjectCollection findByIssuenumberid(int $issueNumberID) Return ChildIssue objects filtered by the issueNumberID column
 * @method     ChildIssue[]|ObjectCollection findByPropertyid(int $propertyID) Return ChildIssue objects filtered by the propertyID column
 * @method     ChildIssue[]|ObjectCollection findByName(string $name) Return ChildIssue objects filtered by the name column
 * @method     ChildIssue[]|ObjectCollection findByDetails(string $details) Return ChildIssue objects filtered by the details column
 * @method     ChildIssue[]|ObjectCollection findByFounddate(string $foundDate) Return ChildIssue objects filtered by the foundDate column
 * @method     ChildIssue[]|ObjectCollection findByRepairdate(string $repairDate) Return ChildIssue objects filtered by the repairDate column
 * @method     ChildIssue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IssueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\IssueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Issue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIssueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIssueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIssueQuery) {
            return $criteria;
        }
        $query = new ChildIssueQuery();
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
     * @return ChildIssue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IssueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = IssueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildIssue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT issueNumberID, propertyID, name, details, foundDate, repairDate FROM issue WHERE issueNumberID = :p0';
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
            /** @var ChildIssue $obj */
            $obj = new ChildIssue();
            $obj->hydrate($row);
            IssueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildIssue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the issueNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByIssuenumberid(1234); // WHERE issueNumberID = 1234
     * $query->filterByIssuenumberid(array(12, 34)); // WHERE issueNumberID IN (12, 34)
     * $query->filterByIssuenumberid(array('min' => 12)); // WHERE issueNumberID > 12
     * </code>
     *
     * @param     mixed $issuenumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByIssuenumberid($issuenumberid = null, $comparison = null)
    {
        if (is_array($issuenumberid)) {
            $useMinMax = false;
            if (isset($issuenumberid['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $issuenumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issuenumberid['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $issuenumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $issuenumberid, $comparison);
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_PROPERTYID, $propertyid, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Filter the query on the foundDate column
     *
     * Example usage:
     * <code>
     * $query->filterByFounddate('2011-03-14'); // WHERE foundDate = '2011-03-14'
     * $query->filterByFounddate('now'); // WHERE foundDate = '2011-03-14'
     * $query->filterByFounddate(array('max' => 'yesterday')); // WHERE foundDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $founddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByFounddate($founddate = null, $comparison = null)
    {
        if (is_array($founddate)) {
            $useMinMax = false;
            if (isset($founddate['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_FOUNDDATE, $founddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($founddate['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_FOUNDDATE, $founddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_FOUNDDATE, $founddate, $comparison);
    }

    /**
     * Filter the query on the repairDate column
     *
     * Example usage:
     * <code>
     * $query->filterByRepairdate('2011-03-14'); // WHERE repairDate = '2011-03-14'
     * $query->filterByRepairdate('now'); // WHERE repairDate = '2011-03-14'
     * $query->filterByRepairdate(array('max' => 'yesterday')); // WHERE repairDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $repairdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function filterByRepairdate($repairdate = null, $comparison = null)
    {
        if (is_array($repairdate)) {
            $useMinMax = false;
            if (isset($repairdate['min'])) {
                $this->addUsingAlias(IssueTableMap::COL_REPAIRDATE, $repairdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($repairdate['max'])) {
                $this->addUsingAlias(IssueTableMap::COL_REPAIRDATE, $repairdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueTableMap::COL_REPAIRDATE, $repairdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIssue $issue Object to remove from the list of results
     *
     * @return $this|ChildIssueQuery The current query, for fluid interface
     */
    public function prune($issue = null)
    {
        if ($issue) {
            $this->addUsingAlias(IssueTableMap::COL_ISSUENUMBERID, $issue->getIssuenumberid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the issue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IssueTableMap::clearInstancePool();
            IssueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IssueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IssueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IssueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IssueQuery
