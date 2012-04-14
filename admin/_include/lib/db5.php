<?php
$DB_res = array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0);
$DB_conn = 0;
$DB_debug = false;
$DB_timer = 0;
$DB_sqls = "";

class DB
{
	static function connect()
	{
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

		if ($DB_debug) $DB_timer = ($DB_timer + time() + microtime());

		$DB_conn = mysql_connect($host, $user, $pass);
		if (!$DB_conn)
		{
			trigger_error("Can't connect to MySql: " . mysql_error());
		}
		mysql_select_db($db) or trigger_error("Can't select database: " . mysql_error());
		#mysql_query("SET NAMES utf8") or trigger_error("Can't execute query: " . mysql_error());
		#if (isset($g['character_set']) and $g['character_set'] == "Y")
		{
			mysql_query("SET NAMES 'utf8'");
			if (mysql_query("SET character SET 'utf8'"))
			{
				#mysql_query("SET character SET 'utf8'") or trigger_error("Can't execute query: " . mysql_error());
				mysql_query('SET character_set_client = utf8') or trigger_error("Can't execute query: " . mysql_error());
				mysql_query('SET character_set_results = utf8') or trigger_error("Can't execute query: " . mysql_error());
				mysql_query('SET character_set_connection = utf8') or trigger_error("Can't execute query: " . mysql_error());
				mysql_query("SET SESSION collation_connection ='utf8_bin';") or trigger_error("Can't execute query: " . mysql_error());
			}
		}

		if ($DB_debug)
		{
			$DB_timer = - ($DB_timer - time() - microtime());
			$DB_sqls .= "Connection time: " . $DB_timer . "<br />";
		}
	}

	static function close()
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;

		if ($DB_debug) $DB_timer_cur = time() + microtime();

		if ($DB_conn)
		{
			mysql_close($DB_conn);
			$DB_conn = 0;
		}

		if ($DB_debug)
		{
			$DB_timer_cur = - ($DB_timer_cur - time() - microtime());
			$DB_timer = $DB_timer + $DB_timer_cur;
			$DB_sqls .= "Disconnection time: " . $DB_timer_cur . "<br />";
			$DB_sqls .= "Total time: " . $DB_timer . "<br />";
			echo $DB_sqls;
		}
	}

	static function execute($sql)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;

		if ($DB_debug) $DB_timer_cur = time() + microtime();

		if (!($r = mysql_query($sql, $DB_conn)))
		{
			trigger_error("Can't execute query: " . mysql_error() . "\r\n" . $sql);
		}

		if ($DB_debug)
		{
			$DB_timer_cur = - ($DB_timer_cur - time() - microtime());
			$DB_timer = $DB_timer + $DB_timer_cur;
			$DB_sqls .= "Sql query: " . $sql . "<br />";
			$DB_sqls .= "Sql execute time: " . $DB_timer_cur . "<br />";
		}

		if ($r)
		{
			return 1;
		}
	}

	static function query($sql, $r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;

		if ($DB_debug) $DB_timer_cur = time() + microtime();

		if ($DB_res[$r])
		{
			mysql_free_result($DB_res[$r]);
			$DB_res[$r] = 0;
		}

		$DB_res[$r] = mysql_query($sql, $DB_conn) or trigger_error("Can't execute query: " . mysql_error() . "\r\n" . $sql);

		if ($DB_debug)
		{
			$DB_timer_cur = - ($DB_timer_cur - time() - microtime());
			$DB_timer = $DB_timer + $DB_timer_cur;
			$DB_sqls .= "Sql query: " . $sql . "<br />";
			$DB_sqls .= "Sql execute time: " . $DB_timer_cur . "<br />";
		}

		if ($DB_res[$r])
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	static function fetch_row($r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		if (!$DB_res[$r])
		{
			return 0;
		}

		$ret = mysql_fetch_array($DB_res[$r]);
		if (!$ret)
		{
			mysql_free_result($DB_res[$r]);
			$DB_res[$r] = 0;
		}
		return $ret;
	}

    static function affected_rows()
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		return mysql_affected_rows($DB_conn);
	}

    static function num_rows($r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		if (!$DB_res[$r])
		{
			return 0;
		}

		return mysql_num_rows($DB_res[$r]);
	}

	static function free_result($r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		if ($DB_res[$r])
		{
			mysql_free_result($DB_res[$r]);
			$DB_res[$r] = 0;
		}
	}

	static function insert_id()
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		return mysql_insert_id($DB_conn);
	}

    static function result($sql, $i = 0, $r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		$ret = 0;
		if (DB::query($sql, $r))
		{
			if ($row = DB::fetch_row($r))
			{
				$ret = $row[$i];
				mysql_free_result($DB_res[$r]);
				$DB_res[$r] = 0;
			}
		}
		return $ret;
	}

	static function result_cache($name, $mins, $sql, $i = 0, $r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;

		$cache = cache($name, $mins);
		if ($cache === false)
		{
			$ret = DB::result($sql, $i, $r);
			cache_update($name, $ret);
		}
		else $ret = $cache;
		return $ret;
	}

    static function db_options($sql, $selected = "", $r = 0)
	{
		global $g;
		global $l;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		$ret = "";
		if ($selected == "last_option")
		{
			if (DB::query($sql, $r))
			{
				$l = DB::num_rows($r);
				$i = 0;
				while ($row = DB::fetch_row($r))
				{
					$i++;
					if ($i == $l)
					{
						$ret .= "<option value=\"" . $row[0] . "\" selected=\"selected\">" . (isset($l['all'][to_php_alfabet($row[1])]) ? $l['all'][to_php_alfabet($row[1])] : $row[1]) . "</option>\n";
					}
					else
					{
						$ret .= "<option value=\"" . $row[0] . "\">" . (isset($l['all'][to_php_alfabet($row[1])]) ? $l['all'][to_php_alfabet($row[1])] : $row[1]) . "</option>\n";
					}
				}
				DB::free_result($r);
			}
		}
		elseif ($selected == "first")
		{
			if (DB::query($sql, $r))
			{
				$l = DB::num_rows($r);
				$i = 0;
				while ($row = DB::fetch_row($r))
				{
					$i++;
					if ($i == 1)
					{
						$ret .= "<option value=\"" . $row[0] . "\" selected=\"selected\">" . (isset($l['all'][to_php_alfabet($row[1])]) ? $l['all'][to_php_alfabet($row[1])] : $row[1]) . "</option>\n";
					}
					else
					{
						$ret .= "<option value=\"" . $row[0] . "\">" . (isset($l['all'][to_php_alfabet($row[1])]) ? $l['all'][to_php_alfabet($row[1])] : $row[1]) . "</option>\n";
					}
				}
				DB::free_result($r);
			}
		}
		else
		{
			if (DB::query($sql, $r))
			{
				while ($row = DB::fetch_row($r))
				{
					$ret .= "<option value=\"" . $row[0] . "\"" . (($row[0] == $selected) ? " selected=\"selected\"" : "") . ">" . (isset($l['all'][to_php_alfabet($row[1])]) ? $l['all'][to_php_alfabet($row[1])] : $row[1]) . "</option>\n";
				}
				DB::free_result($r);
			}
		}
		return $ret;
	}

    static function show_table($sql, $table, $limit = 0, $from = 0, $r = 0)
	{
		global $g;
		global $DB_conn;
		global $DB_res;
		global $DB_debug;
		global $DB_timer;
		global $DB_sqls;
		$html = "";
		$first_string = 1;
		if ($from != 0) $from = "," . $from . "";
		if ($limit == 0) $$limit = "";
		DB::query("SELECT * FROM " . $table . " LIMIT " . $limit . $from . "", $r);
		$html .= "<table border=1 cellpacing=5 cellpadding=5>";
		while ($row = DB::fetch_row($r))
		{
			if ($first_string == 1)
			{
				$html .= "<tr>";
				foreach ($row as $k => $v)
				{
					if (!is_int($k))
					{
						$html .= "<td>";
						$html .= "<b>" . $k . "</b>";
						$html .= "</td>";
					}
				}
				$html .= "</tr>";
				$first_string = 0;
			}

			$html .= "<tr>";
			foreach ($row as $k => $v)
			{
				if (!is_int($k))
				{
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
}

?>