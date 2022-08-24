<?php
include '../config.php';
$sql = "SELECT COUNT(id) FROM tblhoadon WHERE trangthaiHD=2";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$product = $row['COUNT(id)'];


?>

<div style="width: 500px">
  <canvas id="myChart"></canvas>
</div>
<script>
  const labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
];
  
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($product)?>,<?php echo json_encode($sum)?>,

      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };
  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>