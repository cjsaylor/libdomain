# libdomain

Libdomain is a php library to facilitate [domain driven development](http://en.wikipedia.org/wiki/Domain-driven_design).

[![Build Status](https://travis-ci.org/cjsaylor/libdomain.svg?branch=master)](https://travis-ci.org/cjsaylor/libdomain)

## Core concepts

This library contains the following abstract classes:

* `Entity` - An entity is an identifiable object.
* `ValueObject` - An object who's values are immutable.
* `Collection` - A collection of `Entity` objects.
* `CollectionEntity` - An entity object that also acts as a collection (an identifiable collection).

## Examples

The first example illustrates a user object that accepts an `email` attribute that must be an immutable email value object.

```php

use \Cjsaylor\Domain\Entity;
use \Cjsaylor\Domain\ValueObject;

class User extends Entity {

  public function offsetSet($offset, $value) {
		if ($offset === 'email' && !$value instanceof Email) {
		  throw new \LogicException('Email must be an email value object!');
		}
		parent::offsetSet($offset, $value);
	}

}

class Email extends ValueObject {

  public function __construct($value) {
    // Validate an email address here
    $this['value'] = $value;
  }

  public function __toString() {
    return $this['value'];
  }

}

$user = new User();
$user['email'] = new Email('user@somedomain.com');
```

This next example will illustrate a group of users where that group also has an identity.
Here we will make use of the `CollectionEntity` which is both a `Collection` and an `Entity`.
It will make use of the `User` entity defined in the first example.

```php
use \Cjsaylor\Domain\CollectionEntity;

class UserGroup extends CollectionEntity {

  public function add(User $user) {
    $this->getItems()[] = $user;
  }

}

$userGroup = new UserGroup([
  'id' => 1
]);
$user = new User([
  'id' => 1,
  'email' => new Email('user@somedomain.com')
]);

$userGroup->add($user);
```
