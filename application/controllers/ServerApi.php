<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ServerApi extends CI_Controller {
// fungsi untuk CREATE
public function addStaff()
{
// deklarasi variable
$name = $this->input->post('name');
$hp = $this->input->post('hp');
$alamat = $this->input->post('alamat');
// isikan variabel dengan nama file
$data['staff_name'] = $name;
$data['staff_hp'] = $hp;
$data['staff_alamat'] = $alamat;
$q = $this->db->insert('tb_staff', $data);
// check insert berhasil apa nggak
if ($q) {
$response['pesan'] = 'insert berhasil';
$response['status'] = 200;
} else {
$response['pesan'] = 'insert error';
$response['status'] = 404;
}
echo json_encode($response);
}
// fungsi untuk READ
public function getDataStaff()
{
$q = $this->db->get('tb_staff');
if ($q -> num_rows() > 0) {
$response['pesan'] = 'data ada';
$response['status'] = 200;
// 1 row
$response['staff'] = $q->row();
$response['staff'] = $q->result();
} else {
$response['pesan'] = 'data tidak ada';
$response['status'] = 404;
}
echo json_encode($response);
}
// fungsi untuk DELETE
public function deleteStaff()
{
$id = $this->input->post('id');
$this->db->where('staff_id', $id);
$status = $this->db->delete('tb_staff');
if ($status == true) {
    $response['pesan'] = 'hapus berhasil';
    $response['status'] = 200;
    } else {
    $response['pesan'] = 'hapus error';
    $response['status'] = 404;
    }
    echo json_encode($response);
    }
    // fungsi untuk UPDATE
    public function updateStaff()
    {
    // deklarasi variable
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $hp = $this->input->post('hp');
    $alamat = $this->input->post('alamat');
    $this->db->where('staff_id', $id);
    // isikan variabel dengan nama file
    $data['staff_name'] = $name;
    $data['staff_hp'] = $hp;
    $data['staff_alamat'] = $alamat;
    $q = $this->db->update('tb_staff', $data);
    // check insert berhasil apa nggak
    if ($q) {
    $response['pesan'] = 'update berhasil';
    $response['status'] = 200;
    } else {
    $response['pesan'] = 'update error';
    $response['status'] = 404;
    }
    echo json_encode($response);
    }
    }