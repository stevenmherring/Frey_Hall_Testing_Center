<?php

namespace Map;

use \FreyHallTestingCenter;
use \FreyHallTestingCenterQuery;
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
 * This class defines the structure of the 'freyHallTestingCenterRoom' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FreyHallTestingCenterTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.FreyHallTestingCenterTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'freyHallTestingCenterRoom';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\FreyHallTestingCenter';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'FreyHallTestingCenter';

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
     * the column name for the numseats field
     */
    const COL_NUMSEATS = 'freyHallTestingCenterRoom.numseats';

    /**
     * the column name for the numsetasideseats field
     */
    const COL_NUMSETASIDESEATS = 'freyHallTestingCenterRoom.numsetasideseats';

    /**
     * the column name for the hours_openfrom field
     */
    const COL_HOURS_OPENFROM = 'freyHallTestingCenterRoom.hours_openfrom';

    /**
     * the column name for the hours_openuntil field
     */
    const COL_HOURS_OPENUNTIL = 'freyHallTestingCenterRoom.hours_openuntil';

    /**
     * the column name for the gaptime field
     */
    const COL_GAPTIME = 'freyHallTestingCenterRoom.gaptime';

    /**
     * the column name for the reminderInterval field
     */
    const COL_REMINDERINTERVAL = 'freyHallTestingCenterRoom.reminderInterval';

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
        self::TYPE_PHPNAME       => array('Numseats', 'Numsetasideseats', 'HoursOpenfrom', 'HoursOpenuntil', 'Gaptime', 'Reminderinterval', ),
        self::TYPE_CAMELNAME     => array('numseats', 'numsetasideseats', 'hoursOpenfrom', 'hoursOpenuntil', 'gaptime', 'reminderinterval', ),
        self::TYPE_COLNAME       => array(FreyHallTestingCenterTableMap::COL_NUMSEATS, FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS, FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM, FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL, FreyHallTestingCenterTableMap::COL_GAPTIME, FreyHallTestingCenterTableMap::COL_REMINDERINTERVAL, ),
        self::TYPE_FIELDNAME     => array('numseats', 'numsetasideseats', 'hours_openfrom', 'hours_openuntil', 'gaptime', 'reminderInterval', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Numseats' => 0, 'Numsetasideseats' => 1, 'HoursOpenfrom' => 2, 'HoursOpenuntil' => 3, 'Gaptime' => 4, 'Reminderinterval' => 5, ),
        self::TYPE_CAMELNAME     => array('numseats' => 0, 'numsetasideseats' => 1, 'hoursOpenfrom' => 2, 'hoursOpenuntil' => 3, 'gaptime' => 4, 'reminderinterval' => 5, ),
        self::TYPE_COLNAME       => array(FreyHallTestingCenterTableMap::COL_NUMSEATS => 0, FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS => 1, FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM => 2, FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL => 3, FreyHallTestingCenterTableMap::COL_GAPTIME => 4, FreyHallTestingCenterTableMap::COL_REMINDERINTERVAL => 5, ),
        self::TYPE_FIELDNAME     => array('numseats' => 0, 'numsetasideseats' => 1, 'hours_openfrom' => 2, 'hours_openuntil' => 3, 'gaptime' => 4, 'reminderInterval' => 5, ),
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
        $this->setName('freyHallTestingCenterRoom');
        $this->setPhpName('FreyHallTestingCenter');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\FreyHallTestingCenter');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('numseats', 'Numseats', 'INTEGER', true, 3, null);
        $this->addColumn('numsetasideseats', 'Numsetasideseats', 'INTEGER', true, 3, null);
        $this->addColumn('hours_openfrom', 'HoursOpenfrom', 'INTEGER', true, 4, null);
        $this->addColumn('hours_openuntil', 'HoursOpenuntil', 'INTEGER', true, 4, null);
        $this->addColumn('gaptime', 'Gaptime', 'INTEGER', true, 4, null);
        $this->addColumn('reminderInterval', 'Reminderinterval', 'VARCHAR', true, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Numseats', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Numseats', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Numseats', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FreyHallTestingCenterTableMap::CLASS_DEFAULT : FreyHallTestingCenterTableMap::OM_CLASS;
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
     * @return array           (FreyHallTestingCenter object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FreyHallTestingCenterTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FreyHallTestingCenterTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FreyHallTestingCenterTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FreyHallTestingCenterTableMap::OM_CLASS;
            /** @var FreyHallTestingCenter $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FreyHallTestingCenterTableMap::addInstanceToPool($obj, $key);
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
            $key = FreyHallTestingCenterTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FreyHallTestingCenterTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FreyHallTestingCenter $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FreyHallTestingCenterTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_NUMSEATS);
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS);
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM);
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL);
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_GAPTIME);
            $criteria->addSelectColumn(FreyHallTestingCenterTableMap::COL_REMINDERINTERVAL);
        } else {
            $criteria->addSelectColumn($alias . '.numseats');
            $criteria->addSelectColumn($alias . '.numsetasideseats');
            $criteria->addSelectColumn($alias . '.hours_openfrom');
            $criteria->addSelectColumn($alias . '.hours_openuntil');
            $criteria->addSelectColumn($alias . '.gaptime');
            $criteria->addSelectColumn($alias . '.reminderInterval');
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
        return Propel::getServiceContainer()->getDatabaseMap(FreyHallTestingCenterTableMap::DATABASE_NAME)->getTable(FreyHallTestingCenterTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FreyHallTestingCenterTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FreyHallTestingCenterTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FreyHallTestingCenterTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FreyHallTestingCenter or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FreyHallTestingCenter object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FreyHallTestingCenterTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \FreyHallTestingCenter) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FreyHallTestingCenterTableMap::DATABASE_NAME);
            $criteria->add(FreyHallTestingCenterTableMap::COL_NUMSEATS, (array) $values, Criteria::IN);
        }

        $query = FreyHallTestingCenterQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FreyHallTestingCenterTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FreyHallTestingCenterTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the freyHallTestingCenterRoom table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FreyHallTestingCenterQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FreyHallTestingCenter or Criteria object.
     *
     * @param mixed               $criteria Criteria or FreyHallTestingCenter object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreyHallTestingCenterTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FreyHallTestingCenter object
        }


        // Set the correct dbName
        $query = FreyHallTestingCenterQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FreyHallTestingCenterTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FreyHallTestingCenterTableMap::buildTableMap();
