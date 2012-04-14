<?php

class Quick_CSV_import {
    
    
    /* Solution final */
    /*     * ************************************************************************* */
    /*     * ************************************************************************* */
    /*     * ************************************************************************* */
    /*     * ************************************************************************* */

    var $table_name; //where to import to
    var $file_name;  //where to import from
    var $use_csv_header; //use first line of file OR generated columns names
    var $field_separate_char; //character to separate fields
    var $field_enclose_char; //character to enclose fields, which contain separator char into content
    var $field_escape_char;  //char to escape special symbols
    var $error; //error message
    var $arr_csv_columns; //array of columns
    var $table_exists; //flag: does table for import exist
    var $encoding; //encoding table, used to parse the incoming file. Added in 1.5 version

    function Quick_CSV_import($file_name="") {
        $this->file_name = $file_name;
        $this->arr_csv_columns = array();
        $this->use_csv_header = true;
        $this->field_separate_char = ";";
        $this->field_enclose_char = "\"";
        $this->field_escape_char = "\\";
        $this->linebreak_char = "\r\n";
        $this->encoding = "default";
        $this->table_exists = false;
    }
    
    function csv_to_array($string) {
        $row = 1;
        $total = 0;
        $gestor = fopen($string, "r");
        $header = "";
        while (($dat = fgetcsv($gestor, 2000, $this->field_separate_char, $this->field_enclose_char)) !== FALSE) {
            if ($row == 1) {
                $header .= "INSERT INTO `" . $this->table_name . "` ";
                $header .= "( " . join(", ", $this->quote_all_columns($dat)) . ")\n VALUES ";
            } else {
                $q1 = "( " . join(", ", $this->quote_all_values($dat)) . ") ";
                if (DB::execute($header . " " . $q1))
                    $total++;
                //echo $header . " " . $q1 . " row = $fila <<<< <br/>";
            }
            $row++;
        }
        return $total;
    }

    function quote_all_values($values) {
        foreach ($values as $key => $value)
            if (is_array($value))
                $values[$key] = $this->quote_all_values($value);
            else
                $values[$key] = $this->quote_all_v($value);
        return $values;
    }

    function quote_all_v($value) {

        return "'" . trim(mysql_real_escape_string($this->unquote($value))) . "'";
    }

    function quote_all_columns($values) {
        foreach ($values as $key => $value)
            if (is_array($value))
                $values[$key] = $this->quote_all_columns($value);
            else
                $values[$key] = $this->quote_all_c($value);
        return $values;
    }

    function quote_all_c($value) {

        return "`" . trim(mysql_real_escape_string($this->unquote($value))) . "`";
    }

    function unquote($value) {
        if (strpos($value, $this->field_enclose_char, 0) === 0) {
            $value = substr_replace($value, '', 0, 1);
            $value = substr_replace($value, '', strlen($value) - 1, 1);
        }
        return $value;
    }

    /*     * ************************************************************************* */
    /*     * ************************************************************************* */
    /*     * ************************************************************************* */
    /*     * ************************************************************************* */


    /* Solution 2 */

    function get_fgetcsv($handle, $max_line_length) {
        return fgetcsv($handle, $max_line_length, $this->field_separate_char);
    }

    function csv_to_table($source_file, $target_table, $max_line_length=10000) {
        if (($handle = fopen("$source_file", "r")) !== FALSE) {
            $columns = $this->get_fgetcsv($handle, $max_line_length);
            foreach ($columns as &$column) {
                $column = str_replace(".", "", $column);
            }
            $insert_query_prefix = "INSERT INTO $target_table (" . join(",", $columns) . ")\nVALUES";
            while (($data = $this->get_fgetcsv($handle, $max_line_length)) !== FALSE) {

                while (count($data) < count($columns))
                    array_push($data, NULL);
                $query = "$insert_query_prefix (" . join(",", $this->quote_all_values($data)) . ");";
                DB::execute($query);
                echo $query . "<br> <br>";
            }
            fclose($handle);
        }
    }

    //solutions 3

    function import() {
        global $g;
        /*
          if($this->table_name=="")
          $this->table_name = "temp_".date("d_m_Y_H_i_s");
         */
        $this->table_exists = $this->get_table_exists($this->table_name);
        //$this->create_import_table();

        if (empty($this->arr_csv_columns))
            $this->get_csv_header_fields();

        /* change start. Added in 1.5 version */
        if ("" != $this->encoding && "default" != $this->encoding)
            $this->set_encoding();
        /* change end */

        if ($this->table_exists) {
            $sql = "LOAD DATA INFILE '" . @mysql_escape_string($this->file_name) .
                    "' INTO TABLE `" . $g["db"]["db"] . "`.`" . $this->table_name .
                    "` FIELDS TERMINATED BY '" . @mysql_escape_string($this->field_separate_char) .
                    "' OPTIONALLY ENCLOSED BY '" . @mysql_escape_string($this->field_enclose_char) .
                    "' ESCAPED BY '" . @mysql_escape_string($this->field_escape_char) .
                    "' " .
                    ($this->use_csv_header ? " IGNORE 1 LINES " : "")
                    . "(`" . implode("`,`", $this->arr_csv_columns) . "`)";
            echo $sql;
            $res = DB::execute($sql);
            $this->error = mysql_error();
        }
    }

    function get_table_exists($t) {
        global $g;
        $var1 = "";
        $var1 .= "SELECT table_name ";
        $var1 .= "FROM   information_schema.TABLES ";
        $var1 .= "WHERE  table_schema = '" . $g["db"]["db"] . "' ";
        $var1 .= "       AND table_name = '$t'";

        return DB::result($var1);
    }

    //returns array of CSV file columns
    function get_csv_header_fields() {
        $this->arr_csv_columns = array();
        $fpointer = fopen($this->file_name, "r");
        if ($fpointer) {
            $arr = fgetcsv($fpointer, 10 * 1024, $this->field_separate_char);
            if (is_array($arr) && !empty($arr)) {
                if ($this->use_csv_header) {
                    foreach ($arr as $val)
                        if (trim($val) != "")
                            $this->arr_csv_columns[] = $val;
                }
                else {
                    $i = 1;
                    foreach ($arr as $val)
                        if (trim($val) != "")
                            $this->arr_csv_columns[] = "column" . $i++;
                }
            }
            unset($arr);
            fclose($fpointer);
        }
        else
            $this->error = "file cannot be opened: " . ("" == $this->file_name ? "[empty]" : @mysql_escape_string($this->file_name));
        return $this->arr_csv_columns;
    }

    function create_import_table() {
        $sql = "CREATE TABLE IF NOT EXISTS " . $this->table_name . " (";

        if (empty($this->arr_csv_columns))
            $this->get_csv_header_fields();

        if (!empty($this->arr_csv_columns)) {
            $arr = array();
            for ($i = 0; $i < sizeof($this->arr_csv_columns); $i++)
                $arr[] = "`" . $this->arr_csv_columns[$i] . "` TEXT";
            $sql .= implode(",", $arr);
            $sql .= ")";
            $res = DB::execute($sql);
            $this->error = mysql_error();
            $this->table_exists = "" == mysql_error();
        }
    }

    /* change start. Added in 1.5 version */

//returns recordset with all encoding tables names, supported by your database
    function get_encodings() {
        $rez = array();
        $sql = "SHOW CHARACTER SET";
        $res = @mysql_query($sql);
        if (mysql_num_rows($res) > 0) {
            while ($row = mysql_fetch_assoc($res)) {
                $rez[$row["Charset"]] = ("" != $row["Description"] ? $row["Description"] : $row["Charset"]); //some MySQL databases return empty Description field
            }
        }
        return $rez;
    }

//defines the encoding of the server to parse to file
    function set_encoding($encoding="") {
        if ("" == $encoding)
            $encoding = $this->encoding;
        $sql = "SET SESSION character_set_database = " . $encoding; //'character_set_database' MySQL server variable is [also] to parse file with rigth encoding
        $res = @mysql_query($sql);
        return mysql_error();
    }

    /* change end */
}

?>