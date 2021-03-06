<?php
/**
 * JBZoo Application
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Application
 * @license    GPL-2.0
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @link       https://github.com/JBZoo/JBZoo
 * @author     Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$selected = isset($this->_categories) ? $this->_categories : $this->_item->getRelatedCategoryIds();
$multiple = $params->get('multiple', true) ? ' multiple="multiple"' : '';

?>

<div>
    <?php echo $this->app->html->_('zoo.categorylist', $this->_item->getApplication(), [],
        $this->getControlName('value', true), 'title="' . JText::_('Category') . '" size="15"' . $multiple, 'value',
        'text', $selected); ?>
    <?php if ($params->get('primary', false)) : ?>
        <div><?php echo JText::_('Select Primary Category'); ?></div>
        <?php echo $this->app->html->_('zoo.categorylist', $this->_item->getApplication(),
            [$this->app->html->_('select.option', '', JText::_('COM_ZOO_NONE'))], $this->getControlName('primary'),
            'title="' . JText::_('Primary Category') . '"', 'value', 'text', $this->_item->getPrimaryCategoryId()); ?>
    <?php endif; ?>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        var categories_elem = $('#elements_itemcategoryvalue'), primary_elem = $('#elements_itemcategoryprimary');
        if (!categories_elem || !primary_elem) return;

        categories_elem.bind('change', function () {
            var categories = $(this).val() ? $(this).val() : [],
                primary    = primary_elem.val();


            if ($.inArray(primary, categories) == -1) {

                if (Array.isArray(categories)) {
                    var catValue = categories.length ? categories.shift() : '';
                } else {
                    var catValue = categories;
                }

                primary_elem.val();
            }

        });

        primary_elem.bind('change', function () {
            var categories = categories_elem.val() ? categories_elem.val() : [], primary = $(this).val();
            if ($.inArray(primary, categories) == -1) {
                categories.push(primary);
                categories_elem.val(categories);
            }
        });
    });
</script>
