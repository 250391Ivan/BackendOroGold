<?php 


class ModelGeneral extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
  
    
    //insertando  la  informacon
    public function ValidateSaveInfo($name, $email, $phone)
    {
        $data = [
        'Nombre'     => $name,
        'Correo'      => $email,
        'Telefono'     => $phone,
        'FechaRegistro'  => date('Y-m-d'),
    ];
        $validacion = $this->ValidarCorreo($email);
        if ($validacion === true) {
            $send = [
            'code'     => 400,
            'info'     => 'Ya  cuentas con una  cita',
            'status'   => false,
        ];
            return $send;
        } else {
            $send = $this->db->insert('citas', $data);
            $send = [
        'code'     => 200,
        'info'     => 'Cita Confirmada',
        'status'   => true,
    ];
            return $send;
        }
    }
//validando  si  el  correo  esta  registardo
    public function ValidarCorreo($email) {
        $query = $this->db->select('Correo')
        ->from('citas')
        ->where('Correo', $email)
        ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                $send[]= [
                     $value['Correo']
                ];
            }
            return true;
        } else {
            return false;
        }
    }
}


?>