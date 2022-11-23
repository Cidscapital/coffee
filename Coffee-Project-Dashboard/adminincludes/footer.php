<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#tableID').DataTable();
});
</script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
  $(function () {

    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
  })
</script>
<!-- Alertyfy JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<?php if(isset($_SESSION['successmessage'])){ ?>
<script> alertify.set('notifier','position', 'top-right');
        alertify.success('<?php echo $_SESSION['successmessage'];
                            unset($_SESSION['successmessage']); ?>');
</script>
<?php }else if(isset($_SESSION['errormessage'])){ ?>
  <script> alertify.set('notifier','position', 'top-right');
        alertify.error('<?php echo $_SESSION['errormessage'];
                            unset($_SESSION['errormessage']); ?>');
</script>
<?php } ?>

<script>
$(document).ready(function() {
  $('.farmerdeletebtn').on('click', function() {

    $('#deleteFarmer').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[2]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.deletebtn').on('click', function() {

    $('#deleteSociety').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);


  });
});

</script>


<script>
$(document).ready(function() {
  $('.editbtn').on('click', function() {

    $('#editSociety').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#update_id').val(data[0]);
      $('#name').val(data[1]);
      $('#number').val(data[2]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.itemeditbtn').on('click', function() {

    $('#editItem').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#itemid').val(data[0]);
      $('#name').val(data[1]);
      $('#unit').val(data[2]);
      $('#uMeasurement').val(data[3]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.itemdeletebtn').on('click', function() {

    $('#deleteItem').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#itemdeleteid').val(data[0]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.deleteDeliveryBtn').on('click', function() {

    $('#deleteDelivery').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#deliveryid').val(data[0]);


  });
});

</script>


<script>
$(document).ready(function() {
  $('.bankeditbtn').on('click', function() {

    $('#editBank').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#bankid').val(data[0]);
      $('#name').val(data[1]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.bankdeletebtn').on('click', function() {

    $('#deleteBank').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#bankdeleteid').val(data[0]);


  });
});

</script>


<script>
$(document).ready(function() {
  $('.loaneditbtn').on('click', function() {

    $('#editLoan').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#loanid').val(data[0]);
      $('#name').val(data[1]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.loandeletebtn').on('click', function() {

    $('#deleteLoan').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#loandeleteid').val(data[0]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.transactiondeletebtn').on('click', function() {

    $('#deleteTransaction').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#transactionid').val(data[0]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.repaymenteditbtn').on('click', function() {

    $('#editLoanRepayment').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#repaymentid').val(data[0]);
      $('#ltransaction').val(data[1]);
      $('#apaid').val(data[2]);

  });
});

</script>

<script>
$(document).ready(function() {
  $('.loanrepaymentdeletebtn').on('click', function() {

    $('#deleteLoanRepayment').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#loanrepaymentdeleteid').val(data[0]);


  });
});

</script>


<script>
$(document).ready(function() {
  $('.rateeditbtn').on('click', function() {

    $('#editRate').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#rateid').val(data[0]);
      $('#rate').val(data[1]);
      $('#item').val(data[2]);
      $('#status').val(data[3]);

  });
});

</script>

<script>
$(document).ready(function() {
  $('.ratedeletebtn').on('click', function() {

    $('#deleteRate').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#ratedeleteid').val(data[0]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.managerdeletebtn').on('click', function() {

    $('#deleteManager').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#managerid').val(data[0]);


  });
});

</script>

<script>
$(document).ready(function() {
  $('.paymentdeletebtn').on('click', function() {

    $('#deletePayment').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){ 
        return $(this).text();
      }).get();

      console.log(data);

      $('#paymentid').val(data[0]);


  });
});

</script>


</body>
</html>