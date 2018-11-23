<?php

namespace Base;

use \Appliance as ChildAppliance;
use \ApplianceQuery as ChildApplianceQuery;
use \Exception;
use Map\ApplianceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'appliance' table.
 *
 *
 *
 * @method     ChildApplianceQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildApplianceQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method     ChildApplianceQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildApplianceQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     ChildApplianceQuery orderByPropertyid($order = Criteria::ASC) Order by the PropertyID column
 *
 * @method     ChildApplianceQuery groupById() Group by the ID column
 * @method     ChildApplianceQuery groupByTimestamp() Group by the Timestamp column
 * @method     ChildApplianceQuery groupByName() Group by the Name column
 * @method     ChildApplianceQuery groupByDescription() Group by the Description column
 * @method     ChildApplianceQuery groupByPropertyid() Group by the PropertyID column
 *
 * @method     ChildApplianceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildApplianceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildApplianceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildApplianceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildApplianceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildApplianceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildApplianceQuery leftJoinProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Property relation
 * @method     ChildApplianceQuery rightJoinProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Property relation
 * @method     ChildApplianceQuery innerJoinProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Property relation
 *
 * @method     ChildApplianceQuery joinWithProperty($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Property relation
 *
 * @method     ChildApplianceQuery leftJoinWithProperty() Adds a LEFT JOIN clause and with to the query using the Property relation
 * @method     ChildApplianceQuery rightJoinWithProperty() Adds a RIGHT JOIN clause and with to the query using the Property relation
 * @method     ChildApplianceQuery innerJoinWithProperty() Adds a INNER JOIN clause and with to the query using the Property relation
 *
 * @method     \PropertyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAppliance findOne(ConnectionInterface $con = null) Return the first ChildAppliance matching the query
 * @method     ChildAppliance findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAppliance matching the query, or a new ChildAppliance object populated from the query conditions when no match is found
 *
 * @method     ChildAppliance findOneById(int $ID) Return the first ChildAppliance filtered by the ID column
 * @method     ChildAppliance findOneByTimestamp(string $Timestamp) Return the first ChildAppliance filtered by the Timestamp column
 * @method     ChildAppliance findOneByName(string $Name) Return the first ChildAppliance filtered by the Name column
 * @method     ChildAppliance findOneByDescription(string $Description) Return the first ChildAppliance filtered by the Description column
 * @method     ChildAppliance findOneByPropertyid(int $PropertyID) Return the first ChildAppliance filtered by the PropertyID column *

 * @method     ChildAppliance requirePk($key, ConnectionInterface $con = null) Return the ChildAppliance by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOne(ConnectionInterface $con = null) Return the first ChildAppliance matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppliance requireOneById(int $ID) Return the first ChildAppliance filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByTimestamp(string $Timestamp) Return the first ChildAppliance filtered by the Timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByName(string $Name) Return the first ChildAppliance filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByDescription(string $Description) Return the first ChildAppliance filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAppliance requireOneByPropertyid(int $PropertyID) Return the first ChildAppliance filtered by the PropertyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAppliance[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAppliance objects based on current ModelCriteria
 * @method     ChildAppliance[]|ObjectCollection findById(int $ID) Return ChildAppliance objects filtered by the ID column
 * @method     ChildAppliance[]|ObjectCollection findByTimestamp(string $Timestamp) Return ChildAppliance objects filtered by the Timestamp column
 * @method     ChildAppliance[]|ObjectCollection findByName(string $Name) Return ChildAppliance objects filtered by the Name column
 * @method     ChildAppliance[]|ObjectCollection findByDescription(string $Description) Return ChildAppliance objects filtered by the Description column
 * @method     ChildAppliance[]|ObjectCollection findByPropertyid(int $PropertyID) Return ChildAppliance objects filtered by the PropertyID column
 * @method     ChildAppliance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ApplianceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ApplianceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Appliance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildApplianceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildApplianceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildApplianceQuery) {
            return $criteria;
        }
        $query = new ChildApplianceQuery();
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
     * @return ChildAppliance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Appliance object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Appliance object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Appliance object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Appliance object has no primary key');
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_TIMESTAMP, $timestamp, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByPropertyid($propertyid = null, $comparison = null)
    {
        if (is_array($propertyid)) {
            $useMinMax = false;
            if (isset($propertyid['min'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propertyid['max'])) {
                $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $propertyid, $comparison);
    }

    /**
     * Filter the query by a related \Property object
     *
     * @param \Property|ObjectCollection $property The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildApplianceQuery The current query, for fluid interface
     */
    public function filterByProperty($property, $comparison = null)
    {
        if ($property instanceof \Property) {
            return $this
                ->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $property->getId(), $comparison);
        } elseif ($property instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ApplianceTableMap::COL_PROPERTYID, $property->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildApplianceQuery The current query, for fluid interface
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
     * @param   ChildAppliance $appliance Object to remove from the list of results
     *
     * @return $this|ChildApplianceQuery The current query, for fluid interface
     */
    public function prune($appliance = null)
    {
        if ($appliance) {
            throw new LogicException('Appliance object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the appliance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApplianceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ApplianceTableMap::clearInstancePool();
            ApplianceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ApplianceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ApplianceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ApplianceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ApplianceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ApplianceQuery
