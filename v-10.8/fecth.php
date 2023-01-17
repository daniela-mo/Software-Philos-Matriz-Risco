<?php

$column = array('status', 'responsavel', 'risco', 'prioridade');


$query = "select * from wokflow";

if (isset($POST['filter_status'], $POST['filter_risco']) && $_POST['filter_status'] != '' && $_POST['filter_risco'] != '') {
    $query .= 'where risco = "' . $POST['filter_risco'] . '" AND status = "' . $_POST['filter_status'] . '" 
';
}

if (isset($_POST['order'])) {
    $query .= 'order by ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'order by risco desc';
}

$query1 = '';

if ($POST['length'] != -1) {
    $query1 = 'LIMIT' . $_POST['start'] . ', ' . $_POST['length'];
}

// $statement =  $connect->prepare($query);

// $statement->execute();

// $number_filter_row = $statement->rowCount();

// $statement = $connect->prepare($query . $query1);

// $statement->execute();

// $result = $statement->fetchAll();

$data = array();

$selecao = mysqli_query($conexao, "select * from workflow ");
while ($registros = mysqli_fetch_array($selecao)) {

    $sub_array = array();
    $sub_array[] = $row['risco'];
    $sub_array[] = $row['prioridade'];
    $sub_array[] = $row['status'];
    $sub_array[] = $row['responProc'];
    $data[] = $sub_array;
}

// function count_all_data()
// {
//     $query = "SELECT * FROM workflow";
// $statement = $connect->prepare($query);
// $statement->execute();
// return $statement->rowCount();
// }


$output = array(
    'draw'                => intval($_POST['draw']),
    // 'recordsTotal'        => count_all_data(),
    'recordsFiltered'     => $number_filter_row,
    'data'                => $data
);

echo json_encode($output);
