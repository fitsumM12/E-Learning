<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/tracker.php";
$tra = new tracker($_SERVER['REMOTE_ADDR'],$_SERVER['PHP_SELF'],date('d/m/y: h:m:s'));
$tvisitor=$tra->getTotalVisits();
$unvisitor=$tra->getUnqVisits();
$trgvisitor=$tra->trgUsr();
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/proces.data_ajax.js"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="assets/js/init/fullcalendar-init.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!--Local Stuff-->
<script>
CKEDITOR.replace('mdescriptioncal');
CKEDITOR.replace('mdescriptioncal2');
</script>

<script>
jQuery(document).ready(function($) {
  "use strict";

  // Pie chart flotPie1
  var piedata = [{
      label: "Total Visit",
      data: [
        [1, <?php echo $tvisitor; ?>]
      ],
      color: '#5c6bc0'
    },
    {
      label: "Unique Visitors",
      data: [
        [1, <?php echo $unvisitor; ?>]
      ],
      color: '#ef5350'
    },
    {
      label: "Targeted Visitors",
      data: [
        [1, <?php echo $trgvisitor; ?>]
      ],
      color: '#66bb6a'
    }
  ];
  // for stats


  $.plot('#flotPie1', piedata, {
    series: {
      pie: {
        show: true,
        radius: 1,
        innerRadius: 0.65,
        label: {
          show: true,
          radius: 2 / 3,
          threshold: 1
        },
        stroke: {
          width: 0
        }
      }
    },
    grid: {
      hoverable: true,
      clickable: true
    }
  });
  // Pie chart flotPie1  End
  // cellPaiChart
  var cellPaiChart = [{
      label: "Direct Sell",
      data: [
        [1, 65]
      ],
      color: '#5b83de'
    },
    {
      label: "Channel Sell",
      data: [
        [1, 35]
      ],
      color: '#00bfa5'
    }
  ];
  $.plot('#cellPaiChart', cellPaiChart, {
    series: {
      pie: {
        show: true,
        stroke: {
          width: 0
        }
      }
    },
    legend: {
      show: false
    },
    grid: {
      hoverable: true,
      clickable: true
    }

  });
  // cellPaiChart End
  // Line Chart  #flotLine5
  // $tra->datwiseUsr($mnth,$dt)
  var date = new Date()
  var newCust = [
    [0, <?php echo $tra->datwiseUsr('March',1); ?>],
    [<?php echo $tra->datwiseUsr('March',1).",".$tra->datwiseUsr('March',2); ?>],
    [<?php echo $tra->datwiseUsr('March',2).",".$tra->datwiseUsr('March',3); ?>],
    [<?php echo $tra->datwiseUsr('March',3).",".$tra->datwiseUsr('March',4); ?>],
    [<?php echo $tra->datwiseUsr('March',4).",".$tra->datwiseUsr('March',5); ?>],
    [<?php echo $tra->datwiseUsr('March',5).",".$tra->datwiseUsr('March',6); ?>],
    [<?php echo $tra->datwiseUsr('March',6).",".$tra->datwiseUsr('March',7); ?>],
    [<?php echo $tra->datwiseUsr('March',7).",".$tra->datwiseUsr('March',8); ?>],
    [<?php echo $tra->datwiseUsr('March',8).",".$tra->datwiseUsr('March',9); ?>],
    [<?php echo $tra->datwiseUsr('March',9).",".$tra->datwiseUsr('March',10); ?>],
    [<?php echo $tra->datwiseUsr('March',10).",".$tra->datwiseUsr('March',11); ?>],
    [<?php echo $tra->datwiseUsr('March',11).",".$tra->datwiseUsr('March',12); ?>],
    [<?php echo $tra->datwiseUsr('March',12).",".$tra->datwiseUsr('March',13); ?>],
    [<?php echo $tra->datwiseUsr('March',13).",".$tra->datwiseUsr('March',14); ?>],
    [<?php echo $tra->datwiseUsr('March',14).",".$tra->datwiseUsr('March',15); ?>],
    [<?php echo $tra->datwiseUsr('March',15).",".$tra->datwiseUsr('March',16); ?>],
    [<?php echo $tra->datwiseUsr('March',16).",".$tra->datwiseUsr('March',17); ?>],
    [<?php echo $tra->datwiseUsr('March',17).",".$tra->datwiseUsr('March',18); ?>]
  ];

  var plot = $.plot($('#flotLine5'), [{
    data: newCust,
    label: 'New Data Flow',
    color: '#fff'
  }], {
    series: {
      lines: {
        show: true,
        lineColor: '#fff',
        lineWidth: 2
      },
      points: {
        show: true,
        fill: true,
        fillColor: "#ffffff",
        symbol: "circle",
        radius: 3
      },
      shadowSize: 0
    },
    points: {
      show: true,
    },
    legend: {
      show: false
    },
    grid: {
      show: false
    }
  });
  // Line Chart  #flotLine5 End
  // Traffic Chart using chartist
  if ($('#traffic-chart').length) {
    var chart = new Chartist.Line('#traffic-chart', {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      series: [
        [0, 18000, 35000, 25000, 22000, 0],
        [0, 33000, 15000, 20000, 15000, 300],
        [0, 15000, 28000, 15000, 30000, 5000]
      ]
    }, {
      low: 0,
      showArea: true,
      showLine: false,
      showPoint: false,
      fullWidth: true,
      axisX: {
        showGrid: true
      }
    });

    chart.on('draw', function(data) {
      if (data.type === 'line' || data.type === 'area') {
        data.element.animate({
          d: {
            begin: 2000 * data.index,
            dur: 2000,
            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
            to: data.path.clone().stringify(),
            easing: Chartist.Svg.Easing.easeOutQuint
          }
        });
      }
    });
  }
  // Traffic Chart using chartist End
  //Traffic chart chart-js
  if ($('#TrafficChart').length) {
    var ctx = document.getElementById("TrafficChart");
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        datasets: [

          {
            label: "Visit",
            borderColor: "rgba(4, 73, 203,.09)",
            borderWidth: "1",
            backgroundColor: "rgba(4, 73, 203,.5)",
            // data:  0, 2900, 5000, 3300, 6000, 3250, 0
            data: [
              <?php echo $tra->getVsByDate('January').",".$tra->getVsByDate('February').",".$tra->getVsByDate('March').",".$tra->getVsByDate('April'); ?>,
              100
            ]
          },
          {
            label: "Bounce",
            borderColor: "rgba(245, 23, 66, 0.9)",
            borderWidth: "1",
            backgroundColor: "rgba(245, 23, 66,.5)",
            pointHighlightStroke: "rgba(245, 23, 66,.5)",
            data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
          },
          {
            //getTrgVsByDate
            label: "Targeted",
            borderColor: "rgba(40, 169, 46, 0.9)",
            borderWidth: "1",
            backgroundColor: "rgba(40, 169, 46, .5)",
            pointHighlightStroke: "rgba(40, 169, 46,.5)",
            data: [
              <?php echo $tra->getTrgVsByDate('January').",".$tra->getTrgVsByDate('February').",".$tra->getTrgVsByDate('March').",".$tra->getTrgVsByDate('April'); ?>,
              100
            ]
          }
        ]
      },
      options: {
        responsive: true,
        tooltips: {
          mode: 'index',
          intersect: false
        },
        hover: {
          mode: 'nearest',
          intersect: true
        }

      }
    });
  }
  //Traffic chart chart-js  End
  // Bar Chart #flotBarChart
  $.plot("#flotBarChart", [{
    data: [
      [0, 18],
      [2, 8],
      [4, 5],
      [6, 13],
      [8, 5],
      [10, 7],
      [12, 4],
      [14, 6],
      [16, 15],
      [18, 9],
      [20, 17],
      [22, 7],
      [24, 4],
      [26, 9],
      [28, 11]
    ],
    bars: {
      show: true,
      lineWidth: 0,
      fillColor: '#ffffff8a'
    }
  }], {
    grid: {
      show: false
    }
  });
  // Bar Chart #flotBarChart End
});
</script>

<!--
        here we will be using ajax and jquery for passing data

    -->
<script>
$(document).ready(function() {
  //to process program data course program
  $("#createPro").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: "includes/operation.inc.php?p=crtProg",
      method: "POST",
      data: $('form').serialize(),
      dataType: "html",
      success: function(result) {
        $("#som").html(result);
      }

    })
  });
  //to load data from programdetails
  $("#viewprogram").mouseenter(function() {
    $.ajax({
      url: "includes/operation.inc.php?p=loadProgram",
      dataType: "html",
      cache: false,
      success: function(response) {
        $(".progEd").css("display", "none");
        $("#programdetails").html(response);

      }
    })
  }).change();

  //for editing the document
  $("#editprogForm").click(function(event) {
    event.preventDefault();
    let conf = confirm("Do you want to update this program?");
    if (conf) {
      $.ajax({
        url: "includes/operation.inc.php?p=editProgram",
        method: "POST",
        data: $('form').serialize(),
        dataType: "html",
        success: function() {
          $("#responsboard").html(
            $.ajax({
              url: "includes/operation.inc.php",
              dataType: "html",
              cache: false,
              success: function(response) {
                $("#programdetails").html(response);
                $(".progEd").css("display", "none");
              }
            })
          );
        }
      });
    } else {
      alert("The operation is canceled");
    }
  })

  function deletProg(id) {

  }

  // The following script is to manage school

  // to create new school
  $("#createSchoolbtn").click(function() {
    $("#editSchlForm").hide();
    $("#createschoolForm").show();
    $("#createClass").click(function(event) {
      event.preventDefault();
      $.ajax({
        url: 'includes/operation.inc.php?p=addSchool',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function(responseFromMngSchool) {
          setTimeout(function() {
            $("#responseFromMngSchool").html(responseFromMngSchool);
          }, 100);
          setTimeout(function() {
            $("#responseFromMngSchool").fadeOut("slow");
          }, 5000);
          $("#editSchlForm").hide();
          $("#createschoolForm").hide();
        }
      });
    });
  })
  // Now let's load data dynamically
  // this is to display without refresh
  function loadSchoolContent() {
    $.ajax({
      url: "includes/operation.inc.php?p=loadSchool",
      dataType: "html",
      success: function(responseFromMngSchool) {
        $("#createschoolForm").hide();
        $("#editSchlForm").hide();
        $("#schoolContent").html(responseFromMngSchool);
      }
    })
  }

  $("#viewSchool").click(function() {
    loadSchoolContent();

  })


  // editing school contents
  $("#editschlbtn").click(function(event) {
    event.preventDefault();
    if (confirm("Do you want to edit the school content?")) {
      $.ajax({
        url: 'includes/operation.inc.php?p=editSchool',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function() {


          setTimeout(function() {
            $("#responseFromMngSchool").html();
          }, 100);
          setTimeout(function() {
            $("#responseFromMngSchool").fadeOut("slow");
          }, 3000);

          $("#editSchlForm").hide();
          $("#createschoolForm").hide();

          // automatically load the data
          loadSchoolContent();

        }


      })

    } else {
      loadSchoolContent();

    }
  });
  $("#deletSchl_id").click(function() {
    if (confirm("Are you sure you want to delete this school?")) {
      var id = $("#deletSchl_id").val();
      $.ajax({
        url: 'includes/operation.inc.php?p=deleteSchool',
        type: 'post',
        data: {
          delete_id: id
        },
        success: function(data) {
          $('#schlcontent').html(data);
        }
      });
    }
  })
  // Department management
  $("#createDepartbtn").click(function() {
    $("#editDepartForm").hide();
    $("#createsdpForm").hide();
    $("#createDepartForm").show();

    $("#createDepart").click(function(event) {
      event.preventDefault();
      $.ajax({
        url: 'includes/operation.inc.php?p=addDepart',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function(responseFromMngDprt) {
          alert(responseFromMngDprt);
          $("#createDepartForm").hide();
          loadDepartment();
        }
      });

    })
  })
  // function for loading data
  function loadDepartment() {
    $.ajax({
      url: "includes/operation.inc.php?p=loadDepart",
      dataType: "html",
      success: function(responseFromManageDepart) {
        $("#contentArea").html(responseFromManageDepart);
      }
    })
  }
  $("#viewExistingDepart").click(function() {
    $("#createDepartForm").hide();
    $("#createsdpForm").hide();
    $("#editDepartForm").hide();

    loadDepartment();
  })

  // for editing
  $("#editDprtbtn").click(function() {
    event.preventDefault();
    if (confirm("Do you want to edit the Department content?")) {
      $.ajax({
        url: 'includes/operation.inc.php?p=editDepart',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function(resp) {

          $("#editdpinfo").html(resp)

          $("#editDepartForm").hide();
          $("#createDepartForm").hide();
          $("#createsdpForm").hide();

          // automatically load the data
          loadDepartment();
        }
      })

    } else {
      loadDepartment();

    }
  })
  $("#editDepartForm").click(() => {
    $("#createDepartForm").hide();
    $("#createsdpForm").hide();
    $("#editDepartForm").show();
  })

  function depFormToggler() {
    $("#editDepartForm").hide();
    $("#createDepartForm").hide();
    $("#createsdpForm").hide();
    $("#addSemToSdpContainer").hide();
  }

  // add semester to department or make combination between semester and department
  function addSemToSdp() {
    $('#btn_AddtoSem').click(function() {
      if (confirm("Are you sure you want to Add semester?")) {
        var semId = $("#semSdpId").val();
        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });
        if (semId != "") {
          if (id.length === 0) //tell you if the array is empty
          {
            alert("Please Select atleast one program");
          } else {
            $.ajax({
              url: 'includes/operation.inc.php?p=addSem',
              method: 'POST',
              data: {
                semId: semId,
                id: id
              },
              success: function(da) {
                $("#semRs").html(da);
                for (var i = 0; i < id.length; i++) {
                  $('tr#' + id[i] + '').css('background-color', '#ccc');
                  $('tr#' + id[i] + '').fadeOut('slow');
                }
              }
            });
          }
        } else {
          alert("Please Add the Semester Number!");
        }
      } else {
        return false;
      }
    });
  }
  $("#sdp_semester").click(function() {
    depFormToggler();
    $("#addSemToSdpContainer").show();
    addSemToSdp();
  })
  // Now school, department and program combination
  $("#sdp").click(function() {
    $("#editDepartForm").hide();
    $("#createDepartForm").hide();
    $("#createsdpForm").show();
    $("#sdpComb").click(function(event) {
      event.preventDefault();
      $.ajax({
        url: 'includes/operation.inc.php?p=depart_program',
        method: 'post',
        data: $('form').serialize(),
        success: function(resp) {
          $("#sdpResp").html(resp);
        }
      });
      $("#createsdpForm").hide();
      loadDepartment();
    });

  })

  // file management

  // to upload
  $("#uploadfile").click(function() {
    $("#fileuploadform").show();

  })
  $("#uploadbtn").click(function() {
    $("#fileuploadform").hide();
  })

  // to load file
  function loadfile() {
    $.ajax({
      url: "filemanagement/loadFile.inc.php",
      dataType: "html",
      success: function(responseFromManageDepart) {
        $("#filcontent").html(responseFromManageDepart);
      }
    });
  }
  loadfile();
  $("#loadfile").click(function() {
    $("#fileuploadform").hide();
    loadfile();
  })

  /***********************************
  Section management area
   ************************************/
  function sectFormToggler() {
    $(".sectcontent").hide()
    $("#editSectForm").hide();
    $("#createSectForm").hide();
    $("#addStdntToSctnContainer").hide()
    $("#allocSectToTeachContainer").hide()
  }
  $("#createSectbtn").click(function() {
    sectFormToggler();
    $("#createSectForm").show();
    $("#createSect").click(function(event) {
      event.preventDefault();
      $.ajax({
        url: 'includes/operation.inc.php?p=addSection',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function(responseFromMngSchool) {
          setTimeout(function() {
            $("#responseFromMngSect").html(responseFromMngSchool);
          }, 100);
          setTimeout(function() {
            $("#responseFromMngSect").fadeOut("slow");
          }, 5000);
          sectFormToggler();
          $(".sectcontent").show();
        }
      });
    });

  })

  // loader function

  function loadSection() {

    $.ajax({
      url: "includes/operation.inc.php?p=loadSection",
      dataType: "html",
      success: function(responseFromManageSect) {
        $(".sectcontent").html(responseFromManageSect);
      }
    });
  }

  $("#viewSectbtn").click(function() {
    sectFormToggler();
    loadSection();
    $(".sectcontent").show()

  })

  $("#editSect").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/operation.inc.php?p=editSection',
      method: 'POST',
      data: $('form').serialize(),
      cache: false,
      success: function(responseFromMngSect) {
        setTimeout(function() {
          $("#responseFromMngSect").html(responseFromMngSect);
        }, 10);
        setTimeout(function() {
          $("#responseFromMngSect").fadeOut("slow");
        }, 500);
        sectFormToggler();
        $("#addStdntToSctnContainer").hide()

      }

    });

  })

  // the following for the student sectiona allocation
  $('#btn_AddtoSect').click(function() {
    if (confirm("Are you sure you want to Add this student to section?")) {
      var sectId = $("#StudSectId").val();
      var id = [];
      $(':checkbox:checked').each(function(i) {
        id[i] = $(this).val();
      });
      if (sectId != "Select Section") {
        if (id.length === 0) //tell you if the array is empty
        {
          alert("Please Select atleast one checkbox or Select Section");
        } else {
          $.ajax({
            url: 'includes/operation.inc.php?p=addStudToSection',
            method: 'POST',
            data: {
              sectId: sectId,
              id: id
            },
            success: function() {
              for (var i = 0; i < id.length; i++) {
                $('tr#' + id[i] + '').css('background-color', '#ccc');
                $('tr#' + id[i] + '').fadeOut('slow');
              }
            }
          });
        }
      } else {
        alert("Please Select The section!");
      }
    } else {
      return false;
    }
  });
  // Add students to section
  $("#addStudToSectbtn").click(function() {
    sectFormToggler();
    $("#addStdntToSctnContainer").show()
  })

  /**<><><<>>>>?>>>>>>><<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  fetch the allocated teachers
   *<><><>>><><><>><><>>><<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>*/

  $("#allocatedTeacherbtn").click(function(ev) {
    ev.preventDefault();
    $.ajax({
      url: "includes/operation.inc.php?p=altdFac",
      method: 'POST',
      dataType: 'html',
      cache: false,
      success: function(resp) {
        sectFormToggler();
        $("#sectAll2").html(resp);

      }
    })
  })


  /**********************************************************************
  To add or allocate teachers to section with their corresponding courses
  ********************************************************************* */
  // teacher allocation
  function facSectAlloc() {
    $('#btn_allocSectTeach').click(function() {
      if (confirm("Are you sure you want to Proceed?")) {
        var sect_Id = $("#sect_Id").val();
        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });
        if (sect_Id != "Select Section") {
          if (id.length === 0) //tell you if the array is empty
          {
            alert("Please Select atleast one Faculty");
          } else {
            $.ajax({
              url: 'includes/operation.inc.php?p=sectFacAlloc',
              method: 'POST',
              data: {
                sect_Id: sect_Id,
                fc_Id: id
              },
              success: function(da) {
                $("#sectAll").html(da);
              }
            });
          }
        } else {
          alert("Please Select the Section!");
        }
      } else {
        return false;
      }
    });
  }
  $("#addFacToSectbtn").click(function() {
    sectFormToggler();
    $("#allocSectToTeachContainer").show();
    facSectAlloc();
  });

  // course management
  $("#addCourse").click(function() {
    formToggler();
    $("#createCourseForm").show();
    $("#createCourse").click(function(event) {
      event.preventDefault();
      // formToggler(createCourseForm);
      $.ajax({
        url: 'includes/operation.inc.php?p=addCourses',
        method: 'POST',
        data: $('form').serialize(),
        cache: false,
        success: function(crsResp) {
          $("#coursemsg").html(crsResp);
          $("#createCourseForm").hide();
          // loadCourse();
        }
        // loadCourse();
      })
    })
  })

  function formToggler() {
    $("#createCourseForm").hide();
    $("#editCourseForm").hide();
    $("#courseContent").hide();
    $("#allocateCoursesContainer").hide();
    $("#allocateFacultyContainer").hide();

  }

  function loadCourse() {
    $.ajax({
      url: 'includes/operation.inc.php?p=loadCourses',
      dataType: 'html',
      success: function(res) {
        $("#courseContent").html(res);
      }
    });
  }

  $("#viewCourse").click(function() {
    formToggler();
    loadCourse();
    $("#courseContent").show();

  });
  // edit course details

  $("#editCoursebtn").click(function(event) {
    event.preventDefault();
    formToggler();
    $("#editCourseForm").show();
    $.ajax({
      url: 'includes/operation.inc.php?p=editCourses',
      method: 'POST',
      data: $('form').serialize(),
      cache: false,
      success: function(crsRes) {
        $("#coursemsg").html(crsRes);
        formToggler();
        loadCourse();
      }

    })
  })

  $("#distroy").click(function() {
    formToggler();
    loadCourse();

  })
  // allocate courses
  function courseAllocan() {
    $('#btn_allocCourse').click(function() {
      if (confirm("Are you sure you want to Proceed?")) {
        var sem_Id = $("#sem_Id").val();
        var sdp_Id = $("#sdp_Id").val();
        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });
        if (sdp_Id != "Select The program") {
          if (id.length === 0) //tell you if the array is empty
          {
            alert("Please Select atleast one Course");
          } else {
            $.ajax({
              url: 'includes/operation.inc.php?p=allocCourse',
              method: 'POST',
              data: {
                sem_Id: sem_Id,
                sdp_Id: sdp_Id,
                id: id
              },
              success: function(da) {
                $("#crsAll").html(da);
              }
            });
          }
        } else {
          alert("Please Select the program!");
        }
      } else {
        return false;
      }
    });
  }
  $("#allocateCourses").click(function() {
    formToggler();
    $("#allocateCoursesContainer").show();
    courseAllocan();
  })
  // teacher allocation
  function teachAllocan() {
    $('#btn_allocTeach').click(function() {
      if (confirm("Are you sure you want to Proceed?")) {
        var crs_Id = $("#crs_Id").val();
        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });
        if (crs_Id != "Select Course") {
          if (id.length === 0) //tell you if the array is empty
          {
            alert("Please Select atleast one Faculty");
          } else {
            $.ajax({
              url: 'includes/operation.inc.php?p=allocFac',
              method: 'POST',
              data: {
                crs_Id: crs_Id,
                id: id
              },
              success: function(da) {
                $("#crsAll").html(da);
              }
            });
          }
        } else {
          alert("Please Select the Course!");
        }
      } else {
        return false;
      }
    });
  }
  $("#allteachr").click(function() {
    formToggler();
    $("#allocateFacultyContainer").show();
    teachAllocan();
  });

  /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
  teacher management area\
  from this below the area is used for teacher management area

  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
  // this function is for teacher management form toggler
  function teacherformtogler() {
    $('#teacherContent').hide();
    $('#forapprvalofnewcustomer').hide();
    $("#aprovl").hide();
    $("#blockteachContainer").hide();


  }

  function fetchTeachers() {
    $.ajax({
      url: 'includes/users.inc.php?p=fetchFaculty',
      dataType: "html",
      cache: false,
      success: function(data) {
        $("#teacherContent").html(data)
        $('#teacherContent').show();
      }

    })
  }
  $("#approvtchrs").click(function(event) {
    event.preventDefault();
    teacherformtogler();
    $('#forapprvalofnewcustomer').show();

  })
  $("#viewTeachers").click(function(event) {
    event.preventDefault();
    teacherformtogler();
    $.ajax({
      url: 'includes/users.inc.php?p=fetchFaculty',
      dataType: "html",
      method: 'post',
      cache: false,
      success: function(data) {
        $("#teacherContent").html(data)
        $('#teacherContent').show();
      }

    })

  })

  $("#btn_aprove").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/users.inc.php?p=apprvFaculty',
      method: 'post',
      data: $('form').serialize(),
      success: function(dat) {
        redirect("manage_Teachers.php");
      }
    })
  })
  // NOW THIS IS TO REJECT THE NEW REQUEST CAME FROM TEACHER OR FACULTY
  $("#btn_reject").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/users.inc.php?p=rjctFaculty',
      method: 'post',
      data: $('form').serialize(),
      success: function(dat) {
        redirect("manage_Teachers.php");
      }
    })
  })


  /* *************************************************************************
  this is for multiple request updates
  ******************************************************************************/
  $('#btn_apprvFacReq').click(function() {
    if (confirm("Are you sure you want to Proceed?")) {

      var id = [];
      $(':checkbox:checked').each(function(i) {
        id[i] = $(this).val();
      });

      if (id.length === 0) //tell you if the array is empty
      {
        alert("Please Select atleast one Course");
      } else {
        $.ajax({
          url: 'includes/users.inc.php?p=mapprvFaculty',
          method: 'POST',
          data: {
            id: id
          },
          success: function(da) {
            for (var i = 0; i < id.length; i++) {
              $('tr#' + id[i] + '').css('background-color', '#ccc');
              $('tr#' + id[i] + '').fadeOut('slow');
            }
            $("#apprvmsg").html(da);
          }
        });
      }


    } else {
      return false;
    }
  });


  $('#blockTeacher').click(function() {
    teacherformtogler();
    $("#blockteachContainer").show();
    $('#btn_blockfac').click(function() {
      if (confirm("Are you sure you want to Proceed?")) {

        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });

        if (id.length === 0) //tell you if the array is empty
        {
          alert("Please Select atleast one Teacher");
        } else {
          $.ajax({
            url: 'includes/users.inc.php?p=blckFaculty',
            method: 'POST',
            data: {
              id: id
            },
            success: function(da) {
              for (var i = 0; i < id.length; i++) {
                $('tr#' + id[i] + '').css('background-color', '#ccc');
                $('tr#' + id[i] + '').fadeOut('slow');
              }
              $("#apprvmsg").html(da);
            }
          });
        }
      } else {
        return false;
      }
    });
  })


  /*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
  THIS IS FOR STUDENT MANAGEMENT SECTION AND HERE UNDER WE WILL FETCH
  AND PASS THE STUDENT INFORMATION TO PHP AND PROCESS IT.
  *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  After reading more information of the applicant the admin can update the
  students/applicants informations
  ********************************************************************** */
  function redirect(url) {
    window.location = url;

  }

  // this is for student form toggler
  function studentformtogler() {
    $('#stdContent').hide();
    $('#apprvStudentContainer').hide();
    $("#aprovl_std").hide();
    $("#blockStudentContainer").hide();


  }
  $("#viewstudents").click(function(event) {
    event.preventDefault();
    studentformtogler();
    $.ajax({
      url: 'includes/users.inc.php?p=fetchStudent',
      dataType: "html",
      method: 'post',
      cache: false,
      success: function(data) {
        $("#stdContent").html(data)
        $('#stdContent').show();
      }

    })

  })



  $('#approveStudent').click(function() {
    studentformtogler();
    $('#apprvStudentContainer').show();

  })



  $("#btn_aprove_std").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/users.inc.php?p=apprvStudent',
      method: 'post',
      data: $('form').serialize(),
      success: function(dat) {
        redirect("manage_students.php");
      }
    })
  })
  // NOW THIS IS TO REJECT THE NEW REQUEST CAME FROM TEACHER OR FACULTY
  $("#btn_reject_std").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/users.inc.php?p=rjctStudent',
      method: 'post',
      data: $('form').serialize(),
      success: function(dat) {
        redirect("manage_students.php");
      }
    })
  })

  /* *************************************************************************
         this is for multiple request updates
         ******************************************************************************/
  $('#btn_apprvstdReq').click(function() {
    if (confirm("Are you sure you want to Proceed?")) {

      var id = [];
      $(':checkbox:checked').each(function(i) {
        id[i] = $(this).val();
      });

      if (id.length === 0) //tell you if the array is empty
      {
        alert("Please Select atleast one Applicant");
      } else {
        $.ajax({
          url: 'includes/users.inc.php?p=mapprvStudent',
          method: 'POST',
          data: {
            id: id
          },
          success: function(da) {
            for (var i = 0; i < id.length; i++) {
              $('tr#' + id[i] + '').css('background-color', '#ccc');
              $('tr#' + id[i] + '').fadeOut('slow');
            }
            $("#apprvmsg_std").html(da);
          }
        });
      }
    } else {
      return false;
    }
  });
  // for blocking students
  $('#blockstudents').click(function() {
    studentformtogler();
    $("#blockStudentContainer").show();
    $('#btn_blockstd').click(function() {
      if (confirm("Are you sure you want to Proceed?")) {

        var id = [];
        $(':checkbox:checked').each(function(i) {
          id[i] = $(this).val();
        });

        if (id.length === 0) //tell you if the array is empty
        {
          alert("Please Select atleast one Student");
        } else {
          $.ajax({
            url: 'includes/users.inc.php?p=blckStudent',
            method: 'POST',
            data: {
              id: id
            },
            success: function(da) {
              for (var i = 0; i < id.length; i++) {
                $('tr#' + id[i] + '').css('background-color', '#ccc');
                $('tr#' + id[i] + '').fadeOut('slow');
              }
              $("#apprvmsg_std").html(da);
            }
          });
        }
      } else {
        return false;
      }
    });
  })

  /***********************************************************************
  academic calender management area
  *******************************************************************/
  function acadeCalFormToggler() {
    $("#createCalenderForm").hide();
    $("#editacademicCalForm").hide();
  }
  $("#addAcadCalender").click(function() {
    acadeCalFormToggler();
    $("#createCalenderForm").show();
  })

  // function for loading academic calender
  function loadAcadCal() {
    $.ajax({
      url: 'includes/operation.inc.php?p=ldaccacal',
      dataType: 'html',
      success: function(res) {
        $("#calenderContent").html(res);
      }
    });
  }
  $('#viewacaCal').click(function() {
    acadeCalFormToggler();
    loadAcadCal();
  })

  /**********************************************************
   * meeting calender will be manageed under here belwo
   ************************************************/
  function mtngformtoglr() {
    document.getElementById("createmtngCalenderForm").style = "display:none";
    // document.getElementById("editExamCalForm").style="display:none";
  }
  mtngformtoglr()
  $("#addmtngAcadCalender").click(function() {
    mtngformtoglr();
    $('#createmtngCalenderForm').show();
    $('#createCal_btnall').click(function(event) {
      event.preventdefault();
      $.ajax({
        url: 'includes/operation.inc.php?p=crtmtngcl',
        method: "post",
        data: $('form').serialize(),
        cache: 'false',
        dataType: "html",
        success: function(dat) {
          $('#mcontentArea').html(dat);
        }
      })
    })
  })

  //this for loading the meeting information

  function loadMeeting() {
    $.ajax({
      url: 'includes/operation.inc.php?p=ldmcal',
      dataType: 'html',
      success: function(res) {
        $("#mcontentArea").html(res);
      }
    });
  }
  setInterval(() => {
    loadMeeting()

  }, 1000);
  $('#viewmcal').click(function() {
    mtngformtoglr();
    loadMeeting();
  })
  /*###########################################################################################
  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
  This is admin management area
  */ //////////////////////////////////////////////////////////////////////////////////////////////
  function adminToggler() {
    $('#editMyprofileFrm').hide();
  }
  $("#btn_update_ad").click(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'includes/users.inc.php?p=updateAdmnInfo',
      method: 'post',
      data: $('form').serialize(),
      success: function(dat) {
        adminToggler();
        $("#update_admn").html(dat);
      }
    })
  })

});


/*
Flittering/ live search from the
 */
loadData();

function loadData(query) {
  $.ajax({
    url: "includes/operation.inc.php?p=fetchEmploInfo",
    type: "POST",
    cache: false,
    data: {
      query: query
    },
    success: function(response) {
      $("#result").html(response);
    }
  });
}

// live search data from table without reload/refresh page
$("#search_text").keyup(function() {
  var search = $(this).val();
  if (search != "") {
    loadData(search);
  } else {
    loadData();
  }

  // end of live search

  // to generate the admin password
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

  function generateString(length) {
    let result = ' ';
    const charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
  }






  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work', 11],
      ['Eat', 2],
      ['Commute', 2],
      ['Watch TV', 2],
      ['Sleep', 7]
    ]);

    var options = {
      title: 'My Daily Activities',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }



});
</script>

</body>

</html>