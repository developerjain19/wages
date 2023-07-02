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

            $data['absent'] =   $this->CommonModal->runQuery("SELECT SUM(CASE WHEN attendance = '0' THEN 1 ELSE 0 END) AS total_absent FROM `tbl_work_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' ");

            $data['present'] =   $this->CommonModal->runQuery("SELECT SUM(CASE WHEN attendance = '1' THEN 1 ELSE 0 END) AS total_present FROM `tbl_work_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' ");

            $data['qcqty'] =   $this->CommonModal->runQuery("SELECT SUM(`quantity`) AS qty FROM `tbl_qc_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' ");

            $data['totalqty'] =   $this->CommonModal->runQuery("SELECT SUM(`quantity`) AS tqty FROM `tbl_work_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') = '" . $date . "' ");
        } else  if (sessionId('position') == '5') {
            $data['qcqty'] =   $this->CommonModal->runQuery("SELECT SUM(`quantity`) AS qty FROM `tbl_qc_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' AND `division_id` = '" . sessionId('setdivision') . "' ");

            $data['target'] =  $this->CommonModal->getRowById('tbl_target', 'id', 1)[0];

            $data['qc'] =   $this->CommonModal->runQuery("SELECT  (SUM(`qc_accepted`) % (SUM(`quantity`) * 100)) AS accepted, (SUM(`qc_rejected`) % (SUM(`quantity`) * 100)) AS rejected FROM `tbl_qc_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' AND `division_id` = '" . sessionId('setdivision') . "' ");

            $data['monthlyqc'] =   $this->CommonModal->runQuery("SELECT  (SUM(`qc_accepted`) % (SUM(`quantity`) * 100)) AS accepted, (SUM(`qc_rejected`) % (SUM(`quantity`) * 100)) AS rejected FROM `tbl_qc_update` WHERE DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `division_id` = '" . sessionId('setdivision') . "' ");

            $data['attendance'] = $this->CommonModal->runQuery("SELECT SUM(CASE WHEN `tbl_work_update`.`attendance` = '0' THEN 1 ELSE 0 END) AS total_absent, SUM(CASE WHEN `tbl_work_update`.`attendance` = '1' THEN 1 ELSE 0 END) AS total_present FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id` WHERE DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') =  '" . $date . "' AND `tbl_qc_update`.`division_id` = '" . sessionId('setdivision') . "'  group by `tbl_work_update`.`labour` ");

            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'division',  sessionId('setdivision'));
        } else {

            $data['tlabour'] = $this->CommonModal->runQuery("SELECT COUNT(*) AS total_labour FROM `tbl_labour` WHERE division = '" . sessionId('setdivision') . "' ")[0];

            $data['qcqty'] =   $this->CommonModal->runQuery("SELECT  SUM(`tbl_work_update`.`quantity`) AS qty , SUM(`tbl_qc_update`.`packed`) AS packed_qty FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id` WHERE DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') >= DATE_FORMAT(CURDATE() - INTERVAL DAY(CURDATE())-1 DAY, '%Y-%m-%d') AND DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') < DATE_FORMAT(LAST_DAY(CURDATE()) + INTERVAL 1 DAY, '%Y-%m-%d')AND `tbl_qc_update`.`division_id` = '" . sessionId('setdivision') . "' group by `tbl_work_update`.`labour`")[0];

            $data['attendance'] =  $this->CommonModal->runQuery("SELECT  `tbl_labour`.`name` , `tbl_labour`.`number` , `tbl_work_update`.`attendance` ,  SUM(CASE WHEN `tbl_work_update`.`attendance` = '0' THEN 1 ELSE 0 END) AS total_absent , SUM(CASE WHEN `tbl_work_update`.`attendance` = '1' THEN 1 ELSE 0 END) AS total_present , SUM(CASE WHEN `tbl_work_update`.`attendance` IN ('1', '2') THEN 1 ELSE 0 END) AS total_available FROM `tbl_work_update` JOIN tbl_labour ON `tbl_work_update`.`labour` = `tbl_labour`.`eid` WHERE DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') = '" . $date . "' AND `tbl_labour`.`division` = '" . sessionId('setdivision') . "'");

            $data['tproductivity'] =   $this->CommonModal->runQuery("SELECT  SUM(`tbl_work_update`.`quantity`) AS qty , SUM(`tbl_qc_update`.`packed`) AS packed_qty ,  FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id` WHERE DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') = '" . $date . "' AND `tbl_qc_update`.`division_id` = '" . sessionId('setdivision') . "' group by `tbl_work_update`.`labour`");



            $data['monthlyqc'] = $this->CommonModal->runQuery("SELECT SUM(`tbl_qc_update`. `qc_accepted` ) as accepted,SUM(`tbl_qc_update`. `qc_rejected` ) as rejected FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id`  WHERE  DATE_FORMAT(`tbl_work_update`.`create_date`, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `tbl_qc_update`.`division_id` = '" . sessionId('setdivision') . "'  group by `tbl_work_update`.`labour`");
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

            $insert = $this->CommonModal->insertRowReturnId('tbl_work_update', $post);
            // print_r($post);
            // exit();

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

            print_r($post);
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
        $data['labour'] = $this->CommonModal->getRowById('labour', 'division', sessionId('setdivision'));
        $data['division'] = $this->CommonModal->getRowById('division', 'did', sessionId('setdivision'))[0];
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            // $post['work_id'] =  $id;
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
        $data['title'] = 'Update Resource Type';
        $tid = $id;
        $data['labour'] = $this->CommonModal->getRowById('labour', 'division', sessionId('setdivision'));
        $data['division'] = $this->CommonModal->getRowById('division', 'did', sessionId('setdivision'))[0];
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
            $post['division'] = json_encode($post['division']);
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
            $post['division'] = json_encode($post['division']);
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
            $role = $this->input->post('role');
            for ($i = 0; $i <= count($role); $i++) {
                if (!empty($role[$i])) {
                    $work_update = $this->input->post('work_update')[$i];
                    $work_update = isset($work_update) ? '1' : '0';
                    $qc = $this->input->post('qc')[$i];
                    $qc = isset($qc) ? '1' : '0';
                    $edit = $this->input->post('edit')[$i];
                    $edit = isset($edit) ? '1' : '0';
                    $delete = $this->input->post('delete')[$i];
                    $delete = isset($delete) ? '1' : '0';
                    $data  =  array('work_update' =>  $work_update, 'qc' => $qc, 'edit' => $edit, 'delete' => $delete);
                    $insert =  $this->CommonModal->updateRowById('tbl_roles_permissions', 'role', $role[$i], $data);
                }
            }
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
            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'division',  sessionId('setdivision'));
        }



        $this->load->view('admin/labour-list', $data);
    }
    public function division_add()
    {
        $data['title'] = "Division";
        $data['tag'] = 'add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('division', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Division Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Something went wrong</div>');
            }
            redirect(base_url('division-list'));
        } else {
            $this->load->view('admin/division-add', $data);
        }
    }
    public function division_list()
    {
        $data['title'] = "division Registration";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('tbl_division', array('did' => decryptId($BdID)));
            redirect('division-list');
            exit;
        }
        $data['division'] = $this->CommonModal->getAllRowsInOrder('tbl_division', 'did', 'DESC');;
        $this->load->view('admin/division-list', $data);
    }
    public function edit_division($id)
    {
        $data['title'] = 'Update division';
        $tid = $id;
        $data['division'] = $this->CommonModal->getRowById('division', 'did', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $division_id = $this->CommonModal->updateRowById('division', 'did', $tid, $post);
            if ($division_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Division Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success alert-dismissible fade show">Division Updated Successfully</div>');
            }
            redirect('division-list');
        } else {
            $this->load->view('admin/division-add', $data);
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
            $min_qty = $this->input->post('min_qty');
            $max_qty = $this->input->post('max_qty');
            $amount = $this->input->post('amount');
            for ($i = 0; $i <= count($amount); $i++) {
                if (!empty($amount[$i])) {
                    $amountdata  =  array('rid' => $typeId, 'amount' => $amount[$i], 'min_qty' => $min_qty[$i], 'max_qty' =>  $max_qty[$i]);
                    $insert =  $this->CommonModal->insertRowReturnId('tbl_insentive',  $amountdata);
                }
            }
            if ($insert) {
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
            $this->CommonModal->deleteRowById('tbl_insentive', array('rid' => decryptId($BdID)));
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
        $data['insentive'] = $this->CommonModal->getRowById('tbl_insentive', 'rid', $tid);
        $data['tag'] = 'edit';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $table = "tbl_resource_type";
            $data = array('title' =>  $post['title'], 'wedge_per_day' =>  $post['wedge_per_day']);
            $typeId = $this->CommonModal->updateRowById($table, 'rid', $tid, $data);
            $min_qty = $this->input->post('min_qty');
            $max_qty = $this->input->post('max_qty');
            $amount = $this->input->post('amount');
            for ($i = 0; $i <= count($amount); $i++) {
                if (!empty($amount[$i])) {
                    $amountdata  =  array('rid' => $tid, ' amount' => $amount[$i], 'min_qty' => $min_qty[$i], 'max_qty' =>  $max_qty[$i]);
                    $insert =  $this->CommonModal->insertRowReturnId('tbl_insentive',  $amountdata);
                }
            }
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
    public function edit_insentive()
    {
        $min_qty = $this->input->post('min_qty');
        $max_qty = $this->input->post('max_qty');
        $amount = $this->input->post('amount');
        $insID = $this->input->post('insID');
        $amountdata  =  array('amount' => $amount, 'min_qty' => $min_qty, 'max_qty' =>  $max_qty);
        $insert =   $this->CommonModal->updateRowById('tbl_insentive', 'id', $insID, $amountdata);
        if ($insert) {
            echo '<div class="alert alert-success">Insentives Updated Successfully</div>';
        } else {
            echo '<div class="alert alert-success">Insentives Updated Successfully</div>';
        }
    }
    public function delete_insentive()
    {
        $BdID = $this->input->post('expId');
        $delete = $this->CommonModal->deleteRowById('tbl_insentive', array('id' => $BdID));
        if ($delete) {
            echo '<div class="alert alert-success">Insentives Delete Successfully</div>';
        } else {
            echo '<div class="alert alert-success">Insentives Delete Successfully</div>';
        }
    }
    public function getresoure()
    {
        $labour = $this->input->post('labour');
        $getdata = $this->CommonModal->runQuery('SELECT * FROM `tbl_labour` `lab` JOIN  `tbl_resource_type` `res` ON `lab`.`resourcetype` = `res`.`rid`  WHERE `lab`.`eid` =' . $labour);
        echo json_encode($getdata[0]);
    }
    public function calculate_insentive()
    {
        $qty = $this->input->post('qty');
        $getdataa = $this->CommonModal->runQuery('SELECT * FROM `tbl_resource_type` `res` JOIN `tbl_insentive` `ins` ON `res`.`rid` = `ins`.`rid` WHERE `ins`.`min_qty` <= ' . $qty . ' AND `ins`.`max_qty` >= ' . $qty);
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
    public function select_division()
    {
        $data['title'] = "Choose Division";
        $division = $this->input->get('division');
        $dvname =  getRowById('tbl_division', 'did', decryptId($division))[0];
        if (decryptId($division) != '') {
            $this->session->set_userdata(array('setdivision' => decryptId($division), 'division_name' => $dvname['name']));
            redirect('dashboard');
            exit;
        }
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'))[0];
        $this->load->view('admin/select-division', $data);
    }
    public function select_divisions()
    {
        $data['title'] = "Choose Division";
        $data['accinfo'] = $this->input->get('accinfo');
        $division = $this->input->get('division');
        $position = $this->input->get('position');
        $dvname =  getRowById('tbl_division', 'did', $division)[0];
        if (decryptId($division) != '') {
            $this->session->unset_userdata('position');
            $this->session->set_userdata(array('setdivision' => decryptId($division), 'division_name' => $dvname['name'], 'position' =>  $position));
            redirect('dashboard');
            exit;
        }
        $data['staff'] = $this->CommonModal->getRowById('staff', 'uid', sessionId('id'))[0];
        $this->load->view('admin/select-admin-division', $data);
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
        $division = $this->input->get('division');
        $data['div'] = decryptId($division);
        if (decryptId($division) != '') {

            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'division', decryptId($division));
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
        $division = $this->input->get('division');
        $data['div'] = decryptId($division);
        if (decryptId($division) != '') {

            $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'division', decryptId($division));
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
        $division = decryptId($this->input->get('division'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $division;

        if ($division != '') {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `division_id` = '" . $division . "' ");
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
        $division = decryptId($this->input->get('division'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $division;

        if ($division != '') {

            $data['work'] =   $this->CommonModal->runQuery("SELECT `tbl_work_update`.`labour` as labour , `tbl_qc_update`.`division` as division, SUM(`tbl_work_update`.`quantity`) AS qty,SUM(`tbl_qc_update`. `qc_accepted` ) as accepted,SUM(`tbl_qc_update`. `qc_rejected` ) as rejected FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id` WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `tbl_qc_update`.`division_id` = '" . $division . "'  group by `tbl_work_update`.`labour`");
        } else {
            $data['work'] =   $this->CommonModal->runQuery("SELECT `tbl_work_update`.`labour` as labour, `tbl_qc_update`.`division` as division, SUM(`tbl_work_update`.`quantity`) AS qty,SUM(`tbl_qc_update`. `qc_accepted` ) as accepted,SUM(`tbl_qc_update`. `qc_rejected` ) as rejected FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id`  group by `tbl_work_update`.`labour`");
        }

        $this->load->view('admin/work-update-filter', $data);
    }


    public function raw_material()
    {
        $data['title'] = "Raw Material";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $division = decryptId($this->input->get('division'));
        $data['from'] = $from;
        $data['to'] = $to;
        $data['div'] = $division;

        if ($division != '') {

            $data['work'] =   $this->CommonModal->runQuery("SELECT `tbl_qc_update`.`division` as division, SUM(`tbl_work_update`.`quantity`) AS qty , SUM(`tbl_qc_update`. `quantity` ) as qcqty FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id`  WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `tbl_qc_update`.`division_id` = '" . $division . "' group by `tbl_work_update`.`labour`;");
        } else {
            $data['work'] =   $this->CommonModal->runQuery("SELECT  `tbl_qc_update`.`division` as division, SUM(`tbl_work_update`.`quantity`) AS qty , SUM(`tbl_qc_update`. `quantity` ) as qcqty FROM `tbl_work_update` JOIN `tbl_qc_update` ON `tbl_work_update`.`labour` = `tbl_qc_update`.`labour_id` group by `tbl_work_update`.`labour`");
        }

        $this->load->view('admin/raw_material', $data);
    }

    public function labour_wise_productivity()
    {
        $data['title'] = "Labour Wise Productivity";
        $data['labour'] = $this->CommonModal->getAllRowsInOrder('tbl_labour', 'division', sessionId('setdivision'));
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $labour = $this->input->get('labour_id');
        $data['from'] = $from;
        $data['to'] = $to;
        $data['lab'] = $labour;

        if ($labour != '') {

            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `labour_id` = '" . $labour . "' AND `division_id` =  '" . sessionId('setdivision') . "'");
        } else {
            $data['qc'] = $this->CommonModal->getRowById('tbl_qc_update', 'division_id', sessionId('setdivision'));
        }

        $this->load->view('admin/labour-wise-productivity', $data);
    }


    public function hr_employee_attendance()
    {
        $data['title'] = "Employee Attendance";
        $data['from'] = $this->input->get('from');
        $data['to'] = $this->input->get('to');


        $data['labour'] = $this->CommonModal->getRowById('tbl_labour', 'division',  sessionId('setdivision'));

        $this->load->view('admin/employee_attendance', $data);
    }

    public function open_list()
    {
        $data['title'] = "Quality Check";
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $data['from'] = $from;
        $data['to'] = $to;

        if ($from != '') {

            $data['qc'] = $this->CommonModal->runQuery("SELECT `division` as division, SUM(`need_to_pack`) AS pending  FROM `tbl_qc_update` WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `division_id` = '" . sessionId('setdivision') . "' group by division ");
        } else {
            $data['qc'] = $this->CommonModal->runQuery("SELECT `division` as division, SUM(`need_to_pack`) AS pending  FROM `tbl_qc_update` WHERE  `division_id` = '" . sessionId('setdivision') . "'  group by division ");
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

            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `division_id` = '" . sessionId('setdivision') . "' ");
        } else {
            $data['qc'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_qc_update` WHERE  `division_id` = '" . sessionId('setdivision') . "' ");
        }

        $this->load->view('admin/QC_report', $data);
    }
}
