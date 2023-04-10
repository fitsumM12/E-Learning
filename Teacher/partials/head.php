<?php
// include the database connection hereunder
include_once "includes/function.php";
session_start();
if(!$_SESSION['fac_id']){
header("Location:  ../HomePage/index.php");
}
// $_SESSION['fac_email']="fitsummesfin12@gmail.com";
// $_SESSION['password']="1234";
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty</title>
    <meta name="description" content="Ethiopian E learning System">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- table structure -->
    <!-- <link rel="stylesheet" href="includes/style1.css"> -->
    <link rel="stylesheet" href="assets/mystyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="images/logo.jpeg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <script src="js/myjs.js"></script>
    <script src="js/javascript.js"></script>
    <script>
    function selectedOption(form) {
        var index = form.select.selectedIndex;
        // alert("hellow");
        if (form.select.options[index].value != "0") {
            location = form.select.options[index].value;
        }
    }

    function toggle(source) {
        // alert("hellow");
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source) checkboxes[i].checked = source.checked;
        }
    }
    </script>
    <style>
    .custom-menu {
        border: 4px solid white;
        color: black;
        background: white;
        border-radius: 5px;
        padding: 2px;
        font-size: 14px;
    }

    .custom-menu:hover {
        font-size: 16px;

    }

    .manage-student-menu {
        margin: 10px;
    }

    #custom-head {
        background: #f0f0f0;
        border-radius: 5px;
        padding: 10px;

    }

    #calendar {
        width: 700px;
        margin: 0 auto;
    }

    .response {
        height: 60px;
    }

    .success {
        background: #cdf3cd;
        padding: 10px 60px;
        border: #c3e6c3 1px solid;
        display: inline-block;
    }

    table {
        width: 100%;
    }

    @media screen and (min-width:400) and (max-width:600) {

        * {
            background: white;
            color: black;
            width: 100%;
            border: 2px solid blue;

        }
    }

    @media screen and (min-device-width:400) and (max-device-width:600) {

        *,
        table,
        form {
            background: white;
            color: black;
            width: 100%;
            border: 2px solid blue;

        }
    }

    #weatherWidget .currentDesc {
        color: #ffffff !important;
    }

    .traffic-chart {
        min-height: 335px;
    }

    #flotPie1 {
        height: 150px;
    }

    #flotPie1 td {
        padding: 3px;
    }

    #flotPie1 table {
        top: 20px !important;
        right: -10px !important;
    }

    .chart-container {
        display: table;
        min-width: 270px;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #flotLine5 {
        height: 105px;
    }

    #flotBarChart {
        height: 150px;
    }

    #cellPaiChart {
        height: 160px;
    }
    </style>

</head>