<?php

namespace Base;

use \Owed as ChildOwed;
use \OwedQuery as ChildOwedQuery;
use \Payment as ChildPayment;
use \PaymentQuery as ChildPaymentQuery;
use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\OwedTableMap;
use Map\PaymentTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'owed' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Owed implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OwedTableMap';


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
     * The value for the timestamp field.
     *
     * @var        int
     */
    protected $timestamp;

    /**
     * The value for the senderid field.
     *
     * @var        int
     */
    protected $senderid;

    /**
     * The value for the receiverid field.
     *
     * @var        int
     */
    protected $receiverid;

    /**
     * The value for the amount field.
     *
     * @var        int
     */
    protected $amount;

    /**
     * The value for the datedue field.
     *
     * @var        DateTime
     */
    protected $datedue;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the details field.
     *
     * @var        string
     */
    protected $details;

    /**
     * The value for the paymentid field.
     *
     * @var        int
     */
    protected $paymentid;

    /**
     * @var        ChildPayment
     */
    protected $aPaymentRelatedByPaymentid;

    /**
     * @var        ChildUser
     */
    protected $aUserRelatedByReceiverid;

    /**
     * @var        ChildUser
     */
    protected $aUserRelatedBySenderid;

    /**
     * @var        ObjectCollection|ChildPayment[] Collection to store aggregation of ChildPayment objects.
     */
    protected $collPaymentsRelatedByOwedid;
    protected $collPaymentsRelatedByOwedidPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPayment[]
     */
    protected $paymentsRelatedByOwedidScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Owed object.
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
     * Compares this with another <code>Owed</code> instance.  If
     * <code>obj</code> is an instance of <code>Owed</code>, delegates to
     * <code>equals(Owed)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Owed The current object, for fluid interface
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
     * Get the [timestamp] column value.
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Get the [senderid] column value.
     *
     * @return int
     */
    public function getSenderid()
    {
        return $this->senderid;
    }

    /**
     * Get the [receiverid] column value.
     *
     * @return int
     */
    public function getReceiverid()
    {
        return $this->receiverid;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [optionally formatted] temporal [datedue] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatedue($format = NULL)
    {
        if ($format === null) {
            return $this->datedue;
        } else {
            return $this->datedue instanceof \DateTimeInterface ? $this->datedue->format($format) : null;
        }
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [details] column value.
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Get the [paymentid] column value.
     *
     * @return int
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[OwedTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [timestamp] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->timestamp !== $v) {
            $this->timestamp = $v;
            $this->modifiedColumns[OwedTableMap::COL_TIMESTAMP] = true;
        }

        return $this;
    } // setTimestamp()

    /**
     * Set the value of [senderid] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setSenderid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->senderid !== $v) {
            $this->senderid = $v;
            $this->modifiedColumns[OwedTableMap::COL_SENDERID] = true;
        }

        if ($this->aUserRelatedBySenderid !== null && $this->aUserRelatedBySenderid->getId() !== $v) {
            $this->aUserRelatedBySenderid = null;
        }

        return $this;
    } // setSenderid()

    /**
     * Set the value of [receiverid] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setReceiverid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->receiverid !== $v) {
            $this->receiverid = $v;
            $this->modifiedColumns[OwedTableMap::COL_RECEIVERID] = true;
        }

        if ($this->aUserRelatedByReceiverid !== null && $this->aUserRelatedByReceiverid->getId() !== $v) {
            $this->aUserRelatedByReceiverid = null;
        }

        return $this;
    } // setReceiverid()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[OwedTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Sets the value of [datedue] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setDatedue($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datedue !== null || $dt !== null) {
            if ($this->datedue === null || $dt === null || $dt->format("Y-m-d") !== $this->datedue->format("Y-m-d")) {
                $this->datedue = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OwedTableMap::COL_DATEDUE] = true;
            }
        } // if either are not null

        return $this;
    } // setDatedue()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[OwedTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [details] column.
     *
     * @param string $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setDetails($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->details !== $v) {
            $this->details = $v;
            $this->modifiedColumns[OwedTableMap::COL_DETAILS] = true;
        }

        return $this;
    } // setDetails()

    /**
     * Set the value of [paymentid] column.
     *
     * @param int $v new value
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function setPaymentid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->paymentid !== $v) {
            $this->paymentid = $v;
            $this->modifiedColumns[OwedTableMap::COL_PAYMENTID] = true;
        }

        if ($this->aPaymentRelatedByPaymentid !== null && $this->aPaymentRelatedByPaymentid->getId() !== $v) {
            $this->aPaymentRelatedByPaymentid = null;
        }

        return $this;
    } // setPaymentid()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OwedTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OwedTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timestamp = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OwedTableMap::translateFieldName('Senderid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->senderid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OwedTableMap::translateFieldName('Receiverid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receiverid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OwedTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OwedTableMap::translateFieldName('Datedue', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->datedue = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OwedTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OwedTableMap::translateFieldName('Details', TableMap::TYPE_PHPNAME, $indexType)];
            $this->details = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OwedTableMap::translateFieldName('Paymentid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paymentid = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = OwedTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Owed'), 0, $e);
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
        if ($this->aUserRelatedBySenderid !== null && $this->senderid !== $this->aUserRelatedBySenderid->getId()) {
            $this->aUserRelatedBySenderid = null;
        }
        if ($this->aUserRelatedByReceiverid !== null && $this->receiverid !== $this->aUserRelatedByReceiverid->getId()) {
            $this->aUserRelatedByReceiverid = null;
        }
        if ($this->aPaymentRelatedByPaymentid !== null && $this->paymentid !== $this->aPaymentRelatedByPaymentid->getId()) {
            $this->aPaymentRelatedByPaymentid = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(OwedTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOwedQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPaymentRelatedByPaymentid = null;
            $this->aUserRelatedByReceiverid = null;
            $this->aUserRelatedBySenderid = null;
            $this->collPaymentsRelatedByOwedid = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Owed::setDeleted()
     * @see Owed::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOwedQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
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
                OwedTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPaymentRelatedByPaymentid !== null) {
                if ($this->aPaymentRelatedByPaymentid->isModified() || $this->aPaymentRelatedByPaymentid->isNew()) {
                    $affectedRows += $this->aPaymentRelatedByPaymentid->save($con);
                }
                $this->setPaymentRelatedByPaymentid($this->aPaymentRelatedByPaymentid);
            }

            if ($this->aUserRelatedByReceiverid !== null) {
                if ($this->aUserRelatedByReceiverid->isModified() || $this->aUserRelatedByReceiverid->isNew()) {
                    $affectedRows += $this->aUserRelatedByReceiverid->save($con);
                }
                $this->setUserRelatedByReceiverid($this->aUserRelatedByReceiverid);
            }

            if ($this->aUserRelatedBySenderid !== null) {
                if ($this->aUserRelatedBySenderid->isModified() || $this->aUserRelatedBySenderid->isNew()) {
                    $affectedRows += $this->aUserRelatedBySenderid->save($con);
                }
                $this->setUserRelatedBySenderid($this->aUserRelatedBySenderid);
            }

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

            if ($this->paymentsRelatedByOwedidScheduledForDeletion !== null) {
                if (!$this->paymentsRelatedByOwedidScheduledForDeletion->isEmpty()) {
                    \PaymentQuery::create()
                        ->filterByPrimaryKeys($this->paymentsRelatedByOwedidScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentsRelatedByOwedidScheduledForDeletion = null;
                }
            }

            if ($this->collPaymentsRelatedByOwedid !== null) {
                foreach ($this->collPaymentsRelatedByOwedid as $referrerFK) {
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

        $this->modifiedColumns[OwedTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OwedTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OwedTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(OwedTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'Timestamp';
        }
        if ($this->isColumnModified(OwedTableMap::COL_SENDERID)) {
            $modifiedColumns[':p' . $index++]  = 'SenderID';
        }
        if ($this->isColumnModified(OwedTableMap::COL_RECEIVERID)) {
            $modifiedColumns[':p' . $index++]  = 'ReceiverID';
        }
        if ($this->isColumnModified(OwedTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'Amount';
        }
        if ($this->isColumnModified(OwedTableMap::COL_DATEDUE)) {
            $modifiedColumns[':p' . $index++]  = 'DateDue';
        }
        if ($this->isColumnModified(OwedTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'Name';
        }
        if ($this->isColumnModified(OwedTableMap::COL_DETAILS)) {
            $modifiedColumns[':p' . $index++]  = 'Details';
        }
        if ($this->isColumnModified(OwedTableMap::COL_PAYMENTID)) {
            $modifiedColumns[':p' . $index++]  = 'PaymentID';
        }

        $sql = sprintf(
            'INSERT INTO owed (%s) VALUES (%s)',
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
                    case 'Timestamp':
                        $stmt->bindValue($identifier, $this->timestamp, PDO::PARAM_INT);
                        break;
                    case 'SenderID':
                        $stmt->bindValue($identifier, $this->senderid, PDO::PARAM_INT);
                        break;
                    case 'ReceiverID':
                        $stmt->bindValue($identifier, $this->receiverid, PDO::PARAM_INT);
                        break;
                    case 'Amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case 'DateDue':
                        $stmt->bindValue($identifier, $this->datedue ? $this->datedue->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'Name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'Details':
                        $stmt->bindValue($identifier, $this->details, PDO::PARAM_STR);
                        break;
                    case 'PaymentID':
                        $stmt->bindValue($identifier, $this->paymentid, PDO::PARAM_INT);
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
        $pos = OwedTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTimestamp();
                break;
            case 2:
                return $this->getSenderid();
                break;
            case 3:
                return $this->getReceiverid();
                break;
            case 4:
                return $this->getAmount();
                break;
            case 5:
                return $this->getDatedue();
                break;
            case 6:
                return $this->getName();
                break;
            case 7:
                return $this->getDetails();
                break;
            case 8:
                return $this->getPaymentid();
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

        if (isset($alreadyDumpedObjects['Owed'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Owed'][$this->hashCode()] = true;
        $keys = OwedTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTimestamp(),
            $keys[2] => $this->getSenderid(),
            $keys[3] => $this->getReceiverid(),
            $keys[4] => $this->getAmount(),
            $keys[5] => $this->getDatedue(),
            $keys[6] => $this->getName(),
            $keys[7] => $this->getDetails(),
            $keys[8] => $this->getPaymentid(),
        );
        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPaymentRelatedByPaymentid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'payment';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'payment';
                        break;
                    default:
                        $key = 'Payment';
                }

                $result[$key] = $this->aPaymentRelatedByPaymentid->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByReceiverid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }

                $result[$key] = $this->aUserRelatedByReceiverid->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedBySenderid) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }

                $result[$key] = $this->aUserRelatedBySenderid->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPaymentsRelatedByOwedid) {

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

                $result[$key] = $this->collPaymentsRelatedByOwedid->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Owed
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OwedTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Owed
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTimestamp($value);
                break;
            case 2:
                $this->setSenderid($value);
                break;
            case 3:
                $this->setReceiverid($value);
                break;
            case 4:
                $this->setAmount($value);
                break;
            case 5:
                $this->setDatedue($value);
                break;
            case 6:
                $this->setName($value);
                break;
            case 7:
                $this->setDetails($value);
                break;
            case 8:
                $this->setPaymentid($value);
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
        $keys = OwedTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTimestamp($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSenderid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setReceiverid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAmount($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDatedue($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDetails($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPaymentid($arr[$keys[8]]);
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
     * @return $this|\Owed The current object, for fluid interface
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
        $criteria = new Criteria(OwedTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OwedTableMap::COL_ID)) {
            $criteria->add(OwedTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(OwedTableMap::COL_TIMESTAMP)) {
            $criteria->add(OwedTableMap::COL_TIMESTAMP, $this->timestamp);
        }
        if ($this->isColumnModified(OwedTableMap::COL_SENDERID)) {
            $criteria->add(OwedTableMap::COL_SENDERID, $this->senderid);
        }
        if ($this->isColumnModified(OwedTableMap::COL_RECEIVERID)) {
            $criteria->add(OwedTableMap::COL_RECEIVERID, $this->receiverid);
        }
        if ($this->isColumnModified(OwedTableMap::COL_AMOUNT)) {
            $criteria->add(OwedTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(OwedTableMap::COL_DATEDUE)) {
            $criteria->add(OwedTableMap::COL_DATEDUE, $this->datedue);
        }
        if ($this->isColumnModified(OwedTableMap::COL_NAME)) {
            $criteria->add(OwedTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(OwedTableMap::COL_DETAILS)) {
            $criteria->add(OwedTableMap::COL_DETAILS, $this->details);
        }
        if ($this->isColumnModified(OwedTableMap::COL_PAYMENTID)) {
            $criteria->add(OwedTableMap::COL_PAYMENTID, $this->paymentid);
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
        $criteria = ChildOwedQuery::create();
        $criteria->add(OwedTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Owed (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTimestamp($this->getTimestamp());
        $copyObj->setSenderid($this->getSenderid());
        $copyObj->setReceiverid($this->getReceiverid());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setDatedue($this->getDatedue());
        $copyObj->setName($this->getName());
        $copyObj->setDetails($this->getDetails());
        $copyObj->setPaymentid($this->getPaymentid());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPaymentsRelatedByOwedid() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPaymentRelatedByOwedid($relObj->copy($deepCopy));
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
     * @return \Owed Clone of current object.
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
     * Declares an association between this object and a ChildPayment object.
     *
     * @param  ChildPayment $v
     * @return $this|\Owed The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPaymentRelatedByPaymentid(ChildPayment $v = null)
    {
        if ($v === null) {
            $this->setPaymentid(NULL);
        } else {
            $this->setPaymentid($v->getId());
        }

        $this->aPaymentRelatedByPaymentid = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPayment object, it will not be re-added.
        if ($v !== null) {
            $v->addOwedRelatedByPaymentid($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPayment object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPayment The associated ChildPayment object.
     * @throws PropelException
     */
    public function getPaymentRelatedByPaymentid(ConnectionInterface $con = null)
    {
        if ($this->aPaymentRelatedByPaymentid === null && ($this->paymentid != 0)) {
            $this->aPaymentRelatedByPaymentid = ChildPaymentQuery::create()->findPk($this->paymentid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPaymentRelatedByPaymentid->addOwedsRelatedByPaymentid($this);
             */
        }

        return $this->aPaymentRelatedByPaymentid;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Owed The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserRelatedByReceiverid(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setReceiverid(NULL);
        } else {
            $this->setReceiverid($v->getId());
        }

        $this->aUserRelatedByReceiverid = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addOwedRelatedByReceiverid($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUserRelatedByReceiverid(ConnectionInterface $con = null)
    {
        if ($this->aUserRelatedByReceiverid === null && ($this->receiverid != 0)) {
            $this->aUserRelatedByReceiverid = ChildUserQuery::create()->findPk($this->receiverid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedByReceiverid->addOwedsRelatedByReceiverid($this);
             */
        }

        return $this->aUserRelatedByReceiverid;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Owed The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserRelatedBySenderid(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setSenderid(NULL);
        } else {
            $this->setSenderid($v->getId());
        }

        $this->aUserRelatedBySenderid = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addOwedRelatedBySenderid($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUserRelatedBySenderid(ConnectionInterface $con = null)
    {
        if ($this->aUserRelatedBySenderid === null && ($this->senderid != 0)) {
            $this->aUserRelatedBySenderid = ChildUserQuery::create()->findPk($this->senderid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedBySenderid->addOwedsRelatedBySenderid($this);
             */
        }

        return $this->aUserRelatedBySenderid;
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
        if ('PaymentRelatedByOwedid' == $relationName) {
            $this->initPaymentsRelatedByOwedid();
            return;
        }
    }

    /**
     * Clears out the collPaymentsRelatedByOwedid collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPaymentsRelatedByOwedid()
     */
    public function clearPaymentsRelatedByOwedid()
    {
        $this->collPaymentsRelatedByOwedid = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPaymentsRelatedByOwedid collection loaded partially.
     */
    public function resetPartialPaymentsRelatedByOwedid($v = true)
    {
        $this->collPaymentsRelatedByOwedidPartial = $v;
    }

    /**
     * Initializes the collPaymentsRelatedByOwedid collection.
     *
     * By default this just sets the collPaymentsRelatedByOwedid collection to an empty array (like clearcollPaymentsRelatedByOwedid());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaymentsRelatedByOwedid($overrideExisting = true)
    {
        if (null !== $this->collPaymentsRelatedByOwedid && !$overrideExisting) {
            return;
        }

        $collectionClassName = PaymentTableMap::getTableMap()->getCollectionClassName();

        $this->collPaymentsRelatedByOwedid = new $collectionClassName;
        $this->collPaymentsRelatedByOwedid->setModel('\Payment');
    }

    /**
     * Gets an array of ChildPayment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildOwed is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     * @throws PropelException
     */
    public function getPaymentsRelatedByOwedid(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedByOwedidPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedByOwedid || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedByOwedid) {
                // return empty collection
                $this->initPaymentsRelatedByOwedid();
            } else {
                $collPaymentsRelatedByOwedid = ChildPaymentQuery::create(null, $criteria)
                    ->filterByOwedRelatedByOwedid($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPaymentsRelatedByOwedidPartial && count($collPaymentsRelatedByOwedid)) {
                        $this->initPaymentsRelatedByOwedid(false);

                        foreach ($collPaymentsRelatedByOwedid as $obj) {
                            if (false == $this->collPaymentsRelatedByOwedid->contains($obj)) {
                                $this->collPaymentsRelatedByOwedid->append($obj);
                            }
                        }

                        $this->collPaymentsRelatedByOwedidPartial = true;
                    }

                    return $collPaymentsRelatedByOwedid;
                }

                if ($partial && $this->collPaymentsRelatedByOwedid) {
                    foreach ($this->collPaymentsRelatedByOwedid as $obj) {
                        if ($obj->isNew()) {
                            $collPaymentsRelatedByOwedid[] = $obj;
                        }
                    }
                }

                $this->collPaymentsRelatedByOwedid = $collPaymentsRelatedByOwedid;
                $this->collPaymentsRelatedByOwedidPartial = false;
            }
        }

        return $this->collPaymentsRelatedByOwedid;
    }

    /**
     * Sets a collection of ChildPayment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $paymentsRelatedByOwedid A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildOwed The current object (for fluent API support)
     */
    public function setPaymentsRelatedByOwedid(Collection $paymentsRelatedByOwedid, ConnectionInterface $con = null)
    {
        /** @var ChildPayment[] $paymentsRelatedByOwedidToDelete */
        $paymentsRelatedByOwedidToDelete = $this->getPaymentsRelatedByOwedid(new Criteria(), $con)->diff($paymentsRelatedByOwedid);


        $this->paymentsRelatedByOwedidScheduledForDeletion = $paymentsRelatedByOwedidToDelete;

        foreach ($paymentsRelatedByOwedidToDelete as $paymentRelatedByOwedidRemoved) {
            $paymentRelatedByOwedidRemoved->setOwedRelatedByOwedid(null);
        }

        $this->collPaymentsRelatedByOwedid = null;
        foreach ($paymentsRelatedByOwedid as $paymentRelatedByOwedid) {
            $this->addPaymentRelatedByOwedid($paymentRelatedByOwedid);
        }

        $this->collPaymentsRelatedByOwedid = $paymentsRelatedByOwedid;
        $this->collPaymentsRelatedByOwedidPartial = false;

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
    public function countPaymentsRelatedByOwedid(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPaymentsRelatedByOwedidPartial && !$this->isNew();
        if (null === $this->collPaymentsRelatedByOwedid || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaymentsRelatedByOwedid) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPaymentsRelatedByOwedid());
            }

            $query = ChildPaymentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOwedRelatedByOwedid($this)
                ->count($con);
        }

        return count($this->collPaymentsRelatedByOwedid);
    }

    /**
     * Method called to associate a ChildPayment object to this object
     * through the ChildPayment foreign key attribute.
     *
     * @param  ChildPayment $l ChildPayment
     * @return $this|\Owed The current object (for fluent API support)
     */
    public function addPaymentRelatedByOwedid(ChildPayment $l)
    {
        if ($this->collPaymentsRelatedByOwedid === null) {
            $this->initPaymentsRelatedByOwedid();
            $this->collPaymentsRelatedByOwedidPartial = true;
        }

        if (!$this->collPaymentsRelatedByOwedid->contains($l)) {
            $this->doAddPaymentRelatedByOwedid($l);

            if ($this->paymentsRelatedByOwedidScheduledForDeletion and $this->paymentsRelatedByOwedidScheduledForDeletion->contains($l)) {
                $this->paymentsRelatedByOwedidScheduledForDeletion->remove($this->paymentsRelatedByOwedidScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPayment $paymentRelatedByOwedid The ChildPayment object to add.
     */
    protected function doAddPaymentRelatedByOwedid(ChildPayment $paymentRelatedByOwedid)
    {
        $this->collPaymentsRelatedByOwedid[]= $paymentRelatedByOwedid;
        $paymentRelatedByOwedid->setOwedRelatedByOwedid($this);
    }

    /**
     * @param  ChildPayment $paymentRelatedByOwedid The ChildPayment object to remove.
     * @return $this|ChildOwed The current object (for fluent API support)
     */
    public function removePaymentRelatedByOwedid(ChildPayment $paymentRelatedByOwedid)
    {
        if ($this->getPaymentsRelatedByOwedid()->contains($paymentRelatedByOwedid)) {
            $pos = $this->collPaymentsRelatedByOwedid->search($paymentRelatedByOwedid);
            $this->collPaymentsRelatedByOwedid->remove($pos);
            if (null === $this->paymentsRelatedByOwedidScheduledForDeletion) {
                $this->paymentsRelatedByOwedidScheduledForDeletion = clone $this->collPaymentsRelatedByOwedid;
                $this->paymentsRelatedByOwedidScheduledForDeletion->clear();
            }
            $this->paymentsRelatedByOwedidScheduledForDeletion[]= clone $paymentRelatedByOwedid;
            $paymentRelatedByOwedid->setOwedRelatedByOwedid(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Owed is new, it will return
     * an empty collection; or if this Owed has previously
     * been saved, it will retrieve related PaymentsRelatedByOwedid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Owed.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     */
    public function getPaymentsRelatedByOwedidJoinUserRelatedByReceiverid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPaymentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByReceiverid', $joinBehavior);

        return $this->getPaymentsRelatedByOwedid($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Owed is new, it will return
     * an empty collection; or if this Owed has previously
     * been saved, it will retrieve related PaymentsRelatedByOwedid from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Owed.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPayment[] List of ChildPayment objects
     */
    public function getPaymentsRelatedByOwedidJoinUserRelatedBySenderid(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPaymentQuery::create(null, $criteria);
        $query->joinWith('UserRelatedBySenderid', $joinBehavior);

        return $this->getPaymentsRelatedByOwedid($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aPaymentRelatedByPaymentid) {
            $this->aPaymentRelatedByPaymentid->removeOwedRelatedByPaymentid($this);
        }
        if (null !== $this->aUserRelatedByReceiverid) {
            $this->aUserRelatedByReceiverid->removeOwedRelatedByReceiverid($this);
        }
        if (null !== $this->aUserRelatedBySenderid) {
            $this->aUserRelatedBySenderid->removeOwedRelatedBySenderid($this);
        }
        $this->id = null;
        $this->timestamp = null;
        $this->senderid = null;
        $this->receiverid = null;
        $this->amount = null;
        $this->datedue = null;
        $this->name = null;
        $this->details = null;
        $this->paymentid = null;
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
            if ($this->collPaymentsRelatedByOwedid) {
                foreach ($this->collPaymentsRelatedByOwedid as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPaymentsRelatedByOwedid = null;
        $this->aPaymentRelatedByPaymentid = null;
        $this->aUserRelatedByReceiverid = null;
        $this->aUserRelatedBySenderid = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OwedTableMap::DEFAULT_STRING_FORMAT);
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
