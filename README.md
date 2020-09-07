# Datatables Columns By Name

[![Latest Stable Version](https://img.shields.io/packagist/v/madpilot78/datatables-columns-by-name.svg)](https://packagist.org/packages/madpilot78/datatables-columns-by-name)
[![Total Downloads](https://img.shields.io/packagist/dt/madpilot78/datatables-columns-by-name.svg)](https://packagist.org/packages/madpilot78/datatables-columns-by-name)
[![license](https://img.shields.io/github/license/madpilot78/datatables-columns-by-name.svg)](https://github.com/madpilot78/datatables-columns-by-name)
[![Build Status](https://api.travis-ci.org/madpilot78/datatables-columns-by-name.png?branch=master)](http://travis-ci.org/madpilot78/datatables-columns-by-name)
[![Coverage Status](https://coveralls.io/repos/github/madpilot78/datatables-columns-by-name/badge.svg?branch=master)](https://coveralls.io/github/madpilot78/datatables-columns-by-name?branch=master)
[![StyleCI Status](https://github.styleci.io/repos/292134864/shield?branch=master&style=flat)](https://github.styleci.io/repos/292134864)

This is a very basic package to extract column data, indexing it by
name, from the query string sent by [DataTables](http://datatables.net)
when using server side mode.

It has no external dependencies apart from requiring PHP.

## Usage

Simply pass the columns input array to the constructor and call the
methods to get data:

```php
use madpilot78\DataTablesColumnsByName\Columns;

$columns = new Columns($_GET['columns']);

echo $columns->getNumberByName('id')
// 0
echo $columns->getSearchValueByName('id')
// ''
echo $columns->getSearchRegexByName('id')
// 'false'
```
