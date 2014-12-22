<?php
/**
 * JBZoo App is universal Joomla CCK, application for YooTheme Zoo component
 *
 * @package     jbzoo
 * @version     2.x Pro
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com,  All rights reserved.
 * @license     http://jbzoo.com/license-pro.php JBZoo Licence
 * @coder       Vitaliy Yanovskiy <joejoker@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');


$borderClass = (int)$params->get('category_display_border', 0) ? 'jbzoo-rborder' : 'jbzoo-no-border';
$uniqId = uniqid('jbzoo-');
$classes = array('yoo-zoo', 'jbzoo', 'jbzoo-category-module', 'jbcategory-layout-tab', $borderClass);

?>
<?php if (!empty($categories)): ?>
    <div id="<?php echo $uniqId ?>" class='<?php echo implode(' ', $classes); ?> uk-clearfix'>

        <?php foreach ($categories as $catId => $category): ?>
            <div class="category-wrapper uk-panel uk-panel-box uk-article-divider <?php echo $category['active_class']; ?>">

                <div class="jbcategory uk-clearfix">
                    <?php if (!empty($category['image'])): ?>
                        <div class="jbcategory-image uk-align-<?php echo $params->get('category_image_align', 'left') ?>">
                            <a href="<?php echo $category['cat_link'] ?>" class="uk-thumbnail"
                               title="<?php echo $category['category_name'] ?>"><?php echo $category['image'] ?></a>
                        </div>
                    <?php endif; ?>

                    <div class="jbcategory-link">
                        <a href="<?php echo $category['cat_link'] ?>" title="<?php echo $category['category_name'] ?>">
                            <?php echo $category['category_name'];
                            if (!empty($category['item_count'])) {
                                echo ' (' . $category['item_count'] . ')';
                            }
                            ?>
                        </a>
                    </div>

                    <?php if (!empty($category['desc'])): ?>
                        <p class="jbcategory-desc"><?php echo $category['desc'] ?></p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($category['items'])) {
                    echo '<div class="jbcategory-items">';

                    $layout = $params->get('item_layout', 'default');
                    foreach ($category['items'] as $itemId => $item) {
                        $itemClasses = array(
                            'jbzoo-item',
                            'jbzoo-item-' . $layout,
                            'jbzoo-item-' . $item->type,
                            'jbzoo-item-' . $item->id,
                            'uk-panel uk-panel-box',
                            'uk-article-divider uk-clearfix',
                        );
                        ?>
                        <div class="<?php echo implode(' ', $itemClasses); ?>">
                            <?php echo $renderer->render('item.' . $layout, array('item' => $item, 'params' => $params)); ?>
                        </div>
                    <?php
                    }
                    echo '</div>';
                } ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
