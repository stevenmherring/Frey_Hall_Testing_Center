<?php

namespace Base;

use \Class as ChildClass;
use \ClassQuery as ChildClassQuery;
use \Exception;
use \PDO;
use Map\ClassTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'class' table.
 *
 *
 *
 * @method     ChildClassQuery orderByClassID($order = Criteria::ASC) Order by the classID column
 * @method     ChildClassQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ChildClassQuery orderByCategory($order = Criteria::ASC) Order by the catalogNumber column
 * @method     ChildClassQuery orderBySection($order = Criteria::ASC) Order by the section column
 * @method     ChildClassQuery orderByClassID($order = Criteria::ASC) Order by the InstructorNetID column
 *
 * @method     ChildClassQuery groupByClassID() Group by the classID column
 * @method     ChildClassQuery groupBySubject() Group by the subject column
 * @method     ChildClassQuery groupByCategory() Group by the catalogNumber column
 * @method     ChildClassQuery groupBySection() Group by the section column
 * @method     ChildClassQuery groupByClassID() Group by the InstructorNetID column
 *
 * @method     ChildClassQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClassQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClassQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClassQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClassQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClassQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClass findOne(ConnectionInterface $con = null) Return the first ChildClass matching the query
 * @method     ChildClass findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClass matching the query, or a new ChildClass object populated from the query conditions when no match is found
 *
 * @method     ChildClass findOneByClassID(string $classID) Return the first ChildClass filtered by the classID column
 * @method     ChildClass findOneBySubject(string $subject) Return the first ChildClass filtered by the subject column
 * @method     ChildClass findOneByCategory(int $catalogNumber) Return the first ChildClass filtered by the catalogNumber column
 * @method     ChildClass findOneBySection(string $section) Return the first ChildClass filtered by the section column
 * @method     ChildClass findOneByClassID(string $InstructorNetID) Return the first ChildClass filtered by the InstructorNetID column *

 * @method     ChildClass requirePk($key, ConnectionInterface $con = null) Return the ChildClass by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOne(ConnectionInterface $con = null) Return the first ChildClass matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClass requireOneByClassID(string $classID) Return the first ChildClass filtered by the classID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneBySubject(string $subject) Return the first ChildClass filtered by the subject column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByCategory(int $catalogNumber) Return the first ChildClass filtered by the catalogNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneBySection(string $section) Return the first ChildClass filtered by the section column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClass requireOneByClassID(string $InstructorNetID) Return the first ChildClass filtered by the InstructorNetID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClass[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClass objects based on current ModelCriteria
 * @method     ChildClass[]|ObjectCollection findByClassID(string $classID) Return ChildClass objects filtered by the classID column
 * @method     ChildClass[]|ObjectCollection findBySubject(string $subject) Return ChildClass objects filtered by the subject column
 * @method     ChildClass[]|ObjectCollection findByCategory(int $catalogNumber) Return ChildClass objects filtered by the catalogNumber column
 * @method     ChildClass[]|ObjectCollection findBySection(string $section) Return ChildClass objects filtered by the section column
 * @method     ChildClass[]|ObjectCollection findByClassID(string $InstructorNetID) Return ChildClass objects filtered by the InstructorNetID column
 * @method     ChildClass[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClassQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClassQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Class', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClassQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClassQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClassQuery) {
            return $criteria;
        }
        $query = new ChildClassQuery();
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
     * @return ChildClass|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClassTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClassTableMap::DATABASE_NAME);
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
     * @return ChildClass A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT classID, subject, catalogNumber, section, InstructorNetID FROM class WHERE classID = :p0';
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
            /** @var ChildClass $obj */
            $obj = new ChildClass();
            $obj->hydrate($row);
            ClassTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildClass|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClassTableMap::COL_CLASSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClassTableMap::COL_CLASSID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the classID column
     *
     * Example usage:
     * <code>
     * $query->filterByClassID('fooValue');   // WHERE classID = 'fooValue'
     * $query->filterByClassID('%fooValue%'); // WHERE classID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classID The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByClassID($classID = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classID)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classID)) {
                $classID = str_replace('*', '%', $classID);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_CLASSID, $classID, $comparison);
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
     * @return $this|ChildClassQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClassTableMap::COL_SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the catalogNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory(1234); // WHERE catalogNumber = 1234
     * $query->filterByCategory(array(12, 34)); // WHERE catalogNumber IN (12, 34)
     * $query->filterByCategory(array('min' => 12)); // WHERE catalogNumber > 12
     * </code>
     *
     * @param     mixed $category The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (is_array($category)) {
            $useMinMax = false;
            if (isset($category['min'])) {
                $this->addUsingAlias(ClassTableMap::COL_CATALOGNUMBER, $category['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($category['max'])) {
                $this->addUsingAlias(ClassTableMap::COL_CATALOGNUMBER, $category['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_CATALOGNUMBER, $category, $comparison);
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
     * @return $this|ChildClassQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClassTableMap::COL_SECTION, $section, $comparison);
    }

    /**
     * Filter the query on the InstructorNetID column
     *
     * Example usage:
     * <code>
     * $query->filterByClassID('fooValue');   // WHERE InstructorNetID = 'fooValue'
     * $query->filterByClassID('%fooValue%'); // WHERE InstructorNetID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classID The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function filterByClassID($classID = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classID)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classID)) {
                $classID = str_replace('*', '%', $classID);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassTableMap::COL_INSTRUCTORNETID, $classID, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClass $class Object to remove from the list of results
     *
     * @return $this|ChildClassQuery The current query, for fluid interface
     */
    public function prune($class = null)
    {
        if ($class) {
            $this->addUsingAlias(ClassTableMap::COL_CLASSID, $class->getClassID(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the class table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClassTableMap::clearInstancePool();
            ClassTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClassTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClassTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClassTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClassTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClassQuery
