<?php

namespace Map;

use \Phone;
use \PhoneQuery;
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
 * This class defines the structure of the 'phone' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PhoneTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PhoneTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'phone';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Phone';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Phone';

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
     * the column name for the phoneNumberID field
     */
    const COL_PHONENUMBERID = 'phone.phoneNumberID';

    /**
     * the column name for the userID field
     */
    const COL_USERID = 'phone.userID';

    /**
     * the column name for the addDate field
     */
    const COL_ADDDATE = 'phone.addDate';

    /**
     * the column name for the areaCode field
     */
    const COL_AREACODE = 'phone.areaCode';

    /**
     * the column name for the number field
     */
    const COL_NUMBER = 'phone.number';

    /**
     * the column name for the extension field
     */
    const COL_EXTENSION = 'phone.extension';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'phone.description';

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
        self::TYPE_PHPNAME       => array('Phonenumberid', 'Userid', 'Adddate', 'Areacode', 'Number', 'Extension', 'Description', ),
        self::TYPE_CAMELNAME     => array('phonenumberid', 'userid', 'adddate', 'areacode', 'number', 'extension', 'description', ),
        self::TYPE_COLNAME       => array(PhoneTableMap::COL_PHONENUMBERID, PhoneTableMap::COL_USERID, PhoneTableMap::COL_ADDDATE, PhoneTableMap::COL_AREACODE, PhoneTableMap::COL_NUMBER, PhoneTableMap::COL_EXTENSION, PhoneTableMap::COL_DESCRIPTION, ),
        self::TYPE_FIELDNAME     => array('phoneNumberID', 'userID', 'addDate', 'areaCode', 'number', 'extension', 'description', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Phonenumberid' => 0, 'Userid' => 1, 'Adddate' => 2, 'Areacode' => 3, 'Number' => 4, 'Extension' => 5, 'Description' => 6, ),
        self::TYPE_CAMELNAME     => array('phonenumberid' => 0, 'userid' => 1, 'adddate' => 2, 'areacode' => 3, 'number' => 4, 'extension' => 5, 'description' => 6, ),
        self::TYPE_COLNAME       => array(PhoneTableMap::COL_PHONENUMBERID => 0, PhoneTableMap::COL_USERID => 1, PhoneTableMap::COL_ADDDATE => 2, PhoneTableMap::COL_AREACODE => 3, PhoneTableMap::COL_NUMBER => 4, PhoneTableMap::COL_EXTENSION => 5, PhoneTableMap::COL_DESCRIPTION => 6, ),
        self::TYPE_FIELDNAME     => array('phoneNumberID' => 0, 'userID' => 1, 'addDate' => 2, 'areaCode' => 3, 'number' => 4, 'extension' => 5, 'description' => 6, ),
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
        $this->setName('phone');
        $this->setPhpName('Phone');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Phone');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
<<<<<<< HEAD
        $this->addPrimaryKey('phoneNumberID', 'Phonenumberid', 'INTEGER', true, null, null);
        $this->addColumn('userID', 'Userid', 'INTEGER', true, null, null);
        $this->addColumn('addDate', 'Adddate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('areaCode', 'Areacode', 'LONGVARCHAR', true, null, null);
        $this->addColumn('number', 'Number', 'LONGVARCHAR', true, null, null);
        $this->addColumn('extension', 'Extension', 'LONGVARCHAR', false, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
=======
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addForeignKey('UserID', 'Userid', 'INTEGER', 'user', 'ID', true, null, null);
        $this->addColumn('Number', 'Number', 'VARCHAR', true, 64, null);
        $this->addColumn('Description', 'Description', 'CHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Phonenumberid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PhoneTableMap::CLASS_DEFAULT : PhoneTableMap::OM_CLASS;
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
     * @return array           (Phone object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PhoneTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PhoneTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PhoneTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PhoneTableMap::OM_CLASS;
            /** @var Phone $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PhoneTableMap::addInstanceToPool($obj, $key);
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
            $key = PhoneTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PhoneTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Phone $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PhoneTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PhoneTableMap::COL_PHONENUMBERID);
            $criteria->addSelectColumn(PhoneTableMap::COL_USERID);
            $criteria->addSelectColumn(PhoneTableMap::COL_ADDDATE);
            $criteria->addSelectColumn(PhoneTableMap::COL_AREACODE);
            $criteria->addSelectColumn(PhoneTableMap::COL_NUMBER);
            $criteria->addSelectColumn(PhoneTableMap::COL_EXTENSION);
            $criteria->addSelectColumn(PhoneTableMap::COL_DESCRIPTION);
        } else {
            $criteria->addSelectColumn($alias . '.phoneNumberID');
            $criteria->addSelectColumn($alias . '.userID');
            $criteria->addSelectColumn($alias . '.addDate');
            $criteria->addSelectColumn($alias . '.areaCode');
            $criteria->addSelectColumn($alias . '.number');
            $criteria->addSelectColumn($alias . '.extension');
            $criteria->addSelectColumn($alias . '.description');
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
        return Propel::getServiceContainer()->getDatabaseMap(PhoneTableMap::DATABASE_NAME)->getTable(PhoneTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PhoneTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PhoneTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PhoneTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Phone or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Phone object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PhoneTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Phone) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PhoneTableMap::DATABASE_NAME);
            $criteria->add(PhoneTableMap::COL_PHONENUMBERID, (array) $values, Criteria::IN);
        }

        $query = PhoneQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PhoneTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PhoneTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the phone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PhoneQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Phone or Criteria object.
     *
     * @param mixed               $criteria Criteria or Phone object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhoneTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Phone object
        }

        if ($criteria->containsKey(PhoneTableMap::COL_PHONENUMBERID) && $criteria->keyContainsValue(PhoneTableMap::COL_PHONENUMBERID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PhoneTableMap::COL_PHONENUMBERID.')');
        }


        // Set the correct dbName
        $query = PhoneQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PhoneTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PhoneTableMap::buildTableMap();
