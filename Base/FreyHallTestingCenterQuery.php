<?php

namespace Base;

use \FreyHallTestingCenter as ChildFreyHallTestingCenter;
use \FreyHallTestingCenterQuery as ChildFreyHallTestingCenterQuery;
use \Exception;
use \PDO;
use Map\FreyHallTestingCenterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'freyHallTestingCenterRoom' table.
 *
 *
 *
 * @method     ChildFreyHallTestingCenterQuery orderByNumseats($order = Criteria::ASC) Order by the numseats column
 * @method     ChildFreyHallTestingCenterQuery orderByNumsetasideseats($order = Criteria::ASC) Order by the numsetasideseats column
 * @method     ChildFreyHallTestingCenterQuery orderByHoursOpenfrom($order = Criteria::ASC) Order by the hours_openfrom column
 * @method     ChildFreyHallTestingCenterQuery orderByHoursOpenuntil($order = Criteria::ASC) Order by the hours_openuntil column
 * @method     ChildFreyHallTestingCenterQuery orderByGaptime($order = Criteria::ASC) Order by the gaptime column
 * @method     ChildFreyHallTestingCenterQuery orderByReminderinterval($order = Criteria::ASC) Order by the reminderInterval column
 *
 * @method     ChildFreyHallTestingCenterQuery groupByNumseats() Group by the numseats column
 * @method     ChildFreyHallTestingCenterQuery groupByNumsetasideseats() Group by the numsetasideseats column
 * @method     ChildFreyHallTestingCenterQuery groupByHoursOpenfrom() Group by the hours_openfrom column
 * @method     ChildFreyHallTestingCenterQuery groupByHoursOpenuntil() Group by the hours_openuntil column
 * @method     ChildFreyHallTestingCenterQuery groupByGaptime() Group by the gaptime column
 * @method     ChildFreyHallTestingCenterQuery groupByReminderinterval() Group by the reminderInterval column
 *
 * @method     ChildFreyHallTestingCenterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFreyHallTestingCenterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFreyHallTestingCenterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFreyHallTestingCenterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFreyHallTestingCenterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFreyHallTestingCenterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFreyHallTestingCenter findOne(ConnectionInterface $con = null) Return the first ChildFreyHallTestingCenter matching the query
 * @method     ChildFreyHallTestingCenter findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFreyHallTestingCenter matching the query, or a new ChildFreyHallTestingCenter object populated from the query conditions when no match is found
 *
 * @method     ChildFreyHallTestingCenter findOneByNumseats(int $numseats) Return the first ChildFreyHallTestingCenter filtered by the numseats column
 * @method     ChildFreyHallTestingCenter findOneByNumsetasideseats(int $numsetasideseats) Return the first ChildFreyHallTestingCenter filtered by the numsetasideseats column
 * @method     ChildFreyHallTestingCenter findOneByHoursOpenfrom(int $hours_openfrom) Return the first ChildFreyHallTestingCenter filtered by the hours_openfrom column
 * @method     ChildFreyHallTestingCenter findOneByHoursOpenuntil(int $hours_openuntil) Return the first ChildFreyHallTestingCenter filtered by the hours_openuntil column
 * @method     ChildFreyHallTestingCenter findOneByGaptime(int $gaptime) Return the first ChildFreyHallTestingCenter filtered by the gaptime column
 * @method     ChildFreyHallTestingCenter findOneByReminderinterval(string $reminderInterval) Return the first ChildFreyHallTestingCenter filtered by the reminderInterval column *

 * @method     ChildFreyHallTestingCenter requirePk($key, ConnectionInterface $con = null) Return the ChildFreyHallTestingCenter by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOne(ConnectionInterface $con = null) Return the first ChildFreyHallTestingCenter matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFreyHallTestingCenter requireOneByNumseats(int $numseats) Return the first ChildFreyHallTestingCenter filtered by the numseats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOneByNumsetasideseats(int $numsetasideseats) Return the first ChildFreyHallTestingCenter filtered by the numsetasideseats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOneByHoursOpenfrom(int $hours_openfrom) Return the first ChildFreyHallTestingCenter filtered by the hours_openfrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOneByHoursOpenuntil(int $hours_openuntil) Return the first ChildFreyHallTestingCenter filtered by the hours_openuntil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOneByGaptime(int $gaptime) Return the first ChildFreyHallTestingCenter filtered by the gaptime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFreyHallTestingCenter requireOneByReminderinterval(string $reminderInterval) Return the first ChildFreyHallTestingCenter filtered by the reminderInterval column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFreyHallTestingCenter objects based on current ModelCriteria
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByNumseats(int $numseats) Return ChildFreyHallTestingCenter objects filtered by the numseats column
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByNumsetasideseats(int $numsetasideseats) Return ChildFreyHallTestingCenter objects filtered by the numsetasideseats column
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByHoursOpenfrom(int $hours_openfrom) Return ChildFreyHallTestingCenter objects filtered by the hours_openfrom column
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByHoursOpenuntil(int $hours_openuntil) Return ChildFreyHallTestingCenter objects filtered by the hours_openuntil column
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByGaptime(int $gaptime) Return ChildFreyHallTestingCenter objects filtered by the gaptime column
 * @method     ChildFreyHallTestingCenter[]|ObjectCollection findByReminderinterval(string $reminderInterval) Return ChildFreyHallTestingCenter objects filtered by the reminderInterval column
 * @method     ChildFreyHallTestingCenter[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FreyHallTestingCenterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FreyHallTestingCenterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\FreyHallTestingCenter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFreyHallTestingCenterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFreyHallTestingCenterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFreyHallTestingCenterQuery) {
            return $criteria;
        }
        $query = new ChildFreyHallTestingCenterQuery();
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
     * @return ChildFreyHallTestingCenter|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FreyHallTestingCenterTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FreyHallTestingCenterTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFreyHallTestingCenter A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT numseats, numsetasideseats, hours_openfrom, hours_openuntil, gaptime, reminderInterval FROM freyHallTestingCenterRoom WHERE numseats = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFreyHallTestingCenter $obj */
            $obj = new ChildFreyHallTestingCenter();
            $obj->hydrate($row);
            FreyHallTestingCenterTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildFreyHallTestingCenter|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the numseats column
     *
     * Example usage:
     * <code>
     * $query->filterByNumseats(1234); // WHERE numseats = 1234
     * $query->filterByNumseats(array(12, 34)); // WHERE numseats IN (12, 34)
     * $query->filterByNumseats(array('min' => 12)); // WHERE numseats > 12
     * </code>
     *
     * @param     mixed $numseats The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByNumseats($numseats = null, $comparison = null)
    {
        if (is_array($numseats)) {
            $useMinMax = false;
            if (isset($numseats['min'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $numseats['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numseats['max'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $numseats['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $numseats, $comparison);
    }

    /**
     * Filter the query on the numsetasideseats column
     *
     * Example usage:
     * <code>
     * $query->filterByNumsetasideseats(1234); // WHERE numsetasideseats = 1234
     * $query->filterByNumsetasideseats(array(12, 34)); // WHERE numsetasideseats IN (12, 34)
     * $query->filterByNumsetasideseats(array('min' => 12)); // WHERE numsetasideseats > 12
     * </code>
     *
     * @param     mixed $numsetasideseats The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByNumsetasideseats($numsetasideseats = null, $comparison = null)
    {
        if (is_array($numsetasideseats)) {
            $useMinMax = false;
            if (isset($numsetasideseats['min'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS, $numsetasideseats['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numsetasideseats['max'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS, $numsetasideseats['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSETASIDESEATS, $numsetasideseats, $comparison);
    }

    /**
     * Filter the query on the hours_openfrom column
     *
     * Example usage:
     * <code>
     * $query->filterByHoursOpenfrom(1234); // WHERE hours_openfrom = 1234
     * $query->filterByHoursOpenfrom(array(12, 34)); // WHERE hours_openfrom IN (12, 34)
     * $query->filterByHoursOpenfrom(array('min' => 12)); // WHERE hours_openfrom > 12
     * </code>
     *
     * @param     mixed $hoursOpenfrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByHoursOpenfrom($hoursOpenfrom = null, $comparison = null)
    {
        if (is_array($hoursOpenfrom)) {
            $useMinMax = false;
            if (isset($hoursOpenfrom['min'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM, $hoursOpenfrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hoursOpenfrom['max'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM, $hoursOpenfrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENFROM, $hoursOpenfrom, $comparison);
    }

    /**
     * Filter the query on the hours_openuntil column
     *
     * Example usage:
     * <code>
     * $query->filterByHoursOpenuntil(1234); // WHERE hours_openuntil = 1234
     * $query->filterByHoursOpenuntil(array(12, 34)); // WHERE hours_openuntil IN (12, 34)
     * $query->filterByHoursOpenuntil(array('min' => 12)); // WHERE hours_openuntil > 12
     * </code>
     *
     * @param     mixed $hoursOpenuntil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByHoursOpenuntil($hoursOpenuntil = null, $comparison = null)
    {
        if (is_array($hoursOpenuntil)) {
            $useMinMax = false;
            if (isset($hoursOpenuntil['min'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL, $hoursOpenuntil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hoursOpenuntil['max'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL, $hoursOpenuntil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_HOURS_OPENUNTIL, $hoursOpenuntil, $comparison);
    }

    /**
     * Filter the query on the gaptime column
     *
     * Example usage:
     * <code>
     * $query->filterByGaptime(1234); // WHERE gaptime = 1234
     * $query->filterByGaptime(array(12, 34)); // WHERE gaptime IN (12, 34)
     * $query->filterByGaptime(array('min' => 12)); // WHERE gaptime > 12
     * </code>
     *
     * @param     mixed $gaptime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByGaptime($gaptime = null, $comparison = null)
    {
        if (is_array($gaptime)) {
            $useMinMax = false;
            if (isset($gaptime['min'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_GAPTIME, $gaptime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gaptime['max'])) {
                $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_GAPTIME, $gaptime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_GAPTIME, $gaptime, $comparison);
    }

    /**
     * Filter the query on the reminderInterval column
     *
     * Example usage:
     * <code>
     * $query->filterByReminderinterval('fooValue');   // WHERE reminderInterval = 'fooValue'
     * $query->filterByReminderinterval('%fooValue%'); // WHERE reminderInterval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reminderinterval The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function filterByReminderinterval($reminderinterval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reminderinterval)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reminderinterval)) {
                $reminderinterval = str_replace('*', '%', $reminderinterval);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_REMINDERINTERVAL, $reminderinterval, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFreyHallTestingCenter $freyHallTestingCenter Object to remove from the list of results
     *
     * @return $this|ChildFreyHallTestingCenterQuery The current query, for fluid interface
     */
    public function prune($freyHallTestingCenter = null)
    {
        if ($freyHallTestingCenter) {
            $this->addUsingAlias(FreyHallTestingCenterTableMap::COL_NUMSEATS, $freyHallTestingCenter->getNumseats(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the freyHallTestingCenterRoom table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreyHallTestingCenterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FreyHallTestingCenterTableMap::clearInstancePool();
            FreyHallTestingCenterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FreyHallTestingCenterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FreyHallTestingCenterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FreyHallTestingCenterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FreyHallTestingCenterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FreyHallTestingCenterQuery
