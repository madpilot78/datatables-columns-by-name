# Extract column query string data from datatables ajax request

This is a very basic package to extract column data indexing it by name
from the query string sent by [DataTables](http://datatables.net) when
using server side mode.

It has no external dependencies apart from requiring PHP.

## Usage

Simply pass the columns input array to the constructor nd call the
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
