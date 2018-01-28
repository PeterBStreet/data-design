<?php
/*
 *
 * Title Information
 *
 *    Created by PhpStorm.
 *    User: petersdata
 *    @author Peter B Street <peterbstreet@gmail.com> - Code Revision
 *    @author Dylan McDonald <dmcdonald21@cnm.edu> - Core code outline and format
 *    @author php-fig  <http://www.php-fig.org/psr/> - PHP Standards Recommendation
 *    @author Ramsey - Uuid toolset
 *    Date: 1/26/18
 *    Time: 8:47 AM
 */

/*
 *    namespaces and autoload names must match
 *    namespace must come before autoload
 *    Set the namespace for objectSample object
 *    Confirm autoload as written is the correct *.psr - Later
 *    Confirm the following properly sets the autoload - Later
 *    How do I confirm this command was propperly issued? - Later
 */
namespace DataDesign;
require_once("autoload.php");

/*
 *    The __DIR__, 2 indicates that the autoload will go up 0, 1, 2 directory layers starting with the current directory layer to load autoload.
 *    Do we need to declare side effect?
 *    How do I confirm this command was propperly issued? - Later
*/
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

/*
    * Here we load Ramsey's Uuid toolset
    * How do I confirm this command was propperly issued? - Later
*/
use Ramsey\Uuid\Uuid;

/*
 *    This object is based on the article table in profile.sql
 *    The article table is a partial example of an article found at Medium <https://medium.com>
 *    The class is definded and set to Article
 *    Notice Class Name only is PSR4
 *    This sample class does not use date therefore "use ValidateDate;" is not required
 *    The Article object uses userID as the and foreign primary key
 *    How do I confirm this command was propperly issued? - Later
 *    "implements \JsonSerializable" removed until later
*/
class Article{
	use ValidateUuid;
/*
 *    The Article class uses userID as the primary key
 *    The userId primary and foreign key should be a Uuid
 *    How do I confirm this command was propperly issued?
*/

/*
 *    This is the articles unique ID
 *    Here we set the article object's articleId state to private
 *    Do I need to add @var Uuid $articleId at this time?
 *    How do I confirm this command was propperly issued?
 */
	private $articleId;

/*
 * This is the articles author/user unique ID
 * Here we set the article object's userId state to private
 * userId is the foreign key
 * Do I need to add @var Uuid $userId at this time?
 * How do I confirm this command was propperly issued?
*/
	private $userId;

/*
 * This is the article's approximate read time
 * Here we set the article object's approximate read time state to private
 * Do I need to add @var $approximateReadTime?
 * How do I confirm this command was propperly issued?
*/
	private $approximateReadTime;

/*
 * This is the articl's title
 * Here we set the article object's article title state to private
 * Do I need to add @var string $articleTitle
 * How do I confirm this command was propperly issued?
*/
	private $articleTitle;

/*
 * constructor for this object Article
 * note how in class the names are camelCase and below they are UpperCamelCase(pascal) why?
 * ? Here we construct the object article and associate the object states with?
 * @param ? Uuid $newarticleid is the unique articleid Uuid
 * @param ? Uuid $newuserId is the unique article userId Uuid
 * @param integer $newapproximateReadTime is the article read time in minutes
 * @param string $newarticleTitle is the article title
 * @throws \InvalidArgumentException if data types are not valid
 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
 * @throws \TypeError if data types violate type hints
 * @throws \Exception if some other exception occurs
 * @Documentation <https://php.net/manual/en/language.oop5.decon.php>
 * @throws and @Documentation notes are straight from Dylan McDonald's code template
 * Exceptions code is straight from Dylan McDonald's code
 * Why the __ in "public function__construct"
 * ?should Uuids be strings or varchar?
 * if $new* is not null does that needed or is it implied
 * How do the @param and @throws work? Where should they be added?
 * Are Uuid's ints, strings?? what other types are there in PHP do they need to be stated. If stated now can we skip them in the "public function get" later
 * where can I find info on public or function in the php documentation
*/
	public function __construct($newArticleId, $newUserId, int $newApproximateReadTime, string $newArticleTitle) {
		try {
			$this->setArticleId($newArticleId);
			$this->setUserId($newUserId);
			$this->setApproximateReadTime($newApproximateReadTime);
			$this->setArticleTitle($newArticleTitle);
		}

		/*
		 *
		 *determine what exception type was thrown Do we really need this both here and in the mutator section?
		*/
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

/*
 * accessor method for articleId
 *
 * @return Uuid value of articleId
 *
 * Is accessor/get the php equivilant of sql's select?
 * Run "@return Uuid value of articleId" now or once Uuid is populated
 * Confirm the Uuid component @return syntax
 * How do I confirm this command was propperly issued?
*/
	public function getArticleId() : Uuid {
		return($this->articleId);
	}

/*
 * Mutator method for article id
 *
 * @param Uuid/string $newArticleId new value of articleId
 * @throws \RangeException if $newArticleId is not positive
 * @throws \TypeError if $newArticleId is not a uuid or string
 *
 * note that there may be issues with the validateUuid if the class does not have Uuids loaded into sql
 * @param, @throws, and exceptions are straight from Dylan McDonald's code
 * @param Uuid/string $newArticleId new value of articleId
 * @throws \RangeException if $newArticleId is not positive
 * @throws \TypeError if $newArticleId is not a uuid or string
*/
	public function setArticleId( $newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
/*
* Convert and store the articleId
 *
 * Is this for uuid's only?
*/
		$this->articleId = $uuid;
	}

	/**
	 * accessor method for userid
	 *
	 * @return Uuid value of userid
	 **/
	public function getUserId() : Uuid{
		return($this->userId);
	}

	/**
	 * mutator method for userid
	 *
	 * @param Uuid/string $newArticleId new value of userId
	 * @throws \RangeException if $newUserId is not positive
	 * @throws \TypeError if $newUserId is not a string or uuid
	 **/
	public function setUserId( $newUserId) : void {
		try {
			$uuid = self::validateUuid($newUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		// convert and store the userid Do we need this if no uuid?
		$this->userId = $uuid;
	}

	/**
	 * accessor method for approximateReadTime
	 *
	 * @return int value of approximateReadTime
	 * Note how this is :int is this correct? Where :int set?
	 **/
	public function getApproximateReadTime() :int {
		return($this->approximateReadTime);
	}

	/**
	 * mutator method for approximateReadTime
	 *
	 * @param string $newApproximateReadTime new value of approximateReadTime - use with approximateReadTime
	 * @throws \InvalidArgumentException if $newTweetContent is not an int or insecure
	 * @throws \RangeException if $newApproximateReadTime is > 1000
	 * @throws \TypeError if $newApproximateReadTime is not an int
	 * "This code verifies if the tweet content is secure" What does secure mean?
	 *    $newTweetContent = trim($newTweetContent); Trim new tweets before writing?
	 *    $newTweetContent = filter_var($newTweetContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES); Are the caps part of ramsey?
	 *    if(empty($newTweetContent) === true) {
	*     throw(new \InvalidArgumentException("tweet content is empty or insecure")); Is this php statment equilivant to the NOT NULL in the sql statement."CREATE TABLE user (userId BINARY(16) NOT NULL,"?
	* "Verify the tweet content will fit in the database" Is this php statment equilivant to sql's entity type and len in the sql statement."CREATE TABLE user (userId BINARY(16) NOT NULL,"?
	if(strlen($newTweetContent) > 140) {
	throw(new \RangeException("tweet content too large"));
	 * is the catch needed here?
	 **/
	public function setApproximateReadTime(int $newApproximateReadTime) : void {
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		/*
		*store the tweet content
* note there is no converstion
		 * is conversion need for the int
		 */

		$this->approximateReadTime = $newApproximateReadTime;
	}

	/**
	 * accessor method for articleTitle

	 * @return string value of articleTitle
	 *
	 * @return \DateTime value of *namedate - sample
	 **/
	public function getarticleTitle() : string {
		return($this->articleTitle);
	}

	/**
	 * mutator method for articleTitle
	 *
	 * @throws \InvalidArgumentException if $newArticleTitle is not a valid string
	 **/
	public function setArticleTitle(string $newArticleTitle) : void {
		 } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
	throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
		$this->articleTitle = $newArticleTitle;
	}

	/**
	 * inserts this Article into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {

		// create query template
		$query = "INSERT INTO article(articleId, userId, articleTitle, articleTitle) VALUES(:articleId, :userId, :approximateReadTime, :articleTitle)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["articleId" => $this->articleId->getBytes(), "userId" => $this->userId->getBytes(), "approximateReadTime" => $this->approximateReadTime, "articleTitle" => $this->articleTitle];
		$statement->execute($parameters);
	}


	/**
	 * deletes this article from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {

		// create query template
		$query = "DELETE FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["articleId" => $this->articleId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * updates this Tweet in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {

		// create query template
		$query = "UPDATE article SET userId = :userId, approximateReadTime = :approximateReadTime, articleTitle = :articleTitle WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		$parameters = ["articleId" => $this->articleId->getBytes(),"userId" => $this->userId->getBytes(), "approximateReadTime" => $this->approximateReadTime, "articleTitle" => $this->articleTitle];
		$statement->execute($parameters);
	}

	/**
	 * gets the Article by articeId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $articleId article id to search for
	 * @return Article|null Article found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getArticleByArticleId(\PDO $pdo, $tweetId) : ?Article {
		// sanitize the tweetId before searching
		try {
			$articleId = self::validateUuid($articleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT articleId, userId, approximateReadTime, articleTitle FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		// bind the tweet id to the place holder in the template
		$parameters = ["articleId" => $articleId->getBytes()];
		$statement->execute($parameters);

		// grab the article from mySQL
		try {
			$article = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$article = new Article($row["articleId"], $row["userId"], $row["approximateReadTime"], $row["articleTitle"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($article);
	}

	/**
	 * gets the Article by user id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $userId profile id to search by
	 * @return \SplFixedArray SplFixedArray of Articles found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getArticleByArticleId(\PDO $pdo, $userId) : \SplFixedArray {

		try {
			$userId = self::validateUuid($userId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT articleId, userId, approximateReadTime, articleTitle FROM article WHERE userId = :user
Id";
		$statement = $pdo->prepare($query);
		// bind the user id to the place holder in the template
		$parameters = ["userId" => $userId->getBytes()];
		$statement->execute($parameters);
		// build an array of articles
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article($row["articleId"], $row["userId"], $row["approximateReadTime"], $row["articleTitle"]);
				$[$article->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($articles);
	}

	/**
	 * gets the Tweet by content
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $tweetContent tweet content to search for
	 * @return \SplFixedArray SplFixedArray of Tweets found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getTweetByTweetContent(\PDO $pdo, string $tweetContent) : \SplFixedArray {
		// sanitize the description before searching
		$tweetContent = trim($tweetContent);
		$tweetContent = filter_var($tweetContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($tweetContent) === true) {
			throw(new \PDOException("tweet content is invalid"));
		}

		// escape any mySQL wild cards
		$tweetContent = str_replace("_", "\\_", str_replace("%", "\\%", $tweetContent));

		// create query template
		$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet WHERE tweetContent LIKE :tweetContent";
		$statement = $pdo->prepare($query);

		// bind the tweet content to the place holder in the template
		$tweetContent = "%$tweetContent%";
		$parameters = ["tweetContent" => $tweetContent];
		$statement->execute($parameters);

		// build an array of tweets
		$tweets = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
				$tweets[$tweets->key()] = $tweet;
				$tweets->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($tweets);
	}

	/**
	 * gets all Tweets
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Tweets found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAllTweets(\PDO $pdo) : \SPLFixedArray {
		// create query template
		$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of tweets
		$tweets = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
				$tweets[$tweets->key()] = $tweet;
				$tweets->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($tweets);
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["tweetId"] = $this->tweetId->toString();
		$fields["tweetProfileId"] = $this->tweetProfileId->toString();

		//format the date so that the front end can consume it
		$fields["tweetDate"] = round(floatval($this->tweetDate->format("U.u")) * 1000);
		return($fields);
	}
}
