<canvas id="pieChart_claim"></canvas>

<?php
// date_default_timezone_set('Asia/Kolkata');
// $current_month = date('Y-m');

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
if ($id == 'all') {
    $compare ="0"; 
}else if ($id == '1M') {
    $compare ="1"; 
    $prev_month = $one_month_date =  date('Y-m-d', strtotime('- 1 month', strtotime($current_date)));
}else if ($id == '6M') {
    $compare ="1"; 
    $prev_month = $six_month_date =  date('Y-m-d', strtotime('- 6 month', strtotime($current_date)));
}else if ($id == '1Y') {
    $compare ="1"; 
    $prev_month = $year_month_date =  date('Y-m-d', strtotime('- 12 month', strtotime($current_date)));
}

?>

<script>
    var xValues = [<?php foreach ($company as $val) {
                        echo "'" . $val['name'] . "',";
                    } ?>];
    var yValues = [<?php foreach ($company as $val) {
                        $id =  $val['name'];
                        $this->db->select('sum(total_approve_amt) as total_claim_registered');
                        $this->db->where('flag', '0');
                        $this->db->where('company_name', $id);
                        if($compare == '1') {
                            $this->db->where('LEFT(created_at,10) BETWEEN "' . $prev_month . '" and "' .  $current_date  . '"');
                        }
                        $this->db->from('claim');
                        $row1 = $this->db->get()->result_array();
                        echo $row1[0]['total_claim_registered'] . ',';
                    } ?>];

    var barColors = ["rgb(240, 101, 72)", " rgb(10, 179, 156)", "rgb(64, 81, 137)", "rgb(247, 184, 75)", "rgb(41, 156, 219)"];
    new Chart("pieChart_claim", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            cutoutPercentage: 60,
            responsive: true,
            title: {
                display: true,
                // text: "World Wide Wine Production 2018"
            }
        }
    });
</script>