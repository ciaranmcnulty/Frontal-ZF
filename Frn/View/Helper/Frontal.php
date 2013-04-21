<?php
/**
 * Copyright (c) 2010 Ciaran McNulty 
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * @licence http://www.opensource.org/licenses/mit-license.php
 * @author Ciaran McNulty <ciaran@ciaranmcnulty.com>
 * @package Frontal
 */

/**
 * View Helper for Frontal integration
 *
 * Currently only supports .location calls
 * 
 * @see http://github.com/carlmw/frontal
 * @author Ciaran McNulty <ciaran@ciaranmcnulty.com>
 * @package Frontal
 */
class Frn_View_Helper_Frontal extends Zend_View_Helper_Abstract
{

    /**
     * @var string A location if set
     */
    protected $_location=null;

    /**
     * @var string Some JSON data if set 
     */
    protected $_data=array();

    /**
     * When called directly, return the object 
     */
    public function frontal()
    {
        return $this;
    }
  
    /**
     * Sets the location of Frontal
     *
     * @param string The location to set
     */
    public function location($location)
    {
        $this->_location = $location;
        return $this;
    }

    /**
     * Sets data to be used in Frontal 
     *
     * @param string Key identifier
     * @param mixed The data to set
     */
    public function data($key, $data)
    {
        $this->_data[$key] = $data;
        return $this;
    }

    /**
     * Outputs a script tag (or nothing if not necessary)
     */
    public function __toString()
    {
        $str = '';
        if ($this->_location || count($this->_data) > 0) {
            if ($this->view->doctype()->isXhtml()) {
                $str .= '<script type="text/javascript">'.PHP_EOL;
            }
            else {
                $str .= '<script>'.PHP_EOL;
            }
            if($this->_location) {
                $str .= '$frn.location(\''.addslashes($this->_location).'\');'.PHP_EOL;
            }
            if(count($this->_data) > 0) {
                $str .= '$frn.data('.Zend_Json::encode($this->_data).');'.PHP_EOL;
            }
            $str .= '</script>'.PHP_EOL;
        }
        return $str;
    }

}

