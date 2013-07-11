<?php

abstract class BaseDao
{
    protected $db;
    protected $table;
    protected $field_name = array();
    protected $queries = array();

    public function get ($key, $options = array(), $limit = null, $offset = 0)
    {
        $r = $this->getTableFormat($key, $options, $limit, $offset);
        return $this->convertTableToArray($key, $r);
    }

    public function getTableFormat ($key, $options = array(), $limit = null, $offset = 0) {
        if (!array_key_exists($key, $this->queries)) {
            throw new Exception("Invalid key `$key`.");
        }
        if ((!is_null($limit) && !is_numeric($limit)) || !is_numeric($offset)) {
            throw new Exception("Invalid `LIMIT` and `OFFSET` [$limit, $offset].");
        }
        $query = $this->buildQuery($key, $options, $limit, $offset);
        return $this->execute($query);
    }

    protected function buildQuery ($key, $options, $limit, $offset)
    {
        $query = $this->queries[$key]['sql'];
        $query =  preg_replace("/__TABLE_NAME__/", $this->table, $query);
        foreach ($options as $key => $value){
            // TODO modify to better logic.
            $value = preg_replace("/\\\$/", "\\\\\$", $value);
            $query = preg_replace("/:$key/", $value, $query);
        }
        if (!is_null($limit)) {
            $query .= " limit $limit offset $offset;";
        } else {
            $query .= ";";
        }
        return $query;
    }

    protected function execute ($query)
    {
        $cmd = sprintf("echo '%s' | sqlite3 -html %s", $query, DB_DIR . $this->db);
        return shell_exec($cmd);
    }

    protected function convertTableToArray ($key, $data)
    {
        $fetch_data = array();
        foreach (explode("</TR>\n<TR>", $data) as $line) {
            $r = explode("</TD>\n<TD>", $line);
            $arr = array();
            foreach ($r as $k => $v) {
                $field = $this->field_name[$k];
                $arr[$field] = $this->deleteHtmlTag($v);
            }
            $fetch_data[] = $arr;
        }
        array_pop($fetch_data);
        return $fetch_data;
    }

    protected function deleteHtmlTag ($str)
    {
        $tag_list = array(
            'TR',
            'TD',
        );
        foreach ($tag_list as $tag) {
            $str = preg_replace ("/<$tag>/", "", $str);
            $str = preg_replace ("/<\/$tag>/", "", $str);
        }
        return $str;
    }
}
