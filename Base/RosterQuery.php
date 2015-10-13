<?php

namespace Base;

use \Roster as ChildRoster;
use \RosterQuery as ChildRosterQuery;
use \Exception;
use \PDO;
use Map\RosterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'roster' table.
 *
 *
 *
 * @method     ChildRosterQuery orderByClassid($order = Criteria::ASC) Order by the classID column
 * @method     ChildRosterQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ChildRosterQuery orderByCatalognumber($order = Criteria::ASC) Order by the catalogNumber column
 * @method     ChildRosterQuery orderBySection($order = Criteria::ASC) Order by the section column
 * @method     ChildRosterQuery orderByInstructornetid($order = Criteria::ASC) Order by the instructorNetID column
 *
 * @method     ChildRosterQuery groupByClassid() Group by the classID column
 * @method     ChildRosterQuery groupBySubject() Group by the subject column
 * @method     ChildRosterQuery groupByCatalognumber() Group by the catalogNumber column
 * @method     ChildRosterQuery groupBySection() Group by the section column
 * @method     ChildRosterQuery groupByInstructornetid() Group by the instructorNetID column
 *
 * @method     ChildRosterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRosterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRosterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRosterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRosterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRosterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRoster findOne(ConnectionInterface $con = null) Return the first ChildRoster matching the query
 * @method     ChildRoster findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRoster matching the query, or a new ChildRoster object populated from the query conditions when no match is found
 *
 * @method     ChildRoster findOneByClassid(string $classID) Return the first ChildRoster filtered by the classID column
 * @method     ChildRoster findOneBySubject(string $subject) Return the first ChildRoster filtered by the subject column
 * @method     ChildRoster findOneByCatalognumber(int $catalogNumber) Return the first ChildRoster filtered by the catalogNumber column
 * @method     ChildRoster findOneBySection(string $section) Return the first ChildRoster filtered by the section column
 * @method     ChildRoster findOneByInstructornetid(string $instructorNetID) Return the first ChildRoster filtered by the instructorNetID column *

 * @method     ChildRoster requirePk($key, ConnectionInterface $con = null) Return the ChildRoster by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRoster requireOne(ConnectionInterface $con = null) Return the first ChildRoster matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRoster requireOneByClassid(string $classID) Return the first ChildRoster filtered by the classID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRoster requireOneBySubject(string $subject) Return the first ChildRoster filtered by the subject column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRoster requireOneByCatalognumber(int $catalogNumber) Return the first ChildRoster filtered by the catalogNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRoster requireOneBySection(string $section) Return the first ChildRoster filtered by the section column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRoster requireOneByInstructornetid(string $instructorNetID) Return the first ChildRoster filtered by the instructorNetID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRoster[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRoster objects based on current ModelCriteria
 * @method     ChildRoster[]|ObjectCollection findByClassid(string $classID) Return ChildRoster objects filtered by the classID column
 * @method     ChildRoster[]|ObjectCollection findBySubject(string $subject) Return ChildRoster objects filtered by the subject column
 * @method     ChildRoster[]|ObjectCollection findByCatalognumber(int $catalogNumber) Return ChildRoster objects filtered by the catalogNumber column
 * @method     ChildRoster[]|ObjectCollection findBySection(string $section) Return ChildRoster objects filtered by the section column
 * @method     ChildRoster[]|ObjectCollection findByInstructornetid(string $instructorNetID) Return ChildRoster objects filtered by the instructorNetID column
 * @method     ChildRoster[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RosterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RosterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Roster', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRosterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRosterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRosterQuery) {
            return $criteria;
        }
        $query = new ChildRosterQuery();
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
     * @return ChildRoster|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RosterTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RosterTableMap::DATABASE_NAME);
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
     * @return ChildRoster A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT classID, subject, catalogNumber, section, instructorNetID FROM roster WHERE classID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildRoster $obj */
            $obj = new ChildRoster();
            $obj->hydrate($row);
            RosterTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildRoster|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RosterTableMap::COL_CLASSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RosterTableMap::COL_CLASSID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the classID column
     *
     * Example usage:
     * <code>
     * $query->filterByClassid('fooValue');   // WHERE classID = 'fooValue'
     * $query->filterByClassid('%fooValue%'); // WHERE classID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterByClassid($classid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classid)) {
                $classid = str_replace('*', '%', $classid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RosterTableMap::COL_CLASSID, $classid, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subject)) {
                $subject = str_replace('*', '%', $subject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RosterTableMap::COL_SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the catalogNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCatalognumber(1234); // WHERE catalogNumber = 1234
     * $query->filterByCatalognumber(array(12, 34)); // WHERE catalogNumber IN (12, 34)
     * $query->filterByCatalognumber(array('min' => 12)); // WHERE catalogNumber > 12
     * </code>
     *
     * @param     mixed $catalognumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterByCatalognumber($catalognumber = null, $comparison = null)
    {
        if (is_array($catalognumber)) {
            $useMinMax = false;
            if (isset($catalognumber['min'])) {
                $this->addUsingAlias(RosterTableMap::COL_CATALOGNUMBER, $catalognumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($catalognumber['max'])) {
                $this->addUsingAlias(RosterTableMap::COL_CATALOGNUMBER, $catalognumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RosterTableMap::COL_CATALOGNUMBER, $catalognumber, $comparison);
    }

    /**
     * Filter the query on the section column
     *
     * Example usage:
     * <code>
     * $query->filterBySection('fooValue');   // WHERE section = 'fooValue'
     * $query->filterBySection('%fooValue%'); // WHERE section LIKE '%fooValue%'
     * </code>
     *
     * @param     string $section The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterBySection($section = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($section)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $section)) {
                $section = str_replace('*', '%', $section);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RosterTableMap::COL_SECTION, $section, $comparison);
    }

    /**
     * Filter the query on the instructorNetID column
     *
     * Example usage:
     * <code>
     * $query->filterByInstructornetid('fooValue');   // WHERE instructorNetID = 'fooValue'
     * $query->filterByInstructornetid('%fooValue%'); // WHERE instructorNetID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instructornetid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function filterByInstructornetid($instructornetid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instructornetid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $instructornetid)) {
                $instructornetid = str_replace('*', '%', $instructornetid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RosterTableMap::COL_INSTRUCTORNETID, $instructornetid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRoster $roster Object to remove from the list of results
     *
     * @return $this|ChildRosterQuery The current query, for fluid interface
     */
    public function prune($roster = null)
    {
        if ($roster) {
            $this->addUsingAlias(RosterTableMap::COL_CLASSID, $roster->getClassid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the roster table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RosterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RosterTableMap::clearInstancePool();
            RosterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RosterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RosterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RosterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RosterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RosterQuery
