<?php

namespace Base;

use \PropertyQuery as ChildPropertyQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\PropertyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'property' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Property implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PropertyTableMap';


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
<<<<<<< HEAD
=======
     * The value for the timestamp field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $timestamp;

    /**
     * The value for the landlordid field.
     *
     * @var        int
     */
    protected $landlordid;

    /**
>>>>>>> 40d1c9abff46885142bd47e75e80d811803ae6eb
     * The value for the addressid field.
     *
     * @var        int
     */
    protected $addressid;

    /**
     * The value for the userid field.
     *
     * @var        int
     */
    protected $userid;

    /**
     * The value for the adddate field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $adddate;

    /**
     * The value for the lastupdated field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $lastupdated;

    /**
     * The value for the postname field.
     *
     * @var        string
     */
    protected $postname;

    /**
     * The value for the available field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $available;

    /**
     * The value for the expectedrentpermonth field.
     *
     * @var        double
     */
    protected $expectedrentpermonth;

    /**
     * The value for the squarefootage field.
     *
     * @var        int
     */
    protected $squarefootage;

    /**
     * The value for the bedroomcount field.
     *
     * @var        int
     */
    protected $bedroomcount;

    /**
     * The value for the bathroomcount field.
     *
     * @var        int
     */
    protected $bathroomcount;

    /**
     * The value for the details field.
     *
     * @var        string
     */
    protected $details;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->available = false;
    }

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Base\Property object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>Property</code> instance.  If
     * <code>obj</code> is an instance of <code>Property</code>, delegates to
     * <code>equals(Property)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Property The current object, for fluid interface
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
     * Get the [addressid] column value.
     *
     * @return int
     */
    public function getAddressid()
    {
        return $this->addressid;
    }

    /**
     * Get the [userid] column value.
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Get the [optionally formatted] temporal [adddate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAdddate($format = NULL)
    {
        if ($format === null) {
            return $this->adddate;
        } else {
            return $this->adddate instanceof \DateTimeInterface ? $this->adddate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [lastupdated] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastupdated($format = NULL)
    {
        if ($format === null) {
            return $this->lastupdated;
        } else {
            return $this->lastupdated instanceof \DateTimeInterface ? $this->lastupdated->format($format) : null;
        }
    }

    /**
     * Get the [postname] column value.
     *
     * @return string
     */
    public function getPostname()
    {
        return $this->postname;
    }

    /**
     * Get the [available] column value.
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Get the [available] column value.
     *
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->getAvailable();
    }

    /**
     * Get the [expectedrentpermonth] column value.
     *
     * @return double
     */
    public function getExpectedrentpermonth()
    {
        return $this->expectedrentpermonth;
    }

    /**
     * Get the [squarefootage] column value.
     *
     * @return int
     */
    public function getSquarefootage()
    {
        return $this->squarefootage;
    }

    /**
     * Get the [bedroomcount] column value.
     *
     * @return int
     */
    public function getBedroomcount()
    {
        return $this->bedroomcount;
    }

    /**
     * Get the [bathroomcount] column value.
     *
     * @return int
     */
    public function getBathroomcount()
    {
        return $this->bathroomcount;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[PropertyTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [addressid] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setAddressid($v)
    {
<<<<<<< HEAD
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->addressid !== $v) {
            $this->addressid = $v;
            $this->modifiedColumns[PropertyTableMap::COL_ADDRESSID] = true;
        }
=======
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            if ($this->timestamp === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->timestamp->format("Y-m-d H:i:s.u")) {
                $this->timestamp = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PropertyTableMap::COL_TIMESTAMP] = true;
            }
        } // if either are not null
>>>>>>> 40d1c9abff46885142bd47e75e80d811803ae6eb

        return $this;
    } // setAddressid()

    /**
     * Set the value of [userid] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setUserid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->userid !== $v) {
            $this->userid = $v;
            $this->modifiedColumns[PropertyTableMap::COL_USERID] = true;
        }

        return $this;
    } // setUserid()

    /**
     * Sets the value of [adddate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setAdddate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->adddate !== null || $dt !== null) {
            if ($this->adddate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->adddate->format("Y-m-d H:i:s.u")) {
                $this->adddate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PropertyTableMap::COL_ADDDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setAdddate()

    /**
     * Sets the value of [lastupdated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setLastupdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->lastupdated !== null || $dt !== null) {
            if ($this->lastupdated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->lastupdated->format("Y-m-d H:i:s.u")) {
                $this->lastupdated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PropertyTableMap::COL_LASTUPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setLastupdated()

    /**
     * Set the value of [postname] column.
     *
     * @param string $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setPostname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->postname !== $v) {
            $this->postname = $v;
            $this->modifiedColumns[PropertyTableMap::COL_POSTNAME] = true;
        }

        return $this;
    } // setPostname()

    /**
     * Sets the value of the [available] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setAvailable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->available !== $v) {
            $this->available = $v;
            $this->modifiedColumns[PropertyTableMap::COL_AVAILABLE] = true;
        }

        return $this;
    } // setAvailable()

    /**
     * Set the value of [expectedrentpermonth] column.
     *
     * @param double $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setExpectedrentpermonth($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->expectedrentpermonth !== $v) {
            $this->expectedrentpermonth = $v;
            $this->modifiedColumns[PropertyTableMap::COL_EXPECTEDRENTPERMONTH] = true;
        }

        return $this;
    } // setExpectedrentpermonth()

    /**
     * Set the value of [squarefootage] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setSquarefootage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->squarefootage !== $v) {
            $this->squarefootage = $v;
            $this->modifiedColumns[PropertyTableMap::COL_SQUAREFOOTAGE] = true;
        }

        return $this;
    } // setSquarefootage()

    /**
     * Set the value of [bedroomcount] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setBedroomcount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bedroomcount !== $v) {
            $this->bedroomcount = $v;
            $this->modifiedColumns[PropertyTableMap::COL_BEDROOMCOUNT] = true;
        }

        return $this;
    } // setBedroomcount()

    /**
     * Set the value of [bathroomcount] column.
     *
     * @param int $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setBathroomcount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bathroomcount !== $v) {
            $this->bathroomcount = $v;
            $this->modifiedColumns[PropertyTableMap::COL_BATHROOMCOUNT] = true;
        }

        return $this;
    } // setBathroomcount()

    /**
     * Set the value of [details] column.
     *
     * @param string $v new value
     * @return $this|\Property The current object (for fluent API support)
     */
    public function setDetails($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->details !== $v) {
            $this->details = $v;
            $this->modifiedColumns[PropertyTableMap::COL_DETAILS] = true;
        }

        return $this;
    } // setDetails()

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
            if ($this->available !== false) {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PropertyTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

<<<<<<< HEAD
            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PropertyTableMap::translateFieldName('Addressid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->addressid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PropertyTableMap::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->userid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PropertyTableMap::translateFieldName('Adddate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->adddate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PropertyTableMap::translateFieldName('Lastupdated', TableMap::TYPE_PHPNAME, $indexType)];
=======
            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PropertyTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
>>>>>>> 40d1c9abff46885142bd47e75e80d811803ae6eb
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->lastupdated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PropertyTableMap::translateFieldName('Postname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->postname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PropertyTableMap::translateFieldName('Available', TableMap::TYPE_PHPNAME, $indexType)];
            $this->available = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PropertyTableMap::translateFieldName('Expectedrentpermonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->expectedrentpermonth = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PropertyTableMap::translateFieldName('Squarefootage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->squarefootage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PropertyTableMap::translateFieldName('Bedroomcount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bedroomcount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PropertyTableMap::translateFieldName('Bathroomcount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bathroomcount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PropertyTableMap::translateFieldName('Details', TableMap::TYPE_PHPNAME, $indexType)];
            $this->details = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = PropertyTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Property'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PropertyTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPropertyQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Property::setDeleted()
     * @see Property::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPropertyQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PropertyTableMap::DATABASE_NAME);
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
                PropertyTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[PropertyTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PropertyTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PropertyTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_ADDRESSID)) {
            $modifiedColumns[':p' . $index++]  = 'addressID';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_USERID)) {
            $modifiedColumns[':p' . $index++]  = 'userID';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_ADDDATE)) {
            $modifiedColumns[':p' . $index++]  = 'addDate';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_LASTUPDATED)) {
            $modifiedColumns[':p' . $index++]  = 'lastUpdated';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_POSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'postName';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_AVAILABLE)) {
            $modifiedColumns[':p' . $index++]  = 'available';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_EXPECTEDRENTPERMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'expectedRentPerMonth';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_SQUAREFOOTAGE)) {
            $modifiedColumns[':p' . $index++]  = 'squareFootage';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_BEDROOMCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'bedroomCount';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_BATHROOMCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'bathroomCount';
        }
        if ($this->isColumnModified(PropertyTableMap::COL_DETAILS)) {
            $modifiedColumns[':p' . $index++]  = 'details';
        }

        $sql = sprintf(
            'INSERT INTO property (%s) VALUES (%s)',
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
                    case 'addressID':
                        $stmt->bindValue($identifier, $this->addressid, PDO::PARAM_INT);
                        break;
                    case 'userID':
                        $stmt->bindValue($identifier, $this->userid, PDO::PARAM_INT);
                        break;
                    case 'addDate':
                        $stmt->bindValue($identifier, $this->adddate ? $this->adddate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'lastUpdated':
                        $stmt->bindValue($identifier, $this->lastupdated ? $this->lastupdated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'postName':
                        $stmt->bindValue($identifier, $this->postname, PDO::PARAM_STR);
                        break;
                    case 'available':
                        $stmt->bindValue($identifier, (int) $this->available, PDO::PARAM_INT);
                        break;
                    case 'expectedRentPerMonth':
                        $stmt->bindValue($identifier, $this->expectedrentpermonth, PDO::PARAM_STR);
                        break;
                    case 'squareFootage':
                        $stmt->bindValue($identifier, $this->squarefootage, PDO::PARAM_INT);
                        break;
                    case 'bedroomCount':
                        $stmt->bindValue($identifier, $this->bedroomcount, PDO::PARAM_INT);
                        break;
                    case 'bathroomCount':
                        $stmt->bindValue($identifier, $this->bathroomcount, PDO::PARAM_INT);
                        break;
                    case 'details':
                        $stmt->bindValue($identifier, $this->details, PDO::PARAM_STR);
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
        $pos = PropertyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getAddressid();
                break;
            case 2:
                return $this->getUserid();
                break;
            case 3:
                return $this->getAdddate();
                break;
            case 4:
                return $this->getLastupdated();
                break;
            case 5:
                return $this->getPostname();
                break;
            case 6:
                return $this->getAvailable();
                break;
            case 7:
                return $this->getExpectedrentpermonth();
                break;
            case 8:
                return $this->getSquarefootage();
                break;
            case 9:
                return $this->getBedroomcount();
                break;
            case 10:
                return $this->getBathroomcount();
                break;
            case 11:
                return $this->getDetails();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Property'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Property'][$this->hashCode()] = true;
        $keys = PropertyTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getAddressid(),
            $keys[2] => $this->getUserid(),
            $keys[3] => $this->getAdddate(),
            $keys[4] => $this->getLastupdated(),
            $keys[5] => $this->getPostname(),
            $keys[6] => $this->getAvailable(),
            $keys[7] => $this->getExpectedrentpermonth(),
            $keys[8] => $this->getSquarefootage(),
            $keys[9] => $this->getBedroomcount(),
            $keys[10] => $this->getBathroomcount(),
            $keys[11] => $this->getDetails(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\Property
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PropertyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Property
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setAddressid($value);
                break;
            case 2:
                $this->setUserid($value);
                break;
            case 3:
                $this->setAdddate($value);
                break;
            case 4:
                $this->setLastupdated($value);
                break;
            case 5:
                $this->setPostname($value);
                break;
            case 6:
                $this->setAvailable($value);
                break;
            case 7:
                $this->setExpectedrentpermonth($value);
                break;
            case 8:
                $this->setSquarefootage($value);
                break;
            case 9:
                $this->setBedroomcount($value);
                break;
            case 10:
                $this->setBathroomcount($value);
                break;
            case 11:
                $this->setDetails($value);
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
        $keys = PropertyTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setAddressid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUserid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAdddate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLastupdated($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPostname($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setAvailable($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setExpectedrentpermonth($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSquarefootage($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBedroomcount($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBathroomcount($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDetails($arr[$keys[11]]);
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
     * @return $this|\Property The current object, for fluid interface
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
        $criteria = new Criteria(PropertyTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PropertyTableMap::COL_ID)) {
            $criteria->add(PropertyTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_ADDRESSID)) {
            $criteria->add(PropertyTableMap::COL_ADDRESSID, $this->addressid);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_USERID)) {
            $criteria->add(PropertyTableMap::COL_USERID, $this->userid);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_ADDDATE)) {
            $criteria->add(PropertyTableMap::COL_ADDDATE, $this->adddate);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_LASTUPDATED)) {
            $criteria->add(PropertyTableMap::COL_LASTUPDATED, $this->lastupdated);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_POSTNAME)) {
            $criteria->add(PropertyTableMap::COL_POSTNAME, $this->postname);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_AVAILABLE)) {
            $criteria->add(PropertyTableMap::COL_AVAILABLE, $this->available);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_EXPECTEDRENTPERMONTH)) {
            $criteria->add(PropertyTableMap::COL_EXPECTEDRENTPERMONTH, $this->expectedrentpermonth);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_SQUAREFOOTAGE)) {
            $criteria->add(PropertyTableMap::COL_SQUAREFOOTAGE, $this->squarefootage);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_BEDROOMCOUNT)) {
            $criteria->add(PropertyTableMap::COL_BEDROOMCOUNT, $this->bedroomcount);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_BATHROOMCOUNT)) {
            $criteria->add(PropertyTableMap::COL_BATHROOMCOUNT, $this->bathroomcount);
        }
        if ($this->isColumnModified(PropertyTableMap::COL_DETAILS)) {
            $criteria->add(PropertyTableMap::COL_DETAILS, $this->details);
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
        $criteria = ChildPropertyQuery::create();
        $criteria->add(PropertyTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Property (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAddressid($this->getAddressid());
        $copyObj->setUserid($this->getUserid());
        $copyObj->setAdddate($this->getAdddate());
        $copyObj->setLastupdated($this->getLastupdated());
        $copyObj->setPostname($this->getPostname());
        $copyObj->setAvailable($this->getAvailable());
        $copyObj->setExpectedrentpermonth($this->getExpectedrentpermonth());
        $copyObj->setSquarefootage($this->getSquarefootage());
        $copyObj->setBedroomcount($this->getBedroomcount());
        $copyObj->setBathroomcount($this->getBathroomcount());
        $copyObj->setDetails($this->getDetails());
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
     * @return \Property Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->addressid = null;
        $this->userid = null;
        $this->adddate = null;
        $this->lastupdated = null;
        $this->postname = null;
        $this->available = null;
        $this->expectedrentpermonth = null;
        $this->squarefootage = null;
        $this->bedroomcount = null;
        $this->bathroomcount = null;
        $this->details = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
<<<<<<< HEAD
=======
    public function clearAmenities()
    {
        $this->collAmenities = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAmenities collection loaded partially.
     */
    public function resetPartialAmenities($v = true)
    {
        $this->collAmenitiesPartial = $v;
    }

    /**
     * Initializes the collAmenities collection.
     *
     * By default this just sets the collAmenities collection to an empty array (like clearcollAmenities());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAmenities($overrideExisting = true)
    {
        if (null !== $this->collAmenities && !$overrideExisting) {
            return;
        }

        $collectionClassName = AmenityTableMap::getTableMap()->getCollectionClassName();

        $this->collAmenities = new $collectionClassName;
        $this->collAmenities->setModel('\Amenity');
    }

    /**
     * Gets an array of ChildAmenity objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAmenity[] List of ChildAmenity objects
     * @throws PropelException
     */
    public function getAmenities(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAmenitiesPartial && !$this->isNew();
        if (null === $this->collAmenities || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAmenities) {
                // return empty collection
                $this->initAmenities();
            } else {
                $collAmenities = ChildAmenityQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAmenitiesPartial && count($collAmenities)) {
                        $this->initAmenities(false);

                        foreach ($collAmenities as $obj) {
                            if (false == $this->collAmenities->contains($obj)) {
                                $this->collAmenities->append($obj);
                            }
                        }

                        $this->collAmenitiesPartial = true;
                    }

                    return $collAmenities;
                }

                if ($partial && $this->collAmenities) {
                    foreach ($this->collAmenities as $obj) {
                        if ($obj->isNew()) {
                            $collAmenities[] = $obj;
                        }
                    }
                }

                $this->collAmenities = $collAmenities;
                $this->collAmenitiesPartial = false;
            }
        }

        return $this->collAmenities;
    }

    /**
     * Sets a collection of ChildAmenity objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $amenities A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setAmenities(Collection $amenities, ConnectionInterface $con = null)
    {
        /** @var ChildAmenity[] $amenitiesToDelete */
        $amenitiesToDelete = $this->getAmenities(new Criteria(), $con)->diff($amenities);


        $this->amenitiesScheduledForDeletion = $amenitiesToDelete;

        foreach ($amenitiesToDelete as $amenityRemoved) {
            $amenityRemoved->setProperty(null);
        }

        $this->collAmenities = null;
        foreach ($amenities as $amenity) {
            $this->addAmenity($amenity);
        }

        $this->collAmenities = $amenities;
        $this->collAmenitiesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Amenity objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Amenity objects.
     * @throws PropelException
     */
    public function countAmenities(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAmenitiesPartial && !$this->isNew();
        if (null === $this->collAmenities || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAmenities) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAmenities());
            }

            $query = ChildAmenityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collAmenities);
    }

    /**
     * Method called to associate a ChildAmenity object to this object
     * through the ChildAmenity foreign key attribute.
     *
     * @param  ChildAmenity $l ChildAmenity
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addAmenity(ChildAmenity $l)
    {
        if ($this->collAmenities === null) {
            $this->initAmenities();
            $this->collAmenitiesPartial = true;
        }

        if (!$this->collAmenities->contains($l)) {
            $this->doAddAmenity($l);

            if ($this->amenitiesScheduledForDeletion and $this->amenitiesScheduledForDeletion->contains($l)) {
                $this->amenitiesScheduledForDeletion->remove($this->amenitiesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAmenity $amenity The ChildAmenity object to add.
     */
    protected function doAddAmenity(ChildAmenity $amenity)
    {
        $this->collAmenities[]= $amenity;
        $amenity->setProperty($this);
    }

    /**
     * @param  ChildAmenity $amenity The ChildAmenity object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeAmenity(ChildAmenity $amenity)
    {
        if ($this->getAmenities()->contains($amenity)) {
            $pos = $this->collAmenities->search($amenity);
            $this->collAmenities->remove($pos);
            if (null === $this->amenitiesScheduledForDeletion) {
                $this->amenitiesScheduledForDeletion = clone $this->collAmenities;
                $this->amenitiesScheduledForDeletion->clear();
            }
            $this->amenitiesScheduledForDeletion[]= clone $amenity;
            $amenity->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears out the collAppliances collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAppliances()
     */
    public function clearAppliances()
    {
        $this->collAppliances = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAppliances collection loaded partially.
     */
    public function resetPartialAppliances($v = true)
    {
        $this->collAppliancesPartial = $v;
    }

    /**
     * Initializes the collAppliances collection.
     *
     * By default this just sets the collAppliances collection to an empty array (like clearcollAppliances());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAppliances($overrideExisting = true)
    {
        if (null !== $this->collAppliances && !$overrideExisting) {
            return;
        }

        $collectionClassName = ApplianceTableMap::getTableMap()->getCollectionClassName();

        $this->collAppliances = new $collectionClassName;
        $this->collAppliances->setModel('\Appliance');
    }

    /**
     * Gets an array of ChildAppliance objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAppliance[] List of ChildAppliance objects
     * @throws PropelException
     */
    public function getAppliances(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAppliancesPartial && !$this->isNew();
        if (null === $this->collAppliances || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAppliances) {
                // return empty collection
                $this->initAppliances();
            } else {
                $collAppliances = ChildApplianceQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAppliancesPartial && count($collAppliances)) {
                        $this->initAppliances(false);

                        foreach ($collAppliances as $obj) {
                            if (false == $this->collAppliances->contains($obj)) {
                                $this->collAppliances->append($obj);
                            }
                        }

                        $this->collAppliancesPartial = true;
                    }

                    return $collAppliances;
                }

                if ($partial && $this->collAppliances) {
                    foreach ($this->collAppliances as $obj) {
                        if ($obj->isNew()) {
                            $collAppliances[] = $obj;
                        }
                    }
                }

                $this->collAppliances = $collAppliances;
                $this->collAppliancesPartial = false;
            }
        }

        return $this->collAppliances;
    }

    /**
     * Sets a collection of ChildAppliance objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $appliances A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setAppliances(Collection $appliances, ConnectionInterface $con = null)
    {
        /** @var ChildAppliance[] $appliancesToDelete */
        $appliancesToDelete = $this->getAppliances(new Criteria(), $con)->diff($appliances);


        $this->appliancesScheduledForDeletion = $appliancesToDelete;

        foreach ($appliancesToDelete as $applianceRemoved) {
            $applianceRemoved->setProperty(null);
        }

        $this->collAppliances = null;
        foreach ($appliances as $appliance) {
            $this->addAppliance($appliance);
        }

        $this->collAppliances = $appliances;
        $this->collAppliancesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Appliance objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Appliance objects.
     * @throws PropelException
     */
    public function countAppliances(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAppliancesPartial && !$this->isNew();
        if (null === $this->collAppliances || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAppliances) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAppliances());
            }

            $query = ChildApplianceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collAppliances);
    }

    /**
     * Method called to associate a ChildAppliance object to this object
     * through the ChildAppliance foreign key attribute.
     *
     * @param  ChildAppliance $l ChildAppliance
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addAppliance(ChildAppliance $l)
    {
        if ($this->collAppliances === null) {
            $this->initAppliances();
            $this->collAppliancesPartial = true;
        }

        if (!$this->collAppliances->contains($l)) {
            $this->doAddAppliance($l);

            if ($this->appliancesScheduledForDeletion and $this->appliancesScheduledForDeletion->contains($l)) {
                $this->appliancesScheduledForDeletion->remove($this->appliancesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAppliance $appliance The ChildAppliance object to add.
     */
    protected function doAddAppliance(ChildAppliance $appliance)
    {
        $this->collAppliances[]= $appliance;
        $appliance->setProperty($this);
    }

    /**
     * @param  ChildAppliance $appliance The ChildAppliance object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeAppliance(ChildAppliance $appliance)
    {
        if ($this->getAppliances()->contains($appliance)) {
            $pos = $this->collAppliances->search($appliance);
            $this->collAppliances->remove($pos);
            if (null === $this->appliancesScheduledForDeletion) {
                $this->appliancesScheduledForDeletion = clone $this->collAppliances;
                $this->appliancesScheduledForDeletion->clear();
            }
            $this->appliancesScheduledForDeletion[]= clone $appliance;
            $appliance->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears out the collCosts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCosts()
     */
    public function clearCosts()
    {
        $this->collCosts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCosts collection loaded partially.
     */
    public function resetPartialCosts($v = true)
    {
        $this->collCostsPartial = $v;
    }

    /**
     * Initializes the collCosts collection.
     *
     * By default this just sets the collCosts collection to an empty array (like clearcollCosts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCosts($overrideExisting = true)
    {
        if (null !== $this->collCosts && !$overrideExisting) {
            return;
        }

        $collectionClassName = CostTableMap::getTableMap()->getCollectionClassName();

        $this->collCosts = new $collectionClassName;
        $this->collCosts->setModel('\Cost');
    }

    /**
     * Gets an array of ChildCost objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCost[] List of ChildCost objects
     * @throws PropelException
     */
    public function getCosts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCostsPartial && !$this->isNew();
        if (null === $this->collCosts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCosts) {
                // return empty collection
                $this->initCosts();
            } else {
                $collCosts = ChildCostQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCostsPartial && count($collCosts)) {
                        $this->initCosts(false);

                        foreach ($collCosts as $obj) {
                            if (false == $this->collCosts->contains($obj)) {
                                $this->collCosts->append($obj);
                            }
                        }

                        $this->collCostsPartial = true;
                    }

                    return $collCosts;
                }

                if ($partial && $this->collCosts) {
                    foreach ($this->collCosts as $obj) {
                        if ($obj->isNew()) {
                            $collCosts[] = $obj;
                        }
                    }
                }

                $this->collCosts = $collCosts;
                $this->collCostsPartial = false;
            }
        }

        return $this->collCosts;
    }

    /**
     * Sets a collection of ChildCost objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $costs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setCosts(Collection $costs, ConnectionInterface $con = null)
    {
        /** @var ChildCost[] $costsToDelete */
        $costsToDelete = $this->getCosts(new Criteria(), $con)->diff($costs);


        $this->costsScheduledForDeletion = $costsToDelete;

        foreach ($costsToDelete as $costRemoved) {
            $costRemoved->setProperty(null);
        }

        $this->collCosts = null;
        foreach ($costs as $cost) {
            $this->addCost($cost);
        }

        $this->collCosts = $costs;
        $this->collCostsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Cost objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Cost objects.
     * @throws PropelException
     */
    public function countCosts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCostsPartial && !$this->isNew();
        if (null === $this->collCosts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCosts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCosts());
            }

            $query = ChildCostQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collCosts);
    }

    /**
     * Method called to associate a ChildCost object to this object
     * through the ChildCost foreign key attribute.
     *
     * @param  ChildCost $l ChildCost
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addCost(ChildCost $l)
    {
        if ($this->collCosts === null) {
            $this->initCosts();
            $this->collCostsPartial = true;
        }

        if (!$this->collCosts->contains($l)) {
            $this->doAddCost($l);

            if ($this->costsScheduledForDeletion and $this->costsScheduledForDeletion->contains($l)) {
                $this->costsScheduledForDeletion->remove($this->costsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCost $cost The ChildCost object to add.
     */
    protected function doAddCost(ChildCost $cost)
    {
        $this->collCosts[]= $cost;
        $cost->setProperty($this);
    }

    /**
     * @param  ChildCost $cost The ChildCost object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeCost(ChildCost $cost)
    {
        if ($this->getCosts()->contains($cost)) {
            $pos = $this->collCosts->search($cost);
            $this->collCosts->remove($pos);
            if (null === $this->costsScheduledForDeletion) {
                $this->costsScheduledForDeletion = clone $this->collCosts;
                $this->costsScheduledForDeletion->clear();
            }
            $this->costsScheduledForDeletion[]= clone $cost;
            $cost->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears out the collIssues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addIssues()
     */
    public function clearIssues()
    {
        $this->collIssues = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collIssues collection loaded partially.
     */
    public function resetPartialIssues($v = true)
    {
        $this->collIssuesPartial = $v;
    }

    /**
     * Initializes the collIssues collection.
     *
     * By default this just sets the collIssues collection to an empty array (like clearcollIssues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initIssues($overrideExisting = true)
    {
        if (null !== $this->collIssues && !$overrideExisting) {
            return;
        }

        $collectionClassName = IssueTableMap::getTableMap()->getCollectionClassName();

        $this->collIssues = new $collectionClassName;
        $this->collIssues->setModel('\Issue');
    }

    /**
     * Gets an array of ChildIssue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildIssue[] List of ChildIssue objects
     * @throws PropelException
     */
    public function getIssues(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collIssuesPartial && !$this->isNew();
        if (null === $this->collIssues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collIssues) {
                // return empty collection
                $this->initIssues();
            } else {
                $collIssues = ChildIssueQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collIssuesPartial && count($collIssues)) {
                        $this->initIssues(false);

                        foreach ($collIssues as $obj) {
                            if (false == $this->collIssues->contains($obj)) {
                                $this->collIssues->append($obj);
                            }
                        }

                        $this->collIssuesPartial = true;
                    }

                    return $collIssues;
                }

                if ($partial && $this->collIssues) {
                    foreach ($this->collIssues as $obj) {
                        if ($obj->isNew()) {
                            $collIssues[] = $obj;
                        }
                    }
                }

                $this->collIssues = $collIssues;
                $this->collIssuesPartial = false;
            }
        }

        return $this->collIssues;
    }

    /**
     * Sets a collection of ChildIssue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $issues A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setIssues(Collection $issues, ConnectionInterface $con = null)
    {
        /** @var ChildIssue[] $issuesToDelete */
        $issuesToDelete = $this->getIssues(new Criteria(), $con)->diff($issues);


        $this->issuesScheduledForDeletion = $issuesToDelete;

        foreach ($issuesToDelete as $issueRemoved) {
            $issueRemoved->setProperty(null);
        }

        $this->collIssues = null;
        foreach ($issues as $issue) {
            $this->addIssue($issue);
        }

        $this->collIssues = $issues;
        $this->collIssuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Issue objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Issue objects.
     * @throws PropelException
     */
    public function countIssues(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collIssuesPartial && !$this->isNew();
        if (null === $this->collIssues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIssues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getIssues());
            }

            $query = ChildIssueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collIssues);
    }

    /**
     * Method called to associate a ChildIssue object to this object
     * through the ChildIssue foreign key attribute.
     *
     * @param  ChildIssue $l ChildIssue
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addIssue(ChildIssue $l)
    {
        if ($this->collIssues === null) {
            $this->initIssues();
            $this->collIssuesPartial = true;
        }

        if (!$this->collIssues->contains($l)) {
            $this->doAddIssue($l);

            if ($this->issuesScheduledForDeletion and $this->issuesScheduledForDeletion->contains($l)) {
                $this->issuesScheduledForDeletion->remove($this->issuesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildIssue $issue The ChildIssue object to add.
     */
    protected function doAddIssue(ChildIssue $issue)
    {
        $this->collIssues[]= $issue;
        $issue->setProperty($this);
    }

    /**
     * @param  ChildIssue $issue The ChildIssue object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeIssue(ChildIssue $issue)
    {
        if ($this->getIssues()->contains($issue)) {
            $pos = $this->collIssues->search($issue);
            $this->collIssues->remove($pos);
            if (null === $this->issuesScheduledForDeletion) {
                $this->issuesScheduledForDeletion = clone $this->collIssues;
                $this->issuesScheduledForDeletion->clear();
            }
            $this->issuesScheduledForDeletion[]= clone $issue;
            $issue->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears out the collLimitations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addLimitations()
     */
    public function clearLimitations()
    {
        $this->collLimitations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collLimitations collection loaded partially.
     */
    public function resetPartialLimitations($v = true)
    {
        $this->collLimitationsPartial = $v;
    }

    /**
     * Initializes the collLimitations collection.
     *
     * By default this just sets the collLimitations collection to an empty array (like clearcollLimitations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLimitations($overrideExisting = true)
    {
        if (null !== $this->collLimitations && !$overrideExisting) {
            return;
        }

        $collectionClassName = LimitationTableMap::getTableMap()->getCollectionClassName();

        $this->collLimitations = new $collectionClassName;
        $this->collLimitations->setModel('\Limitation');
    }

    /**
     * Gets an array of ChildLimitation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildLimitation[] List of ChildLimitation objects
     * @throws PropelException
     */
    public function getLimitations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collLimitationsPartial && !$this->isNew();
        if (null === $this->collLimitations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLimitations) {
                // return empty collection
                $this->initLimitations();
            } else {
                $collLimitations = ChildLimitationQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collLimitationsPartial && count($collLimitations)) {
                        $this->initLimitations(false);

                        foreach ($collLimitations as $obj) {
                            if (false == $this->collLimitations->contains($obj)) {
                                $this->collLimitations->append($obj);
                            }
                        }

                        $this->collLimitationsPartial = true;
                    }

                    return $collLimitations;
                }

                if ($partial && $this->collLimitations) {
                    foreach ($this->collLimitations as $obj) {
                        if ($obj->isNew()) {
                            $collLimitations[] = $obj;
                        }
                    }
                }

                $this->collLimitations = $collLimitations;
                $this->collLimitationsPartial = false;
            }
        }

        return $this->collLimitations;
    }

    /**
     * Sets a collection of ChildLimitation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $limitations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setLimitations(Collection $limitations, ConnectionInterface $con = null)
    {
        /** @var ChildLimitation[] $limitationsToDelete */
        $limitationsToDelete = $this->getLimitations(new Criteria(), $con)->diff($limitations);


        $this->limitationsScheduledForDeletion = $limitationsToDelete;

        foreach ($limitationsToDelete as $limitationRemoved) {
            $limitationRemoved->setProperty(null);
        }

        $this->collLimitations = null;
        foreach ($limitations as $limitation) {
            $this->addLimitation($limitation);
        }

        $this->collLimitations = $limitations;
        $this->collLimitationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Limitation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Limitation objects.
     * @throws PropelException
     */
    public function countLimitations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collLimitationsPartial && !$this->isNew();
        if (null === $this->collLimitations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLimitations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLimitations());
            }

            $query = ChildLimitationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collLimitations);
    }

    /**
     * Method called to associate a ChildLimitation object to this object
     * through the ChildLimitation foreign key attribute.
     *
     * @param  ChildLimitation $l ChildLimitation
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addLimitation(ChildLimitation $l)
    {
        if ($this->collLimitations === null) {
            $this->initLimitations();
            $this->collLimitationsPartial = true;
        }

        if (!$this->collLimitations->contains($l)) {
            $this->doAddLimitation($l);

            if ($this->limitationsScheduledForDeletion and $this->limitationsScheduledForDeletion->contains($l)) {
                $this->limitationsScheduledForDeletion->remove($this->limitationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildLimitation $limitation The ChildLimitation object to add.
     */
    protected function doAddLimitation(ChildLimitation $limitation)
    {
        $this->collLimitations[]= $limitation;
        $limitation->setProperty($this);
    }

    /**
     * @param  ChildLimitation $limitation The ChildLimitation object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeLimitation(ChildLimitation $limitation)
    {
        if ($this->getLimitations()->contains($limitation)) {
            $pos = $this->collLimitations->search($limitation);
            $this->collLimitations->remove($pos);
            if (null === $this->limitationsScheduledForDeletion) {
                $this->limitationsScheduledForDeletion = clone $this->collLimitations;
                $this->limitationsScheduledForDeletion->clear();
            }
            $this->limitationsScheduledForDeletion[]= clone $limitation;
            $limitation->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears out the collPictures collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPictures()
     */
    public function clearPictures()
    {
        $this->collPictures = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPictures collection loaded partially.
     */
    public function resetPartialPictures($v = true)
    {
        $this->collPicturesPartial = $v;
    }

    /**
     * Initializes the collPictures collection.
     *
     * By default this just sets the collPictures collection to an empty array (like clearcollPictures());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPictures($overrideExisting = true)
    {
        if (null !== $this->collPictures && !$overrideExisting) {
            return;
        }

        $collectionClassName = PictureTableMap::getTableMap()->getCollectionClassName();

        $this->collPictures = new $collectionClassName;
        $this->collPictures->setModel('\Picture');
    }

    /**
     * Gets an array of ChildPicture objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPicture[] List of ChildPicture objects
     * @throws PropelException
     */
    public function getPictures(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPicturesPartial && !$this->isNew();
        if (null === $this->collPictures || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPictures) {
                // return empty collection
                $this->initPictures();
            } else {
                $collPictures = ChildPictureQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPicturesPartial && count($collPictures)) {
                        $this->initPictures(false);

                        foreach ($collPictures as $obj) {
                            if (false == $this->collPictures->contains($obj)) {
                                $this->collPictures->append($obj);
                            }
                        }

                        $this->collPicturesPartial = true;
                    }

                    return $collPictures;
                }

                if ($partial && $this->collPictures) {
                    foreach ($this->collPictures as $obj) {
                        if ($obj->isNew()) {
                            $collPictures[] = $obj;
                        }
                    }
                }

                $this->collPictures = $collPictures;
                $this->collPicturesPartial = false;
            }
        }

        return $this->collPictures;
    }

    /**
     * Sets a collection of ChildPicture objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $pictures A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setPictures(Collection $pictures, ConnectionInterface $con = null)
    {
        /** @var ChildPicture[] $picturesToDelete */
        $picturesToDelete = $this->getPictures(new Criteria(), $con)->diff($pictures);


        $this->picturesScheduledForDeletion = $picturesToDelete;

        foreach ($picturesToDelete as $pictureRemoved) {
            $pictureRemoved->setProperty(null);
        }

        $this->collPictures = null;
        foreach ($pictures as $picture) {
            $this->addPicture($picture);
        }

        $this->collPictures = $pictures;
        $this->collPicturesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Picture objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Picture objects.
     * @throws PropelException
     */
    public function countPictures(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPicturesPartial && !$this->isNew();
        if (null === $this->collPictures || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPictures) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPictures());
            }

            $query = ChildPictureQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collPictures);
    }

    /**
     * Method called to associate a ChildPicture object to this object
     * through the ChildPicture foreign key attribute.
     *
     * @param  ChildPicture $l ChildPicture
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addPicture(ChildPicture $l)
    {
        if ($this->collPictures === null) {
            $this->initPictures();
            $this->collPicturesPartial = true;
        }

        if (!$this->collPictures->contains($l)) {
            $this->doAddPicture($l);

            if ($this->picturesScheduledForDeletion and $this->picturesScheduledForDeletion->contains($l)) {
                $this->picturesScheduledForDeletion->remove($this->picturesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPicture $picture The ChildPicture object to add.
     */
    protected function doAddPicture(ChildPicture $picture)
    {
        $this->collPictures[]= $picture;
        $picture->setProperty($this);
    }

    /**
     * @param  ChildPicture $picture The ChildPicture object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removePicture(ChildPicture $picture)
    {
        if ($this->getPictures()->contains($picture)) {
            $pos = $this->collPictures->search($picture);
            $this->collPictures->remove($pos);
            if (null === $this->picturesScheduledForDeletion) {
                $this->picturesScheduledForDeletion = clone $this->collPictures;
                $this->picturesScheduledForDeletion->clear();
            }
            $this->picturesScheduledForDeletion[]= clone $picture;
            $picture->setProperty(null);
        }

        return $this;
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
     * If this ChildProperty is new, it will return
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
                    ->filterByProperty($this)
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
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setTenants(Collection $tenants, ConnectionInterface $con = null)
    {
        /** @var ChildTenant[] $tenantsToDelete */
        $tenantsToDelete = $this->getTenants(new Criteria(), $con)->diff($tenants);


        $this->tenantsScheduledForDeletion = $tenantsToDelete;

        foreach ($tenantsToDelete as $tenantRemoved) {
            $tenantRemoved->setProperty(null);
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
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collTenants);
    }

    /**
     * Method called to associate a ChildTenant object to this object
     * through the ChildTenant foreign key attribute.
     *
     * @param  ChildTenant $l ChildTenant
     * @return $this|\Property The current object (for fluent API support)
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
        $tenant->setProperty($this);
    }

    /**
     * @param  ChildTenant $tenant The ChildTenant object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
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
            $tenant->setProperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Property is new, it will return
     * an empty collection; or if this Property has previously
     * been saved, it will retrieve related Tenants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Property.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTenant[] List of ChildTenant objects
     */
    public function getTenantsJoinUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTenantQuery::create(null, $criteria);
        $query->joinWith('User', $joinBehavior);

        return $this->getTenants($query, $con);
    }

    /**
     * Clears out the collUtilities collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUtilities()
     */
    public function clearUtilities()
    {
        $this->collUtilities = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUtilities collection loaded partially.
     */
    public function resetPartialUtilities($v = true)
    {
        $this->collUtilitiesPartial = $v;
    }

    /**
     * Initializes the collUtilities collection.
     *
     * By default this just sets the collUtilities collection to an empty array (like clearcollUtilities());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUtilities($overrideExisting = true)
    {
        if (null !== $this->collUtilities && !$overrideExisting) {
            return;
        }

        $collectionClassName = UtilityTableMap::getTableMap()->getCollectionClassName();

        $this->collUtilities = new $collectionClassName;
        $this->collUtilities->setModel('\Utility');
    }

    /**
     * Gets an array of ChildUtility objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUtility[] List of ChildUtility objects
     * @throws PropelException
     */
    public function getUtilities(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUtilitiesPartial && !$this->isNew();
        if (null === $this->collUtilities || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUtilities) {
                // return empty collection
                $this->initUtilities();
            } else {
                $collUtilities = ChildUtilityQuery::create(null, $criteria)
                    ->filterByProperty($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUtilitiesPartial && count($collUtilities)) {
                        $this->initUtilities(false);

                        foreach ($collUtilities as $obj) {
                            if (false == $this->collUtilities->contains($obj)) {
                                $this->collUtilities->append($obj);
                            }
                        }

                        $this->collUtilitiesPartial = true;
                    }

                    return $collUtilities;
                }

                if ($partial && $this->collUtilities) {
                    foreach ($this->collUtilities as $obj) {
                        if ($obj->isNew()) {
                            $collUtilities[] = $obj;
                        }
                    }
                }

                $this->collUtilities = $collUtilities;
                $this->collUtilitiesPartial = false;
            }
        }

        return $this->collUtilities;
    }

    /**
     * Sets a collection of ChildUtility objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $utilities A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function setUtilities(Collection $utilities, ConnectionInterface $con = null)
    {
        /** @var ChildUtility[] $utilitiesToDelete */
        $utilitiesToDelete = $this->getUtilities(new Criteria(), $con)->diff($utilities);


        $this->utilitiesScheduledForDeletion = $utilitiesToDelete;

        foreach ($utilitiesToDelete as $utilityRemoved) {
            $utilityRemoved->setProperty(null);
        }

        $this->collUtilities = null;
        foreach ($utilities as $utility) {
            $this->addUtility($utility);
        }

        $this->collUtilities = $utilities;
        $this->collUtilitiesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Utility objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Utility objects.
     * @throws PropelException
     */
    public function countUtilities(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUtilitiesPartial && !$this->isNew();
        if (null === $this->collUtilities || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUtilities) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUtilities());
            }

            $query = ChildUtilityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProperty($this)
                ->count($con);
        }

        return count($this->collUtilities);
    }

    /**
     * Method called to associate a ChildUtility object to this object
     * through the ChildUtility foreign key attribute.
     *
     * @param  ChildUtility $l ChildUtility
     * @return $this|\Property The current object (for fluent API support)
     */
    public function addUtility(ChildUtility $l)
    {
        if ($this->collUtilities === null) {
            $this->initUtilities();
            $this->collUtilitiesPartial = true;
        }

        if (!$this->collUtilities->contains($l)) {
            $this->doAddUtility($l);

            if ($this->utilitiesScheduledForDeletion and $this->utilitiesScheduledForDeletion->contains($l)) {
                $this->utilitiesScheduledForDeletion->remove($this->utilitiesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildUtility $utility The ChildUtility object to add.
     */
    protected function doAddUtility(ChildUtility $utility)
    {
        $this->collUtilities[]= $utility;
        $utility->setProperty($this);
    }

    /**
     * @param  ChildUtility $utility The ChildUtility object to remove.
     * @return $this|ChildProperty The current object (for fluent API support)
     */
    public function removeUtility(ChildUtility $utility)
    {
        if ($this->getUtilities()->contains($utility)) {
            $pos = $this->collUtilities->search($utility);
            $this->collUtilities->remove($pos);
            if (null === $this->utilitiesScheduledForDeletion) {
                $this->utilitiesScheduledForDeletion = clone $this->collUtilities;
                $this->utilitiesScheduledForDeletion->clear();
            }
            $this->utilitiesScheduledForDeletion[]= clone $utility;
            $utility->setProperty(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAddress) {
            $this->aAddress->removeProperty($this);
        }
        if (null !== $this->aUser) {
            $this->aUser->removeProperty($this);
        }
        $this->id = null;
        $this->timestamp = null;
        $this->landlordid = null;
        $this->addressid = null;
        $this->fpl = null;
        $this->squarefootage = null;
        $this->rooms = null;
        $this->bathrooms = null;
        $this->details = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
>>>>>>> 40d1c9abff46885142bd47e75e80d811803ae6eb
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PropertyTableMap::DEFAULT_STRING_FORMAT);
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
