
<?php
  require_once 'includes/db.php';
  $dept = $crud->getDepartment();
  $prog = $crud->getProgram();

?>

<head>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html class="supernova">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=https%3A%2F%2Fform.jotform.com%2F202492677612459" title="oEmbed Form">
<link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=https%3A%2F%2Fform.jotform.com%2F202492677612459" title="oEmbed Form">
<meta property="og:title" content="Students Registration Form" >
<meta property="og:url" content="https://form.jotform.com/202492677612459" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="slack-app-id" content="AHNMASS8M">
<link rel="shortcut icon" href="https://cdn.jotfor.ms/favicon.ico">
<link rel="canonical" href="https://form.jotform.com/202492677612459" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
<meta name="HandheldFriendly" content="true" />
<title>Students Registration Form</title>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.20085" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.20085" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.20085" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/54be8f18700cc4e0368b4568.css?themeRevisionID=58dd17c27dc758c1a8575f81"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/payment/payment_feature.css?3.3.20085" />
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:10px;
        padding-bottom:10px;
    }
    .form-label-right{
        width:150px;
    }
    body, html{
        margin:0;
        padding:0;
        background:#A7CCA8;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:700px;
        color:#555 !important;
        font-family:'Coda';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: black;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
  /*PREFERENCES STYLE*/
    .form-all {
      font-family: Coda, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Coda, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Coda, sans-serif;
    }
    .form-header-group {
      font-family: Coda, sans-serif;
    }
    .form-label {
      font-family: Coda, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: inline-block;
    float: left;
    text-align: left;
  
    }
  
    .form-line {
      margin-top: 10px 10px 10px 10px px;
      margin-bottom: 10px 10px 10px 10px px;
    }
  
    .form-all {
      width: 700px;
    }
  
    .form-label-left,
    .form-label-right,
    .form-label-left.form-label-auto,
    .form-label-right.form-label-auto {
      width: 150px;
    }
  
    .form-all {
      font-size: 14px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 14px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 14px
    }
  
    .supernova .form-all, .form-all {
      background-color: #A7CCA8;
      border: 1px solid transparent;
    }
  
    .form-all {
      color: #555;
    }
    .form-header-group .form-header {
      color: #555;
    }
    .form-header-group .form-subHeader {
      color: #555;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: #555;
    }
    .form-sub-label {
      color: #6f6f6f;
    }
  
    .supernova {
      background-color: undefined;
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: undefined;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>

<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/buttons/form-submit-button-cool_grey.css?3.3.20085"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.min.js"></script>
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.20085" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.20085" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":[{"field":"38","visibility":"Hide"}],"link":"Any","terms":[{"field":"59","operator":"equals","value":"MS in Physics"}],"type":"field"},{"action":[{"field":"24","visibility":"Hide"}],"link":"Any","terms":[{"field":"59","operator":"equals","value":"MS in Physics"}],"type":"field"}]);
	JotForm.init(function(){
      setTimeout(function() {
          $('input_10').hint('ex: myname@example.com');
       }, 20);
if (window.JotForm && JotForm.accessible) $('input_11').setAttribute('tabindex',0);
      JotForm.description('input_11', 'Enter 0 if not applicable.');
      JotForm.description('input_44', 'Write your barangay in Street Address Line 2.<br /><br />If planning to live in dorm/boarding house, indicate the address of the dorm/boarding house.');
      JotForm.description('input_45', 'Write your barangay in Street Address Line 2.');
if (window.JotForm && JotForm.accessible) $('input_23').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_62').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_22').setAttribute('tabindex',0);
      JotForm.description('input_64', 'To be used in nomination forms, application forms, etc.');
      JotForm.description('input_16', 'To be used in nomination forms, application forms, etc.');
if (window.JotForm && JotForm.accessible) $('input_38').setAttribute('tabindex',0);
      JotForm.description('input_18', 'Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.');
      JotForm.description('input_61', 'Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.');
if (window.JotForm && JotForm.accessible) $('input_57').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_65').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_27').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_29').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_51').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_55').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_52').setAttribute('tabindex',0);
	JotForm.newDefaultTheme = false;
	JotForm.newPaymentUIForNewCreatedForms = false;
      JotForm.alterTexts({"confirmClearForm":"Are you sure you want to clear the form","lessThan":"Your score should be less than"});
    /*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"clickTo","qid":"1","text":"DLSU Physics Students Registration and Database","type":"control_head"},null,null,{"name":"fullName","qid":"4","text":"Full Name","type":"control_fullname"},null,null,{"name":"clickTo7","qid":"7","text":"Basic Information","type":"control_collapse"},null,null,{"name":"email","qid":"10","text":"E-mail","type":"control_email"},{"description":"Enter 0 if not applicable.","name":"mobileNumber","qid":"11","text":"Mobile Number","type":"control_textbox"},null,null,null,{"name":"birthDate","qid":"15","text":"Birth Date","type":"control_birthdate"},{"description":"To be used in nomination forms, application forms, etc.","name":"idPicture16","qid":"16","subLabel":"File should be in jpg format","text":"ID Picture","type":"control_fileupload"},null,{"description":"Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.","name":"10thCertificate","qid":"18","subLabel":"File should be in pdf, doc\u002Fdocx format.","text":"10th certificate","type":"control_fileupload"},null,null,null,{"name":"addressOf","qid":"22","text":"Address of person to contact in case of emergency","type":"control_textbox"},{"name":"mobileOf","qid":"23","text":"mobile of person to contact in case of emergency","type":"control_textbox"},{"name":"clickTo24","qid":"24","text":"Other Details","type":"control_collapse"},{"name":"skillstalents","qid":"25","text":"Skills\u002FTalents","type":"control_checkbox"},{"name":"extraCurricular","qid":"26","text":"Extra Curricular Participation","type":"control_checkbox"},{"name":"otherSkillstalents","qid":"27","text":"Other Skills\u002Ftalents","type":"control_textbox"},{"name":"sports","qid":"28","text":"Sports","type":"control_checkbox"},{"name":"otherSports","qid":"29","text":"Other Sports","type":"control_textbox"},null,null,{"name":"submit","qid":"32","text":"Submit","type":"control_button"},null,null,{"name":"enterThe","qid":"35","text":"Enter the words shown:","type":"control_captcha"},null,null,{"name":"highSchool","qid":"38","text":"High School Name","type":"control_textbox"},null,null,null,null,null,{"description":"Write your barangay in Street Address Line 2.\n\nIf planning to live in dorm\u002Fboarding house, indicate the address of the dorm\u002Fboarding house.","name":"presentAddress44","qid":"44","text":"Present Address","type":"control_address"},{"description":"Write your barangay in Street Address Line 2.","name":"permanentAddress45","qid":"45","text":"Permanent Address","type":"control_address"},null,null,null,null,{"name":"doYou","qid":"50","text":"Do you have any scholarship?","type":"control_radio"},{"name":"ifYes","qid":"51","text":"If Yes, who\u002Fwhat is the name of your sponsor?","type":"control_textbox"},{"name":"whatCourse52","qid":"52","text":"What course is your first choice in ?","type":"control_textbox"},null,{"name":"doYou54","qid":"54","text":"Do you plan to shift to another course?","type":"control_radio"},{"name":"ifYes55","qid":"55","text":"If Yes, to what course?","type":"control_textbox"},null,{"name":"10thPercentage57","qid":"57","text":"10th percentage","type":"control_textbox"},null,{"name":"degreeProgram","qid":"59","text":"Degree Program","type":"control_dropdown"},{"name":"clickTo60","qid":"60","text":"Academic Background","type":"control_collapse"},{"description":"Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.","name":"12thCertificate","qid":"61","subLabel":"File should be in pdf, doc\u002Fdocx format.","text":"12th certificate","type":"control_fileupload"},{"description":"","name":"emailOf","qid":"62","subLabel":"","text":"Email of person to contact in case of emergency","type":"control_textbox"},{"description":"","name":"maritalStatus","qid":"63","subLabel":"","text":"Marital Status","type":"control_dropdown"},{"description":"To be used in nomination forms, application forms, etc.","name":"residentialCertificate","qid":"64","subLabel":"File should be in pdf format","text":"Residential certificate ","type":"control_fileupload"},{"description":"","name":"12thPercentage","qid":"65","subLabel":"","text":"12th percentage","type":"control_textbox"},null,{"description":"","name":"gender","qid":"67","subLabel":"","text":"Gender","type":"control_dropdown"},{"description":"","name":"course","qid":"68","subLabel":"","text":"Course","type":"control_dropdown"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"clickTo","qid":"1","text":"DLSU Physics Students Registration and Database","type":"control_head"},null,null,{"name":"fullName","qid":"4","text":"Full Name","type":"control_fullname"},null,null,{"name":"clickTo7","qid":"7","text":"Basic Information","type":"control_collapse"},null,null,{"name":"email","qid":"10","text":"E-mail","type":"control_email"},{"description":"Enter 0 if not applicable.","name":"mobileNumber","qid":"11","text":"Mobile Number","type":"control_textbox"},null,null,null,{"name":"birthDate","qid":"15","text":"Birth Date","type":"control_birthdate"},{"description":"To be used in nomination forms, application forms, etc.","name":"idPicture16","qid":"16","subLabel":"File should be in jpg format","text":"ID Picture","type":"control_fileupload"},null,{"description":"Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.","name":"10thCertificate","qid":"18","subLabel":"File should be in pdf, doc\u002Fdocx format.","text":"10th certificate","type":"control_fileupload"},null,null,null,{"name":"addressOf","qid":"22","text":"Address of person to contact in case of emergency","type":"control_textbox"},{"name":"mobileOf","qid":"23","text":"mobile of person to contact in case of emergency","type":"control_textbox"},{"name":"clickTo24","qid":"24","text":"Other Details","type":"control_collapse"},{"name":"skillstalents","qid":"25","text":"Skills\u002FTalents","type":"control_checkbox"},{"name":"extraCurricular","qid":"26","text":"Extra Curricular Participation","type":"control_checkbox"},{"name":"otherSkillstalents","qid":"27","text":"Other Skills\u002Ftalents","type":"control_textbox"},{"name":"sports","qid":"28","text":"Sports","type":"control_checkbox"},{"name":"otherSports","qid":"29","text":"Other Sports","type":"control_textbox"},null,null,{"name":"submit","qid":"32","text":"Submit","type":"control_button"},null,null,{"name":"enterThe","qid":"35","text":"Enter the words shown:","type":"control_captcha"},null,null,{"name":"highSchool","qid":"38","text":"High School Name","type":"control_textbox"},null,null,null,null,null,{"description":"Write your barangay in Street Address Line 2.\n\nIf planning to live in dorm\u002Fboarding house, indicate the address of the dorm\u002Fboarding house.","name":"presentAddress44","qid":"44","text":"Present Address","type":"control_address"},{"description":"Write your barangay in Street Address Line 2.","name":"permanentAddress45","qid":"45","text":"Permanent Address","type":"control_address"},null,null,null,null,{"name":"doYou","qid":"50","text":"Do you have any scholarship?","type":"control_radio"},{"name":"ifYes","qid":"51","text":"If Yes, who\u002Fwhat is the name of your sponsor?","type":"control_textbox"},{"name":"whatCourse52","qid":"52","text":"What course is your first choice in ?","type":"control_textbox"},null,{"name":"doYou54","qid":"54","text":"Do you plan to shift to another course?","type":"control_radio"},{"name":"ifYes55","qid":"55","text":"If Yes, to what course?","type":"control_textbox"},null,{"name":"10thPercentage57","qid":"57","text":"10th percentage","type":"control_textbox"},null,{"name":"degreeProgram","qid":"59","text":"Degree Program","type":"control_dropdown"},{"name":"clickTo60","qid":"60","text":"Academic Background","type":"control_collapse"},{"description":"Include all affiliations, leadership positions, awards received (and award giving body), work experience during your entire high school to college.","name":"12thCertificate","qid":"61","subLabel":"File should be in pdf, doc\u002Fdocx format.","text":"12th certificate","type":"control_fileupload"},{"description":"","name":"emailOf","qid":"62","subLabel":"","text":"Email of person to contact in case of emergency","type":"control_textbox"},{"description":"","name":"maritalStatus","qid":"63","subLabel":"","text":"Marital Status","type":"control_dropdown"},{"description":"To be used in nomination forms, application forms, etc.","name":"residentialCertificate","qid":"64","subLabel":"File should be in pdf format","text":"Residential certificate ","type":"control_fileupload"},{"description":"","name":"12thPercentage","qid":"65","subLabel":"","text":"12th percentage","type":"control_textbox"},null,{"description":"","name":"gender","qid":"67","subLabel":"","text":"Gender","type":"control_dropdown"},{"description":"","name":"course","qid":"68","subLabel":"","text":"Course","type":"control_dropdown"}]);}, 20); 
</script>
</head>
<body>



<form class="jotform-form" action="validate_form.php" method="post" enctype="multipart/form-data" name="form_202492677612459" id="202492677612459" accept-charset="utf-8" autocomplete="on">
  <input type="hidden" name="formID" value="202492677612459" />
  <input type="hidden" id="JWTContainer" value="" />
  <input type="hidden" id="cardinalOrderNumber" value="" />
  <div role="main" class="form-all">
    <ul class="form-section page-section">
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-default">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header" data-component="header">
              E-Learning Registration and Database
            </h2>
            <div id="subHeader_1" class="form-subHeader">
			    	2020
            </div>
          </div>
        </div>
      </li>
      <ul class="form-section" id="section_7">
        <li id="cid_7" class="form-input-wide" data-type="control_collapse">
          <div class="form-collapse-table" id="collapse_7" data-component="collapse">
            <span class="form-collapse-mid" id="collapse-text_7">
              Basic Information
            </span>
            <span class="form-collapse-right form-collapse-right-show">
               
            </span>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_fullname" id="id_4">
          <label class="form-label form-label-left form-label-auto" id="label_4" for="first_4">
            Full Name
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_4" class="form-input jf-required">
            <div data-wrapper-react="true" class="extended">
              <span class="form-sub-label-container " style="vertical-align:top" data-input-type="first">
                <input type="text" id="first_4" name="fname" class="form-textbox validate[required]" size="10" value="" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" />
                <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px" aria-hidden="false"> First Name </label>
              </span>
              <span class="form-sub-label-container " style="vertical-align:top" data-input-type="middle">
                <input type="text" id="middle_4" name="mname" class="form-textbox" size="10" value="" data-component="middle" aria-labelledby="label_4 sublabel_4_middle" required="" />
                <label class="form-sub-label" for="middle_4" id="sublabel_4_middle" style="min-height:13px" aria-hidden="false"> Middle Name </label>
              </span>
              <span class="form-sub-label-container " style="vertical-align:top" data-input-type="last">
                <input type="text" id="last_4" name="lname" class="form-textbox validate[required]" size="15" value="" data-component="last" aria-labelledby="label_4 sublabel_4_last" required="" />
                <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px" aria-hidden="false"> Last Name </label>
              </span>
            </div>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_email" id="id_10">
          <label class="form-label form-label-left form-label-auto" id="label_10" for="input_10">
            E-mail
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_10" class="form-input jf-required">
            <input type="email" id="input_10" name="email" class="form-textbox validate[required, Email]" size="65" value="" maxLength="50" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_10" required="" />
          </div>
        </li>
        <li class="form-line form-line-column form-col-1 jf-required" data-type="control_textbox" id="id_11">
          <label class="form-label form-label-top" id="label_11" for="input_11">
            Mobile Number
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_11" class="form-input-wide jf-required">
            <input type="text" id="input_11" name="mobile" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="50" value="" maxLength="15" placeholder=" " data-component="textbox" aria-labelledby="label_11" required="" />
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_birthdate" id="id_15">
          <label class="form-label form-label-left form-label-auto" id="label_15" for="input_15">
            Birth Date
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_15" class="form-input jf-required">
            <div data-wrapper-react="true">
              <span class="form-sub-label-container " style="vertical-align:top">
                <select name="month" id="input_15_month" class="form-dropdown validate[required]" data-component="birthdate-month" aria-labelledby="label_15 sublabel_15_month">
                  <option>  </option>
                  <option value="1"> January </option>
                  <option value="2"> February </option>
                  <option value="3"> March </option>
                  <option value="4"> April </option>
                  <option value="5"> May </option>
                  <option value="6"> June </option>
                  <option value="7"> July </option>
                  <option value="8"> August </option>
                  <option value="9"> September </option>
                  <option value="10"> October </option>
                  <option value="11"> November </option>
                  <option value="12"> December </option>
                </select>
                <label class="form-sub-label" for="input_15_month" id="sublabel_15_month" style="min-height:13px" aria-hidden="false"> Month </label>
              </span>
              <span class="form-sub-label-container " style="vertical-align:top">
                <select name="date" id="input_15_day" class="form-dropdown validate[required]" data-component="birthdate-day" aria-labelledby="label_15 sublabel_15_day">
                  <option>  </option>
                  <option value="1"> 1 </option>
                  <option value="2"> 2 </option>
                  <option value="3"> 3 </option>
                  <option value="4"> 4 </option>
                  <option value="5"> 5 </option>
                  <option value="6"> 6 </option>
                  <option value="7"> 7 </option>
                  <option value="8"> 8 </option>
                  <option value="9"> 9 </option>
                  <option value="10"> 10 </option>
                  <option value="11"> 11 </option>
                  <option value="12"> 12 </option>
                  <option value="13"> 13 </option>
                  <option value="14"> 14 </option>
                  <option value="15"> 15 </option>
                  <option value="16"> 16 </option>
                  <option value="17"> 17 </option>
                  <option value="18"> 18 </option>
                  <option value="19"> 19 </option>
                  <option value="20"> 20 </option>
                  <option value="21"> 21 </option>
                  <option value="22"> 22 </option>
                  <option value="23"> 23 </option>
                  <option value="24"> 24 </option>
                  <option value="25"> 25 </option>
                  <option value="26"> 26 </option>
                  <option value="27"> 27 </option>
                  <option value="28"> 28 </option>
                  <option value="29"> 29 </option>
                  <option value="30"> 30 </option>
                  <option value="31"> 31 </option>
                </select>
                <label class="form-sub-label" for="input_15_day" id="sublabel_15_day" style="min-height:13px" aria-hidden="false"> Day </label>
              </span>
              <span class="form-sub-label-container " style="vertical-align:top">
                <select name="year" id="input_15_year" class="form-dropdown validate[required]" data-component="birthdate-year" aria-labelledby="label_15 sublabel_15_year">
                  <option>  </option>
                  <option value="2020"> 2020 </option>
                  <option value="2019"> 2019 </option>
                  <option value="2018"> 2018 </option>
                  <option value="2017"> 2017 </option>
                  <option value="2016"> 2016 </option>
                  <option value="2015"> 2015 </option>
                  <option value="2014"> 2014 </option>
                  <option value="2013"> 2013 </option>
                  <option value="2012"> 2012 </option>
                  <option value="2011"> 2011 </option>
                  <option value="2010"> 2010 </option>
                  <option value="2009"> 2009 </option>
                  <option value="2008"> 2008 </option>
                  <option value="2007"> 2007 </option>
                  <option value="2006"> 2006 </option>
                  <option value="2005"> 2005 </option>
                  <option value="2004"> 2004 </option>
                  <option value="2003"> 2003 </option>
                  <option value="2002"> 2002 </option>
                  <option value="2001"> 2001 </option>
                  <option value="2000"> 2000 </option>
                  <option value="1999"> 1999 </option>
                  <option value="1998"> 1998 </option>
                  <option value="1997"> 1997 </option>
                  <option value="1996"> 1996 </option>
                  <option value="1995"> 1995 </option>
                  <option value="1994"> 1994 </option>
                  <option value="1993"> 1993 </option>
                  <option value="1992"> 1992 </option>
                  <option value="1991"> 1991 </option>
                  <option value="1990"> 1990 </option>
                  <option value="1989"> 1989 </option>
                  <option value="1988"> 1988 </option>
                  <option value="1987"> 1987 </option>
                  <option value="1986"> 1986 </option>
                  <option value="1985"> 1985 </option>
                  <option value="1984"> 1984 </option>
                  <option value="1983"> 1983 </option>
                  <option value="1982"> 1982 </option>
                  <option value="1981"> 1981 </option>
                  <option value="1980"> 1980 </option>
                  <option value="1979"> 1979 </option>
                  <option value="1978"> 1978 </option>
                  <option value="1977"> 1977 </option>
                  <option value="1976"> 1976 </option>
                  <option value="1975"> 1975 </option>
                  <option value="1974"> 1974 </option>
                  <option value="1973"> 1973 </option>
                  <option value="1972"> 1972 </option>
                  <option value="1971"> 1971 </option>
                  <option value="1970"> 1970 </option>
                  <option value="1969"> 1969 </option>
                  <option value="1968"> 1968 </option>
                  <option value="1967"> 1967 </option>
                  <option value="1966"> 1966 </option>
                  <option value="1965"> 1965 </option>
                  <option value="1964"> 1964 </option>
                  <option value="1963"> 1963 </option>
                  <option value="1962"> 1962 </option>
                  <option value="1961"> 1961 </option>
                  <option value="1960"> 1960 </option>
                  <option value="1959"> 1959 </option>
                  <option value="1958"> 1958 </option>
                  <option value="1957"> 1957 </option>
                  <option value="1956"> 1956 </option>
                  <option value="1955"> 1955 </option>
                  <option value="1954"> 1954 </option>
                  <option value="1953"> 1953 </option>
                  <option value="1952"> 1952 </option>
                  <option value="1951"> 1951 </option>
                  <option value="1950"> 1950 </option>
                  <option value="1949"> 1949 </option>
                  <option value="1948"> 1948 </option>
                  <option value="1947"> 1947 </option>
                  <option value="1946"> 1946 </option>
                  <option value="1945"> 1945 </option>
                  <option value="1944"> 1944 </option>
                  <option value="1943"> 1943 </option>
                  <option value="1942"> 1942 </option>
                  <option value="1941"> 1941 </option>
                  <option value="1940"> 1940 </option>
                  <option value="1939"> 1939 </option>
                  <option value="1938"> 1938 </option>
                  <option value="1937"> 1937 </option>
                  <option value="1936"> 1936 </option>
                  <option value="1935"> 1935 </option>
                  <option value="1934"> 1934 </option>
                  <option value="1933"> 1933 </option>
                  <option value="1932"> 1932 </option>
                  <option value="1931"> 1931 </option>
                  <option value="1930"> 1930 </option>
                  <option value="1929"> 1929 </option>
                  <option value="1928"> 1928 </option>
                  <option value="1927"> 1927 </option>
                  <option value="1926"> 1926 </option>
                  <option value="1925"> 1925 </option>
                  <option value="1924"> 1924 </option>
                  <option value="1923"> 1923 </option>
                  <option value="1922"> 1922 </option>
                  <option value="1921"> 1921 </option>
                  <option value="1920"> 1920 </option>
                </select>
                <label class="form-sub-label" for="input_15_year" id="sublabel_15_year" style="min-height:13px" aria-hidden="false"> Year </label>
              </span>
            </div>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_dropdown" id="id_67">
          <label class="form-label form-label-left form-label-auto" id="label_67" for="input_67">
            Gender
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_67" class="form-input jf-required">
            <select class="form-dropdown validate[required]" id="input_67" name="gender" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_67">
              <option value="">  </option>
              <option value="Male"> Male </option>
              <option value="Female"> Female </option>
            </select>
          </div>
        </li>
        <li class="form-line" data-type="control_dropdown" id="id_59">
          <label class="form-label form-label-left form-label-auto" id="label_59" for="input_59"> Degree Program </label>
          <div id="cid_59" class="form-input">
            <select class="form-dropdown" id="input_59" name="program" style="width:150px" data-component="dropdown" aria-labelledby="label_59">
              <option value="">  </option>

              <?php while( $row=$prog->fetch(PDO::FETCH_ASSOC) ){?>
                  <option value="<?php echo $row['prg_id'] ?>" required><?php echo $row['prg_name']?></option>
               <?php } ?>
            </select>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_dropdown" id="id_68">
          <label class="form-label form-label-left form-label-auto" id="label_68" for="input_68">
            Course
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_68" class="form-input jf-required">
            <select class="form-dropdown validate[required]" id="dept" name="dept" style="width:300px" data-component="dropdown" required="" aria-labelledby="label_68">
              <option value="">  </option>

              <?php while( $row=$dept->fetch(PDO::FETCH_ASSOC) ){?>
                  <option value="<?php echo $row['dpt_id'] ?>" required><?php echo $row['dpt_name']?></option>
               <?php } ?>

            </select>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_address" id="id_44">
          <label class="form-label form-label-left form-label-auto" id="label_44" for="input_44_addr_line1">
            Current Address
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_44" class="form-input jf-required">
            <div summary="" class="form-address-table jsTest-addressField">
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_44_addr_line1" name="c_street1" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" aria-labelledby="label_44 sublabel_44_addr_line1" />
                    <label class="form-sub-label" for="input_44_addr_line1" id="sublabel_44_addr_line1" style="min-height:13px" aria-hidden="false"> Street Address </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_44_addr_line2" name="c_street2" class="form-textbox form-address-line" value="" data-component="address_line_2" aria-labelledby="label_44 sublabel_44_addr_line2" />
                    <label class="form-sub-label" for="input_44_addr_line2" id="sublabel_44_addr_line2" style="min-height:13px" aria-hidden="false"> Street Address Line 2 </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_44_city" name="c_city" class="form-textbox validate[required] form-address-city" value="" data-component="city" aria-labelledby="label_44 sublabel_44_city" />
                    <label class="form-sub-label" for="input_44_city" id="sublabel_44_city" style="min-height:13px" aria-hidden="false"> City </label>
                  </span>
                </span>
                <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_44_state" name="c_state" class="form-textbox validate[required] form-address-state" value="" data-component="state" aria-labelledby="label_44 sublabel_44_state" />
                    <label class="form-sub-label" for="input_44_state" id="sublabel_44_state" style="min-height:13px" aria-hidden="false"> State / Province </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_44_postal" name="c_zipcode" class="form-textbox form-address-postal" value="" data-component="zip" aria-labelledby="label_44 sublabel_44_postal" />
                    <label class="form-sub-label" for="input_44_postal" id="sublabel_44_postal" style="min-height:13px" aria-hidden="false"> Postal / Zip Code </label>
                  </span>
                </span>
                <span class="form-address-line form-address-country-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <select class="form-dropdown validate[required] form-address-country noTranslate" name="c_country" id="input_44_country" data-component="country" required="" aria-labelledby="label_44 sublabel_44_country">
                      <option value=""> Please Select </option>
                      <option value="United States"> United States </option>
                      <option value="Afghanistan"> Afghanistan </option>
                      <option value="Albania"> Albania </option>
                      <option value="Algeria"> Algeria </option>
                      <option value="American Samoa"> American Samoa </option>
                      <option value="Andorra"> Andorra </option>
                      <option value="Angola"> Angola </option>
                      <option value="Anguilla"> Anguilla </option>
                      <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                      <option value="Argentina"> Argentina </option>
                      <option value="Armenia"> Armenia </option>
                      <option value="Aruba"> Aruba </option>
                      <option value="Australia"> Australia </option>
                      <option value="Austria"> Austria </option>
                      <option value="Azerbaijan"> Azerbaijan </option>
                      <option value="The Bahamas"> The Bahamas </option>
                      <option value="Bahrain"> Bahrain </option>
                      <option value="Bangladesh"> Bangladesh </option>
                      <option value="Barbados"> Barbados </option>
                      <option value="Belarus"> Belarus </option>
                      <option value="Belgium"> Belgium </option>
                      <option value="Belize"> Belize </option>
                      <option value="Benin"> Benin </option>
                      <option value="Bermuda"> Bermuda </option>
                      <option value="Bhutan"> Bhutan </option>
                      <option value="Bolivia"> Bolivia </option>
                      <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                      <option value="Botswana"> Botswana </option>
                      <option value="Brazil"> Brazil </option>
                      <option value="Brunei"> Brunei </option>
                      <option value="Bulgaria"> Bulgaria </option>
                      <option value="Burkina Faso"> Burkina Faso </option>
                      <option value="Burundi"> Burundi </option>
                      <option value="Cambodia"> Cambodia </option>
                      <option value="Cameroon"> Cameroon </option>
                      <option value="Canada"> Canada </option>
                      <option value="Cape Verde"> Cape Verde </option>
                      <option value="Cayman Islands"> Cayman Islands </option>
                      <option value="Central African Republic"> Central African Republic </option>
                      <option value="Chad"> Chad </option>
                      <option value="Chile"> Chile </option>
                      <option value="China"> China </option>
                      <option value="Christmas Island"> Christmas Island </option>
                      <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                      <option value="Colombia"> Colombia </option>
                      <option value="Comoros"> Comoros </option>
                      <option value="Congo"> Congo </option>
                      <option value="Cook Islands"> Cook Islands </option>
                      <option value="Costa Rica"> Costa Rica </option>
                      <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
                      <option value="Croatia"> Croatia </option>
                      <option value="Cuba"> Cuba </option>
                      <option value="Curacao"> Curacao </option>
                      <option value="Cyprus"> Cyprus </option>
                      <option value="Czech Republic"> Czech Republic </option>
                      <option value="Democratic Republic of the Congo"> Democratic Republic of the Congo </option>
                      <option value="Denmark"> Denmark </option>
                      <option value="Djibouti"> Djibouti </option>
                      <option value="Dominica"> Dominica </option>
                      <option value="Dominican Republic"> Dominican Republic </option>
                      <option value="Ecuador"> Ecuador </option>
                      <option value="Egypt"> Egypt </option>
                      <option value="El Salvador"> El Salvador </option>
                      <option value="Equatorial Guinea"> Equatorial Guinea </option>
                      <option value="Eritrea"> Eritrea </option>
                      <option value="Estonia"> Estonia </option>
                      <option value="Ethiopia"> Ethiopia </option>
                      <option value="Falkland Islands"> Falkland Islands </option>
                      <option value="Faroe Islands"> Faroe Islands </option>
                      <option value="Fiji"> Fiji </option>
                      <option value="Finland"> Finland </option>
                      <option value="France"> France </option>
                      <option value="French Polynesia"> French Polynesia </option>
                      <option value="Gabon"> Gabon </option>
                      <option value="The Gambia"> The Gambia </option>
                      <option value="Georgia"> Georgia </option>
                      <option value="Germany"> Germany </option>
                      <option value="Ghana"> Ghana </option>
                      <option value="Gibraltar"> Gibraltar </option>
                      <option value="Greece"> Greece </option>
                      <option value="Greenland"> Greenland </option>
                      <option value="Grenada"> Grenada </option>
                      <option value="Guadeloupe"> Guadeloupe </option>
                      <option value="Guam"> Guam </option>
                      <option value="Guatemala"> Guatemala </option>
                      <option value="Guernsey"> Guernsey </option>
                      <option value="Guinea"> Guinea </option>
                      <option value="Guinea-Bissau"> Guinea-Bissau </option>
                      <option value="Guyana"> Guyana </option>
                      <option value="Haiti"> Haiti </option>
                      <option value="Honduras"> Honduras </option>
                      <option value="Hong Kong"> Hong Kong </option>
                      <option value="Hungary"> Hungary </option>
                      <option value="Iceland"> Iceland </option>
                      <option value="India"> India </option>
                      <option value="Indonesia"> Indonesia </option>
                      <option value="Iran"> Iran </option>
                      <option value="Iraq"> Iraq </option>
                      <option value="Ireland"> Ireland </option>
                      <option value="Israel"> Israel </option>
                      <option value="Italy"> Italy </option>
                      <option value="Jamaica"> Jamaica </option>
                      <option value="Japan"> Japan </option>
                      <option value="Jersey"> Jersey </option>
                      <option value="Jordan"> Jordan </option>
                      <option value="Kazakhstan"> Kazakhstan </option>
                      <option value="Kenya"> Kenya </option>
                      <option value="Kiribati"> Kiribati </option>
                      <option value="North Korea"> North Korea </option>
                      <option value="South Korea"> South Korea </option>
                      <option value="Kosovo"> Kosovo </option>
                      <option value="Kuwait"> Kuwait </option>
                      <option value="Kyrgyzstan"> Kyrgyzstan </option>
                      <option value="Laos"> Laos </option>
                      <option value="Latvia"> Latvia </option>
                      <option value="Lebanon"> Lebanon </option>
                      <option value="Lesotho"> Lesotho </option>
                      <option value="Liberia"> Liberia </option>
                      <option value="Libya"> Libya </option>
                      <option value="Liechtenstein"> Liechtenstein </option>
                      <option value="Lithuania"> Lithuania </option>
                      <option value="Luxembourg"> Luxembourg </option>
                      <option value="Macau"> Macau </option>
                      <option value="Macedonia"> Macedonia </option>
                      <option value="Madagascar"> Madagascar </option>
                      <option value="Malawi"> Malawi </option>
                      <option value="Malaysia"> Malaysia </option>
                      <option value="Maldives"> Maldives </option>
                      <option value="Mali"> Mali </option>
                      <option value="Malta"> Malta </option>
                      <option value="Marshall Islands"> Marshall Islands </option>
                      <option value="Martinique"> Martinique </option>
                      <option value="Mauritania"> Mauritania </option>
                      <option value="Mauritius"> Mauritius </option>
                      <option value="Mayotte"> Mayotte </option>
                      <option value="Mexico"> Mexico </option>
                      <option value="Micronesia"> Micronesia </option>
                      <option value="Moldova"> Moldova </option>
                      <option value="Monaco"> Monaco </option>
                      <option value="Mongolia"> Mongolia </option>
                      <option value="Montenegro"> Montenegro </option>
                      <option value="Montserrat"> Montserrat </option>
                      <option value="Morocco"> Morocco </option>
                      <option value="Mozambique"> Mozambique </option>
                      <option value="Myanmar"> Myanmar </option>
                      <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                      <option value="Namibia"> Namibia </option>
                      <option value="Nauru"> Nauru </option>
                      <option value="Nepal"> Nepal </option>
                      <option value="Netherlands"> Netherlands </option>
                      <option value="Netherlands Antilles"> Netherlands Antilles </option>
                      <option value="New Caledonia"> New Caledonia </option>
                      <option value="New Zealand"> New Zealand </option>
                      <option value="Nicaragua"> Nicaragua </option>
                      <option value="Niger"> Niger </option>
                      <option value="Nigeria"> Nigeria </option>
                      <option value="Niue"> Niue </option>
                      <option value="Norfolk Island"> Norfolk Island </option>
                      <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                      <option value="Northern Mariana"> Northern Mariana </option>
                      <option value="Norway"> Norway </option>
                      <option value="Oman"> Oman </option>
                      <option value="Pakistan"> Pakistan </option>
                      <option value="Palau"> Palau </option>
                      <option value="Palestine"> Palestine </option>
                      <option value="Panama"> Panama </option>
                      <option value="Papua New Guinea"> Papua New Guinea </option>
                      <option value="Paraguay"> Paraguay </option>
                      <option value="Peru"> Peru </option>
                      <option selected="" value="Philippines"> Philippines </option>
                      <option value="Pitcairn Islands"> Pitcairn Islands </option>
                      <option value="Poland"> Poland </option>
                      <option value="Portugal"> Portugal </option>
                      <option value="Puerto Rico"> Puerto Rico </option>
                      <option value="Qatar"> Qatar </option>
                      <option value="Republic of the Congo"> Republic of the Congo </option>
                      <option value="Romania"> Romania </option>
                      <option value="Russia"> Russia </option>
                      <option value="Rwanda"> Rwanda </option>
                      <option value="Saint Barthelemy"> Saint Barthelemy </option>
                      <option value="Saint Helena"> Saint Helena </option>
                      <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                      <option value="Saint Lucia"> Saint Lucia </option>
                      <option value="Saint Martin"> Saint Martin </option>
                      <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                      <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                      <option value="Samoa"> Samoa </option>
                      <option value="San Marino"> San Marino </option>
                      <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                      <option value="Saudi Arabia"> Saudi Arabia </option>
                      <option value="Senegal"> Senegal </option>
                      <option value="Serbia"> Serbia </option>
                      <option value="Seychelles"> Seychelles </option>
                      <option value="Sierra Leone"> Sierra Leone </option>
                      <option value="Singapore"> Singapore </option>
                      <option value="Slovakia"> Slovakia </option>
                      <option value="Slovenia"> Slovenia </option>
                      <option value="Solomon Islands"> Solomon Islands </option>
                      <option value="Somalia"> Somalia </option>
                      <option value="Somaliland"> Somaliland </option>
                      <option value="South Africa"> South Africa </option>
                      <option value="South Ossetia"> South Ossetia </option>
                      <option value="South Sudan"> South Sudan </option>
                      <option value="Spain"> Spain </option>
                      <option value="Sri Lanka"> Sri Lanka </option>
                      <option value="Sudan"> Sudan </option>
                      <option value="Suriname"> Suriname </option>
                      <option value="Svalbard"> Svalbard </option>
                      <option value="eSwatini"> eSwatini </option>
                      <option value="Sweden"> Sweden </option>
                      <option value="Switzerland"> Switzerland </option>
                      <option value="Syria"> Syria </option>
                      <option value="Taiwan"> Taiwan </option>
                      <option value="Tajikistan"> Tajikistan </option>
                      <option value="Tanzania"> Tanzania </option>
                      <option value="Thailand"> Thailand </option>
                      <option value="Timor-Leste"> Timor-Leste </option>
                      <option value="Togo"> Togo </option>
                      <option value="Tokelau"> Tokelau </option>
                      <option value="Tonga"> Tonga </option>
                      <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                      <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                      <option value="Tristan da Cunha"> Tristan da Cunha </option>
                      <option value="Tunisia"> Tunisia </option>
                      <option value="Turkey"> Turkey </option>
                      <option value="Turkmenistan"> Turkmenistan </option>
                      <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                      <option value="Tuvalu"> Tuvalu </option>
                      <option value="Uganda"> Uganda </option>
                      <option value="Ukraine"> Ukraine </option>
                      <option value="United Arab Emirates"> United Arab Emirates </option>
                      <option value="United Kingdom"> United Kingdom </option>
                      <option value="Uruguay"> Uruguay </option>
                      <option value="Uzbekistan"> Uzbekistan </option>
                      <option value="Vanuatu"> Vanuatu </option>
                      <option value="Vatican City"> Vatican City </option>
                      <option value="Venezuela"> Venezuela </option>
                      <option value="Vietnam"> Vietnam </option>
                      <option value="British Virgin Islands"> British Virgin Islands </option>
                      <option value="Isle of Man"> Isle of Man </option>
                      <option value="US Virgin Islands"> US Virgin Islands </option>
                      <option value="Wallis and Futuna"> Wallis and Futuna </option>
                      <option value="Western Sahara"> Western Sahara </option>
                      <option value="Yemen"> Yemen </option>
                      <option value="Zambia"> Zambia </option>
                      <option value="Zimbabwe"> Zimbabwe </option>
                      <option value="other"> Other </option>
                    </select>
                    <label class="form-sub-label" for="input_44_country" id="sublabel_44_country" style="min-height:13px" aria-hidden="false"> Country </label>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_address" id="id_45">
          <label class="form-label form-label-left form-label-auto" id="label_45" for="input_45_addr_line1">
            Permanent Address
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_45" class="form-input jf-required">
            <div summary="" class="form-address-table jsTest-addressField">
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_45_addr_line1" name="p_street1" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" aria-labelledby="label_45 sublabel_45_addr_line1" />
                    <label class="form-sub-label" for="input_45_addr_line1" id="sublabel_45_addr_line1" style="min-height:13px" aria-hidden="false"> Street Address </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_45_addr_line2" name="p_street2" class="form-textbox form-address-line" value="" data-component="address_line_2" aria-labelledby="label_45 sublabel_45_addr_line2" />
                    <label class="form-sub-label" for="input_45_addr_line2" id="sublabel_45_addr_line2" style="min-height:13px" aria-hidden="false"> Street Address Line 2 </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_45_city" name="p_city" class="form-textbox validate[required] form-address-city" value="" data-component="city" aria-labelledby="label_45 sublabel_45_city" />
                    <label class="form-sub-label" for="input_45_city" id="sublabel_45_city" style="min-height:13px" aria-hidden="false"> City </label>
                  </span>
                </span>
                <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_45_state" name="p_state" class="form-textbox validate[required] form-address-state" value="" data-component="state" aria-labelledby="label_45 sublabel_45_state" />
                    <label class="form-sub-label" for="input_45_state" id="sublabel_45_state" style="min-height:13px" aria-hidden="false"> State / Province </label>
                  </span>
                </span>
              </div>
              <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <input type="text" id="input_45_postal" name="p_zipcode" class="form-textbox form-address-postal" value="" data-component="zip" aria-labelledby="label_45 sublabel_45_postal" />
                    <label class="form-sub-label" for="input_45_postal" id="sublabel_45_postal" style="min-height:13px" aria-hidden="false"> Postal / Zip Code </label>
                  </span>
                </span>
                <span class="form-address-line form-address-country-line jsTest-address-lineField ">
                  <span class="form-sub-label-container " style="vertical-align:top">
                    <select class="form-dropdown validate[required] form-address-country noTranslate" name="p_country" id="input_45_country" data-component="country" required="" aria-labelledby="label_45 sublabel_45_country">
                      <option value=""> Please Select </option>
                      <option value="United States"> United States </option>
                      <option value="Afghanistan"> Afghanistan </option>
                      <option value="Albania"> Albania </option>
                      <option value="Algeria"> Algeria </option>
                      <option value="American Samoa"> American Samoa </option>
                      <option value="Andorra"> Andorra </option>
                      <option value="Angola"> Angola </option>
                      <option value="Anguilla"> Anguilla </option>
                      <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                      <option value="Argentina"> Argentina </option>
                      <option value="Armenia"> Armenia </option>
                      <option value="Aruba"> Aruba </option>
                      <option value="Australia"> Australia </option>
                      <option value="Austria"> Austria </option>
                      <option value="Azerbaijan"> Azerbaijan </option>
                      <option value="The Bahamas"> The Bahamas </option>
                      <option value="Bahrain"> Bahrain </option>
                      <option value="Bangladesh"> Bangladesh </option>
                      <option value="Barbados"> Barbados </option>
                      <option value="Belarus"> Belarus </option>
                      <option value="Belgium"> Belgium </option>
                      <option value="Belize"> Belize </option>
                      <option value="Benin"> Benin </option>
                      <option value="Bermuda"> Bermuda </option>
                      <option value="Bhutan"> Bhutan </option>
                      <option value="Bolivia"> Bolivia </option>
                      <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                      <option value="Botswana"> Botswana </option>
                      <option value="Brazil"> Brazil </option>
                      <option value="Brunei"> Brunei </option>
                      <option value="Bulgaria"> Bulgaria </option>
                      <option value="Burkina Faso"> Burkina Faso </option>
                      <option value="Burundi"> Burundi </option>
                      <option value="Cambodia"> Cambodia </option>
                      <option value="Cameroon"> Cameroon </option>
                      <option value="Canada"> Canada </option>
                      <option value="Cape Verde"> Cape Verde </option>
                      <option value="Cayman Islands"> Cayman Islands </option>
                      <option value="Central African Republic"> Central African Republic </option>
                      <option value="Chad"> Chad </option>
                      <option value="Chile"> Chile </option>
                      <option value="China"> China </option>
                      <option value="Christmas Island"> Christmas Island </option>
                      <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                      <option value="Colombia"> Colombia </option>
                      <option value="Comoros"> Comoros </option>
                      <option value="Congo"> Congo </option>
                      <option value="Cook Islands"> Cook Islands </option>
                      <option value="Costa Rica"> Costa Rica </option>
                      <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
                      <option value="Croatia"> Croatia </option>
                      <option value="Cuba"> Cuba </option>
                      <option value="Curacao"> Curacao </option>
                      <option value="Cyprus"> Cyprus </option>
                      <option value="Czech Republic"> Czech Republic </option>
                      <option value="Democratic Republic of the Congo"> Democratic Republic of the Congo </option>
                      <option value="Denmark"> Denmark </option>
                      <option value="Djibouti"> Djibouti </option>
                      <option value="Dominica"> Dominica </option>
                      <option value="Dominican Republic"> Dominican Republic </option>
                      <option value="Ecuador"> Ecuador </option>
                      <option value="Egypt"> Egypt </option>
                      <option value="El Salvador"> El Salvador </option>
                      <option value="Equatorial Guinea"> Equatorial Guinea </option>
                      <option value="Eritrea"> Eritrea </option>
                      <option value="Estonia"> Estonia </option>
                      <option value="Ethiopia"> Ethiopia </option>
                      <option value="Falkland Islands"> Falkland Islands </option>
                      <option value="Faroe Islands"> Faroe Islands </option>
                      <option value="Fiji"> Fiji </option>
                      <option value="Finland"> Finland </option>
                      <option value="France"> France </option>
                      <option value="French Polynesia"> French Polynesia </option>
                      <option value="Gabon"> Gabon </option>
                      <option value="The Gambia"> The Gambia </option>
                      <option value="Georgia"> Georgia </option>
                      <option value="Germany"> Germany </option>
                      <option value="Ghana"> Ghana </option>
                      <option value="Gibraltar"> Gibraltar </option>
                      <option value="Greece"> Greece </option>
                      <option value="Greenland"> Greenland </option>
                      <option value="Grenada"> Grenada </option>
                      <option value="Guadeloupe"> Guadeloupe </option>
                      <option value="Guam"> Guam </option>
                      <option value="Guatemala"> Guatemala </option>
                      <option value="Guernsey"> Guernsey </option>
                      <option value="Guinea"> Guinea </option>
                      <option value="Guinea-Bissau"> Guinea-Bissau </option>
                      <option value="Guyana"> Guyana </option>
                      <option value="Haiti"> Haiti </option>
                      <option value="Honduras"> Honduras </option>
                      <option value="Hong Kong"> Hong Kong </option>
                      <option value="Hungary"> Hungary </option>
                      <option value="Iceland"> Iceland </option>
                      <option value="India"> India </option>
                      <option value="Indonesia"> Indonesia </option>
                      <option value="Iran"> Iran </option>
                      <option value="Iraq"> Iraq </option>
                      <option value="Ireland"> Ireland </option>
                      <option value="Israel"> Israel </option>
                      <option value="Italy"> Italy </option>
                      <option value="Jamaica"> Jamaica </option>
                      <option value="Japan"> Japan </option>
                      <option value="Jersey"> Jersey </option>
                      <option value="Jordan"> Jordan </option>
                      <option value="Kazakhstan"> Kazakhstan </option>
                      <option value="Kenya"> Kenya </option>
                      <option value="Kiribati"> Kiribati </option>
                      <option value="North Korea"> North Korea </option>
                      <option value="South Korea"> South Korea </option>
                      <option value="Kosovo"> Kosovo </option>
                      <option value="Kuwait"> Kuwait </option>
                      <option value="Kyrgyzstan"> Kyrgyzstan </option>
                      <option value="Laos"> Laos </option>
                      <option value="Latvia"> Latvia </option>
                      <option value="Lebanon"> Lebanon </option>
                      <option value="Lesotho"> Lesotho </option>
                      <option value="Liberia"> Liberia </option>
                      <option value="Libya"> Libya </option>
                      <option value="Liechtenstein"> Liechtenstein </option>
                      <option value="Lithuania"> Lithuania </option>
                      <option value="Luxembourg"> Luxembourg </option>
                      <option value="Macau"> Macau </option>
                      <option value="Macedonia"> Macedonia </option>
                      <option value="Madagascar"> Madagascar </option>
                      <option value="Malawi"> Malawi </option>
                      <option value="Malaysia"> Malaysia </option>
                      <option value="Maldives"> Maldives </option>
                      <option value="Mali"> Mali </option>
                      <option value="Malta"> Malta </option>
                      <option value="Marshall Islands"> Marshall Islands </option>
                      <option value="Martinique"> Martinique </option>
                      <option value="Mauritania"> Mauritania </option>
                      <option value="Mauritius"> Mauritius </option>
                      <option value="Mayotte"> Mayotte </option>
                      <option value="Mexico"> Mexico </option>
                      <option value="Micronesia"> Micronesia </option>
                      <option value="Moldova"> Moldova </option>
                      <option value="Monaco"> Monaco </option>
                      <option value="Mongolia"> Mongolia </option>
                      <option value="Montenegro"> Montenegro </option>
                      <option value="Montserrat"> Montserrat </option>
                      <option value="Morocco"> Morocco </option>
                      <option value="Mozambique"> Mozambique </option>
                      <option value="Myanmar"> Myanmar </option>
                      <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                      <option value="Namibia"> Namibia </option>
                      <option value="Nauru"> Nauru </option>
                      <option value="Nepal"> Nepal </option>
                      <option value="Netherlands"> Netherlands </option>
                      <option value="Netherlands Antilles"> Netherlands Antilles </option>
                      <option value="New Caledonia"> New Caledonia </option>
                      <option value="New Zealand"> New Zealand </option>
                      <option value="Nicaragua"> Nicaragua </option>
                      <option value="Niger"> Niger </option>
                      <option value="Nigeria"> Nigeria </option>
                      <option value="Niue"> Niue </option>
                      <option value="Norfolk Island"> Norfolk Island </option>
                      <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                      <option value="Northern Mariana"> Northern Mariana </option>
                      <option value="Norway"> Norway </option>
                      <option value="Oman"> Oman </option>
                      <option value="Pakistan"> Pakistan </option>
                      <option value="Palau"> Palau </option>
                      <option value="Palestine"> Palestine </option>
                      <option value="Panama"> Panama </option>
                      <option value="Papua New Guinea"> Papua New Guinea </option>
                      <option value="Paraguay"> Paraguay </option>
                      <option value="Peru"> Peru </option>
                      <option selected="" value="Philippines"> Philippines </option>
                      <option value="Pitcairn Islands"> Pitcairn Islands </option>
                      <option value="Poland"> Poland </option>
                      <option value="Portugal"> Portugal </option>
                      <option value="Puerto Rico"> Puerto Rico </option>
                      <option value="Qatar"> Qatar </option>
                      <option value="Republic of the Congo"> Republic of the Congo </option>
                      <option value="Romania"> Romania </option>
                      <option value="Russia"> Russia </option>
                      <option value="Rwanda"> Rwanda </option>
                      <option value="Saint Barthelemy"> Saint Barthelemy </option>
                      <option value="Saint Helena"> Saint Helena </option>
                      <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                      <option value="Saint Lucia"> Saint Lucia </option>
                      <option value="Saint Martin"> Saint Martin </option>
                      <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                      <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                      <option value="Samoa"> Samoa </option>
                      <option value="San Marino"> San Marino </option>
                      <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                      <option value="Saudi Arabia"> Saudi Arabia </option>
                      <option value="Senegal"> Senegal </option>
                      <option value="Serbia"> Serbia </option>
                      <option value="Seychelles"> Seychelles </option>
                      <option value="Sierra Leone"> Sierra Leone </option>
                      <option value="Singapore"> Singapore </option>
                      <option value="Slovakia"> Slovakia </option>
                      <option value="Slovenia"> Slovenia </option>
                      <option value="Solomon Islands"> Solomon Islands </option>
                      <option value="Somalia"> Somalia </option>
                      <option value="Somaliland"> Somaliland </option>
                      <option value="South Africa"> South Africa </option>
                      <option value="South Ossetia"> South Ossetia </option>
                      <option value="South Sudan"> South Sudan </option>
                      <option value="Spain"> Spain </option>
                      <option value="Sri Lanka"> Sri Lanka </option>
                      <option value="Sudan"> Sudan </option>
                      <option value="Suriname"> Suriname </option>
                      <option value="Svalbard"> Svalbard </option>
                      <option value="eSwatini"> eSwatini </option>
                      <option value="Sweden"> Sweden </option>
                      <option value="Switzerland"> Switzerland </option>
                      <option value="Syria"> Syria </option>
                      <option value="Taiwan"> Taiwan </option>
                      <option value="Tajikistan"> Tajikistan </option>
                      <option value="Tanzania"> Tanzania </option>
                      <option value="Thailand"> Thailand </option>
                      <option value="Timor-Leste"> Timor-Leste </option>
                      <option value="Togo"> Togo </option>
                      <option value="Tokelau"> Tokelau </option>
                      <option value="Tonga"> Tonga </option>
                      <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                      <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                      <option value="Tristan da Cunha"> Tristan da Cunha </option>
                      <option value="Tunisia"> Tunisia </option>
                      <option value="Turkey"> Turkey </option>
                      <option value="Turkmenistan"> Turkmenistan </option>
                      <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                      <option value="Tuvalu"> Tuvalu </option>
                      <option value="Uganda"> Uganda </option>
                      <option value="Ukraine"> Ukraine </option>
                      <option value="United Arab Emirates"> United Arab Emirates </option>
                      <option value="United Kingdom"> United Kingdom </option>
                      <option value="Uruguay"> Uruguay </option>
                      <option value="Uzbekistan"> Uzbekistan </option>
                      <option value="Vanuatu"> Vanuatu </option>
                      <option value="Vatican City"> Vatican City </option>
                      <option value="Venezuela"> Venezuela </option>
                      <option value="Vietnam"> Vietnam </option>
                      <option value="British Virgin Islands"> British Virgin Islands </option>
                      <option value="Isle of Man"> Isle of Man </option>
                      <option value="US Virgin Islands"> US Virgin Islands </option>
                      <option value="Wallis and Futuna"> Wallis and Futuna </option>
                      <option value="Western Sahara"> Western Sahara </option>
                      <option value="Yemen"> Yemen </option>
                      <option value="Zambia"> Zambia </option>
                      <option value="Zimbabwe"> Zimbabwe </option>
                      <option value="other"> Other </option>
                    </select>
                    <label class="form-sub-label" for="input_45_country" id="sublabel_45_country" style="min-height:13px" aria-hidden="false"> Country </label>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </li>

        <li class="form-line" data-type="control_dropdown" id="id_63">
          <label class="form-label form-label-left form-label-auto" id="label_63" for="input_63"> Marital Status </label>
          <div id="cid_63" class="form-input">
            <select class="form-dropdown" id="input_63" name="maritalStatus" style="width:150px" data-component="dropdown" aria-labelledby="label_63">
              <option value="">  </option>
              <option value="Single"> Single </option>
              <option value="Married"> Married </option>
              <option value="Married"> divorced </option>
              <option value="Married"> Engagged</option>
            </select>
          </div>
        </li>
        <li class="form-line form-line-column form-col-1 jf-required" data-type="control_textbox" id="id_11">
          <label class="form-label form-label-top" id="label_11" for="input_11">
           Person To contact For Emergency
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_11" class="form-input-wide jf-required">
            <input type="text" id="input_11" name="em_name" data-type="input-textbox" class="form-textbox validate[required]" size="50" value="" maxLength="15" placeholder=" " data-component="textbox" aria-labelledby="label_11" required="" />
          </div>
        </li>
        <li class="form-line form-line-column form-col-1 jf-required" data-type="control_textbox" id="id_11">
          <label class="form-label form-label-top" id="label_11" for="input_11">
            Emergency Mobile
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_11" class="form-input-wide jf-required">
            <input type="text" id="input_11" name="em_mobile" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="50" value="" maxLength="15" placeholder=" " data-component="textbox" aria-labelledby="label_11" required="" />
          </div>
        </li>
        <li class="form-line form-line-column form-col-1 jf-required" data-type="control_textbox" id="id_11">
          <label class="form-label form-label-top" id="label_11" for="input_11">
            Emergency Email
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_11" class="form-input-wide jf-required">
            <input type="text" id="input_11" name="em_email" data-type="input-textbox" class="form-textbox validate[required, Email]" size="50" value="" maxLength="15" placeholder=" " data-component="textbox" aria-labelledby="label_11" required="" />
          </div>
        </li>

        <li class="form-line jf-required" data-type="control_fileupload" id="id_16">
          <label class="form-label form-label-left form-label-auto" id="label_16" for="input_16">
            ID Picture
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_16" class="form-input jf-required">
            <span class="form-sub-label-container " style="vertical-align:top">
              <input type="file" id="input_16" name="profilePicture" class="form-upload validate[required]" data-file-accept="jpg, jpeg, png, gif" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="0" data-component="fileupload" required="" />
              <label class="form-sub-label" for="input_16" style="min-height:13px" aria-hidden="false"> File should be in jpg format </label>
            </span>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_fileupload" id="id_61">
          <label class="form-label form-label-left form-label-auto" id="label_61" for="input_61">
            Residential Certificate
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_61" class="form-input jf-required">
            <span class="form-sub-label-container " style="vertical-align:top">
              <input type="file" id="input_61" name="RC" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="" data-component="fileupload" required="" />
              <label class="form-sub-label" for="input_61" style="min-height:13px" aria-hidden="false"> File should be in pdf, doc/docx format. </label>
            </span>
          </div>
        </li>
      </ul>
      <ul class="form-section-closed" style="height: 60px;clear:both;" id="section_60">
        <li id="cid_60" class="form-input-wide" data-type="control_collapse">
          <div class="form-collapse-table" id="collapse_60" data-component="collapse">
            <span class="form-collapse-mid" id="collapse-text_60">
              Academic Background
            </span>
            <span class="form-collapse-right form-collapse-right-hide">
               
            </span>
          </div>
        </li>
        <li class="form-line jf-required form-field-hidden" style="display:none;" data-type="control_textbox" id="id_38">
          <label class="form-label form-label-left form-label-auto" id="label_38" for="input_38">
            High School Name
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_38" class="form-input jf-required">
            <input type="text" id="input_38" name="highSchoolname" data-type="input-textbox" class="form-textbox validate[required]" size="60" value="" placeholder=" " data-component="textbox" aria-labelledby="label_38" required="" />
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_fileupload" id="id_18">
          <label class="form-label form-label-left form-label-auto" id="label_18" for="input_18">
            10th certificate
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_18" class="form-input jf-required">
            <span class="form-sub-label-container " style="vertical-align:top">
              <input type="file" id="input_18" name="p10thCertificate" class="form-upload validate[required]" data-file-accept="pdf, doc, docx" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="0" data-component="fileupload" required="" />
              <label class="form-sub-label" for="input_18" style="min-height:13px" aria-hidden="false"> File should be in pdf, doc/docx format. </label>
            </span>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_fileupload" id="id_61">
          <label class="form-label form-label-left form-label-auto" id="label_61" for="input_61">
            12th certificate
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_61" class="form-input jf-required">
            <span class="form-sub-label-container " style="vertical-align:top">
              <input type="file" id="input_61" name="p12thCertificate" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="" data-component="fileupload" required="" />
              <label class="form-sub-label" for="input_61" style="min-height:13px" aria-hidden="false"> File should be in pdf, doc/docx format. </label>
            </span>
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_textbox" id="id_57">
          <label class="form-label form-label-left form-label-auto" id="label_57" for="input_57">
            10th percentage
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_57" class="form-input jf-required">
            <input type="text" id="input_57" name="p10thPercentage" data-type="input-textbox" class="form-textbox validate[required, Numeric]" value="" placeholder=" " data-component="textbox" aria-labelledby="label_57" required="" />
          </div>
        </li>
        <li class="form-line jf-required" data-type="control_textbox" id="id_65">
          <label class="form-label form-label-left form-label-auto" id="label_65" for="input_65">
            12th percentage
            <span class="form-required">
              *
            </span>
          </label>
          <div id="cid_65" class="form-input jf-required">
            <input type="text" id="input_65" name="p12thPercentage" data-type="input-textbox" class="form-textbox validate[required, Numeric]" value="" placeholder=" " data-component="textbox" aria-labelledby="label_65" required="" />
          </div>
        </li>
      </ul>
        <li class="form-line jf-required" data-type="control_captcha" id="id_35">
          <label class="form-label form-label-left form-label-auto" id="label_35" for="input_35">
            Enter the words shown:
          </label>
          <div id="cid_35" class="form-input jf-required">
            <section data-wrapper-react="true">
              <div id="recaptcha_input_35" data-component="recaptcha" data-callback="recaptchaCallbackinput_35" data-expired-callback="recaptchaExpiredCallbackinput_35">
              </div>
              <input type="hidden" id="input_35" class="hidden validate[required]" name="recaptcha_visible" required="" />
              <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=explicit&amp;onload=recaptchaLoadedinput_35"></script>
              <script type="text/javascript">
                      var recaptchaLoadedinput_35 = function()
          {
            window.grecaptcha.render($("recaptcha_input_35"), {
              sitekey: '6LdU3CgUAAAAAB0nnFM3M3T0sy707slYYU51RroJ',
            });
            var grecaptchaBadge = document.querySelector('.grecaptcha-badge');
            if (grecaptchaBadge)
            {
              grecaptchaBadge.style.boxShadow = 'gray 0px 0px 2px';
            }
          };

        /**
         * Called when the reCaptcha verifies the user is human
         * For invisible reCaptcha;
         *   Submit event is stopped after validations and recaptcha is executed.
         *   If a challenge is not displayed, this will be called right after grecaptcha.execute()
         *   If a challenge is displayed, this will be called when the challenge is solved successfully
         *   Submit is triggered to actually submit the form since it is stopped before.
         */
        var recaptchaCallbackinput_35 = function()
          {
            var isInvisibleReCaptcha = false;
            var hiddenInput = $("input_35");
            hiddenInput.setValue(1);
            if (!isInvisibleReCaptcha)
            {
              if (hiddenInput.validateInput)
              {
                hiddenInput.validateInput();
              }
            }
            else
            {
              triggerSubmit(hiddenInput.form)
            }

            function triggerSubmit(formElement)
            {
              var button = formElement.ownerDocument.createElement('input');
              button.style.display = 'none';
              button.type = 'submit';
              formElement.appendChild(button).click();
              formElement.removeChild(button);
            }
          }

          // not really required for invisible recaptcha
        var recaptchaExpiredCallbackinput_35 = function()
          {
            var hiddenInput = $("input_35");
            hiddenInput.writeAttribute("value", false);
            if (hiddenInput.validateInput)
            {
              hiddenInput.validateInput();
            }
          }
              </script>
            </section>
          </div>
        </li>
        <li class="form-line" data-type="control_button" id="id_32">
          <div id="cid_32" class="form-input-wide">
            <div style="text-align:center" data-align="center" class="form-buttons-wrapper form-buttons-center   jsTest-button-wrapperField">
              <button id="input_32" type="submit" onclick="welcome();" name="submit" class="form-submit-button form-submit-button-cool_grey submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">
                Submit
              </button>
              <span>
                 
              </span>
              <button id="input_reset_32" type="reset" class="form-submit-reset form-submit-button-cool_grey jf-form-buttons" data-component="button">
                Clear Form
              </button>
              <span>
                 
              </span>
              <button id="input_print_32" type="button" class="form-submit-print form-submit-button-cool_grey jf-form-buttons" data-component="button">
                <img src="https://cdn.jotfor.ms/images/printer.png" style="vertical-align:middle" />
                <span id="span_print_32" class="span_print">
                  Print Form
                </span>
              </button>
            </div>
          </div>
        </li>
        <li style="display:none">
          Should be Empty:
          <input type="text" name="website" value="" />
        </li>
      </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = "new_footer";
  </script>
  <script>
  JotForm.poweredByText = "Powered by JotForm";
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="202492677612459" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "202492677612459-202492677612459";
  </script>
  <div class="formFooter-heightMask">
  </div>

</form>

</body>
</html>
