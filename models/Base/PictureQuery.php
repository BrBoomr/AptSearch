<?php

namespace Base;

use \Picture as ChildPicture;
use \PictureQuery as ChildPictureQuery;
use \Exception;
use \PDO;
use Map\PictureTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'picture' table.
 *
 *
 *
 * @method     ChildPictureQuery orderByPicturenumberid($order = Criteria::ASC) Order by the pictureNumberID column
 * @method     ChildPictureQuery orderByAdddate($order = Criteria::ASC) Order by the addDate column
 * @method     ChildPictureQuery orderByPropertyid($order = Criteria::ASC) Order by the propertyID column
 * @method     ChildPictureQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildPictureQuery orderByDetails($order = Criteria::ASC) Order by the details column
 *
 * @method     ChildPictureQuery groupByPicturenumberid() Group by the pictureNumberID column
 * @method     ChildPictureQuery groupByAdddate() Group by the addDate column
 * @method     ChildPictureQuery groupByPropertyid() Group by the propertyID column
 * @method     ChildPictureQuery groupByLink() Group by the link column
 * @method     ChildPictureQuery groupByDetails() Group by the details column
 *
 * @method     ChildPictureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPictureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPictureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPictureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPictureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPictureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPicture findOne(ConnectionInterface $con = null) Return the first ChildPicture matching the query
 * @method     ChildPicture findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPicture matching the query, or a new ChildPicture object populated from the query conditions when no match is found
 *
 * @method     ChildPicture findOneByPicturenumberid(int $pictureNumberID) Return the first ChildPicture filtered by the pictureNumberID column
 * @method     ChildPicture findOneByAdddate(string $addDate) Return the first ChildPicture filtered by the addDate column
 * @method     ChildPicture findOneByPropertyid(int $propertyID) Return the first ChildPicture filtered by the propertyID column
 * @method     ChildPicture findOneByLink(string $link) Return the first ChildPicture filtered by the link column
 * @method     ChildPicture findOneByDetails(string $details) Return the first ChildPicture filtered by the details column *

 * @method     ChildPicture requirePk($key, ConnectionInterface $con = null) Return the ChildPicture by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOne(ConnectionInterface $con = null) Return the first ChildPicture matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPicture requireOneByPicturenumberid(int $pictureNumberID) Return the first ChildPicture filtered by the pictureNumberID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByAdddate(string $addDate) Return the first ChildPicture filtered by the addDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByPropertyid(int $propertyID) Return the first ChildPicture filtered by the propertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByLink(string $link) Return the first ChildPicture filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByDetails(string $details) Return the first ChildPicture filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPicture[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPicture objects based on current ModelCriteria
 * @method     ChildPicture[]|ObjectCollection findByPicturenumberid(int $pictureNumberID) Return ChildPicture objects filtered by the pictureNumberID column
 * @method     ChildPicture[]|ObjectCollection findByAdddate(string $addDate) Return ChildPicture objects filtered by the addDate column
 * @method     ChildPicture[]|ObjectCollection findByPropertyid(int $propertyID) Return ChildPicture objects filtered by the propertyID column
 * @method     ChildPicture[]|ObjectCollection findByLink(string $link) Return ChildPicture objects filtered by the link column
 * @method     ChildPicture[]|ObjectCollection findByDetails(string $details) Return ChildPicture objects filtered by the details column
 * @method     ChildPicture[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PictureQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PictureQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Picture', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPictureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPictureQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPictureQuery) {
            return $criteria;
        }
        $query = new ChildPictureQuery();
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
     * @return ChildPicture|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PictureTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PictureTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPicture A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pictureNumberID, addDate, propertyID, link, details FROM picture WHERE pictureNumberID = :p0';
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
            /** @var ChildPicture $obj */
            $obj = new ChildPicture();
            $obj->hydrate($row);
            PictureTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPicture|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pictureNumberID column
     *
     * Example usage:
     * <code>
     * $query->filterByPicturenumberid(1234); // WHERE pictureNumberID = 1234
     * $query->filterByPicturenumberid(array(12, 34)); // WHERE pictureNumberID IN (12, 34)
     * $query->filterByPicturenumberid(array('min' => 12)); // WHERE pictureNumberID > 12
     * </code>
     *
     * @param     mixed $picturenumberid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByPicturenumberid($picturenumberid = null, $comparison = null)
    {
        if (is_array($picturenumberid)) {
            $useMinMax = false;
            if (isset($picturenumberid['min'])) {
                $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $picturenumberid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($picturenumberid['max'])) {
                $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $picturenumberid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $picturenumberid, $comparison);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByAdddate($adddate = null, $comparison = null)
    {
        if (is_array($adddate)) {
            $useMinMax = false;
            if (isset($adddate['min'])) {
                $this->addUsingAlias(PictureTableMap::COL_ADDDATE, $adddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adddate['max'])) {
                $this->addUsingAlias(PictureTableMap::COL_ADDDATE, $adddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_ADDDATE, $adddate, $comparison);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(PictureTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(PictureTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_PROPERTYID, $propertyid, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_LINK, $link, $comparison);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPicture $picture Object to remove from the list of results
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function prune($picture = null)
    {
        if ($picture) {
            $this->addUsingAlias(PictureTableMap::COL_PICTURENUMBERID, $picture->getPicturenumberid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the picture table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PictureTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PictureTableMap::clearInstancePool();
            PictureTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PictureTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PictureTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PictureTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PictureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PictureQuery
