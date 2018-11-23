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
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'picture' table.
 *
 *
 *
 * @method     ChildPictureQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPictureQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildPictureQuery orderByPropertyid($order = Criteria::ASC) Order by the PropertyID column
 * @method     ChildPictureQuery orderByLink($order = Criteria::ASC) Order by the Link column
 * @method     ChildPictureQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 *
 * @method     ChildPictureQuery groupById() Group by the ID column
 * @method     ChildPictureQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildPictureQuery groupByPropertyid() Group by the PropertyID column
 * @method     ChildPictureQuery groupByLink() Group by the Link column
 * @method     ChildPictureQuery groupByDescription() Group by the Description column
 *
 * @method     ChildPictureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPictureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPictureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPictureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPictureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPictureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPictureQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildPictureQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildPictureQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildPictureQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildPictureQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildPictureQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildPictureQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     \PropertyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPicture findOne(ConnectionInterface $con = null) Return the first ChildPicture matching the query
 * @method     ChildPicture findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPicture matching the query, or a new ChildPicture object populated from the query conditions when no match is found
 *
 * @method     ChildPicture findOneById(int $ID) Return the first ChildPicture filtered by the ID column
 * @method     ChildPicture findOneByTimestamp(string $Timestamp) Return the first ChildPicture filtered by the Timestamp column
 * @method     ChildPicture findOneByPropertyid(int $PropertyID) Return the first ChildPicture filtered by the PropertyID column
 * @method     ChildPicture findOneByLink(string $Link) Return the first ChildPicture filtered by the Link column
 * @method     ChildPicture findOneByDescription(string $Description) Return the first ChildPicture filtered by the Description column *

 * @method     ChildPicture requirePk($key, ConnectionInterface $con = null) Return the ChildPicture by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOne(ConnectionInterface $con = null) Return the first ChildPicture matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPicture requireOneById(int $ID) Return the first ChildPicture filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByTimestamp(string $Timestamp) Return the first ChildPicture filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByPropertyid(int $PropertyID) Return the first ChildPicture filtered by the PropertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByLink(string $Link) Return the first ChildPicture filtered by the Link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPicture requireOneByDescription(string $Description) Return the first ChildPicture filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPicture[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPicture objects based on current ModelCriteria
 * @method     ChildPicture[]|ObjectCollection findById(int $ID) Return ChildPicture objects filtered by the ID column
 * @method     ChildPicture[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildPicture objects filtered by the Timestamp column
 * @method     ChildPicture[]|ObjectCollection findByPropertyid(int $PropertyID) Return ChildPicture objects filtered by the PropertyID column
 * @method     ChildPicture[]|ObjectCollection findByLink(string $Link) Return ChildPicture objects filtered by the Link column
 * @method     ChildPicture[]|ObjectCollection findByDescription(string $Description) Return ChildPicture objects filtered by the Description column
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
        $sql = 'SELECT ID, Timestamp, PropertyID, Link, Description FROM picture WHERE ID = :p0';
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

        return $this->addUsingAlias(PictureTableMap::COL_ID, $key, Criteria::EQUAL);
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

        return $this->addUsingAlias(PictureTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PictureTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PictureTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(PictureTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(PictureTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the PropertyID column
     *
     * Example usage:
     * <code>
     * $query->filterByPropertyid(1234); // WHERE PropertyID = 1234
     * $query->filterByPropertyid(array(12, 34)); // WHERE PropertyID IN (12, 34)
     * $query->filterByPropertyid(array('min' => 12)); // WHERE PropertyID > 12
     * </code>
     *
     * @see       filterByProperty()
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
     * Filter the query on the Link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE Link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE Link LIKE '%fooValue%'
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
     * Filter the query on the Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE Description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE Description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PictureTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPictureQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(PictureTableMap::COL_PROPERTYID, $property->getId(), $comparison);
        } elseif ($property instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PictureTableMap::COL_PROPERTYID, $property->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPictureQuery The current query, for fluid interface
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
     * @param   ChildPicture $picture Object to remove from the list of results
     *
     * @return $this|ChildPictureQuery The current query, for fluid interface
     */
    public function prune($picture = null)
    {
        if ($picture) {
            $this->addUsingAlias(PictureTableMap::COL_ID, $picture->getId(), Criteria::NOT_EQUAL);
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
