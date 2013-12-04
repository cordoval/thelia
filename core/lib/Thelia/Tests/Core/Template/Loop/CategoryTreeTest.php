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

use Thelia\Model\CategoryQuery;
use Thelia\Tests\Core\Template\Element\BaseLoopTestor;

use Thelia\Core\Template\Loop\CategoryTree;

/**
 *
 * @author Etienne Roudeix <eroudeix@openstudio.fr>
 *
 */
class CategoryTreeTest extends BaseLoopTestor
{
    public function getTestedClassName()
    {
        return 'Thelia\Core\Template\Loop\CategoryTree';
    }

    public function getTestedInstance()
    {
        return new CategoryTree($this->container);
    }

    public function getMandatoryArguments()
    {
        $category = CategoryQuery::create()->findOne();
        $categoryId = $category === null ? 1 : $category->getId();
        return array(
            "category" => $categoryId,
        );
    }
}
