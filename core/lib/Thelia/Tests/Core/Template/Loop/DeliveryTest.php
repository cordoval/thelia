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

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Model\CountryQuery;
use Thelia\Model\ModuleQuery;
use Thelia\Module\BaseModule;
use Thelia\Tests\Core\Template\Element\BaseLoopTestor;

use Thelia\Core\Template\Loop\Delivery;

/**
 *
 * @author Etienne Roudeix <eroudeix@openstudio.fr>
 *
 */
class DeliveryTest extends BaseLoopTestor
{
    /**
     * @var \Thelia\Model\Module
     */
    private $module;

    public function moreSetUp()
    {
        /* find an active delivery modules */
        $this->module = ModuleQuery::create()->filterByActivate(1)->filterByType(BaseModule::DELIVERY_MODULE_TYPE)->findOne();

        $instanceType = $this->module->getFullNamespace();
        $instance = new $instanceType();
        $instance->setContainer($this->container);
        $this->container->set(sprintf('module.%s', $this->module->getCode()), $instance);
    }

    public function getTestedClassName()
    {
        return 'Thelia\Core\Template\Loop\Delivery';
    }

    public function getTestedInstance()
    {
        return new Delivery($this->container);
    }

    public function getMandatoryArguments()
    {
        return array();
    }
}
