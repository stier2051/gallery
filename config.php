<?php

try {        
        $db = new PDO ('mysql:host=localhost; dbname=gallery','admin','1234');       
} catch (PDOException $e) {
    print "Couldn't connect to the database: " . $e->getMessage();
}

