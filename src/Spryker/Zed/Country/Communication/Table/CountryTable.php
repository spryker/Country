<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Country\Communication\Table;

use Propel\Runtime\Collection\ObjectCollection;
use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class CountryTable extends AbstractTable
{

    /**
     * @var SpyCountryQuery
     */
    protected $countryQuery;

    /**
     * @param \Orm\Zed\Country\Persistence\SpyCountryQuery $countryQuery
     */
    public function __construct(SpyCountryQuery $countryQuery)
    {
        $this->countryQuery = $countryQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            SpyCountryTableMap::COL_ISO2_CODE => 'ISO2 code',
            SpyCountryTableMap::COL_ISO3_CODE => 'ISO3 code',
            SpyCountryTableMap::COL_NAME => 'Country Name',
        ]);
        $config->setSortable([
            SpyCountryTableMap::COL_ISO3_CODE,
        ]);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Propel\Runtime\Collection\ObjectCollection
     */
    protected function prepareData(TableConfiguration $config)
    {
        return $this->runQuery($this->countryQuery, $config);
    }

}
