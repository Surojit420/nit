<?php
class CommonModel extends CI_Model 
{

    function __construct()
    {
        parent::__construct();      
    }


    public function insert($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }



    //Dev by chhotan
    /**
     * RetriveRecordByWhereRow
     *
     * Will return single row of provided table as array with provided where clause (optional) .
     * 
     * @param string $table
     * @param array $where_clause
     * @return array
     */
    
    public function RetriveRecordByWhereRow($table,$where_clause,$select) 
    {
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($where_clause))
        $this->db->where($where_clause);
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }
    
    /**
     * RetriveRecordByWhere
     *
     * Will return all row of provided table as array with provided where clause (optional).
     * 
     * @param string $table
     * @param array $where_clause
     * @return array
     */
    
    public function RetriveRecordByWhere($table,$where_clause,$select) 
    {
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($where_clause))
        $this->db->where($where_clause);
        $data = $this->db->get()->result();
        return $data;
    }

    
    /**
     * RetriveRecordByWhereOrderby
     *
     * Will return all row of provided table as array with provided where clause (optional) order by provided filed.
     * 
     * @param string $table
     * @param array $where_clause
     * @param string $orderbyfld
     * @param string $orderby
     * @return array
     */
        
    public function RetriveRecordByWhereOrderby($table,$where_clause,$orderbyfld,$orderby) 
    {
        $this->db->select('*');
        $this->db->from($table);
        if(!empty($where_clause))
        $this->db->where($where_clause);
        $this->db->order_by($orderbyfld, $orderby);
        $data = $this->db->get()->result();
        return $data;
    }
    
    /**
     * RetriveRecordByWhereOrderbyLimit
     *
     * Will return all row of provided table as array with provided where clause (optional) order by provided filed and limit.
     * 
     * @param string $table
     * @param array $where_clause
     * @param string $orderbyfld
     * @param string $orderby
     * @param string $limit
     * @return array
     */
    
    public function RetriveRecordByWhereOrderbyLimit($table,$where_clause,$limit,$offset,$orderbyfld,$orderby) 
    {
        $this->db->select('*');
        $this->db->limit($limit,$offset);
        $this->db->from($table);
        if(!empty($where_clause))
        $this->db->where($where_clause);
        $this->db->order_by($orderbyfld, $orderby);
        $data = $this->db->get()->result();
        return $data;
    }
    
    /**
     * UpdateRecord
     *
     * Update provided records to provided table With provided condition.
     * 
     * @param string $table
     * @param array $row
     * @param string $idfld
     * @param string $id
     * @return int
     */
    
    function UpdateRecord($row,$table,$idfld,$id)
    {
        $this->db->where($idfld, $id);
        $query = $this->db->update($table, $row);
        return $this->db->affected_rows();
    }

    /**
     * Count
     *
     * Count all records of provided table.
     * 
     * @param string $table_name
     * @return int
     */
        
    public function Count($table_name) 
    {
        $this->db->select('count(*) as count');
        $this->db->from($table_name);
        $query = $this->db->get()->row();  
        $tot_rec = $query->count;
        return $tot_rec;
    }
    
    /**
     * CountWhere
     *
     * Count records of provided table With provided condition.
     * 
     * @param string $table_name
     * @param array $where_clause
     * @return int
     */
    
    public function CountWhere($table_name,$where_clause) 
    {
        $this->db->select('count(*) as count');
        $this->db->where($where_clause);
        $this->db->from($table_name);
        $query = $this->db->get()->row();  
        $tot_rec = $query->count;
        return $tot_rec;
    }

    /**
     * Delete
     *
     * Delete single records of provided table With provided condition.
     * 
     * @param string $table_name
     * @param string $id
     * @param string $idfld
     * @return int
     */

    public function Delete($table_name, $id, $idfld)
    {
        $this->db->where($idfld, $id);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }
    
    /**
     * GetRecordSql
     *
     * Will return all row of provided table using custom sql query.
     * 
     * @param string $sql
     * @return array
     */
    
    public function GetRecordSql($sql)
    {   
        $query = $this->db->query($sql);
        return $query->result();    
    }

   
    public function Update_User_Data($username, $data)
    {
        $this->db->set($data);
        $this->db->where('email', $username);
        $this->db->update('e_users');
        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }  


    public function Check_Old_Password($table_name,$where_clause)
    {
        $this->db->where($where_clause);
        $this->db->from($table_name);
        $data = $this->db->get()->row();
        return $data; 

    }
}
?>