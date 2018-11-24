<?php

namespace Base;

use \Email as ChildEmail;
use \EmailQuery as ChildEmailQuery;
use \Lives as ChildLives;
use \LivesQuery as ChildLivesQuery;
use \Owed as ChildOwed;
use \OwedQuery as ChildOwedQuery;
use \Payment as ChildPayment;
use \PaymentQuery as ChildPaymentQuery;
use \Phone as ChildPhone;
use \PhoneQuery as ChildPhoneQuery;
use \Property as ChildProperty;
use \PropertyQuery as ChildPropertyQuery;
use \Tenant as ChildTenant;
use \TenantQuery as ChildTenantQuery;
use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\EmailTableMap;
use Map\LivesTableMap;
use Map\OwedTableMap;
use Map\PaymentTableMap;
use Map\PhoneTableMap;
use Map\PropertyTableMap;
use Map\TenantTableMap;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'user' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class User implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UserTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the firstname field.
     *
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the middlename field.
     *
     * @var        string
     */
    protected $middlename;

    /**
     * The value for the lastname field.
     *
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the hashedpassword field.
     *
     * @var        string
     */
    protected $hashedpassword;

    /**
     * @var        ObjectCollection|ChildEmail[] Collection to store aggregation of ChildEmail objects.
     */
    protected $collEmails;
    protected $collEmailsPartial;

    /**
     * @var        ObjectCollection|ChildLives[] Collection to store aggregation of ChildLives objects.
     */
    protected $collLivess;
    protected $collLivessPartial;

    /**
     * @var        ObjectCollection|ChildOwed[] Collection to store aggregation of ChildOwed objects.
     */
    protected $collOwedsRelatedByReceiverid;
    protected $collOwedsRelatedByReceiveridPartial;

    /**
     * @var        ObjectCollection|ChildOwed[] Collection to store aggregation of ChildOwed objects.
     */
    protected $collOwedsRelatedBySenderid;
    protected $collOwedsRelatedBySenderidPartial;

    /**
     * @var        ObjectCollection|ChildPayment[] Collection to store aggregation of ChildPayment objects.
     */
    protected $collPaymentsRelatedByReceiverid;
    protected $collPaymentsRelatedByReceiveridPartial;

    /**
     * @var        ObjectCollection|ChildPayment[] Collection to store aggregation of ChildPayment objects.
     */
    protected $collPaymentsRelatedBySenderid;
    protected $collPaymentsRelatedBySenderidPartial;

    /**
     * @var        ObjectCollection|ChildPhone[] Collection to store aggregation of ChildPhone objects.
     */
    protected $collPhones;
    protected $collPhonesPartial;

    /**
     * @var        ObjectCollection|ChildProperty[] Collection to store aggregation of ChildProperty objects.
     */
    protected $collProperties;
    protected $collPropertiesPartial;

    /**
     * @var        ObjectCollection|ChildTenant[] Collection to store aggregation of ChildTenant objects.
     */
    protected $collTenants;
    protected $collTenantsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEmail[]
     */
    protected $emailsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildLives[]
     */
    protected $livessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildOwed[]
     */
    protected $owedsRelatedByReceiveridScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildOwed[]
     */
    protected $owedsRelatedBySenderidScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPayment[]
     */
    protected $paymentsRelatedByReceiveridScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPayment[]
     */
    protected $paymentsRelatedBySenderidScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPhone[]
     */
    protected $phonesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProperty[]
     */
    protected $propertiesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTenant[]
     */
    protected $tenantsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\User object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>User</code> instance.  If
     * <code>obj</code> is an instance of <code>User</code>, delegates to
     * <code>equals(User)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|User The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [middlename] column value.
     *
     * @return string
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [hashedpassword] column value.
     *
     * @return string
     */
    public function getHashedpassword()
    {
        return $this->hashedpassword;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UserTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[UserTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [middlename] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setMiddlename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->middlename !== $v) {
            $this->middlename = $v;
            $this->modifiedColumns[UserTableMap::COL_MIDDLENAME] = true;
        }

        return $this;
    } // setMiddlename()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[UserTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [hashedpassword] column.
     *
     * @param string $v new value
     * @return $this|\User The current object (for fluent API support)
     */
    public function setHashedpassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hashedpassword !== $v) {
            $this->hashedpassword = $v;
            $this->modifiedColumns[UserTableMap::COL_HASHEDPASSWORD] = true;
        }

        return $this;
    } // setHashedpassword()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserTableMap::translateFieldName('Middlename', TableMap::TYPE_PHPNAME, $indexType)];
            $this->middlename = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserTableMap::translateFieldName('Hashedpassword', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hashedpassword = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = UserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\User'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collEmails = null;

            $this->collLivess = null;

            $this->collOwedsRelatedByReceiverid = null;

            $this->collOwedsRelatedBySenderid = null;

            $this->collPaymentsRelatedByReceiverid = null;

            $this->collPaymentsRelatedBySenderid = null;

            $this->collPhones = null;

            $this->collProperties = null;

            $this->collTenants = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see User::setDeleted()
     * @see User::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->emailsScheduledForDeletion !== null) {
                if (!$this->emailsScheduledForDeletion->isEmpty()) {
                    \EmailQuery::create()
                        ->filterByPrimaryKeys($this->emailsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->emailsScheduledForDeletion = null;
                }
            }

            if ($this->collEmails !== null) {
                foreach ($this->collEmails as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->livessScheduledForDeletion !== null) {
                if (!$this->livessScheduledForDeletion->isEmpty()) {
                    \LivesQuery::create()
                        ->filterByPrimaryKeys($this->livessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->livessScheduledForDeletion = null;
                }
            }

            if ($this->collLivess !== null) {
                foreach ($this->collLivess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->owedsRelatedByReceiveridScheduledForDeletion !== null) {
                if (!$this->owedsRelatedByReceiveridScheduledForDeletion->isEmpty()) {
                    \OwedQuery::create()
                        ->filterByPrimaryKeys($this->owedsRelatedByReceiveridScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->owedsRelatedByReceiveridScheduledForDeletion = null;
                }
            }

            if ($this->collOwedsRelatedByReceiverid !== null) {
                foreach ($this->collOwedsRelatedByReceiverid as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->owedsRelatedBySenderidScheduledForDeletion !== null) {
                if (!$this->owedsRelatedBySenderidScheduledForDeletion->isEmpty()) {
                    \OwedQuery::create()
                        ->filterByPrimaryKeys($this->owedsRelatedBySenderidScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->owedsRelatedBySenderidScheduledForDeletion = null;
                }
            }

            if ($this->collOwedsRelatedBySenderid !== null) {
                foreach ($this->collOwedsRelatedBySenderid as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->paymentsRelatedByReceiveridScheduledForDeletion !== null) {
                if (!$this->paymentsRelatedByReceiveridScheduledForDeletion->isEmpty()) {
                    \PaymentQuery::create()
                        ->filterByPrimaryKeys($this->paymentsRelatedByReceiveridScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentsRelatedByReceiveridScheduledForDeletion = null;
                }
            }

            if ($this->collPaymentsRelatedByReceiverid !== null) {
                foreach ($this->collPaymentsRelatedByReceiverid as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->paymentsRelatedBySenderidScheduledForDeletion !== null) {
                if (!$this->paymentsRelatedBySenderidScheduledForDeletion->isEmpty()) {
                    \PaymentQuery::create()
                        ->filterByPrimaryKeys($this->paymentsRelatedBySenderidScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentsRelatedBySenderidScheduledForDeletion = null;
                }
            }

            if ($this->collPaymentsRelatedBySenderid !== null) {
                foreach ($this->collPaymentsRelatedBySenderid as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->phonesScheduledForDeletion !== null) {
                if (!$this->phonesScheduledForDeletion->isEmpty()) {
                    \PhoneQuery::create()
                        ->filterByPrimaryKeys($this->phonesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->phonesScheduledForDeletion = null;
                }
            }

            if ($this->collPhones !== null) {
                foreach ($this->collPhones as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->propertiesScheduledForDeletion !== null) {
                if (!$this->propertiesScheduledForDeletion->isEmpty()) {
                    \PropertyQuery::create()
                        ->filterByPrimaryKeys($this->propertiesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->propertiesScheduledForDeletion = null;
                }
            }

            if ($this->collProperties !== null) {
                foreach ($this->collProperties as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tenantsScheduledForDeletion !== null) {
                if (!$this->tenantsScheduledForDeletion->isEmpty()) {
                    \TenantQuery::create()
                        ->filterByPrimaryKeys($this->tenantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tenantsScheduledForDeletion = null;
                }
            }

            if ($this->collTenants !== null) {
                foreach ($this->collTenants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[UserTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(UserTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'FirstName';
        }
        if ($this->isColumnModified(UserTableMap::COL_MIDDLENAME)) {
            $modifiedColumns[':p' . $index++]  = 'MiddleName';
        }
        if ($this->isColumnModified(UserTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'LastName';
        }
        if ($this->isColumnModified(UserTableMap::COL_HASHEDPASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'HashedPassword';
        }

        $sql = sprintf(
            'INSERT INTO user (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'FirstName':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case 'MiddleName':
                        $stmt->bindValue($identifier, $this->middlename, PDO::PARAM_STR);
                        break;
                    case 'LastName':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'HashedPassword':
                        $stmt->bindValue($identifier, $this->hashedpassword, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getFirstname();
                break;
            case 2:
                return $this->getMiddlename();
                break;
            case 3:
                return $this->getLastname();
                break;
            case 4:
                return $this->getHashedpassword();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['User'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->hashCode()] = true;
        $keys = UserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFirstname(),
            $keys[2] => $this->getMiddlename(),
            $keys[3] => $this->getLastname(),
            $keys[4] => $this->getHashedpassword(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collEmails) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'emails';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'emails';
                        break;
                    default:
                        $key = 'Emails';
                }

                $result[$key] = $this->collEmails->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLivess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'livess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'livess';
                        break;
                    default:
                        $key = 'Livess';
                }

                $result[$key] = $this->collLivess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOwedsRelatedByReceiverid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'oweds';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'oweds';
                        break;
                    default:
                        $key = 'Oweds';
                }

                $result[$key] = $this->collOwedsRelatedByReceiverid->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOwedsRelatedBySenderid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'oweds';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'oweds';
                        break;
                    default:
                        $key = 'Oweds';
                }

                $result[$key] = $this->collOwedsRelatedBySenderid->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPaymentsRelatedByReceiverid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'payments';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'payments';
                        break;
                    default:
                        $key = 'Payments';
                }

                $result[$key] = $this->collPaymentsRelatedByReceiverid->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPaymentsRelatedBySenderid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'payments';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'payments';
                        break;
                    default:
                        $key = 'Payments';
                }

                $result[$key] = $this->collPaymentsRelatedBySenderid->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPhones) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'phones';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'phones';
                        break;
                    default:
                        $key = 'Phones';
                }

                $result[$key] = $this->collPhones->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProperties) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'properties';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'properties';
                        break;
                    default:
                        $key = 'Properties';
                }

                $result[$key] = $this->collProperties->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTenants) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tenants';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tenants';
                        break;
                    default:
                        $key = 'Tenants';
                }

                $result[$key] = $this->collTenants->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\User
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\User
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFirstname($value);
                break;
            case 2:
                $this->setMiddlename($value);
                break;
            case 3:
                $this->setLastname($value);
                break;
            case 4:
                $this->setHashedpassword($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = UserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstname($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMiddlename($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLastname($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setHashedpassword($arr[$keys[4]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\User The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserTableMap::COL_ID)) {
            $criteria->add(UserTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(UserTableMap::COL_FIRSTNAME)) {
            $criteria->add(UserTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(UserTableMap::COL_MIDDLENAME)) {
            $criteria->add(UserTableMap::COL_MIDDLENAME, $this->middlename);
        }
        if ($this->isColumnModified(UserTableMap::COL_LASTNAME)) {
            $criteria->add(UserTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(UserTableMap::COL_HASHEDPASSWORD)) {
            $criteria->add(UserTableMap::COL_HASHEDPASSWORD, $this->hashedpassword);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildUserQuery::create();
        $criteria->add(UserTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \User (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setMiddlename($this->getMiddlename());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setHashedpassword($this->getHashedpassword());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEmails() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEmail($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLivess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLives($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOwedsRelatedByReceiverid() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOwedRelatedByReceiverid($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOwedsRelatedBySenderid() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOwedRelatedBySenderid($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPaymentsRelatedByReceiverid() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPaymentRelatedByReceiverid($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPaymentsRelatedBySenderid() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPaymentRelatedBySenderid($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPhones() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPhone($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProperties() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProperty($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTenants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTenant($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \User Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Email' == $relationName) {
            $this->initEmails();
            return;
        }
        if ('Lives' == $relationName) {
            $this->initLivess();
            return;
        }
        if ('OwedRelatedByReceiverid' == $relationName) {
            $this->initOwedsRelatedByReceiverid();
            return;
        }
        if ('OwedRelatedBySenderid' == $relationName) {
            $this->initOwedsRelatedBySenderid();
            return;
        }
        if ('PaymentRelatedByReceiverid' == $relationName) {
            $this->initPaymentsRelatedByReceiverid();
            return;
        }
        if ('PaymentRelatedBySenderid' == $relationName) {
            $this->initPaymentsRelatedBySenderid();
            return;
        }
        if ('Phone' == $relationName) {
            $this->initPhones();
            return;
        }
        if ('Property' == $relationName) {
            $this->initProperties();
            return;
        }
        if ('Tenant' == $relationName) {
            $this->initTenants();
            return;
        }
    }

    /**
     * Clears out the collEmails collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEmails()
     */
    public function clearEmails()
    {
        $this->collEmails = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEmails collection loaded partially.
     */
    public function resetPartialEmails($v = true)
    {
        $this->collEmailsPartial = $v;
    }

    /**
     * Initializes the collEmails collection.
     *
     * By default this just sets the collEmails collection to an empty array (like clearcollEmails());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEmails($overrideExisting = true)
    {
        if (null !== $this->collEmails && !$overrideExisting) {
            return;
        }

        $collectionClassName = EmailTableMap::getTableMap()->getCollectionClassName();

        $this->collEmails = new $collectionClassName;
        $this->collEmails->setModel('\Email');
    }

    /**
     * Gets an array of ChildEmail objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEmail[] List of ChildEmail objects
     * @throws PropelException
     */
    public function getEmails(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEmailsPartial && !$this->isNew();
        if (null === $this->collEmails || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEmails) {
                // return empty collection
                $this->initEmails();
            } else {
                $collEmails = ChildEmailQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEmailsPartial && count($collEmails)) {
                        $this->initEmails(false);

                        foreach ($collEmails as $obj) {
                            if (false == $this->collEmails->contains($obj)) {
                                $this->collEmails->append($obj);
                            }
                        }

                        $this->collEmailsPartial = true;
                    }

                    return $collEmails;
                }

                if ($partial && $this->collEmails) {
                    foreach ($this->collEmails as $obj) {
                        if ($obj->isNew()) {
                            $collEmails[] = $obj;
                        }
                    }
                }

                $this->collEmails = $collEmails;
                $this->collEmailsPartial = false;
            }
        }

        return $this->collEmails;
    }

    /**
     * Sets a collection of ChildEmail objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $emails A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setEmails(Collection $emails, ConnectionInterface $con = null)
    {
        /** @var ChildEmail[] $emailsToDelete */
        $emailsToDelete = $this->getEmails(new Criteria(), $con)->diff($emails);


        $this->emailsScheduledForDeletion = $emailsToDelete;

        foreach ($emailsToDelete as $emailRemoved) {
            $emailRemoved->setUser(null);
        }

        $this->collEmails = null;
        foreach ($emails as $email) {
            $this->addEmail($email);
        }

        $this->collEmails = $emails;
        $this->collEmailsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Email objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Email objects.
     * @throws PropelException
     */
    public function countEmails(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEmailsPartial && !$this->isNew();
        if (null === $this->collEmails || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEmails) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEmails());
            }

            $query = ChildEmailQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collEmails);
    }

    /**
     * Method called to associate a ChildEmail object to this object
     * through the ChildEmail foreign key attribute.
     *
     * @param  ChildEmail $l ChildEmail
     * @return $this|\User The current object (for fluent API support)
     */
    public function addEmail(ChildEmail $l)
    {
        if ($this->collEmails === null) {
            $this->initEmails();
            $this->collEmailsPartial = true;
        }

        if (!$this->collEmails->contains($l)) {
            $this->doAddEmail($l);

            if ($this->emailsScheduledForDeletion and $this->emailsScheduledForDeletion->contains($l)) {
                $this->emailsScheduledForDeletion->remove($this->emailsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEmail $email The ChildEmail object to add.
     */
    protected function doAddEmail(ChildEmail $email)
    {
        $this->collEmails[]= $email;
        $email->setUser($this);
    }

    /**
     * @param  ChildEmail $email The ChildEmail object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeEmail(ChildEmail $email)
    {
        if ($this->getEmails()->contains($email)) {
            $pos = $this->collEmails->search($email);
            $this->collEmails->remove($pos);
            if (null === $this->emailsScheduledForDeletion) {
                $this->emailsScheduledForDeletion = clone $this->collEmails;
                $this->emailsScheduledForDeletion->clear();
            }
            $this->emailsScheduledForDeletion[]= clone $email;
            $email->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collLivess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addLivess()
     */
    public function clearLivess()
    {
        $this->collLivess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collLivess collection loaded partially.
     */
    public function resetPartialLivess($v = true)
    {
        $this->collLivessPartial = $v;
    }

    /**
     * Initializes the collLivess collection.
     *
     * By default this just sets the collLivess collection to an empty array (like clearcollLivess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLivess($overrideExisting = true)
    {
        if (null !== $this->collLivess && !$overrideExisting) {
            return;
        }

        $collectionClassName = LivesTableMap::getTableMap()->getCollectionClassName();

        $this->collLivess = new $collectionClassName;
        $this->collLivess->setModel('\Lives');
    }

    /**
     * Gets an array of ChildLives objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildLives[] List of ChildLives objects
     * @throws PropelException
     */
    public function getLivess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collLivessPartial && !$this->isNew();
        if (null === $this->collLivess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLivess) {
                // return empty collection
                $this->initLivess();
            } else {
                $collLivess = ChildLivesQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collLivessPartial && count($collLivess)) {
                        $this->initLivess(false);

                        foreach ($collLivess as $obj) {
                            if (false == $this->collLivess->contains($obj)) {
                                $this->collLivess->append($obj);
                            }
                        }

                        $this->collLivessPartial = true;
                    }

                    return $collLivess;
                }

                if ($partial && $this->collLivess) {
                    foreach ($this->collLivess as $obj) {
                        if ($obj->isNew()) {
                            $collLivess[] = $obj;
                        }
                    }
                }

                $this->collLivess = $collLivess;
                $this->collLivessPartial = false;
            }
        }

        return $this->collLivess;
    }

    /**
     * Sets a collection of ChildLives objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $livess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setLivess(Collection $livess, ConnectionInterface $con = null)
    {
        /** @var ChildLives[] $livessToDelete */
        $livessToDelete = $this->getLivess(new Criteria(), $con)->diff($livess);


        $this->livessScheduledForDeletion = $livessToDelete;

        foreach ($livessToDelete as $livesRemoved) {
            $livesRemoved->setUser(null);
        }

        $this->collLivess = null;
        foreach ($livess as $lives) {
            $this->addLives($lives);
        }

        $this->collLivess = $livess;
        $this->collLivessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Lives objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Lives objects.
     * @throws PropelException
     */
    public function countLivess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collLivessPartial && !$this->isNew();
        if (null === $this->collLivess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLivess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLivess());
            }

            $query = ChildLivesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collLivess);
    }

    /**
     * Method called to associate a ChildLives object to this object
     * through the ChildLives foreign key attribute.
     *
     * @param  ChildLives $l ChildLives
     * @return $this|\User The current object (for fluent API support)
     */
    public function addLives(ChildLives $l)
    {
        if ($this->collLivess === null) {
            $this->initLivess();
            $this->collLivessPartial = true;
        }

        if (!$this->collLivess->contains($l)) {
            $this->doAddLives($l);

            if ($this->livessScheduledForDeletion and $this->livessScheduledForDeletion->contains($l)) {
                $this->livessScheduledForDeletion->remove($this->livessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildLives $lives The ChildLives object to add.
     */
    protected function doAddLives(ChildLives $lives)
    {
        $this->collLivess[]= $lives;
        $lives->setUser($this);
    }

    /**
     * @param  ChildLives $lives The ChildLives object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeLives(ChildLives $lives)
    {
        if ($this->getLivess()->contains($lives)) {
            $pos = $this->collLivess->search($lives);
            $this->collLivess->remove($pos);
            if (null === $this->livessScheduledForDeletion) {
                $this->livessScheduledForDeletion = clone $this->collLivess;
                $this->livessScheduledForDeletion->clear();
            }
            $this->livessScheduledForDeletion[]= clone $lives;
            $lives->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collOwedsRelatedByReceiverid collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOwedsRelatedByReceiverid()
     */
    public function clearOwedsRelatedByReceiverid()
    {
        $this->collOwedsRelatedByReceiverid = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOwedsRelatedByReceiverid collection loaded partially.
     */
    public function resetPartialOwedsRelatedByReceiverid($v = true)
    {
        $this->collOwedsRelatedByReceiveridPartial = $v;
    }

    /**
     * Initializes the collOwedsRelatedByReceiverid collection.
     *
     * By default this just sets the collOwedsRelatedByReceiverid collection to an empty array (like clearcollOwedsRelatedByReceiverid());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOwedsRelatedByReceiverid($overrideExisting = true)
    {
        if (null !== $this->collOwedsRelatedByReceiverid && !$overrideExisting) {
            return;
        }

        $collectionClassName = OwedTableMap::getTableMap()->getCollectionClassName();

        $this->collOwedsRelatedByReceiverid = new $collectionClassName;
        $this->collOwedsRelatedByReceiverid->setModel('\Owed');
    }

    /**
     * Gets an array of ChildOwed objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildOwed[] List of ChildOwed objects
     * @throws PropelException
     */
    public function getOwedsRelatedByReceiverid(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOwedsRelatedByReceiveridPartial && !$this->isNew();
        if (null === $this->collOwedsRelatedByReceiverid || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOwedsRelatedByReceiverid) {
                // return empty collection
                $this->initOwedsRelatedByReceiverid();
            } else {
                $collOwedsRelatedByReceiverid = ChildOwedQuery::create(null, $criteria)
                    ->filterByUserRelatedByReceiverid($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collOwedsRelatedByReceiveridPartial && count($collOwedsRelatedByReceiverid)) {
                        $this->initOwedsRelatedByReceiverid(false);

                        foreach ($collOwedsRelatedByReceiverid as $obj) {
                            if (false == $this->collOwedsRelatedByReceiverid->contains($obj)) {
                                $this->collOwedsRelatedByReceiverid->append($obj);
                            }
                        }

                        $this->collOwedsRelatedByReceiveridPartial = true;
                    }

                    return $collOwedsRelatedByReceiverid;
                }

                if ($partial && $this->collOwedsRelatedByReceiverid) {
                    foreach ($this->collOwedsRelatedByReceiverid as $obj) {
                        if ($obj->isNew()) {
                            $collOwedsRelatedByReceiverid[] = $obj;
                        }
                    }
                }

                $this->collOwedsRelatedByReceiverid = $collOwedsRelatedByReceiverid;
                $this->collOwedsRelatedByReceiveridPartial = false;
            }
        }

        return $this->collOwedsRelatedByReceiverid;
    }

    /**
     * Sets a collection of ChildOwed objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $owedsRelatedByReceiverid A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setOwedsRelatedByReceiverid(Collection $owedsRelatedByReceiverid, ConnectionInterface $con = null)
    {
        /** @var ChildOwed[] $owedsRelatedByReceiveridToDelete */
        $owedsRelatedByReceiveridToDelete = $this->getOwedsRelatedByReceiverid(new Criteria(), $con)->diff($owedsRelatedByReceiverid);


        $this->owedsRelatedByReceiveridScheduledForDeletion = $owedsRelatedByReceiveridToDelete;

        foreach ($owedsRelatedByReceiveridToDelete as $owedRelatedByReceiveridRemoved) {
            $owedRelatedByReceiveridRemoved->setUserRelatedByReceiverid(null);
        }

        $this->collOwedsRelatedByReceiverid = null;
        foreach ($owedsRelatedByReceiverid as $owedRelatedByReceiverid) {
            $this->addOwedRelatedByReceiverid($owedRelatedByReceiverid);
        }

        $this->collOwedsRelatedByReceiverid = $owedsRelatedByReceiverid;
        $this->collOwedsRelatedByReceiveridPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Owed objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Owed objects.
     * @throws PropelException
     */
    public function countOwedsRelatedByReceiverid(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOwedsRelatedByReceiveridPartial && !$this->isNew();
        if (null === $this->collOwedsRelatedByReceiverid || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOwedsRelatedByReceiverid) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOwedsRelatedByReceiverid());
            }

            $query = ChildOwedQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByReceiverid($this)
                ->count($con);
        }

        return count($this->collOwedsRelatedByReceiverid);
    }

    /**
     * Method called to associate a ChildOwed object to this object
     * through the ChildOwed foreign key attribute.
     *
     * @param  ChildOwed $l ChildOwed
     * @return $this|\User The current object (for fluent API support)
     */
    public function addOwedRelatedByReceiverid(ChildOwed $l)
    {
        if ($this->collOwedsRelatedByReceiverid === null) {
            $this->initOwedsRelatedByReceiverid();
            $this->collOwedsRelatedByReceiveridPartial = true;
        }

        if (!$this->collOwedsRelatedByReceiverid->contains($l)) {
            $this->doAddOwedRelatedByReceiverid($l);

            if ($this->owedsRelatedByReceiveridScheduledForDeletion and $this->owedsRelatedByReceiveridScheduledForDeletion->contains($l)) {
                $this->owedsRelatedByReceiveridScheduledForDeletion->remove($this->owedsRelatedByReceiveridScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildOwed $owedRelatedByReceiverid The ChildOwed object to add.
     */
    protected function doAddOwedRelatedByReceiverid(ChildOwed $owedRelatedByReceiverid)
    {
        $this->collOwedsRelatedByReceiverid[]= $owedRelatedByReceiverid;
        $owedRelatedByReceiverid->setUserRelatedByReceiverid($this);
    }

    /**
     * @param  ChildOwed $owedRelatedByReceiverid The ChildOwed object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeOwedRelatedByReceiverid(ChildOwed $owedRelatedByReceiverid)
    {
        if ($this->getOwedsRelatedByReceiverid()->contains($owedRelatedByReceiverid)) {
            $pos = $this->collOwedsRelatedByReceiverid->search($owedRelatedByReceiverid);
            $this->collOwedsRelatedByReceiverid->remove($pos);
            if (null === $this->owedsRelatedByReceiveridScheduledForDeletion) {
                $this->owedsRelatedByReceiveridScheduledForDeletion = clone $this->collOwedsRelatedByReceiverid;
                $this->owedsRelatedByReceiveridScheduledForDeletion->clear();
            }
            $this->owedsRelatedByReceiveridScheduledForDeletion[]= clone $owedRelatedByReceiverid;
            $owedRelatedByReceiverid->setUserRelatedByReceiverid(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related OwedsRelatedByReceiverid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildOwed[] List of ChildOwed objects
     */
    public function getOwedsRelatedByReceiveridJoinPaymentRelatedByPaymentid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildOwedQuery::create(null, $criteria);
        $query->joinWith('PaymentRelatedByPaymentid', $joinBehavior);

        return $this->getOwedsRelatedByReceiverid($query, $con);
    }

    /**
     * Clears out the collOwedsRelatedBySenderid collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOwedsRelatedBySenderid()
     */
    public function clearOwedsRelatedBySenderid()
    {
        $this->collOwedsRelatedBySenderid = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOwedsRelatedBySenderid collection loaded partially.
     */
    public function resetPartialOwedsRelatedBySenderid($v = true)
    {
        $this->collOwedsRelatedBySenderidPartial = $v;
    }

    /**
     * Initializes the collOwedsRelatedBySenderid collection.
     *
     * By default this just sets the collOwedsRelatedBySenderid collection to an empty array (like clearcollOwedsRelatedBySenderid());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOwedsRelatedBySenderid($overrideExisting = true)
    {
        if (null !== $this->collOwedsRelatedBySenderid && !$overrideExisting) {
            return;
        }

        $collectionClassName = OwedTableMap::getTableMap()->getCollectionClassName();

        $this->collOwedsRelatedBySenderid = new $collectionClassName;
        $this->collOwedsRelatedBySenderid->setModel('\Owed');
    }

    /**
     * Gets an array of ChildOwed objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildOwed[] List of ChildOwed objects
     * @throws PropelException
     */
    public function getOwedsRelatedBySenderid(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOwedsRelatedBySenderidPartial && !$this->isNew();
        if (null === $this->collOwedsRelatedBySenderid || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOwedsRelatedBySenderid) {
                // return empty collection
                $this->initOwedsRelatedBySenderid();
            } else {
                $collOwedsRelatedBySenderid = ChildOwedQuery::create(null, $criteria)
                    ->filterByUserRelatedBySenderid($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collOwedsRelatedBySenderidPartial && count($collOwedsRelatedBySenderid)) {
                        $this->initOwedsRelatedBySenderid(false);

                        foreach ($collOwedsRelatedBySenderid as $obj) {
                            if (false == $this->collOwedsRelatedBySenderid->contains($obj)) {
                                $this->collOwedsRelatedBySenderid->append($obj);
                            }
                        }

                        $this->collOwedsRelatedBySenderidPartial = true;
                    }

                    return $collOwedsRelatedBySenderid;
                }

                if ($partial && $this->collOwedsRelatedBySenderid) {
                    foreach ($this->collOwedsRelatedBySenderid as $obj) {
                        if ($obj->isNew()) {
                            $collOwedsRelatedBySenderid[] = $obj;
                        }
                    }
                }

                $this->collOwedsRelatedBySenderid = $collOwedsRelatedBySenderid;
                $this->collOwedsRelatedBySenderidPartial = false;
            }
        }

        return $this->collOwedsRelatedBySenderid;
    }

    /**
     * Sets a collection of ChildOwed objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $owedsRelatedBySenderid A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setOwedsRelatedBySenderid(Collection $owedsRelatedBySenderid, ConnectionInterface $con = null)
    {
        /** @var ChildOwed[] $owedsRelatedBySenderidToDelete */
        $owedsRelatedBySenderidToDelete = $this->getOwedsRelatedBySenderid(new Criteria(), $con)->diff($owedsRelatedBySenderid);


        $this->owedsRelatedBySenderidScheduledForDeletion = $owedsRelatedBySenderidToDelete;

        foreach ($owedsRelatedBySenderidToDelete as $owedRelatedBySenderidRemoved) {
            $owedRelatedBySenderidRemoved->setUserRelatedBySenderid(null);
        }

        $this->collOwedsRelatedBySenderid = null;
        foreach ($owedsRelatedBySenderid as $owedRelatedBySenderid) {
            $this->addOwedRelatedBySenderid($owedRelatedBySenderid);
        }

        $this->collOwedsRelatedBySenderid = $owedsRelatedBySenderid;
        $this->collOwedsRelatedBySenderidPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Owed objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Owed objects.
     * @throws PropelException
     */
    public function countOwedsRelatedBySenderid(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOwedsRelatedBySenderidPartial && !$this->isNew();
        if (null === $this->collOwedsRelatedBySenderid || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOwedsRelatedBySenderid) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOwedsRelatedBySenderid());
            }

            $query = ChildOwedQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedBySenderid($this)
                ->count($con);
        }

        return count($this->collOwedsRelatedBySenderid);
    }

    /**
     * Method called to associate a ChildOwed object to this object
     * through the ChildOwed foreign key attribute.
     *
     * @param  ChildOwed $l ChildOwed
     * @return $this|\User The current object (for fluent API support)
     */
    public function addOwedRelatedBySenderid(ChildOwed $l)
    {
        if ($this->collOwedsRelatedBySenderid === null) {
            $this->initOwedsRelatedBySenderid();
            $this->collOwedsRelatedBySenderidPartial = true;
        }

        if (!$this->collOwedsRelatedBySenderid->contains($l)) {
            $this->doAddOwedRelatedBySenderid($l);

            if ($this->owedsRelatedBySenderidScheduledForDeletion and $this->owedsRelatedBySenderidScheduledForDeletion->contains($l)) {
                $this->owedsRelatedBySenderidScheduledForDeletion->remove($this->owedsRelatedBySenderidScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildOwed $owedRelatedBySenderid The ChildOwed object to add.
     */
    protected function doAddOwedRelatedBySenderid(ChildOwed $owedRelatedBySenderid)
    {
        $this->collOwedsRelatedBySenderid[]= $owedRelatedBySenderid;
        $owedRelatedBySenderid->setUserRelatedBySenderid($this);
    }

    /**
     * @param  ChildOwed $owedRelatedBySenderid The ChildOwed object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeOwedRelatedBySenderid(ChildOwed $owedRelatedBySenderid)
    {
        if ($this->getOwedsRelatedBySenderid()->contains($owedRelatedBySenderid)) {
            $pos = $this->collOwedsRelatedBySenderid->search($owedRelatedBySenderid);
            $this->collOwedsRelatedBySenderid->remove($pos);
            if (null === $this->owedsRelatedBySenderidScheduledForDeletion) {
                $this->owedsRelatedBySenderidScheduledForDeletion = clone $this->collOwedsRelatedBySenderid;
                $this->owedsRelatedBySenderidScheduledForDeletion->clear();
            }
            $this->owedsRelatedBySenderidScheduledForDeletion[]= clone $owedRelatedBySenderid;
            $owedRelatedBySenderid->setUserRelatedBySenderid(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related OwedsRelatedBySenderid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildOwed[] List of ChildOwed objects
     */
    public function getOwedsRelatedBySenderidJoinPaymentRelatedByPaymentid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildOwedQuery::create(null, $criteria);
        $query->joinWith('PaymentRelatedByPaymentid', $joinBehavior);

        return $this->getOwedsRelatedBySenderid($query, $con);
    }

    /**
     * Clears out the collPaymentsRelatedByReceiverid collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPaymentsRelatedByReceiverid()
     */
    public function clearPaymentsRelatedByReceiverid()
    {
        $this->collPaymentsRelatedByReceiverid = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPaymentsRelatedByReceiverid collection loaded partially.
     */
    public function resetPartialPaymentsRelatedByReceiverid($v = true)
    {
        $this->collPaymentsRelatedByReceiveridPartial = $v;
    }

    /**
     * Initializes the collPaymentsRelatedByReceiverid collection.
     *
     * By default this just sets the collPaymentsRelatedByReceiverid collection to an empty array (like clearcollPaymentsRelatedByReceiverid());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaymentsRelatedByReceiverid($overrideExisting = true)
    {
        if (null !== $this->collPaymentsRelatedByReceiverid && !$overrideExisting) {
            return;
        }

        $collectionClassName = PaymentTableMap::getTableMap()->getCollectionClassName();

        $this->collPaymentsRelatedByReceiverid = new $collectionClassName;
        $this->collPaymentsRelatedByReceiverid->setModel('\Payment');
    }

    /**
     * Gets an array of ChildPayment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     * @throws PropelException
     */
    public function getPaymentsRelatedByReceiverid(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedByReceiveridPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedByReceiverid || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedByReceiverid) {
                // return empty collection
                $this->initPaymentsRelatedByReceiverid();
            } else {
                $collPaymentsRelatedByReceiverid = ChildPaymentQuery::create(null, $criteria)
                    ->filterByUserRelatedByReceiverid($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPaymentsRelatedByReceiveridPartial && count($collPaymentsRelatedByReceiverid)) {
                        $this->initPaymentsRelatedByReceiverid(false);

                        foreach ($collPaymentsRelatedByReceiverid as $obj) {
                            if (false == $this->collPaymentsRelatedByReceiverid->contains($obj)) {
                                $this->collPaymentsRelatedByReceiverid->append($obj);
                            }
                        }

                        $this->collPaymentsRelatedByReceiveridPartial = true;
                    }

                    return $collPaymentsRelatedByReceiverid;
                }

                if ($partial && $this->collPaymentsRelatedByReceiverid) {
                    foreach ($this->collPaymentsRelatedByReceiverid as $obj) {
                        if ($obj->isNew()) {
                            $collPaymentsRelatedByReceiverid[] = $obj;
                        }
                    }
                }

                $this->collPaymentsRelatedByReceiverid = $collPaymentsRelatedByReceiverid;
                $this->collPaymentsRelatedByReceiveridPartial = false;
            }
        }

        return $this->collPaymentsRelatedByReceiverid;
    }

    /**
     * Sets a collection of ChildPayment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $paymentsRelatedByReceiverid A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPaymentsRelatedByReceiverid(Collection $paymentsRelatedByReceiverid, ConnectionInterface $con = null)
    {
        /** @var ChildPayment[] $paymentsRelatedByReceiveridToDelete */
        $paymentsRelatedByReceiveridToDelete = $this->getPaymentsRelatedByReceiverid(new Criteria(), $con)->diff($paymentsRelatedByReceiverid);


        $this->paymentsRelatedByReceiveridScheduledForDeletion = $paymentsRelatedByReceiveridToDelete;

        foreach ($paymentsRelatedByReceiveridToDelete as $paymentRelatedByReceiveridRemoved) {
            $paymentRelatedByReceiveridRemoved->setUserRelatedByReceiverid(null);
        }

        $this->collPaymentsRelatedByReceiverid = null;
        foreach ($paymentsRelatedByReceiverid as $paymentRelatedByReceiverid) {
            $this->addPaymentRelatedByReceiverid($paymentRelatedByReceiverid);
        }

        $this->collPaymentsRelatedByReceiverid = $paymentsRelatedByReceiverid;
        $this->collPaymentsRelatedByReceiveridPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Payment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Payment objects.
     * @throws PropelException
     */
    public function countPaymentsRelatedByReceiverid(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedByReceiveridPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedByReceiverid || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedByReceiverid) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPaymentsRelatedByReceiverid());
            }

            $query = ChildPaymentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByReceiverid($this)
                ->count($con);
        }

        return count($this->collPaymentsRelatedByReceiverid);
    }

    /**
     * Method called to associate a ChildPayment object to this object
     * through the ChildPayment foreign key attribute.
     *
     * @param  ChildPayment $l ChildPayment
     * @return $this|\User The current object (for fluent API support)
     */
    public function addPaymentRelatedByReceiverid(ChildPayment $l)
    {
        if ($this->collPaymentsRelatedByReceiverid === null) {
            $this->initPaymentsRelatedByReceiverid();
            $this->collPaymentsRelatedByReceiveridPartial = true;
        }

        if (!$this->collPaymentsRelatedByReceiverid->contains($l)) {
            $this->doAddPaymentRelatedByReceiverid($l);

            if ($this->paymentsRelatedByReceiveridScheduledForDeletion and $this->paymentsRelatedByReceiveridScheduledForDeletion->contains($l)) {
                $this->paymentsRelatedByReceiveridScheduledForDeletion->remove($this->paymentsRelatedByReceiveridScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPayment $paymentRelatedByReceiverid The ChildPayment object to add.
     */
    protected function doAddPaymentRelatedByReceiverid(ChildPayment $paymentRelatedByReceiverid)
    {
        $this->collPaymentsRelatedByReceiverid[]= $paymentRelatedByReceiverid;
        $paymentRelatedByReceiverid->setUserRelatedByReceiverid($this);
    }

    /**
     * @param  ChildPayment $paymentRelatedByReceiverid The ChildPayment object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePaymentRelatedByReceiverid(ChildPayment $paymentRelatedByReceiverid)
    {
        if ($this->getPaymentsRelatedByReceiverid()->contains($paymentRelatedByReceiverid)) {
            $pos = $this->collPaymentsRelatedByReceiverid->search($paymentRelatedByReceiverid);
            $this->collPaymentsRelatedByReceiverid->remove($pos);
            if (null === $this->paymentsRelatedByReceiveridScheduledForDeletion) {
                $this->paymentsRelatedByReceiveridScheduledForDeletion = clone $this->collPaymentsRelatedByReceiverid;
                $this->paymentsRelatedByReceiveridScheduledForDeletion->clear();
            }
            $this->paymentsRelatedByReceiveridScheduledForDeletion[]= clone $paymentRelatedByReceiverid;
            $paymentRelatedByReceiverid->setUserRelatedByReceiverid(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related PaymentsRelatedByReceiverid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     */
    public function getPaymentsRelatedByReceiveridJoinOwedRelatedByOwedid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPaymentQuery::create(null, $criteria);
        $query->joinWith('OwedRelatedByOwedid', $joinBehavior);

        return $this->getPaymentsRelatedByReceiverid($query, $con);
    }

    /**
     * Clears out the collPaymentsRelatedBySenderid collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPaymentsRelatedBySenderid()
     */
    public function clearPaymentsRelatedBySenderid()
    {
        $this->collPaymentsRelatedBySenderid = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPaymentsRelatedBySenderid collection loaded partially.
     */
    public function resetPartialPaymentsRelatedBySenderid($v = true)
    {
        $this->collPaymentsRelatedBySenderidPartial = $v;
    }

    /**
     * Initializes the collPaymentsRelatedBySenderid collection.
     *
     * By default this just sets the collPaymentsRelatedBySenderid collection to an empty array (like clearcollPaymentsRelatedBySenderid());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaymentsRelatedBySenderid($overrideExisting = true)
    {
        if (null !== $this->collPaymentsRelatedBySenderid && !$overrideExisting) {
            return;
        }

        $collectionClassName = PaymentTableMap::getTableMap()->getCollectionClassName();

        $this->collPaymentsRelatedBySenderid = new $collectionClassName;
        $this->collPaymentsRelatedBySenderid->setModel('\Payment');
    }

    /**
     * Gets an array of ChildPayment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     * @throws PropelException
     */
    public function getPaymentsRelatedBySenderid(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedBySenderidPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedBySenderid || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedBySenderid) {
                // return empty collection
                $this->initPaymentsRelatedBySenderid();
            } else {
                $collPaymentsRelatedBySenderid = ChildPaymentQuery::create(null, $criteria)
                    ->filterByUserRelatedBySenderid($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPaymentsRelatedBySenderidPartial && count($collPaymentsRelatedBySenderid)) {
                        $this->initPaymentsRelatedBySenderid(false);

                        foreach ($collPaymentsRelatedBySenderid as $obj) {
                            if (false == $this->collPaymentsRelatedBySenderid->contains($obj)) {
                                $this->collPaymentsRelatedBySenderid->append($obj);
                            }
                        }

                        $this->collPaymentsRelatedBySenderidPartial = true;
                    }

                    return $collPaymentsRelatedBySenderid;
                }

                if ($partial && $this->collPaymentsRelatedBySenderid) {
                    foreach ($this->collPaymentsRelatedBySenderid as $obj) {
                        if ($obj->isNew()) {
                            $collPaymentsRelatedBySenderid[] = $obj;
                        }
                    }
                }

                $this->collPaymentsRelatedBySenderid = $collPaymentsRelatedBySenderid;
                $this->collPaymentsRelatedBySenderidPartial = false;
            }
        }

        return $this->collPaymentsRelatedBySenderid;
    }

    /**
     * Sets a collection of ChildPayment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $paymentsRelatedBySenderid A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPaymentsRelatedBySenderid(Collection $paymentsRelatedBySenderid, ConnectionInterface $con = null)
    {
        /** @var ChildPayment[] $paymentsRelatedBySenderidToDelete */
        $paymentsRelatedBySenderidToDelete = $this->getPaymentsRelatedBySenderid(new Criteria(), $con)->diff($paymentsRelatedBySenderid);


        $this->paymentsRelatedBySenderidScheduledForDeletion = $paymentsRelatedBySenderidToDelete;

        foreach ($paymentsRelatedBySenderidToDelete as $paymentRelatedBySenderidRemoved) {
            $paymentRelatedBySenderidRemoved->setUserRelatedBySenderid(null);
        }

        $this->collPaymentsRelatedBySenderid = null;
        foreach ($paymentsRelatedBySenderid as $paymentRelatedBySenderid) {
            $this->addPaymentRelatedBySenderid($paymentRelatedBySenderid);
        }

        $this->collPaymentsRelatedBySenderid = $paymentsRelatedBySenderid;
        $this->collPaymentsRelatedBySenderidPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Payment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Payment objects.
     * @throws PropelException
     */
    public function countPaymentsRelatedBySenderid(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedBySenderidPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedBySenderid || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedBySenderid) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPaymentsRelatedBySenderid());
            }

            $query = ChildPaymentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedBySenderid($this)
                ->count($con);
        }

        return count($this->collPaymentsRelatedBySenderid);
    }

    /**
     * Method called to associate a ChildPayment object to this object
     * through the ChildPayment foreign key attribute.
     *
     * @param  ChildPayment $l ChildPayment
     * @return $this|\User The current object (for fluent API support)
     */
    public function addPaymentRelatedBySenderid(ChildPayment $l)
    {
        if ($this->collPaymentsRelatedBySenderid === null) {
            $this->initPaymentsRelatedBySenderid();
            $this->collPaymentsRelatedBySenderidPartial = true;
        }

        if (!$this->collPaymentsRelatedBySenderid->contains($l)) {
            $this->doAddPaymentRelatedBySenderid($l);

            if ($this->paymentsRelatedBySenderidScheduledForDeletion and $this->paymentsRelatedBySenderidScheduledForDeletion->contains($l)) {
                $this->paymentsRelatedBySenderidScheduledForDeletion->remove($this->paymentsRelatedBySenderidScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPayment $paymentRelatedBySenderid The ChildPayment object to add.
     */
    protected function doAddPaymentRelatedBySenderid(ChildPayment $paymentRelatedBySenderid)
    {
        $this->collPaymentsRelatedBySenderid[]= $paymentRelatedBySenderid;
        $paymentRelatedBySenderid->setUserRelatedBySenderid($this);
    }

    /**
     * @param  ChildPayment $paymentRelatedBySenderid The ChildPayment object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePaymentRelatedBySenderid(ChildPayment $paymentRelatedBySenderid)
    {
        if ($this->getPaymentsRelatedBySenderid()->contains($paymentRelatedBySenderid)) {
            $pos = $this->collPaymentsRelatedBySenderid->search($paymentRelatedBySenderid);
            $this->collPaymentsRelatedBySenderid->remove($pos);
            if (null === $this->paymentsRelatedBySenderidScheduledForDeletion) {
                $this->paymentsRelatedBySenderidScheduledForDeletion = clone $this->collPaymentsRelatedBySenderid;
                $this->paymentsRelatedBySenderidScheduledForDeletion->clear();
            }
            $this->paymentsRelatedBySenderidScheduledForDeletion[]= clone $paymentRelatedBySenderid;
            $paymentRelatedBySenderid->setUserRelatedBySenderid(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related PaymentsRelatedBySenderid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     */
    public function getPaymentsRelatedBySenderidJoinOwedRelatedByOwedid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPaymentQuery::create(null, $criteria);
        $query->joinWith('OwedRelatedByOwedid', $joinBehavior);

        return $this->getPaymentsRelatedBySenderid($query, $con);
    }

    /**
     * Clears out the collPhones collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPhones()
     */
    public function clearPhones()
    {
        $this->collPhones = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPhones collection loaded partially.
     */
    public function resetPartialPhones($v = true)
    {
        $this->collPhonesPartial = $v;
    }

    /**
     * Initializes the collPhones collection.
     *
     * By default this just sets the collPhones collection to an empty array (like clearcollPhones());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPhones($overrideExisting = true)
    {
        if (null !== $this->collPhones && !$overrideExisting) {
            return;
        }

        $collectionClassName = PhoneTableMap::getTableMap()->getCollectionClassName();

        $this->collPhones = new $collectionClassName;
        $this->collPhones->setModel('\Phone');
    }

    /**
     * Gets an array of ChildPhone objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPhone[] List of ChildPhone objects
     * @throws PropelException
     */
    public function getPhones(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPhonesPartial && !$this->isNew();
        if (null === $this->collPhones || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPhones) {
                // return empty collection
                $this->initPhones();
            } else {
                $collPhones = ChildPhoneQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPhonesPartial && count($collPhones)) {
                        $this->initPhones(false);

                        foreach ($collPhones as $obj) {
                            if (false == $this->collPhones->contains($obj)) {
                                $this->collPhones->append($obj);
                            }
                        }

                        $this->collPhonesPartial = true;
                    }

                    return $collPhones;
                }

                if ($partial && $this->collPhones) {
                    foreach ($this->collPhones as $obj) {
                        if ($obj->isNew()) {
                            $collPhones[] = $obj;
                        }
                    }
                }

                $this->collPhones = $collPhones;
                $this->collPhonesPartial = false;
            }
        }

        return $this->collPhones;
    }

    /**
     * Sets a collection of ChildPhone objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $phones A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setPhones(Collection $phones, ConnectionInterface $con = null)
    {
        /** @var ChildPhone[] $phonesToDelete */
        $phonesToDelete = $this->getPhones(new Criteria(), $con)->diff($phones);


        $this->phonesScheduledForDeletion = $phonesToDelete;

        foreach ($phonesToDelete as $phoneRemoved) {
            $phoneRemoved->setUser(null);
        }

        $this->collPhones = null;
        foreach ($phones as $phone) {
            $this->addPhone($phone);
        }

        $this->collPhones = $phones;
        $this->collPhonesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Phone objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Phone objects.
     * @throws PropelException
     */
    public function countPhones(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPhonesPartial && !$this->isNew();
        if (null === $this->collPhones || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPhones) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPhones());
            }

            $query = ChildPhoneQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collPhones);
    }

    /**
     * Method called to associate a ChildPhone object to this object
     * through the ChildPhone foreign key attribute.
     *
     * @param  ChildPhone $l ChildPhone
     * @return $this|\User The current object (for fluent API support)
     */
    public function addPhone(ChildPhone $l)
    {
        if ($this->collPhones === null) {
            $this->initPhones();
            $this->collPhonesPartial = true;
        }

        if (!$this->collPhones->contains($l)) {
            $this->doAddPhone($l);

            if ($this->phonesScheduledForDeletion and $this->phonesScheduledForDeletion->contains($l)) {
                $this->phonesScheduledForDeletion->remove($this->phonesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPhone $phone The ChildPhone object to add.
     */
    protected function doAddPhone(ChildPhone $phone)
    {
        $this->collPhones[]= $phone;
        $phone->setUser($this);
    }

    /**
     * @param  ChildPhone $phone The ChildPhone object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removePhone(ChildPhone $phone)
    {
        if ($this->getPhones()->contains($phone)) {
            $pos = $this->collPhones->search($phone);
            $this->collPhones->remove($pos);
            if (null === $this->phonesScheduledForDeletion) {
                $this->phonesScheduledForDeletion = clone $this->collPhones;
                $this->phonesScheduledForDeletion->clear();
            }
            $this->phonesScheduledForDeletion[]= clone $phone;
            $phone->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collProperties collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProperties()
     */
    public function clearProperties()
    {
        $this->collProperties = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProperties collection loaded partially.
     */
    public function resetPartialProperties($v = true)
    {
        $this->collPropertiesPartial = $v;
    }

    /**
     * Initializes the collProperties collection.
     *
     * By default this just sets the collProperties collection to an empty array (like clearcollProperties());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProperties($overrideExisting = true)
    {
        if (null !== $this->collProperties && !$overrideExisting) {
            return;
        }

        $collectionClassName = PropertyTableMap::getTableMap()->getCollectionClassName();

        $this->collProperties = new $collectionClassName;
        $this->collProperties->setModel('\Property');
    }

    /**
     * Gets an array of ChildProperty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProperty[] List of ChildProperty objects
     * @throws PropelException
     */
    public function getProperties(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPropertiesPartial && !$this->isNew();
        if (null === $this->collProperties || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProperties) {
                // return empty collection
                $this->initProperties();
            } else {
                $collProperties = ChildPropertyQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPropertiesPartial && count($collProperties)) {
                        $this->initProperties(false);

                        foreach ($collProperties as $obj) {
                            if (false == $this->collProperties->contains($obj)) {
                                $this->collProperties->append($obj);
                            }
                        }

                        $this->collPropertiesPartial = true;
                    }

                    return $collProperties;
                }

                if ($partial && $this->collProperties) {
                    foreach ($this->collProperties as $obj) {
                        if ($obj->isNew()) {
                            $collProperties[] = $obj;
                        }
                    }
                }

                $this->collProperties = $collProperties;
                $this->collPropertiesPartial = false;
            }
        }

        return $this->collProperties;
    }

    /**
     * Sets a collection of ChildProperty objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $properties A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setProperties(Collection $properties, ConnectionInterface $con = null)
    {
        /** @var ChildProperty[] $propertiesToDelete */
        $propertiesToDelete = $this->getProperties(new Criteria(), $con)->diff($properties);


        $this->propertiesScheduledForDeletion = $propertiesToDelete;

        foreach ($propertiesToDelete as $propertyRemoved) {
            $propertyRemoved->setUser(null);
        }

        $this->collProperties = null;
        foreach ($properties as $property) {
            $this->addProperty($property);
        }

        $this->collProperties = $properties;
        $this->collPropertiesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Property objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Property objects.
     * @throws PropelException
     */
    public function countProperties(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPropertiesPartial && !$this->isNew();
        if (null === $this->collProperties || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProperties) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProperties());
            }

            $query = ChildPropertyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProperties);
    }

    /**
     * Method called to associate a ChildProperty object to this object
     * through the ChildProperty foreign key attribute.
     *
     * @param  ChildProperty $l ChildProperty
     * @return $this|\User The current object (for fluent API support)
     */
    public function addProperty(ChildProperty $l)
    {
        if ($this->collProperties === null) {
            $this->initProperties();
            $this->collPropertiesPartial = true;
        }

        if (!$this->collProperties->contains($l)) {
            $this->doAddProperty($l);

            if ($this->propertiesScheduledForDeletion and $this->propertiesScheduledForDeletion->contains($l)) {
                $this->propertiesScheduledForDeletion->remove($this->propertiesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProperty $property The ChildProperty object to add.
     */
    protected function doAddProperty(ChildProperty $property)
    {
        $this->collProperties[]= $property;
        $property->setUser($this);
    }

    /**
     * @param  ChildProperty $property The ChildProperty object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeProperty(ChildProperty $property)
    {
        if ($this->getProperties()->contains($property)) {
            $pos = $this->collProperties->search($property);
            $this->collProperties->remove($pos);
            if (null === $this->propertiesScheduledForDeletion) {
                $this->propertiesScheduledForDeletion = clone $this->collProperties;
                $this->propertiesScheduledForDeletion->clear();
            }
            $this->propertiesScheduledForDeletion[]= clone $property;
            $property->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Properties from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProperty[] List of ChildProperty objects
     */
    public function getPropertiesJoinAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPropertyQuery::create(null, $criteria);
        $query->joinWith('Address', $joinBehavior);

        return $this->getProperties($query, $con);
    }

    /**
     * Clears out the collTenants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTenants()
     */
    public function clearTenants()
    {
        $this->collTenants = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTenants collection loaded partially.
     */
    public function resetPartialTenants($v = true)
    {
        $this->collTenantsPartial = $v;
    }

    /**
     * Initializes the collTenants collection.
     *
     * By default this just sets the collTenants collection to an empty array (like clearcollTenants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTenants($overrideExisting = true)
    {
        if (null !== $this->collTenants && !$overrideExisting) {
            return;
        }

        $collectionClassName = TenantTableMap::getTableMap()->getCollectionClassName();

        $this->collTenants = new $collectionClassName;
        $this->collTenants->setModel('\Tenant');
    }

    /**
     * Gets an array of ChildTenant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTenant[] List of ChildTenant objects
     * @throws PropelException
     */
    public function getTenants(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTenantsPartial && !$this->isNew();
        if (null === $this->collTenants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTenants) {
                // return empty collection
                $this->initTenants();
            } else {
                $collTenants = ChildTenantQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTenantsPartial && count($collTenants)) {
                        $this->initTenants(false);

                        foreach ($collTenants as $obj) {
                            if (false == $this->collTenants->contains($obj)) {
                                $this->collTenants->append($obj);
                            }
                        }

                        $this->collTenantsPartial = true;
                    }

                    return $collTenants;
                }

                if ($partial && $this->collTenants) {
                    foreach ($this->collTenants as $obj) {
                        if ($obj->isNew()) {
                            $collTenants[] = $obj;
                        }
                    }
                }

                $this->collTenants = $collTenants;
                $this->collTenantsPartial = false;
            }
        }

        return $this->collTenants;
    }

    /**
     * Sets a collection of ChildTenant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tenants A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function setTenants(Collection $tenants, ConnectionInterface $con = null)
    {
        /** @var ChildTenant[] $tenantsToDelete */
        $tenantsToDelete = $this->getTenants(new Criteria(), $con)->diff($tenants);


        $this->tenantsScheduledForDeletion = $tenantsToDelete;

        foreach ($tenantsToDelete as $tenantRemoved) {
            $tenantRemoved->setUser(null);
        }

        $this->collTenants = null;
        foreach ($tenants as $tenant) {
            $this->addTenant($tenant);
        }

        $this->collTenants = $tenants;
        $this->collTenantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tenant objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tenant objects.
     * @throws PropelException
     */
    public function countTenants(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTenantsPartial && !$this->isNew();
        if (null === $this->collTenants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTenants) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTenants());
            }

            $query = ChildTenantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collTenants);
    }

    /**
     * Method called to associate a ChildTenant object to this object
     * through the ChildTenant foreign key attribute.
     *
     * @param  ChildTenant $l ChildTenant
     * @return $this|\User The current object (for fluent API support)
     */
    public function addTenant(ChildTenant $l)
    {
        if ($this->collTenants === null) {
            $this->initTenants();
            $this->collTenantsPartial = true;
        }

        if (!$this->collTenants->contains($l)) {
            $this->doAddTenant($l);

            if ($this->tenantsScheduledForDeletion and $this->tenantsScheduledForDeletion->contains($l)) {
                $this->tenantsScheduledForDeletion->remove($this->tenantsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTenant $tenant The ChildTenant object to add.
     */
    protected function doAddTenant(ChildTenant $tenant)
    {
        $this->collTenants[]= $tenant;
        $tenant->setUser($this);
    }

    /**
     * @param  ChildTenant $tenant The ChildTenant object to remove.
     * @return $this|ChildUser The current object (for fluent API support)
     */
    public function removeTenant(ChildTenant $tenant)
    {
        if ($this->getTenants()->contains($tenant)) {
            $pos = $this->collTenants->search($tenant);
            $this->collTenants->remove($pos);
            if (null === $this->tenantsScheduledForDeletion) {
                $this->tenantsScheduledForDeletion = clone $this->collTenants;
                $this->tenantsScheduledForDeletion->clear();
            }
            $this->tenantsScheduledForDeletion[]= clone $tenant;
            $tenant->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Tenants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTenant[] List of ChildTenant objects
     */
    public function getTenantsJoinProperty(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTenantQuery::create(null, $criteria);
        $query->joinWith('Property', $joinBehavior);

        return $this->getTenants($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->firstname = null;
        $this->middlename = null;
        $this->lastname = null;
        $this->hashedpassword = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collEmails) {
                foreach ($this->collEmails as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLivess) {
                foreach ($this->collLivess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOwedsRelatedByReceiverid) {
                foreach ($this->collOwedsRelatedByReceiverid as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOwedsRelatedBySenderid) {
                foreach ($this->collOwedsRelatedBySenderid as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPaymentsRelatedByReceiverid) {
                foreach ($this->collPaymentsRelatedByReceiverid as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPaymentsRelatedBySenderid) {
                foreach ($this->collPaymentsRelatedBySenderid as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPhones) {
                foreach ($this->collPhones as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProperties) {
                foreach ($this->collProperties as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTenants) {
                foreach ($this->collTenants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEmails = null;
        $this->collLivess = null;
        $this->collOwedsRelatedByReceiverid = null;
        $this->collOwedsRelatedBySenderid = null;
        $this->collPaymentsRelatedByReceiverid = null;
        $this->collPaymentsRelatedBySenderid = null;
        $this->collPhones = null;
        $this->collProperties = null;
        $this->collTenants = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
