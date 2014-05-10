# libdomain

Libdomain is a php library to facilitate [domain driven development](http://en.wikipedia.org/wiki/Domain-driven_design).

[![Build Status](https://travis-ci.org/cjsaylor/libdomain.svg?branch=master)](https://travis-ci.org/cjsaylor/libdomain)

## Core concepts

This library contains the following abstract classes:

* `Entity` - An entity is an identifiable object.
* `ValueObject` - An object who's values are immutable.
* `Collection` - A collection of `Entity` objects.
* `CollectionEntity` - An entity object that also acts as a collection (an identifiable collection).
