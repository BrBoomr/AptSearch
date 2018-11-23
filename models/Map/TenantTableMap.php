<?php

namespace Map;

use \Tenant;
use \TenantQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'tenant' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TenantTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TenantTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tenant';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tenant';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tenant';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'tenant.ID';

    /**
     * the column name for the Timestamp field
     */
    const COL_TIMESTAMP = 'tenant.Timestamp';

    /**
     * the column name for the UserID field
     */
    const COL_USERID = 'tenant.UserID';

    /**
     * the column name for the PropertyID field
     */
    const COL_PROPERTYID = 'tenant.PropertyID';

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'tenant.Name';

    /**
     * the column name for the Start field
     */
    const COL_START = 'tenant.Start';

    /**
     * the column name for the End field
     */
    const COL_END = 'tenant.End';

    /**
     * the column name for the ActualEnd field
     */
    const COL_ACTUALEND = 'tenant.ActualEnd';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Timestamp', 'Userid', 'Propertyid', 'Name', 'Start', 'End', 'Actualend', ),
        self::TYPE_CAMELNAME     => array('id', 'timestamp', 'userid', 'propertyid', 'name', 'start', 'end', 'actualend', ),
        self::TYPE_COLNAME       => array(TenantTableMap::COL_ID, TenantTableMap::COL_TIMESTAMP, TenantTableMap::COL_USERID, TenantTableMap::COL_PROPERTYID, TenantTableMap::COL_NAME, TenantTableMap::COL_START, TenantTableMap::COL_END, TenantTableMap::COL_ACTUALEND, ),
        self::TYPE_FIELDNAME     => array('ID', 'Timestamp', 'UserID', 'PropertyID', 'Name', 'Start', 'End', 'ActualEnd', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Timestamp' => 1, 'Userid' => 2, 'Propertyid' => 3, 'Name' => 4, 'Start' => 5, 'End' => 6, 'Actualend' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'timestamp' => 1, 'userid' => 2, 'propertyid' => 3, 'name' => 4, 'start' => 5, 'end' => 6, 'actualend' => 7, ),
        self::TYPE_COLNAME       => array(TenantTableMap::COL_ID => 0, TenantTableMap::COL_TIMESTAMP => 1, TenantTableMap::COL_USERID => 2, TenantTableMap::COL_PROPERTYID => 3, TenantTableMap::COL_NAME => 4, TenantTableMap::COL_START => 5, TenantTableMap::COL_END => 6, TenantTableMap::COL_ACTUALEND => 7, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'Timestamp' => 1, 'UserID' => 2, 'PropertyID' => 3, 'Name' => 4, 'Start' => 5, 'End' => 6, 'ActualEnd' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('tenant');
        $this->setPhpName('Tenant');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tenant');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'DATE', true, null, null);
        $this->addForeignKey('UserID', 'Userid', 'INTEGER', 'user', 'ID', true, null, null);
        $this->addForeignKey('PropertyID', 'Propertyid', 'INTEGER', 'property', 'ID', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 128, null);
        $this->addColumn('Start', 'Start', 'DATE', true, null, null);
        $this->addColumn('End', 'End', 'DATE', false, null, null);
        $this->addColumn('ActualEnd', 'Actualend', 'DATE', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Property', '\\Property', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':UserID',
    1 => ':ID',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TenantTableMap::CLASS_DEFAULT : TenantTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Tenant object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TenantTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TenantTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TenantTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TenantTableMap::OM_CLASS;
            /** @var Tenant $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TenantTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TenantTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TenantTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tenant $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TenantTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TenantTableMap::COL_ID);
            $criteria->addSelectColumn(TenantTableMap::COL_TIMESTAMP);
            $criteria->addSelectColumn(TenantTableMap::COL_USERID);
            $criteria->addSelectColumn(TenantTableMap::COL_PROPERTYID);
            $criteria->addSelectColumn(TenantTableMap::COL_NAME);
            $criteria->addSelectColumn(TenantTableMap::COL_START);
            $criteria->addSelectColumn(TenantTableMap::COL_END);
            $criteria->addSelectColumn(TenantTableMap::COL_ACTUALEND);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.Timestamp');
            $criteria->addSelectColumn($alias . '.UserID');
            $criteria->addSelectColumn($alias . '.PropertyID');
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.Start');
            $criteria->addSelectColumn($alias . '.End');
            $criteria->addSelectColumn($alias . '.ActualEnd');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TenantTableMap::DATABASE_NAME)->getTable(TenantTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TenantTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TenantTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TenantTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tenant or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tenant object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TenantTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tenant) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TenantTableMap::DATABASE_NAME);
            $criteria->add(TenantTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TenantQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TenantTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TenantTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tenant table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TenantQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tenant or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tenant object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TenantTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tenant object
        }

        if ($criteria->containsKey(TenantTableMap::COL_ID) && $criteria->keyContainsValue(TenantTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TenantTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TenantQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TenantTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TenantTableMap::buildTableMap();
