# simple-api-php
Simple API PHP with Slim Framework

### ROUTE
|#	|Route|	Method|Type|	Description|
|-|-|-|-|-|
|1|/pizzas|GET|JSON| Get all pizza data
|2|/pizza/{id}|GET| JSON|Get a single pizza data
|3|/pizza |POST|JSON|Add new pizza data
|4|/pizza/{id}|PUT|JSON|Update pizza data 
|5|/pizza/{id}|DELETE|JSON |Delete pizza data


### DB SQL
```
CREATE TABLE IF NOT EXISTS `pizza` (
 `id` int(11) NOT NULL,
 `name` varchar(100) NOT NULL,
 `code` varchar(100) NOT NULL,
 `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
```
