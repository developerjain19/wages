<?php
defined('BASEPATH') or exit('no direct access allowed');
class Admin_Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (sessionId('id') == "") {
            redirect(base_url());
        }
        date_default_timezone_set("Asia/Kolkata");
        $per = getRowById('tbl_roles_permissions', 'role', sessionId('position'))[0];
        $this->workUpdate = $per['work_update'];
        $this->QC = $per['qc'];
        $this->edit = $per['edit'];
        $this->delete = $per['delete'];
    }
    public function index()
    {
        $data['title'] = "Home | Dashboard";
        $date = date('Y-m-d');
        $from = date('Y-m-01');
        $to = date('Y-m-30');
         if (sessionId('position') == '1' || sessionId('position') == '2') {

            $data['count'] =  $this->CommonModal->runQuery("SELECT 
            (SELECT COUNT(*) FROM tbl_labour) AS total_labour,
            (SELECT COUNT(*) FROM tbl_work_update WHERE date = CURDATE() AND attendance IN ('0', '1')) AS present_today,
            (SELECT SUM(raw) FROM tbl_raw_material WHERE date = CURDATE()) AS raw_received_today,
            (SELECT SUM(fqc_accepted) FROM tbl_work_update WHERE date = CURDATE()) AS fqc_accepted_today,
            (SELECT SUM(qc_accepted) FROM tbl_qc_update WHERE date = CURDATE()) AS qc_accepted_today,
            (SELECT SUM(packed) FROM tbl_qc_update WHERE MONTH(create_date) = MONTH(CURDATE())) AS total_bags_monthly,
            (SELECT SUM(bags_dispatched) FROM tbl_dispatched WHERE MONTH(create_date) = MONTH(CURDATE())) AS dispatched_bags_monthly,
            (SELECT SUM(pending_bags) FROM tbl_dispatched WHERE MONTH(create_date) = MONTH(CURDATE())) AS pending_bags_monthly")[0];
          
            $data['alllabour'] =  $this->CommonModal->getAllRows('tbl_labour');
            $data['company'] =  $this->CommonModal->getAllRows('tbl_company');
            



        } else  if (sessionId('position') == '5') {
            // $data['qcqty'] = $this->CommonModal->runQuery('SELECT SUM(`fqc_accepted`) as qty, ((SUM(`fqc_accepted`) * 0.01) / 100) as target  FROM `tbl_work_update` WHERE date = "' . $date . '" AND company = "' . sessionId('setcompany') . '"')[0];


            $data['qcqtymothly'] = $this->CommonModal->runQuery('SELECT SUM(`fqc_accepted`) as qty, ((SUM(`fqc_accepted`) * 0.01) / 100) as target  FROM `tbl_work_update` WHERE  DATE_FORMAT(`date`, "%Y-%m-%d") >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, "%Y-%m-%d") AND DATE_FORMAT(`date`, "%Y-%m-%d") < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, "%Y-%m-%d") AND company = "' . sessionId('setcompany') . '"')[0];

            $data['qc'] =   $this->CommonModal->getRowByMoreId('tbl_qc_update', array('date' => $date, 'company_id' =>  sessionId('setcompany')));

            $data['qcmonth'] = $this->CommonModal->runQuery('SELECT SUM(`quantity`) as qty , SUM(`qc_accepted`) as accepted  , SUM(`qc_rejected`) as rejected , SUM(`need_to_pack`) as pending , SUM(`packed`) as packed  , ((SUM(`quantity`) * 0.01) / 100) as target   FROM `tbl_qc_update`  WHERE  DATE_FORMAT(`date`, "%Y-%m-%d") >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, "%Y-%m-%d") AND DATE_FORMAT(`date`, "%Y-%m-%d") < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, "%Y-%m-%d") AND company_id = "' . sessionId('setcompany') . '"')[0];
        } else {
            $data['tlabour'] =  $this->CommonModal->runQuery("SELECT COUNT(*) AS total_labour FROM `tbl_labour` WHERE company = '" . sessionId('setcompany') . "' ")[0];
            $data['qcqty'] =    $this->CommonModal->runQuery("SELECT SUM(packed) as pack FROM `tbl_qc_update`  WHERE DATE_FORMAT(`date`, '%Y-%m-%d') >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, '%Y-%m-%d') AND DATE_FORMAT(`date`, '%Y-%m-%d') < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, '%Y-%m-%d') AND `company_id` = '" . sessionId('setcompany') . "'")[0];
            $data['attendance'] =   $this->CommonModal->runQuery("SELECT  `tbl_labour`.`name` , `tbl_labour`.`number` , `tbl_work_update`.`attendance` ,  SUM(CASE WHEN `tbl_work_update`.`attendance` = '0' THEN 1 ELSE 0 END) AS total_absent , SUM(CASE WHEN `tbl_work_update`.`attendance` = '1' THEN 1 ELSE 0 END) AS total_present , SUM(CASE WHEN `tbl_work_update`.`attendance` IN ('1', '2') THEN 1 ELSE 0 END) AS total_available FROM `tbl_work_update` JOIN tbl_labour ON `tbl_work_update`.`labour` = `tbl_labour`.`eid` WHERE DATE_FORMAT(`tbl_work_update`.`date`, '%Y-%m-%d') = '" . $date . "' AND `tbl_labour`.`company` = '" . sessionId('setcompany') . "'");
            $data['labour'] =  $this->CommonModal->runQuery("SELECT  `tbl_labour`.`name` , `tbl_labour`.`number` , `tbl_work_update`.`attendance` as attendance , `tbl_work_update`.`quantity` as labqty   , `tbl_work_update`.`fqc_accepted` as fqcaccept    FROM `tbl_work_update` JOIN tbl_labour ON `tbl_work_update`.`labour` = `tbl_labour`.`eid` WHERE DATE_FORMAT(`tbl_work_update`.`date`, '%Y-%m-%d') = '" . $date . "' AND `tbl_labour`.`company` = '" . sessionId('setcompany') . "'");
            // $data['labouratt'] =  $this->CommonModal->runQuery("SELECT  `tbl_labour`.`name` , `tbl_labour`.`number` , `tbl_work_update`.`attendance` as attendance  FROM `tbl_work_update` JOIN tbl_labour ON `tbl_work_update`.`labour` = `tbl_labour`.`eid` WHERE DATE_FORMAT(`tbl_work_update`.`date`, '%Y-%m-%d') = '" . $date . "' AND `tbl_labour`.`company` = '" . sessionId('setcompany') . "'");
            $data['tproductivity'] =    $this->CommonModal->runQuery("SELECT SUM(quantity) as qty , SUM(fqc_accepted) as accept , SUM(fqc_rejected) as reject FROM `tbl_work_update` WHERE company = '" . sessionId('setcompany') . "'  AND `date` = '" . $date . "' ");
            $data['monthlywork'] =  $this->CommonModal->runQuery("SELECT  SUM(`quantity`) as qty, SUM(`fqc_accepted`) as accepted, SUM(`fqc_rejected`) as rejected FROM `tbl_work_update` WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, '%Y-%m-%d') AND `date` < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, '%Y-%m-%d') AND `company`  = '" . sessionId('setcompany') . "' ")[0];
            $data['alllabour'] =  $this->CommonModal->getRowByMoreIdOrderLimit('tbl_labour', ['company' => sessionId('setcompany')], 'eid', 'ASC', 5);
        }
        $this->load->view('admin/dashboard', $data);
    }
    public function work_update()
    {
        $data['title'] = "Work Update";
        $data['work'] = $this->CommonModal->getAllRowsInOrder('tbl_work_update', 'wid', 'DESC');
        $this->load->view('admin/work-update-list', $data);
    }
    public function work_update_add()
    {
        $data['title'] = "Work Update";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['teamlead_id'] = sessionId('id');
            $insert = $this->CommonModal->insertRowReturnId('tbl_work_update', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Work Update Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('work-update'));
        }
        $this->load->view('admin/work-update', $data);
    }
    public function edit_work_update($id)
    {
        $data['title'] = "Work Update";
        $tid = $id;
        $data['work'] = $this->CommonModal->getRowById('tbl_work_update', 'wid', $tid)[0];
        // print_r( $data['work']);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            // print_r($post);
            $update = $this->CommonModal->updateRowById('tbl_work_update', 'wid', $tid, $post);
            echo "update";
            if ($update) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Work Update Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Work Update Updated Successfully</div>');
            }
            redirect('work-update');
        } else {
            $this->load->view('admin/work-update', $data);
        }
    }
    public function qc_update()
    {
        $data['title'] = 'QC Update';
        // $data['work'] = $this->CommonModal->getRowById('tbl_work_update', 'wid', $tid)[0];
        $data['labour'] = $this->CommonModal->getRowById('labour', 'company', sessionId('setcompany'));
        $data['company'] = $this->CommonModal->getRowById('company', 'did', sessionId('setcompany'))[0];
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['qc_id'] = sessionId('id');
            $insert = $this->CommonModal->insertRowReturnId('tbl_qc_update', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">QC  Updated Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">QC Updated  Added Successfully</div>');
            }
            redirect('qc-update-list');
        } else {
            $this->load->view('admin/qc-update', $data);
        }
    }
    public function qc_update_list()
    {
        $data['title'] = "QC Update List";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_qc_update', array('id' => decryptId($BdID)));
            redirect('qc-update-list');
            exit;
        }
        $data['qc'] = $this->CommonModal->getAllRowsInOrder('tbl_qc_update', 'id', 'DESC');
        $this->load->view('admin/qc-update-list', $data);
    }
    public function qc_update_edit($id)
    {
        $data['title'] = 'Update QC';
        $tid = $id;
        $data['labour'] = $this->CommonModal->getRowById('labour', 'company', sessionId('setcompany'));
        $data['company'] = $this->CommonModal->getRowById('company', 'did', sessionId('setcompany'))[0];
        $data['qc'] = $this->CommonModal->getRowById('tbl_qc_update', 'id', $tid)[0];
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_qc_update";
            $update = $this->CommonModal->updateRowById($table, 'id', $tid, $post);
            if ($update) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">QC  Update edit Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">QC  Update edit Successfully</div>');
            }
            redirect(base_url('qc-update-list'));
        } else {
            $this->load->view('admin/qc-update', $data);
        }
    }
    public function staff_registration()
    {
        $data['title'] = "Add Staff User";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['status'] = '1';
            if ($post['position'] == '1') {
                $post['swich_permission'] = '1';
            }
            $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            $post['company'] = json_encode($post['company']);
            $insert = $this->CommonModal->insertRowReturnId('tbl_staff', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Staff Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('staff-list'));
        } else {
            $this->load->view('admin/staff-registration', $data);
        }
    }
    public function staff_list()
    {
        $data['title'] = "Staff Registration";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_staff', array('uid' => decryptId($BdID)));
            redirect('staff-list');
            exit;
        }
        $data['staff'] = $this->CommonModal->getAllRowsInOrder('tbl_staff', 'uid', 'DESC');
        $this->load->view('admin/staff-list', $data);
    }
    public function edit_staff($id)
    {
        $data['title'] = "Edit Staff User";
        $tid = $id;
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company'] = json_encode($post['company']);
            $staff_id = $this->CommonModal->updateRowById('staff', 'uid', $tid, $post);
            if ($staff_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Staff Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Staff Updated Successfully</div>');
            }
            redirect('staff-list');
        } else {
            $this->load->view('admin/staff-registration', $data);
        }
    }
    public function permission_role()
    {
        $data['title'] = "Permission Role";
        $data['permission'] = $this->CommonModal->getAllRows('tbl_roles_permissions');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            // echo '<pre>';
            // print_r($post);
            $roles = $post['role'];
            for ($i = 0; $i < count($roles); $i++) {
                if (!empty($roles[$i])) {
                    $work_update = isset($post['work_update' . $roles[$i]]) ? '1' : '0';
                    $qc = isset($post['qc' . $roles[$i]]) ? '1' : '0';
                    $edit = isset($post['edit' . $roles[$i]]) ? '1' : '0';
                    $delete = isset($post['delete' . $roles[$i]]) ? '1' : '0';
                    // $work_update = isset($work_updates[$i]) ? '1' : '0';
                    // $qc = isset($qcs[$i]) ? '1' : '0';
                    // $edit = isset($edits[$i]) ? '1' : '0';
                    // $delete = isset($deletes[$i]) ? '1' : '0';
                    $data = array(
                        'work_update' => $work_update,
                        'qc' => $qc,
                        'edit' => $edit,
                        'delete' => $delete,
                        'role' => $roles[$i]
                    );
                    // echo '<pre>';
                    // print_r($data);
                    $insert = $this->CommonModal->updateRowById('tbl_roles_permissions', 'role', $roles[$i], $data);
                }
            }
            // exit();
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Permission Update Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Permission Update Successfully</div>');
            }
            redirect(base_url('permission-role'));
        } else {
            $this->load->view('admin/permission-role', $data);
        }
    }
    public function labour_registration()
    {
        $data['title'] = "Labour Registration";
        $data['tag'] = 'Add edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['status'] = '1';
            $post['image'] =   imageUpload('img', 'uploads/labour/');
            $insert = $this->CommonModal->insertRowReturnId('tbl_labour', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">labour Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('labour-list'));
        } else {
            $this->load->view('admin/labour-registration', $data);
        }
    }
    public function edit_labour($id)
    {
        $data['title'] = "Edit Labour";
        $tid = $id;
        $data['labour'] = $this->CommonModal->getRowById('labour', 'eid', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $temp_image = $post['image'];
            if ($_FILES['img']['name'] != '') {
                $img = imageUpload('img', 'uploads/labour/');
                $post['image'] = $img;
                if ($temp_image != "") {
                    unlink('uploads/labour/' . $temp_image);
                }
            }
            $labour_id = $this->CommonModal->updateRowById('tbl_labour', 'eid', $tid, $post);
            if ($labour_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Labour Updated Successfully</div>');
                redirect(base_url('labour-list'));
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Labour Updated Successfully</div>');
                redirect(base_url('labour-list'));
            }
        } else {
            $this->load->view('admin/labour-registration', $data);
        }
    }
    public function labour_list()
    {
        $data['title'] = "Labour Registration";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_labour', array('eid' => decryptId($BdID)));
            redirect(base_url('labour-list'));
            exit;
        }
        if (sessionId('position') == '1' || sessionId('position') == '2') {
            $data['labour'] = $this->CommonModal->getAllRowsInOrder('tbl_labour', 'eid', 'DESC');
        } else {
            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'company',  sessionId('setcompany'));
        }
        $this->load->view('admin/labour-list', $data);
    }
    public function company_add()
    {
        $data['title'] = "company";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('company', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">company Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('company-list'));
        } else {
            $this->load->view('admin/company-add', $data);
        }
    }
    public function company_list()
    {
        $data['title'] = "company Registration";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_company', array('did' => decryptId($BdID)));
            redirect('company-list');
            exit;
        }
        $data['company'] = $this->CommonModal->getAllRowsInOrder('tbl_company', 'did', 'DESC');;
        $this->load->view('admin/company-list', $data);
    }
    public function edit_company($id)
    {
        $data['title'] = 'Update company';
        $tid = $id;
        $data['company'] = $this->CommonModal->getRowById('company', 'did', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $company_id = $this->CommonModal->updateRowById('company', 'did', $tid, $post);
            if ($company_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">company Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">company Updated Successfully</div>');
            }
            redirect('company-list');
        } else {
            $this->load->view('admin/company-add', $data);
        }
    }
    public function resource_type_add()
    {
        $data['title'] = "Resource Type";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_resource_type";
            $data = array('title' =>  $post['title'], 'wedge_per_day' =>  $post['wedge_per_day']);
            $typeId = $this->CommonModal->insertRowReturnId($table, $data);
            if ($typeId) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Resource Type Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('resource-type-list'));
        } else {
            $this->load->view('admin/resource-type-add', $data);
        }
    }
    public function resource_type_list()
    {
        $data['title'] = "Resource Type ";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_resource_type', array('rid' => decryptId($BdID)));
            $this->CommonModal->deleteRowById('tbl_incentive', array('rid' => decryptId($BdID)));
            redirect('resource-type-list');
            exit;
        }
        $data['resource_type'] = $this->CommonModal->getAllRowsInOrder('tbl_resource_type', 'rid', 'DESC');
        $this->load->view('admin/resource-type-list', $data);
    }
    public function edit_resource_type($id)
    {
        $data['title'] = 'Update Resource Type';
        $tid = $id;
        $data['resource'] = $this->CommonModal->getRowById('resource_type', 'rid', $tid);
        $data['incentive'] = $this->CommonModal->getRowById('tbl_incentive', 'rid', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_resource_type";
            $data = array('title' =>  $post['title'], 'wedge_per_day' =>  $post['wedge_per_day']);
            $insert = $this->CommonModal->updateRowById($table, 'rid', $tid, $data);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Resource Type Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Resource Type Updated Successfully</div>');
            }
            redirect(base_url('resource-type-list'));
        } else {
            $this->load->view('admin/resource-type-add', $data);
        }
    }
    public function edit_incentive()
    {
        $min_qty = $this->input->post('min_qty');
        $max_qty = $this->input->post('max_qty');
        $amount = $this->input->post('amount');
        $insID = $this->input->post('insID');
        $amountdata  =  array('amount' => $amount, 'min_qty' => $min_qty, 'max_qty' =>  $max_qty);
        $insert =   $this->CommonModal->updateRowById('tbl_incentive', 'id', $insID, $amountdata);
        if ($insert) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Incentives Updated Successfully</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Incentives Updated Successfully</div>');
        }
    }
    public function delete_incentive()
    {
        $BdID = $this->input->post('expId');
        $delete = $this->CommonModal->deleteRowById('tbl_incentive', array('id' => $BdID));
        if ($delete) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Incentives Delete Successfully</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
        }
    }
    public function incentive_range_add()
    {
        $data['title'] = "Incentive Range";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_incentive";
            $min_qty = $this->input->post('min_qty');
            $max_qty = $this->input->post('max_qty');
            $amount = $this->input->post('amount');
            for ($i = 0; $i <= count($amount); $i++) {
                if (!empty($amount[$i])) {
                    $amountdata  =  array('amount' => $amount[$i], 'min_qty' => $min_qty[$i], 'max_qty' =>  $max_qty[$i]);
                    $insert =  $this->CommonModal->insertRowReturnId('tbl_incentive',  $amountdata);
                }
            }
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Incentive Range Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('incentive-range-list'));
        } else {
            $this->load->view('admin/incentive-add', $data);
        }
    }
    public function incentive_range_list()
    {
        $data['title'] = "Incentive Range ";
        $data['incentive_range'] = $this->CommonModal->getAllRowsInOrder('tbl_incentive', 'id', 'DESC');
        $this->load->view('admin/incentive-list', $data);
    }
    public function edit_incentive_range($id)
    {
        $data['title'] = 'Update Incentive Range';
        $tid = $id;
        $data['incentive'] = $this->CommonModal->getRowById('tbl_incentive', 'id', $tid);
        $data['tag'] = 'edit';
        $this->load->view('admin/incentive-add', $data);
    }
    public function getresoure()
    {
        $labour = $this->input->post('labour');
        $getdata = $this->CommonModal->runQuery('SELECT * FROM `tbl_labour` `lab` JOIN  `tbl_resource_type` `res` ON `lab`.`resourcetype` = `res`.`rid`  WHERE `lab`.`eid` =' . $labour);
        echo json_encode($getdata[0]);
    }
    public function calculate_incentive()
    {
        $qty = $this->input->post('qty');
        $getdataa = $this->CommonModal->runQuery('SELECT * FROM `tbl_resource_type` `res` JOIN `tbl_incentive` `ins` ON `res`.`rid` = `ins`.`rid` WHERE `ins`.`min_qty` <= ' . $qty . ' AND `ins`.`max_qty` >= ' . $qty);
        echo json_encode($getdataa[0]);
    }
    public function my_profile()
    {
        $data['title'] = "My Profile";
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'));
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $staff_id = $this->CommonModal->updateRowById('staff', 'uid', sessionId('id'), $post);
            if ($staff_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Profile Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Profile Updated Successfully</div>');
            }
            redirect('my-profile');
        } else {
            $this->load->view('admin/my_profile', $data);
        }
    }
    public function change_password()
    {
        if (count($_POST) > 0) {
            $oldpassword = $this->input->post('oldpassword');
            $newpassword = $this->input->post('newpassword');
            $confirmnewpassword = $this->input->post('confirmnewpassword');
            $getCustomer = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'))[0];
            if (password_verify($oldpassword, $getCustomer['password'])) {
                if ($newpassword === $confirmnewpassword) {
                    $updatePassword = $this->CommonModal->updateRowById('staff', 'uid', sessionId('id'), array('password' => password_hash($newpassword, PASSWORD_DEFAULT)));
                    $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Password changed successfully</div>');
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">New password and confirm password not matched Successfully</div>');
                }
                redirect('my-profile');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Incorrect old password</div>');
                redirect('my-profile');
            }
        }
    }
    public function select_company()
    {
        $data['title'] = "Choose company";
        $company = $this->input->get('company');
        $dvname =  getRowById('tbl_company', 'did', decryptId($company))[0];
        if (decryptId($company) != '') {
            $this->session->set_userdata(array('setcompany' => decryptId($company), 'company_name' => $dvname['name']));
            redirect('dashboard');
            exit;
        }
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'))[0];
        $this->load->view('admin/select-company', $data);
    }
     public function company_select()
    {
        $data['title'] = "Choose company";
        $data['accinfo'] = $this->input->get('accinfo');
        $company = $this->input->get('company');
        $position = $this->input->get('position');
        $dvname =  getRowById('tbl_company', 'did', $company)[0];
        if ($company != '') {
            $this->session->unset_userdata('position');
            $this->session->set_userdata(array('setcompany' => $company, 'company_name' => $dvname['name'], 'position' =>  $position));
            redirect('dashboard');
            exit;
        }
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'))[0];

        $this->load->view('admin/select-admin-company', $data);
    }
    public function update_type()
    {
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('setcompany');
        $this->session->unset_userdata('company_name');
        $this->session->set_userdata(array('position' =>  '1'));
        redirect('dashboard');
        exit;
    }
    public function staff_password($tid)
    {
        $data['title'] = "Staff Change Password";
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', $tid)[0];
        if (count($_POST) > 0) {
            $newpassword = $this->input->post('newpassword');
            $confirmnewpassword = $this->input->post('confirmnewpassword');
            $getCustomer = $this->CommonModal->getRowById('staff', 'uid', $tid)[0];
            if ($newpassword === $confirmnewpassword) {
                $updatePassword = $this->CommonModal->updateRowById('staff', 'uid', $tid, array('password' => password_hash($newpassword, PASSWORD_DEFAULT)));
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Password changed successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">New password and confirm password not matched Successfully</div>');
            }
            redirect('staff-list');
        } else {
            $this->load->view('admin/staff-password', $data);
        }
    }
    public function reporting()
    {
        $data['title'] = "Reporting";
        $this->load->view('admin/reporting', $data);
    }
    public function employee_billing()
    {
        $data['title'] = "Employee Billing";
        $data['month'] = $this->input->get('month');
        $company = $this->input->get('company');
        $data['div'] = decryptId($company);
        if (decryptId($company) != '') {
            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'company', decryptId($company));
        } else {
            $data['labour'] = $this->CommonModal->getAllRowsInOrder('tbl_labour', 'eid', 'ASC');
        }
        $this->load->view('admin/employee-billing', $data);
    }
    public function employee_attendance()
    {
        $data['title'] = "Employee Attendance";
        $data['from'] = $this->input->get('from');
        $data['to'] = $this->input->get('to');
        $company = $this->input->get('company');
        $data['div'] = decryptId($company);
        if (decryptId($company) != '') {
            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'company', decryptId($company));
        } else {
            $data['labour'] = $this->CommonModal->getAllRowsInOrder('tbl_labour', 'eid', 'ASC');
        }
        $this->load->view('admin/employee_attendance', $data);
    }
    public function QC_report()
    {
        $data['title'] = "QC Update";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $company = decryptId($this->input->get('company'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $company;
        if ($company != '') {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  DATE_FORMAT(date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `company_id` = '" . $company . "' ");
        } else {
            $data['qc'] = $this->CommonModal->getAllRows('tbl_qc_update');
        }
        $this->load->view('admin/QC_report', $data);
    }
    public function work_update_filter()
    {
        $data['title'] = "Work Update Filter";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $company = decryptId($this->input->get('company'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $company;
        if ($company != '') {
            $data['work'] =   $this->CommonModal->runQuery("SELECT * FROM `tbl_work_update` WHERE DATE_FORMAT(date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `company` = '" . $company . "';");
        } else {
            $data['work'] =   $this->CommonModal->runQuery("SELECT * FROM `tbl_work_update` ");
        }
        $this->load->view('admin/work-update-filter', $data);
    }
    public function raw_material_report()
    {
        $data['title'] = "Raw Material";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $company = decryptId($this->input->get('company'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $company;
        if ($company != '') {
            $data['work'] =   $this->CommonModal->runQuery("SELECT
            rm.id AS Sr,
            MIN(rm.date) AS `From`,
            MAX(rm.date) AS `To`,
            SUM(rm.raw) AS `Total_RAW`,
            qc.target AS `QC_Target`,
            rm.company,
            CASE WHEN SUM(qu.qc_accepted) >= qc.target * SUM(rm.raw) THEN 'Yes' ELSE 'No' END AS `Achieved_Target`
        FROM
            tbl_raw_material rm
        LEFT JOIN
            tbl_qc_update qu ON rm.company = qu.company_id AND rm.date = qu.date
        CROSS JOIN
            (SELECT 0.01 AS target) qc
        WHERE
            rm.company = '" . $company . "'
            AND rm.date BETWEEN '" . $from . "' AND '" . $to . "'
        GROUP BY
            rm.id, rm.company, qc.target");
        } else {
            $data['work'] =   $this->CommonModal->runQuery("SELECT rm.id AS Sr, MIN(rm.date) AS `From`, MAX(rm.date) AS `To`, SUM(rm.raw) AS `Total_RAW`, qc.target AS `QC_Target`, rm.company, CASE WHEN SUM(qu.qc_accepted) >= qc.target * SUM(rm.raw) THEN 'Yes' ELSE 'No' END AS `Achieved_Target` FROM tbl_raw_material rm LEFT JOIN tbl_qc_update qu ON rm.company = qu.company_id AND rm.date = qu.date CROSS JOIN (SELECT 0.01 AS target) qc");
        }
        $this->load->view('admin/raw_material_report', $data);
    }
    public function dispatch_report()
    {
        $data['title'] = "Dispatch Report";
        $company = decryptId($this->input->get('company'));
        $data['div'] = $company;
        if ($company != '') {
            $data['bags'] = $this->CommonModal->getRowById('tbl_dispatched', 'company', $company);
        } else {
            $data['bags'] = $this->CommonModal->getAllRowsInOrder('tbl_dispatched', 'id', 'DESC');
        }
        $this->load->view('admin/dispatched_report', $data);
    }
    public function labour_wise_productivity()
    {
        $data['title'] = "Labour Wise Productivity";
        $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'company', sessionId('setcompany'));
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $labour = $this->input->get('labour_id');
        $data['from'] = $from;
        $data['to'] = $to;
        $data['lab'] = $labour;
        if ($labour != '') {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_work_update` WHERE  DATE_FORMAT(date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `labour` = '" . $labour . "' AND `company` =  '" . sessionId('setcompany') . "'");
        } else {
            $data['qc'] = $this->CommonModal->getRowById('tbl_work_update', 'company', sessionId('setcompany'));
        }
        $this->load->view('admin/labour-wise-productivity', $data);
    }
    public function hr_employee_attendance()
    {
        $data['title'] = "Employee Attendance";
        $data['from'] = $this->input->get('from');
        $data['to'] = $this->input->get('to');
        $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'company',  sessionId('setcompany'));
        $this->load->view('admin/employee_attendance', $data);
    }
    public function open_list()
    {
        $data['title'] = "Open List";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $data['from'] = $from;
        $data['to'] = $to;
        if ($from != '') {
            $data['qc'] = $this->CommonModal->runQuery("SELECT `company` as company, SUM(`need_to_pack`) AS pending  FROM `tbl_qc_update` WHERE  DATE_FORMAT(date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `company_id` = '" . sessionId('setcompany') . "' group by company ");
        } else {
            $data['qc'] = $this->CommonModal->runQuery("SELECT `company` as company, SUM(`need_to_pack`) AS pending  FROM `tbl_qc_update` WHERE  `company_id` = '" . sessionId('setcompany') . "'  group by company ");
        }
        $this->load->view('admin/open-list', $data);
    }
    public function quality_check()
    {
        $data['title'] = "Quality Check";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $data['from'] = $from;
        $data['to'] = $to;
        if ($from != '') {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  DATE_FORMAT(date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `company_id` = '" . sessionId('setcompany') . "' ");
        } else {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  `company_id` = '" . sessionId('setcompany') . "' ");
        }
        $this->load->view('admin/QC_report', $data);
    }
    public function get_quantity()
    {
        $date = $this->input->post('date');
        $company_id = $this->input->post('company_id');
        $getdataa = $this->CommonModal->runQuery('SELECT SUM(`fqc_accepted`) as qty FROM `tbl_work_update` WHERE date = "' . $date . '" AND company = "' . $company_id . '"')[0];
        echo  $getdataa['qty'];
    }
    public function dispatch_list()
    {
        $data['title'] = "Dispatch";
        $data['bags'] = $this->CommonModal->getAllRowsInOrder('tbl_dispatched', 'id', 'DESC');
        $this->load->view('admin/dispatched-list', $data);
    }
    public function dispatch_add()
    {
        $data['title'] = "Dispatch Add";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['uploadid'] = sessionId('id');
            $insert = $this->CommonModal->insertRowReturnId('tbl_dispatched', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Dispatched  Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('dispatched-list'));
        }
        $this->load->view('admin/dispatched', $data);
    }
    public function dispatch_edit($id)
    {
        $data['title'] = 'Update dispatched Bags';
        $tid = $id;
        $data['company'] = $this->CommonModal->getRowById('company', 'did', sessionId('setcompany'))[0];
        $data['dis'] = $this->CommonModal->getRowById('tbl_dispatched', 'id', $tid)[0];
        // print_r( $data['dis']);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_dispatched";
            $update = $this->CommonModal->updateRowById($table, 'id', $tid, $post);
            if ($update) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Dispatch  Update edit Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Dispatch  Update edit Successfully</div>');
            }
            redirect(base_url('dispatched-list'));
        } else {
            $this->load->view('admin/dispatched', $data);
        }
    }
    public function get_bags()
    {
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        $company_id = $this->input->post('company_id');
        $getdataa = $this->CommonModal->runQuery('SELECT SUM(packed) as pack FROM `tbl_qc_update`  WHERE date >= "' . $fromDate . '"  AND date <  "' . $toDate . '" AND company_id = "' . $company_id . '"')[0];
        echo  $getdataa['pack'];
    }
    public function get_remaining_bags()
    {
        $company_id = $this->input->post('company_id');
        $getdataa = $this->CommonModal->getRowByMoreIdOrderLimit('dispatched', array('company' => $company_id), 'id', 'DESC', '1')[0];
        echo (($getdataa['remaining_bags'] != '') ? $getdataa['remaining_bags'] : '0');
    }
    public function raw_material()
    {
        $data['title'] = "Raw Material";
        $data['work'] = $this->CommonModal->getAllRowsInOrder('tbl_raw_material', 'id', 'DESC');
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_raw_material', array('id' => decryptId($BdID)));
            redirect(base_url('raw-material'));
            exit;
        }
        $this->load->view('admin/raw_material', $data);
    }
    public function raw_material_add()
    {
        $data['title'] = "Raw Material";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['uploadid'] = sessionId('id');
            $insert = $this->CommonModal->insertRowReturnId('tbl_raw_material', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Raw Material Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('raw-material'));
        }
        $this->load->view('admin/raw_material_add', $data);
    }
    public function edit_raw_material($id)
    {
        $data['title'] = "Raw Material";
        $tid = $id;
        $data['work'] = $this->CommonModal->getRowById('tbl_raw_material', 'id', $tid)[0];
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowById('tbl_raw_material', 'id', $tid, $post);
            echo "update";
            if ($update) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Raw Material Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Raw Material Updated Successfully</div>');
            }
            redirect('raw-material');
        } else {
            $this->load->view('admin/raw_material_add', $data);
        }
    }
    public function loadmore()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $alllabour =  $this->CommonModal->getRowOrderLimit('tbl_labour', ['company' => sessionId('setcompany')], 'eid', 'ASC', $limit, $offset);
        $i = 1;
        $result = '';
        if ($alllabour != '') {
            foreach ($alllabour as $row) {
                $percent  =  $this->CommonModal->attendancerunquery($row['eid'])[0];
                $daysInMonth = date('t');
                $per =   ($percent['present'] / $daysInMonth) * 100;

                $result .= '<tr>
                    <td class="text-left">' . $row['name'] . '</td>
                    <td>' . $row['number'] . '</td>
                    <td>' . (($percent['present'] != '') ? $percent['present'] : '0') . '</td>
                    <td>' . number_format($per) . '%</td>
                </tr>';
            }
        }

        $data['result'] = $result;
        $data['offset'] = $offset  + $limit;
        $data['limit'] = $limit;
        echo json_encode($data);
    }
    public function loadmore2()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $alllabour =  $this->CommonModal->getRowOrderLimit('tbl_labour', ['company' => sessionId('setcompany')], 'eid', 'ASC', $limit, $offset);
        $i = 1;
        $result = '';
        if ($alllabour != '') {
            foreach ($alllabour as $row) {
                $getdata =  $this->CommonModal->runQuery("SELECT SUM(quantity) AS total_weight, SUM(fqc_accepted) AS total_acceptance, (SUM(fqc_accepted) / SUM(quantity)) * 100 AS acceptance_percentage   FROM `tbl_work_update` WHERE DATE_FORMAT(`date`, '%Y-%m-%d') >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, '%Y-%m-%d') AND DATE_FORMAT(`date`, '%Y-%m-%d') < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, '%Y-%m-%d') AND labour = '" . $row['eid'] . "' ")[0];

                $result .= '<tr>
                                <td class="text-left">' . $row['name'] . '</td>
                                <td>' . (($getdata['total_weight'] != '') ? $getdata['total_weight'] : '0')  . '</td>
                                <td>' . (($getdata['total_acceptance'] != '') ? $getdata['total_acceptance'] : '0')  . ' </td>
                                <td>' . number_format($getdata['acceptance_percentage'])  . '%</td>
                            </tr>';
            }
        }

        $data['result'] = $result;
        $data['offset'] = $offset + $limit;
        $data['limit'] = $limit;
        echo json_encode($data);
    }
    
    public function chart()
    {
        $attendance=[];
        
            
        $this->load->view('admin/chart');
    }
}
