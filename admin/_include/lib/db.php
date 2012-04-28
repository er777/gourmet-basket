<?php

$DB_res = array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0);
$DB_conn = 0;
$DB_debug = false;
$DB_timer = 0;
$DB_sqls = "";

class DB {

    function connect() {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;

        $host = $g['db']['host'];
        $db = $g['db']['db'];
        $user = $g['db']['user'];
        $pass = $g['db']['password'];

        if ($DB_debug)
            $DB_timer = ($DB_timer + time() + microtime());

        $DB_conn = mysql_connect($host, $user, $pass);
        if (!$DB_conn) {
            trigger_error("Can't connect to MySql: " . mysql_error());
        }
        mysql_select_db($db) or trigger_error("Can't select database: " . mysql_error());
        #mysql_query("SET NAMES utf8") or trigger_error("Can't execute query: " . mysql_error());
        #if (isset($g['character_set']) and $g['character_set'] == "Y") 
        {
            mysql_query("SET NAMES 'utf8'");
            if (mysql_query("SET character SET 'utf8'")) {
                #mysql_query("SET character SET 'utf8'") or trigger_error("Can't execute query: " . mysql_error());
                mysql_query('SET character_set_client = utf8') or trigger_error("Can't execute query: " . mysql_error());
                mysql_query('SET character_set_results = utf8') or trigger_error("Can't execute query: " . mysql_error());
                mysql_query('SET character_set_connection = utf8') or trigger_error("Can't execute query: " . mysql_error());
                mysql_query("SET SESSION collation_connection ='utf8_bin';") or trigger_error("Can't execute query: " . mysql_error());
            }
        }

        if ($DB_debug) {
            $DB_timer = - ($DB_timer - time() - microtime());
            $DB_sqls .= "Connection time: " . $DB_timer . "<br />";
        }
    }

    function close() {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;

        if ($DB_debug)
            $DB_timer_cur = time() + microtime();

        if ($DB_conn) {
            mysql_close($DB_conn);
            $DB_conn = 0;
        }

        if ($DB_debug) {
            $DB_timer_cur = - ($DB_timer_cur - time() - microtime());
            $DB_timer = $DB_timer + $DB_timer_cur;
            $DB_sqls .= "Disconnection time: " . $DB_timer_cur . "<br />";
            $DB_sqls .= "Total time: " . $DB_timer . "<br />";
            echo $DB_sqls;
        }
    }

    function execute($sql) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;

        if ($DB_debug)
            $DB_timer_cur = time() + microtime();

        if (!($r = mysql_query($sql, $DB_conn))) {
            trigger_error("Can't execute query: " . mysql_error() . "\r\n" . $sql);
        }

        if ($DB_debug) {
            $DB_timer_cur = - ($DB_timer_cur - time() - microtime());
            $DB_timer = $DB_timer + $DB_timer_cur;
            $DB_sqls .= "Sql query: " . $sql . "<br />";
            $DB_sqls .= "Sql execute time: " . $DB_timer_cur . "<br />";
        }

        if ($r) {
            return 1;
        }
    }

    function query($sql, $r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;

        if ($DB_debug)
            $DB_timer_cur = time() + microtime();

        if ($DB_res[$r]) {
            mysql_free_result($DB_res[$r]);
            $DB_res[$r] = 0;
        }
        //echo $sql." <test";
        $DB_res[$r] = mysql_query($sql, $DB_conn) or trigger_error("Can't execute query: " . mysql_error() . "\r\n<br>" . $sql);

        if ($DB_debug) {
            $DB_timer_cur = - ($DB_timer_cur - time() - microtime());
            $DB_timer = $DB_timer + $DB_timer_cur;
            $DB_sqls .= "Sql query: " . $sql . "<br />";
            $DB_sqls .= "Sql execute time: " . $DB_timer_cur . "<br />";
        }

        if ($DB_res[$r]) {
            return 1;
        } else {
            return 0;
        }
    }

    function fetch_row($r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        if (!$DB_res[$r]) {
            return 0;
        }

        $ret = mysql_fetch_array($DB_res[$r]);
        if (!$ret) {
            mysql_free_result($DB_res[$r]);
            $DB_res[$r] = 0;
        }
        return $ret;
    }

    function affected_rows() {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        return mysql_affected_rows($DB_conn);
    }

    function num_rows($r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        if (!$DB_res[$r]) {
            return 0;
        }

        return mysql_num_rows($DB_res[$r]);
    }

    function free_result($r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        if ($DB_res[$r]) {
            mysql_free_result($DB_res[$r]);
            $DB_res[$r] = 0;
        }
    }

    function insert_id() {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        return mysql_insert_id($DB_conn);
    }

    function result($sql, $i = 0, $r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        $ret = 0;
        if (DB::query($sql, $r)) {
            if ($row = DB::fetch_row($r)) {
                $ret = $row[$i];
                mysql_free_result($DB_res[$r]);
                $DB_res[$r] = 0;
            }
        }
        return $ret;
    }

    function result_cache($name, $mins, $sql, $i = 0, $r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;

        $cache = cache($name, $mins);
        if ($cache === false) {
            $ret = DB::result($sql, $i, $r);
            cache_update($name, $ret);
        }
        else
            $ret = $cache;
        return $ret;
    }

    function db_options($sql, $selected = NULL, $r = 0) {
        global $g;
        global $l;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        $ret = "";
        DB::query($sql, $r);
        while ($row = DB::fetch_row($r)) {
            $ret .= "<option value=\"" . $row[0] . "\"" . ($row[0] == $selected ? " selected=\"selected\"" : "" ) . ">" . $row[1] . "</option>\n";
        }
        DB::free_result($r);

        return $ret;
    }

    function show_table($sql, $table, $limit = 0, $from = 0, $r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        $html = "";
        $first_string = 1;
        if ($from != 0)
            $from = "," . $from . "";
        if ($limit == 0)
            $$limit = "";
        DB::query("SELECT * FROM " . $table . " LIMIT " . $limit . $from . "", $r);
        $html .= "<table border=1 cellpacing=5 cellpadding=5>";
        while ($row = DB::fetch_row($r)) {
            if ($first_string == 1) {
                $html .= "<tr>";
                foreach ($row as $k => $v) {
                    if (!is_int($k)) {
                        $html .= "<td>";
                        $html .= "<b>" . $k . "</b>";
                        $html .= "</td>";
                    }
                }
                $html .= "</tr>";
                $first_string = 0;
            }

            $html .= "<tr>";
            foreach ($row as $k => $v) {
                if (!is_int($k)) {
                    $html .= "<td>";
                    $html .= nl2br($v);
                    $html .= "</td>";
                }
            }
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }

    /*  */ /*  */

    function fetch_assoc($r = 0) {
        global $g;
        global $DB_conn;
        global $DB_res;
        global $DB_debug;
        global $DB_timer;
        global $DB_sqls;
        if (!$DB_res[$r]) {
            return 0;
        }

        $ret = mysql_fetch_assoc($DB_res[$r]);
        if (!$ret) {
            mysql_free_result($DB_res[$r]);
            $DB_res[$r] = 0;
        }
        return $ret;
    }

    function array_assoc($q) {
        $i = 0;
        $r = array();
        DB::query($q);
        //$r['total'] = DB::num_rows();
        while ($row = DB::fetch_assoc()) {
            $r[$i]= $row;
            $i++;
        }

        return $r;
    }

    function get_single($table, $pk, $pkval) {
		
		if ($pkval == 'new'){
			return DB::get_fields($table, $pk, false);
		}else {
            $pkval = addslashes_f_array($pkval);
            $sql = "SELECT * FROM `$table` WHERE `$pk` = '$pkval'";
            DB::query($sql);
            $res = DB::fetch_assoc();
            if (count($res))
                return $res;
            else
                return array();
        }
    }

    function get_fields($table, $pk, $values = true) {
        $fields = array();
        $var1 = "";
        $var1 .= "SHOW FIELDS FROM `$table`";
        DB::query($var1);
        while ($k = DB::fetch_assoc()) {
            if ($values)
                $fields[$k['Field']] = $k['Field'];
            else
                $fields[$k['Field']] = '';
        }
        return $fields;
    }

    /* / for insert or update in db / */

    function insert_update($table, $pk, $d, $empty = false) {
        
        // This is a slick function, but consider that it is MUCH more confusing than it is helpful.
        // I get what's going on here, but as an outside developer, it seems almost like you are sayin "Fuck everyone else."
        // I need to keep looking between files to be sure what the arguments are because
        // the variable names like $pk, $x, $m, and $d do not make sense.
        // Please use duck typing when naming vars and methods: http://en.wikipedia.org/wiki/Duck_typing 
        $lastid = 0;
        $fields = DB::get_fields($table, $pk);
        $d = addslashes_f_array($d);

        //for update: empty before updating. This is because checkboxes
        if ($d[$pk] != "new" && $empty == true) {
            $var1 = "";
            $var1 .= "SELECT * FROM `$table` WHERE $pk = '" . $d[$pk] . "' LIMIT 1 ";
            DB::query($var1);
            $x = DB::fetch_assoc();
            unset($x["id"]);
            $m = "";
            $var1 = "";
            $var1 .= "UPDATE `$table` SET  ";
            foreach ($x as $k => $v) { 
                if ($k == $pk)
                    continue;
                $var1.= $m . " `$k` = '' ";
                $m = ", ";
            }
            $var1 .= " WHERE  `$pk` = '" . $d[$pk] . "' ";
            echo $var1."<br>";

            DB::execute($var1);
        }

        $i_u = $d[$pk] != "new" ? "UPDATE " : "INSERT ";
        $m = "";
        $var1 = "";
        $var1 .= "$i_u `$table` SET ";

        foreach ($d as $k => $v) {
            if (!in_array($k, $fields))
                continue;
            if ($k == $fields[$pk])
                continue;
            if ($v == '')
                $var1.= $m . " `$k` = '' ";
            else
                $var1.= $m . " `$k` = '" . $v . "'";
            $m = ", ";
        }
        if ($d[$pk] != "new")
            $var1 .= " WHERE  `$pk` = '" . $d[$pk] . "' ";
        //echo $var1."<br>";
        
        DB::execute($var1);
        $lastid = $d[$pk] != "new" ? $d[$pk] : DB::insert_id();

        $var1 = "SELECT * FROM `$table` WHERE $pk = '" . $lastid . "' LIMIT 1 ";
        DB::query($var1);
        $x = DB::fetch_assoc();
        return $x;
    }

}

function stripslashes_f_array(&$value) {
    $value = is_array($value) ? array_map('stripslashes_f_array', $value) : stripslashes(htmlspecialchars($value));
    return $value;
}

function addslashes_f_array(&$value) {
    $value = is_array($value) ? array_map('addslashes_f_array', $value) : mysql_real_escape_string(stripslashes($value));
    return $value;
}

?>