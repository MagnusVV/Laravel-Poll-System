# Laravel-Poll-System
A simple two-option system for setting up polls.

## About
This project was built in Laravel for handling the backend and with Blade for frontend. We were two students in each group, as we also were supposed to train a bit on pair-programming. The task was to create a system that could handle a bit more advanced queries against a MYSQL-database we also had to create. We decided to build a web-app that could handle registering of new users, login of said users, login error handling, and something that only registered users would be able to do. In this case, that would be to create "cards" with simple two-option-polls. The user can write poll descriptions, add maximum number of allowed votes before closing, assign the date for closing if not maximum number of votes had been achieved, and also remove or close any of their own created polls (but not other users' polls).
A guest user can not create its own polls, but can vote on any poll, as long as it's still open and the guest has not voted on the same poll before. To vote, a user, or guest user, has to fill in an e-mail address before submitting its choice. If that address is already registered in that particular poll, the user can not cast a vote on that poll again. The user/guest user can also check the page for closed polls, where all poll results (and winning result, or draw) are shown.

It's a shame we didn't have time to deploy it, since this project was so fun to make!

### Participants
gustavenoksson, MagnusVV

# CODE REVIEW by team Hawaii

1. poll-app/app/Models/Poll.php:33-35
I’d probably differentiate the variable name from the method name. voteCount would tell me it’s probably an int. countVote could just as likely be a bool.

2. poll-app/resources/views/register-user.blade.php
You could mark these fields as required so the user can’t progress until it’s filled.

3. poll-app/resources/views/register-user.blade.php:4
The page could be called ‘register’ and the actual process/request called register-user.

4. Poll-app/app/Models/Poll.php
	You could have extra dependency from the other way around. 
	$this->belongsTo(Post::class)

5. Poll-app/app/Models/VoteOption.php
You could have extra dependency from the other way around. 
	$this->belongsTo(Post::class)

6. /poll-app/tests/Feature/PollTest.php

	Checking if the polls actually stick to the database would be good.

7. @include footer, you already do it with header. 

8. poll-app/routes/web.php :41-42 With a resource controller you can route to an assigned method just through the route method. https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controller 

9. poll-app/routes/web.php:41 This could also be done with a resource controller. You could even delete the CreatePollx and ClosePollx and just use the same PollController.php to do [all the things]. 

10. poll-app/resources/views/vote.blade.php You could just pass along the logged in users’ emailadress and have it as a hidden input so the user don’t have to type it him-/herself. 

11. /poll-app/tests/Feature/LoginTest.php:30 registrate->register typo 

12. LandingPageController's methods could be used inside of a PostController like we talked about earlier. Then we could use the Show method of a resource folder, with passing a variable in the request to decide what query to run and then show polls depending on that. 

13. poll-app/resources/views/dashboard-completed-polls.blade.php:20-28 To keep the blade file a bit cleaner you could do the calculation as a method in the Poll.php model and just return $winner. 

14. Honestly can’t really find any more stuff to comment on that isn’t tiny and petty. We’ll have to make do with these 13 points instead of having 20 filler ones. Well done, friends!
