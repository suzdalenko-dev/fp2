<?php
$departamentos = array("D001" => "Contabilidad","D002" => "Marketing","D003" => "Ventas","D004" => "Soporte Técnico","D005" => "Recursos Humanos");
$extras = array('Noche'=> 100, 'Festivo'=>60, 'Hora'=>35, 'Peligro' =>120, 'Otros'=>70);

if(isset($_GET['cerrar']) && $_GET['cerrar'] == 'Cerrar'){
    $html_table = '';
    foreach($_SESSION['info'] as $user){
        if($user['total_nomina'] <= 0) continue;
        $html_table .= '<tr><td style="border: 1px solid black;">'.$user['nombre'].'</td><td style="border: 1px solid black;">'.$user['total_nomina'].'</td></tr>';
    }
    
    echo '<h6 style="font-size:33px;">Listado de Empleados</h6>
        <table style="border: 1px solid black;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;">Nombre</th>
                    <th style="border: 1px solid black;">Salario</th>
                </tr>
            </thead>
            <tbody>
                '.$html_table.'
            <tbody>
        </table>
        <p>La sesíon se ha cerrado. <a href="nomina.php">Volver al formulario de nómina.</a></p>';
    session_unset();
    session_destroy();
    die();
}

function get_init_sesion(){
    if(!isset($_SESSION['info'])){
        $_SESSION['info'] = [];
        $_SESSION['info'][] = [
            'numero'=>1, 
            'nombre'=>'', 
            'base_val'=>0,
            'code_dep'=>'',
            'extras_all'=>[], 
            'hijos_all'=>[], 
            'total_nomina'=>0
        ];
    }
    if(isset($_GET['otro'])){
        $count_user = count($_SESSION['info']) + 1;
        $_SESSION['info'][] = [
            'numero'=>$count_user, 
            'nombre'=>'', 
            'base_val'=>0,
            'code_dep'=>'',
            'extras_all'=>[], 
            'hijos_all'=>[], 
            'total_nomina'=>0
        ];
        header('Location:nomina.php');
    }
}

function html_numero_empleado(){                  
    global $usuario_nombre;
    global $sueldo_base;
    global $dep_clave;

    $info = $_SESSION['info'];
    $user_info = $info[count($info)-1];                     
    $empleado_numero = $user_info['numero'];
    if(isset($_GET['user_id'])){                        
        $empleado_numero = $_GET['user_id'];             
        foreach($_SESSION['info'] as $user){           
            if($user['numero'] == $empleado_numero){
                $usuario_nombre = $user['nombre'];
                $sueldo_base    = $user['base_val'];
                $dep_clave      = $user['code_dep'];
            }
        } 
    }
    echo $empleado_numero;
}

function html_extras(){
    $extras_all_actual = [];
    if(isset($_GET['user_id'])){
        foreach($_SESSION['info'] as $u_data){
            if($u_data['numero'] == $_GET['user_id']){
                foreach($u_data['extras_all'] as $item){
                    $extras_all_actual[] = $item;
                }
            }
        }
    }
    global $extras;
    $html_extra = '';
    $checked    = '';
    foreach($extras as $key => $value){
        if(in_array($value, $extras_all_actual)) { $checked = 'checked'; }
        $html_extra .= '<input type="checkbox" name="extras[]" value="' . $value . '" '.$checked.'> '.$key.' ';
        $checked    = '';
    }
    echo $html_extra;
}

function html_hijos(){
    $hijos_actual = -1;
    if(isset($_GET['user_id'])){
        foreach($_SESSION['info'] as $u_data){
            if($u_data['numero'] == $_GET['user_id']){
                $hijos_actual = $u_data['hijos_all'];
            }
        }
    }
    $checked = '';
    $numero_hijos = [0,1,2,3,4];
    $html_hijos = '';
    foreach($numero_hijos as $value){
        if($hijos_actual == $value) { $checked = 'checked'; }
        $html_hijos .= '<input type="radio" name="children" value="' . $value . '" '.$checked.'> '.$value.' ';
        $checked = '';
    }
    echo $html_hijos;
}

function get_departamento($user_dep){
    global $departamentos;
    foreach($departamentos as $key => $value){
        if($key == $user_dep){
            return $value;
        }
    }

    return 'General';
}

function localiza_extra($value_extra){
    global $extras;
    foreach($extras as $key => $value){
        if($value_extra == $value){
            return [$key, $value];
        }
    }
}

function get_extras($post_extras){
    global $extra_val;
    $html = '<ul style="margin-left:40px;">';
    foreach($post_extras as $value_extra){
        $descrip_value = localiza_extra($value_extra);
        $extra_val += $descrip_value[1];
        $html .= '<li>'.$descrip_value[0].':'.$descrip_value[1].' </li>';
    }
    $html .= '</ul>';
    return $html;
}

function imp($x){
    echo $x;
}

function  get_importe_hijos($num_hijos){
    global  $hijos_val;
    $hijos_val =  $num_hijos * 10;
    return  $hijos_val;
}

function get_importe_nomina(){
    global $sueldo_val;
    global $extra_val;
    global $hijos_val;
    return $sueldo_val + $extra_val + $hijos_val;
    $_SESSION['info'][] = 2;
}

function save_user_data_in_session($user_name, $sueldo_val, $arr_ext, $arr_hijos, $total_nomina, $code_dep){
    global $total_acumulado;
    $num_user = $_POST['user_num'];
    foreach($_SESSION['info'] as &$user){
        if($user['numero'] == $num_user){
           $user['nombre']       = $user_name;
           $user['base_val']     = $sueldo_val;
           $user['extras_all']   = $arr_ext;
           $user['hijos_all']    = $arr_hijos;
           $user['total_nomina'] = $total_nomina;
           $user['code_dep']     = $code_dep;
        }
        $total_acumulado += $user['total_nomina'];
    }
}

