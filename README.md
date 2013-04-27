php-self-organizing-list
========================

A package of Self-Organizing lists.

## Usage
 $l = new Nulpunkt\SAList\CountList();
 $l.add(1);
 $l.add(2);
 $l.add(3);
 $l.find(function ($e) { return $e == 2; }); // Returns 2
