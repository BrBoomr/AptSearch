<?php

namespace Map;

use \Utility;
use \UtilityQuery;
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
 * This class defines the structure of the 'utility' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UtilityTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UtilityTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'utility';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Utility';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Utility';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the utilityNumberID field
     */
    const COL_UTILITYNUMBERID = 'utility.utilityNumberID';

    /**
     * the column name for the propertyID field
     */
    const COL_PROPERTYID = 'utility.propertyID';

    /**
     * the column name for the utilityTypeID field
     */
    const COL_UTILITYTYPEID = 'utility.utilityTypeID';

    /**
     * the column name for the details field
     */
    const COL_DETAILS = 'utility.details';

    /**
     * the column name for the available field
     */
    const COL_AVAILABLE = 'utility.available';

    /**
     * the column name for the includedInRent field
     */
    const COL_INCLUDEDINRENT = 'utility.includedInRent';

    /**
     * the column name for the expectedCostPerMonth field
     */
    const COL_EXPECTEDCOSTPERMONTH = 'utility.expectedCostPerMonth';

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
        self::TYPE_PHPNAME       => array('Utilitynumberid', 'Propertyid', 'Utilitytypeid', 'Details', 'Available', 'Includedinrent', 'Expectedcostpermonth', ),
        self::TYPE_CAMELNAME     => array('utilitynumberid', 'propertyid', 'utilitytypeid', 'details', 'available', 'includedinrent', 'expectedcostpermonth', ),
        self::TYPE_COLNAME       => array(UtilityTableMap::COL_UTILITYNUMBERID, UtilityTableMap::COL_PROPERTYID, UtilityTableMap::COL_UTILITYTYPEID, UtilityTableMap::COL_DETAILS, UtilityTableMap::COL_AVAILABLE, UtilityTableMap::COL_INCLUDEDINRENT, UtilityTableMap::COL_EXPECTEDCOSTPERMONTH, ),
        self::TYPE_FIELDNAME     => array('utilityNumberID', 'propertyID', 'utilityTypeID', 'details', 'available', 'includedInRent', 'expectedCostPerMonth', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Utilitynumberid' => 0, 'Propertyid' => 1, 'Utilitytypeid' => 2, 'Details' => 3, 'Available' => 4, 'Includedinrent' => 5, 'Expectedcostpermonth' => 6, ),
        self::TYPE_CAMELNAME     => array('utilitynumberid' => 0, 'propertyid' => 1, 'utilitytypeid' => 2, 'details' => 3, 'available' => 4, 'includedinrent' => 5, 'expectedcostpermonth' => 6, ),
        self::TYPE_COLNAME       => array(UtilityTableMap::COL_UTILITYNUMBERID => 0, UtilityTableMap::COL_PROPERTYID => 1, UtilityTableMap::COL_UTILITYTYPEID => 2, UtilityTableMap::COL_DETAILS => 3, UtilityTableMap::COL_AVAILABLE => 4, UtilityTableMap::COL_INCLUDEDINRENT => 5, UtilityTableMap::COL_EXPECTEDCOSTPERMONTH => 6, ),
        self::TYPE_FIELDNAME     => array('utilityNumberID' => 0, 'propertyID' => 1, 'utilityTypeID' => 2, 'details' => 3, 'available' => 4, 'includedInRent' => 5, 'expectedCostPerMonth' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('utility');
        $this->setPhpName('Utility');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Utility');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
<<<<<<< HEAD
        $this->addPrimaryKey('utilityNumberID', 'Utilitynumberid', 'INTEGER', true, null, null);
        $this->addColumn('propertyID', 'Propertyid', 'INTEGER', true, null, null);
        $this->addColumn('utilityTypeID', 'Utilitytypeid', 'INTEGER', true, null, null);
        $this->addColumn('details', 'Details', 'LONGVARCHAR', false, null, null);
        $this->addColumn('available', 'Available', 'BOOLEAN', true, 1, true);
        $this->addColumn('includedInRent', 'Includedinrent', 'BOOLEAN', true, 1, true);
        $this->addColumn('expectedCostPerMonth', 'Expectedcostpermonth', 'DOUBLE', true, null, 0);
=======
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addForeignKey('PropertyID', 'Propertyid', 'INTEGER', 'property', 'ID', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 56, null);
        $this->addColumn('Description', 'Description', 'VARCHAR', true, 128, null);
        $this->addColumn('Included', 'Included', 'BOOLEAN', true, 1, null);
        $this->addColumn('Cost', 'Cost', 'INTEGER', true, null, null);
>>>>>>> 40d1c9abff46885142bd47e75e80d811803ae6eb
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Utilitynumberid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UtilityTableMap::CLASS_DEFAULT : UtilityTableMap::OM_CLASS;
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
     * @return array           (Utility object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UtilityTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UtilityTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UtilityTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UtilityTableMap::OM_CLASS;
            /** @var Utility $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UtilityTableMap::addInstanceToPool($obj, $key);
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
            $key = UtilityTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UtilityTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Utility $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UtilityTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UtilityTableMap::COL_UTILITYNUMBERID);
            $criteria->addSelectColumn(UtilityTableMap::COL_PROPERTYID);
            $criteria->addSelectColumn(UtilityTableMap::COL_UTILITYTYPEID);
            $criteria->addSelectColumn(UtilityTableMap::COL_DETAILS);
            $criteria->addSelectColumn(UtilityTableMap::COL_AVAILABLE);
            $criteria->addSelectColumn(UtilityTableMap::COL_INCLUDEDINRENT);
            $criteria->addSelectColumn(UtilityTableMap::COL_EXPECTEDCOSTPERMONTH);
        } else {
            $criteria->addSelectColumn($alias . '.utilityNumberID');
            $criteria->addSelectColumn($alias . '.propertyID');
            $criteria->addSelectColumn($alias . '.utilityTypeID');
            $criteria->addSelectColumn($alias . '.details');
            $criteria->addSelectColumn($alias . '.available');
            $criteria->addSelectColumn($alias . '.includedInRent');
            $criteria->addSelectColumn($alias . '.expectedCostPerMonth');
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
        return Propel::getServiceContainer()->getDatabaseMap(UtilityTableMap::DATABASE_NAME)->getTable(UtilityTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UtilityTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UtilityTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UtilityTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Utility or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Utility object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UtilityTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Utility) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UtilityTableMap::DATABASE_NAME);
            $criteria->add(UtilityTableMap::COL_UTILITYNUMBERID, (array) $values, Criteria::IN);
        }

        $query = UtilityQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UtilityTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UtilityTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the utility table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UtilityQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Utility or Criteria object.
     *
     * @param mixed               $criteria Criteria or Utility object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtilityTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Utility object
        }

        if ($criteria->containsKey(UtilityTableMap::COL_UTILITYNUMBERID) && $criteria->keyContainsValue(UtilityTableMap::COL_UTILITYNUMBERID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UtilityTableMap::COL_UTILITYNUMBERID.')');
        }


        // Set the correct dbName
        $query = UtilityQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UtilityTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UtilityTableMap::buildTableMap();
