<?php

use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class HookTest extends Module
{
    public function __construct($name = null, Context $context = null)
    {
        $this->name = 'hooktest';
        $this->version = '1.0.0';
        $this->author = 'Rokas';
        $this->description = 'This module is used to test hooks';
        $this->displayName = 'Hook test';

        parent::__construct($name, $context);
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('actionTranslationSettingsPageForm');
    }

    public function hookActionTranslationSettingsPageForm($params)
    {
        /** @var \Symfony\Component\Form\FormBuilderInterface $formBuilder */
        $formBuilder = $params['form_builder'];

        foreach ($formBuilder->all() as $subFormBuilder) {
            $subFormBuilder->add('test_field', TextType::class);
        }
    }
}
