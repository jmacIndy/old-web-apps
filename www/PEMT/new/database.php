<?php

class Database
{
   private $db_host = ‘localhost’;  
   private $db_user = ‘PEM_USER’;  
   private $db_pass = ‘nascar02’;  
   private $db_name = ‘PEM_OWNER’;   
   private $result = array();   
   private $con = false;

   public function connect()
   {
      if ($this->con)
         return true;
      $myconn = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
      if (!$myconn)
         return false;
      $seldb = mysql_select_db($this->db_name,$myconn);
      if (!$seldb)
         return false;
      $this->con = true;
      return true;
   }

    public function setDatabase($name)
    {
        if ($this->con)
        {
            if (mysql_close())
            {
                $this->con = false;
                $this->results = null;
                $this->db_name = $name;
                $this->connect();
            }
        }

    }

   public function disconnect()  
   {  
      if ($this->con)  
      {  
         if (mysql_close())  
         {  
            $this->con = false;  
            return true;  
         }  
         else  
         {  
            return false;  
         }  
      }  
   }  

   private function tableExists($table)  
   {  
      $tablesInDb = mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');  
      if ($tablesInDb)  
      {  
         return mysql_num_rows($tablesInDb) == 1;
      }  
   }  

   public function GetResult()
   {
      return $this->result;
   }

   public function select($table, $rows = '*', $where = null, $order = null)  
   {  
      $q = 'SELECT '.$rows.' FROM '.$table;  
      if ($where != null)  
         $q .= ' WHERE '.$where;  
      if ($order != null)  
         $q .= ' ORDER BY '.$order;  
      if ($this->tableExists($table))  
      {  
         $query = mysql_query($q);  
         if ($query)  
         {  
            $this->numResults = mysql_num_rows($query);  
            for ($i = 0; $i < $this->numResults; $i++)  
            {  
               $r = mysql_fetch_array($query);  
               $key = array_keys($r);  
               for ($x = 0; $x < count($key); $x++)  
               {  
                  // Sanitizes keys so only alphavalues are allowed  
                  if (!is_int($key[$x]))  
                  {  
                     if (mysql_num_rows($query) > 1)  
                        $this->result[$i][$key[$x]] = $r[$key[$x]];  
                     else if(mysql_num_rows($query) < 1)  
                        $this->result = null;  
                     else  
                        $this->result[$key[$x]] = $r[$key[$x]];  
                  }  
               }  
            }  
            return true;  
         }  
         else  
         {  
            return false;  
         }  
     }  
     else  
        return false;  
   }  

   public function insert($table,$values,$rows = null)  
   {  
      if ($this->tableExists($table))  
      {  
         $insert = 'INSERT INTO '.$table;  
         if ($rows != null)  
         {  
            $insert .= ' ('.$rows.')';  
         }  
  
         for ($i = 0; $i < count($values); $i++)  
         {  
            if (is_string($values[$i]))  
               $values[$i] = '"'.$values[$i].'"';  
         }  
         $values = implode(',',$values);  
         $insert .= ' VALUES ('.$values.')';  
         $ins = mysql_query($insert);  
         return (bool) $ins;
      }  
   }

   public function delete($table,$where = null)  
   {  
      if ($this->tableExists($table))  
      {  
         if ($where == null)  
         {  
            $delete = 'DELETE '.$table;  
         }  
         else  
         {  
            $delete = 'DELETE FROM '.$table.' WHERE '.$where;  
         }  
         $del = mysql_query($delete);  
  
         return (bool) $del;
      }  
      else  
      {  
         return false;  
      }  
   }    

   public function update($table, $rows, $where)  
   {  
      if ($this->tableExists($table))  
      {  
         // Parse the where values  
         // even values (including 0) contain the where rows  
         // odd values contain the clauses for the row  
         for ($i = 0; $i < count($where); $i++)  
         {  
            if ($i%2 != 0)  
            {  
               if (is_string($where[$i]))  
               {  
                  if (($i+1) != null)  
                     $where[$i] = '"'.$where[$i].'" AND ';  
                  else  
                     $where[$i] = '"'.$where[$i].'"';  
               }  
            }  
         }  
         $where = implode('=',$where);  
  
         $update = 'UPDATE '.$table.' SET ';  
         $keys = array_keys($rows);  
         for ($i = 0; $i < count($rows); $i++)  
         {  
            if (is_string($rows[$keys[$i]]))  
            {  
               $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';  
            }  
            else  
            {  
               $update .= $keys[$i].'='.$rows[$keys[$i]];  
            }  
  
            // Parse to add commas  
            if ($i != count($rows)-1)  
            {  
               $update .= ',';  
            }  
         }  
         $update .= ' WHERE '.$where;  
         $query = mysql_query($update);  

         return (bool) $query;
      }  
      else  
      {  
         return false;  
      }  
   }  
}

?>
