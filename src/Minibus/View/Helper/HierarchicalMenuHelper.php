<?php
namespace Minibus\View\Helper;

use Zend\View\Helper\AbstractHelper;

class HierarchicalMenuHelper extends AbstractHelper
{

    private $defaultSelectedDataType;

    public function __invoke(array $data, $selected = null)
    {
        $html = $this->getJsTreeTags($data);
        $html .= '<input type="hidden" id="default-selected-data-type" value="' . $this->defaultSelectedDataType . '" />';
        return $html;
    }

    public function getJsTreeTags(array $data)
    {
        $html = '<ul> ';
        $keys = array_keys($data);
        for ($i = 0; $i < count($keys); $i ++) {
            $key = $keys[$i];
            $hasChildren = array_key_exists('children', $data[$key]);
            if (! $hasChildren && is_null($this->defaultSelectedDataType))
                $this->defaultSelectedDataType = "$key";
            $html .= ' <li id="item-';
            $html .= $key;
            $html .= '" ';
            if ($hasChildren)
                $html .= ' data-jstree=\'{"disabled":true, "opened":true}\'';
            $html .= '>';
            $html .= $data[$key]['label'];
            if ($hasChildren)
                $html .= $this->getJsTreeTags($data[$key]['children']);
            $html .= ' </li>';
        }
        $html .= '</ul>';
        return $html;
    }
}