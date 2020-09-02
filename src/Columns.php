<?php

namespace madpilot78\DataTablesColumnsByName;

class Columns
{
    /**
     * @var array
     */
    private $columnData = [];

    /**
     * Constructor populating $columnData.
     *
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        foreach ($columns as $number => $values) {
            $sv = '';
            $re = '';

            if (array_key_exists('search', $values)) {
                if (array_key_exists('value', $values['search'])) {
                    $sv = $values['search']['value'];
                }

                if (array_key_exists('regex', $values['search'])) {
                    $re = $values['search']['regex'];
                }
            }

            $this->columnData[$values['name']] = [
                'number'      => $number,
                'searchValue' => $sv,
                'searchRegex' => $re
            ];
        }
    }

    /**
     * Return column number for column with name $name.
     *
     * @param string $name
     *
     * @return string|bool|null
     */
    public function getNumberByName(string $name)
    {
        if (array_key_exists($name, $this->columnData)) {
            return $this->columnData[$name]['number'];
        }

        return false;
    }

    /**
     * Return column search value for column with name $name.
     *
     * @param string $name
     *
     * @return string|bool|null
     */
    public function getSearchValueByName(string $name)
    {
        if (array_key_exists($name, $this->columnData)) {
            return $this->columnData[$name]['searchValue'];
        }

        return false;
    }

    /**
     * Return column search regex boolean for column with name $name.
     *
     * @param string $name
     *
     * @return string|bool|null
     */
    public function getSearchRegexByName(string $name)
    {
        if (array_key_exists($name, $this->columnData)) {
            return $this->columnData[$name]['searchRegex'];
        }

        return false;
    }
}
