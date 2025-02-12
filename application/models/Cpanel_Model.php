<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpanel_model extends CI_Model
{
    function __construct()
    {
      // Call the Model constructor
      parent::__construct();
    }

    function html_field($id_form)
    {
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_set')->result();
    	$x=1;
		foreach ($query as $data) 
		{
			//echo $data->html_code;


			echo '
					<tr>
	                  <th scope="row">'.$x.'</th>
	                  <td>'.$data->type_field.'</td>
	                  <td>'.$data->label.'</td>
	                  <td>'.$data->id_name.'</td>
	                </tr>
				 ';
			$x++;
		}
    }


    function call_role($project_id)
    {
    	$this->db->where('role !=','admin');
    	$this->db->where('project_id',$project_id);
    	$query =  $this->db->get('project_role')->result();
    	$data_role='';
		foreach ($query as $data) 
		{
			//echo $data->html_code;


			$data_role .= '
							<tr>
			                  <td>'.$data->role.'</td>
			                  <td><a onclick="delete_role('.$data->id.');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			                </tr>
						  ';
		}


		$default = '
						<tr>
		                  <td>Admin</td>
		                  <td><i class="fa fa-lock" aria-hidden="true"></i></td>
		                </tr>
				   ';


		echo $default.$data_role;
			
    }


    function call_role_creator($project_id,$id_form)
    {
    	//$this->db->where('role !=','admin');
    	$this->db->where('project_id',$project_id);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_session')->result();
    	$data_role='';
		foreach ($query as $data) 
		{
			//echo $data->html_code;


			$data_role .= '
							<tr>
			                  <td>'.$data->role.'</td>
			                  <td><a onclick="delete_role('.$data->id.');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			                </tr>
						  ';
		}



		echo $data_role;
			
    }


    function check_name_controller($controller)
    {
    	$where = "
    				SELECT count(*) as Total FROM project_file as a 
    				Where a.controller_name='$controller'
    			 ";
    	$query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
        	return '0';
        }
    }


    function check_name_table($table_name)
    {
    	$where = "
    				SELECT count(*) as Total FROM project_table as a 
    				Where a.table_name='$table_name'
    			 ";
    	$query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
        	return '0';
        }
    }


    function create_column_table($id_form,$table_name)
    {
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_set')->result();
    	$x=1;
		foreach ($query as $data) 
		{
			$column = $data->id_name;
            $type_field = $data->type_field;

            //var_dump($type_field);

            if(($type_field=='Multiple Checkboxes')||($type_field=='Inline Checkboxes')){

            } else {

    			if ($this->db->field_exists($column, $table_name))
    			{
    				
    			} else {

    				$this->load->dbforge();
    				$fields = array(
    			        $column => array('type' => 'TEXT')
    			    );

    			    //var_dump($table_name); exit();
    			    $this->dbforge->add_column($table_name, $fields, 'id');
    			}
            }
		}





    }


    function check_id_name($id_name,$id_form)
    {
    	$where = "
    				SELECT count(*) as Total FROM field_set as a 
    				Where a.id_name='$id_name' AND a.id_form='$id_form'
    			 ";
    	$query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
        	return '0';
        }
    }


    function check_data_existing($id_data,$id_name,$id_form)
    {
    	$where = "
    				SELECT count(*) as Total FROM field_data as a 
    				Where a.data_name='$id_data' AND a.id_field='$id_name' AND a.id_form='$id_form'
    			 ";
    	$query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
        	return '0';
        }
    }


    function call_data_set($id_form)
    {
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$x=1;
		foreach ($query as $data) 
		{
			//echo $data->html_code;


			echo '
					<tr>
	                  <td>'.$data->id_field.'</td>
	                  <td>'.$data->data_name.'</td>
	                  <td><a onclick="delete_data_set_lookup('.$data->id.')">Delete</a></td>
	                </tr>
				 ';
			$x++;
		}


		if(empty($query)){
			echo '
					<tr>
	                    <th scope="row">No Data</th>
	                    <td>No Data</td>
	                    <td>No Data</td>
	                </tr>
				 ';
		}
    }


    function check_data_set($id_name,$id_form)
    {
    	$where = "
    				SELECT count(*) as Total FROM field_data as a 
    				Where a.id_field='$id_name' AND a.id_form='$id_form'
    			 ";
    	$query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
        	return '0';
        }
    }


    function option_multiple_radio($id_name,$id_form){
    	$this->db->where('id_field',$id_name);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$output='';
		foreach ($query as $data) 
		{	
			$data_name = $data->data_name;

			$output .= 	'
							<div class="radio">
                                <label for="radios-0">
                                    <input type="radio" name="'.$id_name.'" id="" value="'.$data_name.'">
                                    '.$data_name.'
                                </label>
                            </div>
						';
		}

		return $output;
    }

	function option_inline_radio($id_name,$id_form)
	{
		$this->db->where('id_field',$id_name);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$output='';
		foreach ($query as $data) 
		{	
			$data_name = $data->data_name;
			$output .= 	'
							<label class="radio-inline" for="radios-0">
                                <input type="radio" name="'.$id_name.'" id="" value="'.$data_name.'">
                                '.$data_name.'
                            </label>
						';
		}

		return $output;
	}

	function option_multiple_checkboxes($id_name,$id_form,$table_name){
		$this->db->where('id_field',$id_name);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$output='';
		foreach ($query as $data) 
		{	
			$data_name = $data->data_name;

            //var_dump($data_name);
            $id_data = preg_replace('/\s+/', '_', $data_name);

            $check_table = $this->check_name_table($table_name);
            if($check_table>0){


            } else {

                $data_table = array(
                                    'table_name'=>$table_name,
                                    'project_id'=>$this->session->userdata('project_id')

                                   );
                $this->db->insert('project_table',$data_table);

                
                //create table 
                $this->load->dbforge();
                $this->dbforge->add_field('id');
                $this->dbforge->create_table($table_name);


                $fields = array(
                    'project_id' => array('type' => 'TEXT')
                );
                $this->dbforge->add_column($table_name, $fields, 'id');


                $fields = array(
                    'uid' => array('type' => 'TEXT')
                );
                $this->dbforge->add_column($table_name, $fields, 'project_id');
            }


            //check_existing_column
            if ($this->db->field_exists($id_data, $table_name))
            {
                 
            } else {

                $this->load->dbforge();
                $fields = array(
                    $id_data => array('type' => 'TEXT')
                );

                //var_dump($table_name); exit();
                $this->dbforge->add_column($table_name, $fields, 'id');

            }

			$output .= 	'
							<div class="checkbox">
                                <label for="">
                                    <input type="checkbox" name="'.$id_data.'" id="" value="'.$data_name.'">
                                    '.$data_name.'
                                </label>
                            </div>
						';
		}

		return $output;
	}

	function option_inline_checkboxes($id_name,$id_form,$table_name)
	{
		$this->db->where('id_field',$id_name);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$output='';
		foreach ($query as $data) 
		{	
			$data_name = $data->data_name;
            $id_data = preg_replace('/\s+/', '_', $data_name);

            $check_table = $this->check_name_table($table_name);
            if($check_table>0){


            } else {

                $data_table = array(
                                    'table_name'=>$table_name,
                                    'project_id'=>$this->session->userdata('project_id')

                                   );
                $this->db->insert('project_table',$data_table);

                
                //create table 
                $this->load->dbforge();
                $this->dbforge->add_field('id');
                $this->dbforge->create_table($table_name);


                $fields = array(
                    'project_id' => array('type' => 'TEXT')
                );
                $this->dbforge->add_column($table_name, $fields, 'id');

               

            }

            //check_existing_column
            if ($this->db->field_exists($id_data, $table_name))
            {
                 
            } else {

                $this->load->dbforge();
                $fields = array(
                    $id_data => array('type' => 'TEXT')
                );

                //var_dump($table_name); exit();
                $this->dbforge->add_column($table_name, $fields, 'id');

            }


			$output .= 	'
							<label class="checkbox-inline" for="">
                              <input type="checkbox" name="'.$id_name.'" id="" value="'.$data_name.'">
                              '.$data_name.'
                            </label>
						';
		}

		return $output;
	}

	function option_dropdown($id_name,$id_form)
	{
		$this->db->where('id_field',$id_name);
    	$this->db->where('id_form',$id_form);
    	$query =  $this->db->get('field_data')->result();
    	$output='';
		foreach ($query as $data) 
		{	
			$data_name = $data->data_name;
			$output .= 	'
							<option value="'.$data_name.'">'.$data_name.'</option>
						';
		}

		return $output;
	}


    function data_show_list($id_form,$table_name)
    {
        $table_name = strtolower($table_name);
        $check_set_field = $this->check_set_field($id_form);

        //var_dump($check_set_field);
        $this->db->where('id_form',$id_form);
        $query =  $this->db->get('field_set')->result();
        $column_1 ='';
        $column_2 = '';
        $array = array();
        foreach ($query as $data) 
        {   
            $data_name = $data->id_name;
            $type_field = $data->type_field;
            //var_dump($data_name);

            if(($type_field=='Multiple Checkboxes')||($type_field=='Inline Checkboxes')){

                $this->db->group_by('data_name');
                $this->db->where('id_field',$data_name);
                $this->db->where('id_form',$id_form);
                $query3 =  $this->db->get('field_data')->result();
                $output='';
                foreach ($query3 as $data3) 
                {   
                    $data_name = $data3->data_name;
                    var_dump($data_name);
                    $id_data = preg_replace('/\s+/', '_', $data_name);

                    $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$id_data.'" name="show_list[]" checked=""></td><td>'.$data_name.'</td></tr>';

                    $data_name = $id_data;

                }

            } else {

                $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$data_name.'" name="show_list[]" checked=""></td><td>'.$data_name.'</td></tr>';

                $array[] = $data_name;

            }

            

        }



        if($check_set_field>0){

            if(!empty($table_name)){
                if ($this->db->table_exists($table_name) )
                {
                    $fields = $this->db->field_data($table_name);
                    
                    foreach ($fields as $field)
                    {
                       $column = $field->name;
                       $type_field = $this->check_type_field($column,$id_form);

                        if(($column=='id')||($column=='project_id')||($column=='uid')){

                           
                        } else {
                            if (in_array($column, $array))
                            {

                            } else {
                                
                                if(($type_field=='Multiple Checkboxes')||($type_field=='Inline Checkboxes')){


                                    // $this->db->where('id_field',$column);
                                    // $this->db->where('id_form',$id_form);
                                    // $query3 =  $this->db->get('field_data')->result();
                                    // $output='';
                                    // foreach ($query3 as $data3) 
                                    // {   
                                    //     $data_name = $data3->data_name;

                                    //     //var_dump($data_name); 

                                    //     $id_data = preg_replace('/\s+/', '_', $data_name);

                                    //     $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$id_data.'" name="show_list[]" checked=""></td><td>'.$data_name.'</td></tr>';

                                    //     $data_name = $id_data;

                                    // }

                                } else { 

                                    // $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$column.'" name="show_list[]" checked=""></td><td>'.$column.'</td></tr>';
                                }

                            }
                        }

                       
                    }


                } 
            } 


            

        } else {

            $column_2 = '';

            //var_dump($table_name);
            if ($this->db->table_exists($table_name) )
            {
                $fields = $this->db->field_data($table_name);
                
                foreach ($fields as $field)
                {

                    $column = $field->name;

                    $type_field = $this->check_type_field($column,$id_form);

                    if(($column=='id')||($column=='project_id')||($column=='uid')){

                    } else {

                        if(($type_field=='Multiple Checkboxes')||($type_field=='Inline Checkboxes')){

                            // $this->db->where('id_field',$column);
                            // $this->db->where('id_form',$id_form);
                            // $query3 =  $this->db->get('field_data')->result();
                            // $output='';
                            // foreach ($query3 as $data3) 
                            // {   
                            //     $data_name = $data3->data_name;
                            //     $id_data = preg_replace('/\s+/', '_', $data_name);

                            //     $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$id_data.'" name="show_list[]" checked=""></td><td>'.$data_name.'</td></tr>';

                            //     $data_name = $id_data;

                            // }

                        } else { 

                            $column_2 .= '<tr><td><input type="checkbox" class="checkbox1" value="'.$column.'" name="show_list[]" checked=""></td><td>'.$column.'</td></tr>';
                        }

                        
                    }
                    
                }
            }


        }

        

        echo $column_2;

        
        
    }


    function check_type_field($column,$id_form)
    {
        $this->db->where('id_name',$column);
        $this->db->where('id_form',$id_form);
        $query3 =  $this->db->get('field_set')->result();
        $output='';
        foreach ($query3 as $data3) 
        {   
            $output = $data3->type_field;
        }

        return $output;
    }


    function check_set_field($id_form)
    {
        $where = "
                    SELECT count(*) as Total FROM field_set as a 
                    Where a.id_form='$id_form'
                 ";
        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
            return '0';
        }
    }


    function get_column_table($table)
    {
        $fields = $this->db->field_data($table);

        foreach ($fields as $field)
        {
            echo '<option value="'.$field->name.'">'.$field->name.'</option>';
        }
    }


    function check_function_name_helper($function_name)
    {
        $where = "SELECT COUNT(*) AS TOTAL FROM project_lookup_helper WHERE function_name='$function_name'";
        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                
            }
            return $data->TOTAL;
        } else {
            return '0';
        }
    }


    function lookup_helper_Data($rowno,$rowperpage,$search)
    {
        $this->db->order_by('id','desc');

        $this->db->select('*');
        $this->db->from('project_lookup_helper');

        if($search != ''){
          
                    $this->db->like('table_name', $search);

               
                    $this->db->or_like('column_name', $search);

               
                    $this->db->or_like('function_name', $search);

               
        }


        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
    }


    public function lookup_helper_Count($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('project_lookup_helper');
     
        if($search != ''){
          
            $this->db->like('table_name', $search);

               
            $this->db->or_like('column_name', $search);

       
            $this->db->or_like('function_name', $search);
        }


        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }


    function module_selected($module)
    {
        $this->db->where('table_name',$module);
        $project_id = $this->session->userdata('project_id');
        $this->db->where('project_id',$project_id);
        $query2 =  $this->db->get('project_file')->result();
        foreach ($query2 as $data2) 
        {
            $data = $data2->sub_module;
            echo '<option value="'.$data.'">'.$data.'</option>';
        }
    }


    function get_file_editor($module,$sub_module,$type_mvc)
    {
        $this->db->where('table_name',$module);
        $this->db->where('sub_module',$sub_module);
        $project_id = $this->session->userdata('project_id');
        $this->db->where('project_id',$project_id);
        $query2 =  $this->db->get('project_file')->result();

        $data_collect = '';
        foreach ($query2 as $data2) 
        {
            $insert_file = $data2->insert_file;
            $update_file = $data2->update_file;
            $list_file = $data2->list_file;
            $controller_name = $data2->controller_name;

            $api = $data2->api;
            $api_id = $data2->api_id;


            if($type_mvc=='View'){
                if($insert_file=='insert'){
                    $data_option = base_url().$controller_name.'/'.$controller_name.'_add';
                    $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/views/project/body/'.$controller_name.'/'.$controller_name.'_add.php';
                    $data_collect .= "<option value='".$data_url."'>".$data_option."</option>";
                } 

                if($update_file=='update'){
                    $data_option = base_url().$controller_name.'/'.$controller_name.'_update';
                    $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/views/project/body/'.$controller_name.'/'.$controller_name.'_update.php';
                    $data_collect .= "<option value='".$data_url."'>".$data_option."</option>";
                }

                if(($list_file=='list')||($list_file=='list_w_delete')){
                    $data_option = base_url().$controller_name.'/'.$controller_name.'_list';
                    $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/views/project/body/'.$controller_name.'/'.$controller_name.'_list.php';
                    $data_collect .= "<option value='".$data_url."'>".$data_option."</option>";
                }            
            }


            if($type_mvc=='Controller'){
                $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/controllers/'.$controller_name.'.php';
                $data_collect .= "<option value='".$data_url."'>".$controller_name."</option>";

                if($api=='Yes'){
                    $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/controllers/'.$controller_name.'_api_'.$api_id.'.php';
                    $data_collect .= "<option value='".$data_url."'>".$controller_name."_api_".$api_id."</option>";
                }
            }


            if($type_mvc=='Model'){
                $data_url = $_SERVER['DOCUMENT_ROOT'].'/application/models/'.$controller_name.'_model.php';
                $data_collect .= "<option value='".$data_url."'>".$controller_name."</option>";
            }


        }

        echo $data_collect;
    }


    // extra new page 
    function list_extra_page_Count($search)
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('extra_page');
     
        if($search != ''){
          
            $this->db->like('name_function', $search);

               
        }


        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }


    function list_extra_page_Data($rowno,$rowperpage,$search)
    {
        $this->db->order_by('id','desc');

        $this->db->select('*');
        $this->db->from('extra_page');

        if($search != ''){
          
           $this->db->like('name_function', $search);

               
        }


        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
    }


    function check_name_page($controller)
    {
        $where = "
                    SELECT count(*) as Total FROM extra_page as a 
                    Where a.name_function='$controller'
                 ";
        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
            return '0';
        }
    }


    function check_theme($theme)
    {
        $project_id = $this->session->userdata('project_id');
        $where = "
                    SELECT count(*) as Total FROM set_main_page as a 
                    Where a.project_id ='$project_id'
                 ";
        //var_dump($where); exit();
        $total = '0';
        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                $total = $data->Total;
            }
        } 

        //var_dump($total); exit();

        if($total>0){
            $this->db->where('project_id',$this->session->userdata('project_id'));
            $data = array('theme'=>$theme);
            $this->db->update('set_main_page',$data);
        } else {
            $data = array('theme'=>$theme,'project_id'=>$this->session->userdata('project_id'));
            $this->db->insert('set_main_page',$data);
        }
    }


    function check_already_main_page()
    {
        $project_id = $this->session->userdata('project_id');
        $where = "
                    SELECT count(*) as Total FROM set_main_page as a 
                 ";
        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                return $data->Total;
            }
        } else {
            return '0';
        }
    }


    function list_table_Count($search = '')
    {
        $this->db->select('*');
        $this->db->from('register_table');
        
        if($search != ''){

            $this->db->like('register_table.name_table', $search);
        }

        $query1 = $this->db->get();
        $result1 = $query1->num_rows();

        $this->db->select('*');
        $this->db->from('project_file');

        if($search != ''){
            $this->db->or_like('project_file.table_name', $search);
        }
        
        $query2 = $this->db->get();
        $result2 = $query2->num_rows();

        $result = $result1+$result2;
        return $result;
    }


    function list_table_Data($rowno,$rowperpage,$search)
    {
        $this->db->group_by('a.name_table');
        $this->db->select("a.name_table as tbl, a.desc_table as d_tbl");
        $this->db->distinct();
        $this->db->from("register_table as a");
        $this->db->where("a.name_table !=",'');

        if($search != ''){
            $this->db->or_like('a.name_table', $search);
        }

        $this->db->get(); 
        $query1 = $this->db->last_query();

        $this->db->group_by('b.table_name');
        $this->db->select("b.table_name as tbl,b.description_name as d_tbl");
        $this->db->distinct();
        $this->db->from("project_file as b");
        $this->db->where("b.table_name !=",'');
        $this->db->limit($rowperpage, $rowno); 
        // $this->db->where_in("id",$model_ids);

        if($search != ''){
            $this->db->or_like('b.table_name', $search);
        }

        $this->db->get(); 
        $query2 =  $this->db->last_query();
        $query = $this->db->query($query1." UNION ".$query2);

        


        $return = $query->result_array();

        return $return;
    }


    
}