
# Club-Panda

A simple website with some JavaScript Games

## Preview

**Preview site here: https://clubpanda.jrtechs.net**

## Contributing

### How to submit a PR

 1. Fork this repo.
 2. Checkout your fork.
 3. Make changes and commit them to your fork.
 4. Hit the button that says "Submit Pull Request" on your forked repo.


### SQL Lite DB Initialization


```sql
sqlite3 clubpanda.sqlite

CREATE TABLE scores (
    score_id INTEGER PRIMARY KEY AUTOINCREMENT,
  game INTEGER NOT NULL,
  user_id mediumint(9) NOT NULL,
  score mediumint(9) NOT NULL
);


CREATE TABLE users (
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  first_name varchar(20) NOT NULL,
  last_name varchar(40) NOT NULL,
  user_name varchar(60) NOT NULL,
  pass char(40) NOT NULL,
  registration_date datetime NOT NULL,
  admin tinyint(1) NOT NULL
);

select score, users.user_name username from scores  inner join users on users.user_id=scores.user_id where game = '1' order by score desc limit 20

.exit
```


Notes on php sqlite documentation:  https://www.php.net/manual/en/sqlite3.construct.php

