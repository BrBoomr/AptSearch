<?php

namespace Map;

use \Property;
use \PropertyQuery;
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
 * This class defines the structure of the 'property' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PropertyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PropertyTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'property';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Property';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Property';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'property.ID';

    /**
     * the column name for the Timestamp field
     */
    const COL_TIMESTAMP = 'property.Timestamp';

    /**
     * the column name for the LandlordID field
     */
    const COL_LANDLORDID = 'property.LandlordID';

    /**
     * the column name for the AddressID field
     */
    const COL_ADDRESSID = 'property.AddressID';

    /**
     * the column name for the FPL field
     */
    const COL_FPL = 'property.FPL';

    /**
     * the column name for the SquareFootage field
     */
    const COL_SQUAREFOOTAGE = 'property.SquareFootage';

    /**
     * the column name for the Rooms field
     */
    const COL_ROOMS = 'property.Rooms';

    /**
     * the column name for the Bathrooms field
     */
    const COL_BATHROOMS = 'property.Bathrooms';

    /**
     * the column name for the Details field
     */
    const COL_DETAILS = 'property.Details';

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
        self::TYPE_PHPNAME       => array('Id', 'Timestamp', 'Landlordid', 'Addressid', 'Fpl', 'Squarefootage', 'Rooms', 'Bathrooms', 'Details', ),
        self::TYPE_CAMELNAME     => array('id', 'timestamp', 'landlordid', 'addressid', 'fpl', 'squarefootage', 'rooms', 'bathrooms', 'details', ),
        self::TYPE_COLNAME       => array(PropertyTableMap::COL_ID, PropertyTableMap::COL_TIMESTAMP, PropertyTableMap::COL_LANDLORDID, PropertyTableMap::COL_ADDRESSID, PropertyTableMap::COL_FPL, PropertyTableMap::COL_SQUAREFOOTAGE, PropertyTableMap::COL_ROOMS, PropertyTableMap::COL_BATHROOMS, PropertyTableMap::COL_DETAILS, ),
        self::TYPE_FIELDNAME     => array('ID', 'Timestamp', 'LandlordID', 'AddressID', 'FPL', 'SquareFootage', 'Rooms', 'Bathrooms', 'Details', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Timestamp' => 1, 'Landlordid' => 2, 'Addressid' => 3, 'Fpl' => 4, 'Squarefootage' => 5, 'Rooms' => 6, 'Bathrooms' => 7, 'Details' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'timestamp' => 1, 'landlordid' => 2, 'addressid' => 3, 'fpl' => 4, 'squarefootage' => 5, 'rooms' => 6, 'bathrooms' => 7, 'details' => 8, ),
        self::TYPE_COLNAME       => array(PropertyTableMap::COL_ID => 0, PropertyTableMap::COL_TIMESTAMP => 1, PropertyTableMap::COL_LANDLORDID => 2, PropertyTableMap::COL_ADDRESSID => 3, PropertyTableMap::COL_FPL => 4, PropertyTableMap::COL_SQUAREFOOTAGE => 5, PropertyTableMap::COL_ROOMS => 6, PropertyTableMap::COL_BATHROOMS => 7, PropertyTableMap::COL_DETAILS => 8, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'Timestamp' => 1, 'LandlordID' => 2, 'AddressID' => 3, 'FPL' => 4, 'SquareFootage' => 5, 'Rooms' => 6, 'Bathrooms' => 7, 'Details' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('property');
        $this->setPhpName('Property');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Property');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'DATE', true, null, null);
        $this->addForeignKey('LandlordID', 'Landlordid', 'INTEGER', 'user', 'ID', true, null, null);
        $this->addForeignKey('AddressID', 'Addressid', 'INTEGER', 'address', 'ID', true, null, null);
        $this->addColumn('FPL', 'Fpl', 'INTEGER', false, null, null);
        $this->addColumn('SquareFootage', 'Squarefootage', 'INTEGER', true, null, null);
        $this->addColumn('Rooms', 'Rooms', 'INTEGER', true, null, null);
        $this->addColumn('Bathrooms', 'Bathrooms', 'INTEGER', true, null, null);
        $this->addColumn('Details', 'Details', 'VARCHAR', false, 256, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Address', '\\Address', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':AddressID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':LandlordID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('Amenity', '\\Amenity', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Amenities', false);
        $this->addRelation('Appliance', '\\Appliance', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Appliances', false);
        $this->addRelation('Cost', '\\Cost', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Costs', false);
        $this->addRelation('Issue', '\\Issue', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Issues', false);
        $this->addRelation('Limitation', '\\Limitation', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Limitations', false);
        $this->addRelation('Picture', '\\Picture', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Pictures', false);
        $this->addRelation('Tenant', '\\Tenant', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Tenants', false);
        $this->addRelation('Utility', '\\Utility', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':PropertyID',
    1 => ':ID',
  ),
), null, null, 'Utilities', false);
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
        return $withPrefix ? PropertyTableMap::CLASS_DEFAULT : PropertyTableMap::OM_CLASS;
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
     * @return array           (Property object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PropertyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PropertyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PropertyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PropertyTableMap::OM_CLASS;
            /** @var Property $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PropertyTableMap::addInstanceToPool($obj, $key);
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
            $key = PropertyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PropertyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Property $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PropertyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PropertyTableMap::COL_ID);
            $criteria->addSelectColumn(PropertyTableMap::COL_TIMESTAMP);
            $criteria->addSelectColumn(PropertyTableMap::COL_LANDLORDID);
            $criteria->addSelectColumn(PropertyTableMap::COL_ADDRESSID);
            $criteria->addSelectColumn(PropertyTableMap::COL_FPL);
            $criteria->addSelectColumn(PropertyTableMap::COL_SQUAREFOOTAGE);
            $criteria->addSelectColumn(PropertyTableMap::COL_ROOMS);
            $criteria->addSelectColumn(PropertyTableMap::COL_BATHROOMS);
            $criteria->addSelectColumn(PropertyTableMap::COL_DETAILS);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.Timestamp');
            $criteria->addSelectColumn($alias . '.LandlordID');
            $criteria->addSelectColumn($alias . '.AddressID');
            $criteria->addSelectColumn($alias . '.FPL');
            $criteria->addSelectColumn($alias . '.SquareFootage');
            $criteria->addSelectColumn($alias . '.Rooms');
            $criteria->addSelectColumn($alias . '.Bathrooms');
            $criteria->addSelectColumn($alias . '.Details');
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
        return Propel::getServiceContainer()->getDatabaseMap(PropertyTableMap::DATABASE_NAME)->getTable(PropertyTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PropertyTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PropertyTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PropertyTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Property or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Property object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Property) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PropertyTableMap::DATABASE_NAME);
            $criteria->add(PropertyTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PropertyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PropertyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PropertyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the property table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PropertyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Property or Criteria object.
     *
     * @param mixed               $criteria Criteria or Property object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Property object
        }

        if ($criteria->containsKey(PropertyTableMap::COL_ID) && $criteria->keyContainsValue(PropertyTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PropertyTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PropertyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PropertyTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PropertyTableMap::buildTableMap();
