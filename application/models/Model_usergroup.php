<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Model_usergroup extends CI_Model
	{
		function __construct ()
		{
			parent::__construct();

			$this->load->database();

			// Paginaiton defaults
			$this->pagination_enabled = FALSE;
			$this->pagination_per_page = 10;
			$this->pagination_num_links = 5;
			$this->pager = '';

			/**
			 *    bool $this->raw_data
			 *    Used to decide what data should the SQL queries retrieve if tables are joined
			 *     - TRUE:  just the field names of the usergroup table
			 *     - FALSE: related fields are replaced with the forign tables values
			 *    Triggered to TRUE in the controller/edit method
			 */
			$this->raw_data = FALSE;
		}

		function get ($id, $get_one = false)
		{

			$select_statement = ($this->raw_data) ? 'usergroup.id,group_user_id,group_id,users.user_name as group_created_by,group_remark,group_created_date' :
			 'usergroup.id,users.user_name AS group_user_id,group.group_name AS group_id,users.user_name as group_created_by,group_remark,group_created_date';
			$this->db->select($select_statement);
			$this->db->from('usergroup');
			$this->db->join('users', 'user_emp_id = group_created_by', 'left');
			$this->db->join('group', 'group_id = group.id', 'left');


			// Pick one record
			// Field order sample may be empty because no record is requested, eg. create/GET event
			if ($get_one) {
				$this->db->limit(1, 0);
			} else // Select the desired record
			{
				$this->db->where('usergroup.id', $id);
			}

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$row = $query->row_array();
				return array(
					'id' => $row['id'],
					'group_user_id' => $row['group_user_id'],
					'group_id' => $row['group_id'],
					'group_created_by' => $row['group_created_by'],
					'group_remark' => $row['group_remark'],
					'group_created_date' => $row['group_created_date'],
				);
			} else {
				return array();
			}
		}


		function insert ($data)
		{
			$this->db->insert('usergroup', $data);
			return $this->db->insert_id();
		}


		function update ($id, $data)
		{
			$this->db->where('id', $id);
			$this->db->update('usergroup', $data);
		}


		function delete ($id)
		{
			if (is_array($id)) {
				$this->db->where_in('id', $id);
			} else {
				$this->db->where('id', $id);
			}
			$this->db->delete('usergroup');

		}


		function lister ($page = FALSE)
		{

			$this->db->start_cache();
			$this->db->select('usergroup.id,users.user_name AS group_user_id,group.group_name AS group_id,
			group_created_by,group_remark,group_created_date');
			$this->db->from('usergroup');
			//$this->db->order_by( '', 'ASC' );
			$this->db->where( 'user_group_active', 1 );
			$this->db->join('users', 'group_user_id = users.id', 'left');
			$this->db->join('group', 'group_id = group.id', 'left');


			/**
			 *   PAGINATION
			 */
			if ($this->pagination_enabled == TRUE) {
				$config = array();
				$config['total_rows'] = $this->db->count_all_results();
				$config['base_url'] = 'usergroup/index/';
				$config['uri_segment'] = 3;
				$config['cur_tag_open'] = '<span class="current">';
				$config['cur_tag_close'] = '</span>';
				$config['per_page'] = $this->pagination_per_page;
				$config['num_links'] = $this->pagination_num_links;

				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$this->pager = $this->pagination->create_links();

				$this->db->limit($config['per_page'], $page);
			}

			// Get the results
			$query = $this->db->get();

			$temp_result = array();

			foreach ($query->result_array() as $row) {
				$temp_result[] = array(
					'id' => $row['id'],
					'group_user_id' => $row['group_user_id'],
					'group_id' => $row['group_id'],
					'group_created_by' => $row['group_created_by'],
					'group_remark' => $row['group_remark'],
					'group_created_date' => $row['group_created_date'],
				);
			}
			$this->db->flush_cache();
			return $temp_result;
		}


		function search ($keyword, $page = FALSE)
		{
			$meta = $this->metadata();
			$this->db->start_cache();
			$this->db->select('id,users.user_name AS group_user_id,group.group_name AS group_id,group_created_by,group_remark,group_created_date');
			$this->db->from('usergroup');
			$this->db->join('users', 'group_user_id = id', 'left');
			$this->db->join('group', 'group_id = id', 'left');


			// Delete this line after setting up the search conditions
			die('Please see models/model_usergroup.php for setting up the search method.');

			/**
			 *  Rename field_name_to_search to the field you wish to search
			 *  or create advanced search conditions here
			 */
			$this->db->where('field_name_to_search LIKE "%' . $keyword . '%"');

			/**
			 *   PAGINATION
			 */
			if ($this->pagination_enabled == TRUE) {
				$config = array();
				$config['total_rows'] = $this->db->count_all_results();
				$config['base_url'] = '/usergroup/search/' . $keyword . '/';
				$config['uri_segment'] = 4;
				$config['per_page'] = $this->pagination_per_page;
				$config['num_links'] = $this->pagination_num_links;

				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$this->pager = $this->pagination->create_links();

				$this->db->limit($config['per_page'], $page);
			}

			$query = $this->db->get();

			$temp_result = array();

			foreach ($query->result_array() as $row) {
				$temp_result[] = array(
					'id' => $row['id'],
					'group_user_id' => $row['group_user_id'],
					'group_id' => $row['group_id'],
					'group_created_by' => $row['group_created_by'],
					'group_remark' => $row['group_remark'],
					'group_created_date' => $row['group_created_date'],
				);
			}
			$this->db->flush_cache();
			return $temp_result;
		}

		/**
		 *  Parses the table data and look for enum values, to match them with language variables
		 */
		function metadata ()
		{
			$this->load->library('explain_table');

			$metadata = $this->explain_table->parse('usergroup');

			foreach ($metadata as $k => $md) {
				if (!empty($md['enum_values'])) {
					$metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
				}
			}
			return $metadata;
		}

		function related_users ()
		{
			$this->db->select('id AS users_id, user_name AS users_name');
			$rel_data = $this->db->get('users');
			return $rel_data->result_array();
		}

		function related_group ()
		{
			$this->db->select('id AS group_id, group_name AS group_name');
			$rel_data = $this->db->get('group');
			return $rel_data->result_array();
		}

		/**
		 *  Some utility methods
		 */
		function fields ($withID = FALSE)
		{
			$fs = array(
				'id' => lang('id'),
				'group_user_id' => lang('group_user_id'),
				'group_id' => lang('group_id'),
				'group_created_by' => lang('group_created_by'),
				'group_remark' => lang('group_remark'),
				'group_created_date' => lang('group_created_date')
			);

			if ($withID == FALSE) {
				unset($fs[0]);
			}
			return $fs;
		}

		function pagination ($bool)
		{
			$this->pagination_enabled = ($bool === TRUE) ? TRUE : FALSE;
		}
	}
