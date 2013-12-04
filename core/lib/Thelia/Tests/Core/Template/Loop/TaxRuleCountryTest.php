<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/

namespace Thelia\Tests\Core\Template\Loop;

use Thelia\Model\CountryQuery;
use Thelia\Model\TaxRuleCountryQuery;
use Thelia\Tests\Core\Template\Element\BaseLoopTestor;

use Thelia\Core\Template\Loop\TaxRuleCountry;

/**
 *
 * @author Etienne Roudeix <eroudeix@openstudio.fr>
 *
 */
class TaxRuleCountryTest extends BaseLoopTestor
{
    public function getTestedClassName()
    {
        return 'Thelia\Core\Template\Loop\TaxRuleCountry';
    }

    public function getTestedInstance()
    {
        return new TaxRuleCountry($this->container);
    }

    public function getMandatoryArguments()
    {
        $taxRuleCountry = TaxRuleCountryQuery::create()->findOne();
        if(null === $taxRuleCountry) {
            $country = CountryQuery::create()->findOne();
            $countryId = $country === null ? 1 : $country->getId();
            $taxRule = TaxRule::create()->findOne();
            $taxRuleId = $taxRule === null ? 1 : $taxRule->getId();
        } else {
            $countryId = $taxRuleCountry->getCountryId();
            $taxRuleId = $taxRuleCountry->getTaxRuleId();
        }
        return array(
            "country" => $countryId,
            "tax_rule" => $taxRuleId,
        );
    }
}
