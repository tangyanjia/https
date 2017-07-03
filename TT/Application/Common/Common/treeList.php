<?php


/**
 *字符串截取函数
 *开启mbstring扩展
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true)
{
    if (mb_strlen($str, $charset) > $length) {
        if (function_exists("mb_substr")) {
            if ($suffix) {
                return mb_substr($str, $start, $length, $charset) . "...";
            } else {
                return mb_substr($str, $start, $length, $charset);
            }

        } elseif (function_exists('iconv_substr')) {
            if ($suffix) {
                return iconv_substr($str, $start, $length, $charset) . "...";
            } else {
                return iconv_substr($str, $start, $length, $charset);
            }

        }
        $re['utf-8']  = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
        if ($suffix) {
            return $slice . "…";
        }

        return $slice;
    } else {
        return $str;
    }
}

/**
 * 把返回的数据集转换成Tree
 * @access public
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent           = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }
    return $tree;
}
