<!--
 * Created by PhpStorm.
 * User: petersdata
 * Date: 1/22/18
 * Time: 10:14 AM
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>data-design</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
	</head>
	<body>
		<h1>Hello data-design</h1>
		<div>
			<h2 style="color: #86d3d3">Logical Relationship Examples</h2>
			<table class="left">
				<tr>
					<th>Description</th>
					<th>1 to 1</th>
					<th>1 to N</th>
					<th>M to N</th>
				</tr>
				<tr>
					<td>Ed as a new user</td>
					<td>Ed has a unique e-mail</td>
					<td>Ed can like several topics</td>
					<td>Topics can be liked by several readers</td>
				</tr>
				<tr>
					<td>Ed as an article reader</td>
					<td>Ed reads and article once</td>
					<td>Ed reads several articles</td>
					<td>Articles are read by serveral readers</td>
				</tr>
				<tr>
					<td>Ed as an article clapper</td>
					<td>Ed clapps an article once</td>
					<td>Ed can clap several articles</td>
					<td>Many articles may be clapped by several readers</td>
				</tr>
			</table>
		</div>
		<div>
			<h2> <a href="female-lead.html">Female Lead</a></h2>
		</div>
		<div><!-- users can be articles -->
			<h2 style="color: blue">Mapping the entities, relationships, and attributes on <a href="https://medium.com">Medium</a>
			</h2>
			<ol>User Table</ol>
			<li>Entity - userEmail</li>
			<li>Attribute - userLogInPreferedMethod</li>
			<li>Attribute - userFullName</li>
			<li>Attribute - userAccountIdentifier</li>
			<li>Attribute - userEmailConfirmed</li>
			<li>Attribute - userInterestCategory</li>
			<li>Attribute - userAuthorStatus</li>
			<li>Attribute - userArticleRecommendedReadList</li>
			<li>Attribute - userArticlePartialReadList</li>
			<li>Attribute - userArticleCompleteReadList</li>
			<li>Attribute - userTotalClapCount</li>
			<li>Attribute - userTotalClapCountByUserByArticle</li>
			<li>Attribute - userTotalClapCountByUsereByAuthor</li>
			<li>Attribute - userAuthorFollowList</li>
			<ol>Article Table</ol>
			<li>Entity - articleArticleName
			<li>
			<li>Attribute - articlePublishData</li>
			<li>Attribute - articleAuthor</li>
			<li>Attribute - articleInterestCategory</li>
			<li>Attribute - articleTotalClapCount</li>
			<li>Attribute - articleBookMarkStatus</li>
			<li>Attribute - articleFewerStoriesLikeThis</li>
			<li>Attribute - articleFewerStoriesWithThisKeyWord</li>
			<li>Attribute - articleReportThisStory</li>
			<ol>Author</ol>
			<li>Entity - authorFullName</li>
			<li>Attribute - authorPlaceOfEmployment</li>
			<li>Attribute - authorEmploymentTitle</li>
			<li>Attribute - authorArticleName</li>
			<li>Attribute - authorInterestCategory</li>
			<li></li>
		</div>
		<div>
			<h2>Persona</h2>
			<ul>
				<li>Ed Strasse</li>
				<li>Male</li>
				<li>72</li>
				<li>Uses and iPad and a pc laptop</li>
				<li>Ed has a basic Proficiency</li>
				<li>Ed likes Medium because he can follow authors and topics he likes at one site.</li>
				<li>Ed is impatient, uses technology as a tool, and requires an easy UX/UI</li>
			</ul>
		</div>
		<div>
			<h2>User Story</h2>
			<ul>
				<li>As an unregistered user, Ed wants a personalied one stop homepage so he can read stories that matter to
					him and clap articles he likes
</li>
			</ul>
			<h2>Use Case</h2>
			<li>Ed is excited because he can get all of his news from one site Medium</li>
			<li><em>Precondition:</em>Ed must create a Medium account</li>
			<li><em>Precondition:</em>Ed does not use social media and will create a Medium account with email</li>
			<li><em>postcondition:</em>Ed will get his news from one site</li>
			<h2>Interaction Flow</h2>
			<li>Ed selects the "Get Started" button on the Medium web site</li>
			<li>The Medium web site give Ed the option to log in with his social media credentials or e-mail</li>
			<li>Ed elects to use sign in using his e-mail account and selects the "Create One" account link</li>
			<li>Medium askes Ed to enter his e-mail</li>
			<li>Medium informs Ed that he must check his e-mail</li>
			<li>Ed selects "Ok" button confirming he received the check e-mail message</li>
			<li>Medium e-mails Ed
<li>and selects the "Create your account" button in the e-mail</li>
			<li>Medium re-directs Ed the create account page and requests his name</li>
			<li>Ed enters his full name and selects the "Create Account" button</li>
			<li>Medium sends Ed a "Welcome to Medium" message</li>
			<li>Ed selects the "Dive in" button</li>
			<li>Medium sends Ed a splash page with 52 topics</li>
			<li>Ed selects three topics politics, entrepreneurship, and economy and selects the "Start Reading" button</li>
			<li>Medium sends Ed a message that his personal website is being built</li>
			<li>Ed waits</li>
			<li>Medium opens Ed's personalized web site</li>
			<li>Ed selects an article to read</li>
			<li>Medium opens the article</li>
			<li>Ed reads the article and follows the author</li>
			<li>Medium blocks out the "Following" button</li>
			<li>Ed likes the article so much that he decides to "Clap" the article just like 16,748 other readers of the
				article</li>
			<li>Medium alerts Ed that his clap was received</li>
			<li>Ed selects the "ok" button and continues reading articles</li>
		</div>
	</body>
</html>
