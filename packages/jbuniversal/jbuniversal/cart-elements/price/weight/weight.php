<?php
/**
 * JBZoo App is universal Joomla CCK, application for YooTheme Zoo component
 *
 * @package     jbzoo
 * @version     2.x Pro
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com,  All rights reserved.
 * @license     http://jbzoo.com/license-pro.php JBZoo Licence
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Class JBCartElementPriceWeight
 */
class JBCartElementPriceWeight extends JBCartElementPrice
{
    /**
     * Render element in ElementJBPriceAdvance
     *
     * @return bool|mixed|string
     */
    public function edit()
    {
        if ($layout = $this->getLayout('edit.php')) {
            return self::renderLayout($layout, array());
        }

        return FALSE;
    }

    /**
     * @param array $params
     *
     * @return array|mixed|null|string|void
     */
    public function render($params = array())
    {
        $params   = $this->app->data->create($params);
        $template = $params->get('template', 'radio');
        $data     = $this->getAllOptions();

        if ($layout = $this->getLayout($template . '.php')) {
            return self::renderLayout($layout, array(
                'params' => $params,
                'data'   => $data
            ));
        }

        return NULL;
    }

}
