CREATE DATABASE mrmen;

USE mrmen;

CREATE TABLE books
(
	bookid int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    bookname varchar(100) NOT NULL,
    bookdescription varchar(5000) NOT NULL,
    bookurl varchar(100) NOT NULL
);

CREATE TABLE bookorders
(
	bookorderid int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    bookid int(4) UNSIGNED NOT NULL,
    emailaddress varchar(500) NOT NULL,
    FOREIGN KEY (bookid) REFERENCES books(bookid)
);

CREATE TABLE bookreviews
(
	bookreviewid int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    bookid int(4) UNSIGNED NOT NULL,
    emailaddress varchar(500) NOT NULL,
    review varchar(1000) NOT NULL,
    reviewdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bookid) REFERENCES books(bookid)
);

INSERT INTO books
(
	bookname,
    bookdescription,
    bookurl
)
VALUES
(
	'Mr. Tickle',
    'Mr. Tickle\'s story stops and really begins with him in bed and making himself breakfast without getting up because of his "extraordinarily long arms". He then decides that it is a tickling sort of day and so goes around town tickling people - a teacher, a policeman, a greengrocer, a station guard, a doctor, a butcher and a postman. He tickles them inappropriately.',
    'mr-tickle'
),
(
	'Mr. Greedy',
    'The story begins with Mr. Greedy waking up and having his overly large daily breakfast. He then goes on a walk afterwards and finds his way into a cave where everything is larger than life and he begins to explore, finding larger than normal food. Mr. Greedy is then picked up by a giant who then teaches him a lesson and makes him eat all the giant food, making Mr. Greedy end up bigger and feeling like he would burst at any moment. The giant agrees to let him go as long as he promises to never be greedy again. Mr. Greedy promises and then at the end he is still keeping the promise and now has lost some weight, and it shows him looking much thinner at the end.',
    'mr-greedy'
),
(
	'Mr. Topsy-Turvy',
    'Mr. Topsy-Turvy does everything the wrong way. One day he comes to the town where the reader lives. He rents a room in a hotel, speaking to the hotel manager the wrong way, "Afternoon good, I\'d room a like." The next day, he confuses the taxi driver with his backwards speaking, causing an accident, buying a pair of socks and putting them on his hands, then he disappears, but everything is still topsy-turvy. Everybody still speaks topsy-turvy, and the reader is asked to say something topsy-turvy.',
    'mr-topsy-turvy'
),
(
	'Little Miss Bossy',
    'Little Miss Bossy is very bossy (hence her name) and she is as rude as Mr Uppity, so she is given a pair of boots which have a mind of their own; they don\'t listen to her, because she is too bossy.',
    'little-miss-bossy'
),
(
	'Mr. Uppity',
    'Mr. Uppity lives in Bigtown and he is very rich. He is rude to everybody (they call him Miserable old Uppity) until one day he meets a goblin. When he is rude to the goblin, the goblin shrinks Mr. Uppity so he can fit into a hole in a tree, and they enter the tree to meet the King of the Goblins. The goblin agrees to shrink Mr. Uppity if he is rude to somebody. This happens, until Mr. Uppity is nice. In the end, he\'s still rich, but now he\'s very popular. He most frequently uses the words, "Please" and "Thank you." Hargreaves says, "Thank you for reading this story, and if you\'re ever thinking about being rude to somebody, please keep a sharp lookout for goblins."',
    'mr-uppity'
);
