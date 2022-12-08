// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var viewAllRoomsPieDB = true;

// $.ajax({
//     type: "POST",
//     url: "controller/room.php",
//     data:
//     {
//         viewAllRoomsPieDB   :    viewAllRoomsPieDB,
//     },
//     async: false,
//     success: function(response)
//     {
//         alert("Room Added Successfully");
//         location.reload();
//     },
//     error: function(response)
//     {
//         console.log(response);
//     }
// });
$.ajax({
  type: "POST",
  url: "controller/section.php",
  data:
  {
    viewAllRoomsPieDB   :    viewAllRoomsPieDB,
  },
  async: false,
  success: function(response)
  {
    console.log(response);
    var rooms = [];

    var data = JSON.parse(response);

    rooms.push(data[0].lecture);
    rooms.push(data[0].laboratory);



    // Area Chart Example
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Lecture", "Laboratory"],
        datasets: [{
          data: rooms,
          backgroundColor: [ '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: [ '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  },
  error: function(response)
  {
      console.log(response);
  }
});
