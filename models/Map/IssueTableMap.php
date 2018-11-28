<?php

namespace Map;

use \Issue;
use \IssueQuery;
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
 * This class defines the structure of the 'issue' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class IssueTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.IssueTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'issue';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Issue';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Issue';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the issueNumberID field
     */
    const COL_ISSUENUMBERID = 'issue.issueNumberID';

    /**
     * the column name for the propertyID field
     */
    const COL_PROPERTYID = 'issue.propertyID';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'issue.name';

    /**
     * the column name for the details field
     */
    const COL_DETAILS = 'issue.details';

    /**
     * the column name for the foundDate field
     */
    const COL_FOUNDDATE = 'issue.foundDate';

    /**
     * the column name for the repairDate field
     */
    const COL_REPAIRDATE = 'issue.repairDate';

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
        self::TYPE_PHPNAME       => array('Issuenumberid', 'Propertyid', 'Name', 'Details', 'Founddate', 'Repairdate', ),
        self::TYPE_CAMELNAME     => array('issuenumberid', 'propertyid', 'name', 'details', 'founddate', 'repairdate', ),
        self::TYPE_COLNAME       => array(IssueTableMap::COL_ISSUENUMBERID, IssueTableMap::COL_PROPERTYID, IssueTableMap::COL_NAME, IssueTableMap::COL_DETAILS, IssueTableMap::COL_FOUNDDATE, IssueTableMap::COL_REPAIRDATE, ),
        self::TYPE_FIELDNAME     => array('issueNumberID', 'propertyID', 'name', 'details', 'foundDate', 'repairDate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Issuenumberid' => 0, 'Propertyid' => 1, 'Name' => 2, 'Details' => 3, 'Founddate' => 4, 'Repairdate' => 5, ),
        self::TYPE_CAMELNAME     => array('issuenumberid' => 0, 'propertyid' => 1, 'name' => 2, 'details' => 3, 'founddate' => 4, 'repairdate' => 5, ),
        self::TYPE_COLNAME       => array(IssueTableMap::COL_ISSUENUMBERID => 0, IssueTableMap::COL_PROPERTYID => 1, IssueTableMap::COL_NAME => 2, IssueTableMap::COL_DETAILS => 3, IssueTableMap::COL_FOUNDDATE => 4, IssueTableMap::COL_REPAIRDATE => 5, ),
        self::TYPE_FIELDNAME     => array('issueNumberID' => 0, 'propertyID' => 1, 'name' => 2, 'details' => 3, 'foundDate' => 4, 'repairDate' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('issue');
        $this->setPhpName('Issue');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Issue');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('issueNumberID', 'Issuenumberid', 'INTEGER', true, null, null);
        $this->addColumn('propertyID', 'Propertyid', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', true, null, null);
        $this->addColumn('details', 'Details', 'LONGVARCHAR', false, null, null);
        $this->addColumn('foundDate', 'Founddate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('repairDate', 'Repairdate', 'TIMESTAMP', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Issuenumberid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? IssueTableMap::CLASS_DEFAULT : IssueTableMap::OM_CLASS;
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
     * @return array           (Issue object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = IssueTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = IssueTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + IssueTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = IssueTableMap::OM_CLASS;
            /** @var Issue $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            IssueTableMap::addInstanceToPool($obj, $key);
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
            $key = IssueTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = IssueTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Issue $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                IssueTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(IssueTableMap::COL_ISSUENUMBERID);
            $criteria->addSelectColumn(IssueTableMap::COL_PROPERTYID);
            $criteria->addSelectColumn(IssueTableMap::COL_NAME);
            $criteria->addSelectColumn(IssueTableMap::COL_DETAILS);
            $criteria->addSelectColumn(IssueTableMap::COL_FOUNDDATE);
            $criteria->addSelectColumn(IssueTableMap::COL_REPAIRDATE);
        } else {
            $criteria->addSelectColumn($alias . '.issueNumberID');
            $criteria->addSelectColumn($alias . '.propertyID');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.details');
            $criteria->addSelectColumn($alias . '.foundDate');
            $criteria->addSelectColumn($alias . '.repairDate');
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
        return Propel::getServiceContainer()->getDatabaseMap(IssueTableMap::DATABASE_NAME)->getTable(IssueTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(IssueTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(IssueTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new IssueTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Issue or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Issue object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Issue) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(IssueTableMap::DATABASE_NAME);
            $criteria->add(IssueTableMap::COL_ISSUENUMBERID, (array) $values, Criteria::IN);
        }

        $query = IssueQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            IssueTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                IssueTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the issue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return IssueQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Issue or Criteria object.
     *
     * @param mixed               $criteria Criteria or Issue object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Issue object
        }

        if ($criteria->containsKey(IssueTableMap::COL_ISSUENUMBERID) && $criteria->keyContainsValue(IssueTableMap::COL_ISSUENUMBERID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.IssueTableMap::COL_ISSUENUMBERID.')');
        }


        // Set the correct dbName
        $query = IssueQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // IssueTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
IssueTableMap::buildTableMap();
