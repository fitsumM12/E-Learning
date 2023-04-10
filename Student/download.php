<?php 
  require_once 'includes/header.php';

  if(isset($_GET['fileName'])){
    $fileName = $_GET['fileName'];

        // fetch file to download from database
       $result = $user->downloadFile($fileName);
    
        $filepath = '../' . $result['pdf'];
    
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../' . $result['title']));
            readfile('../' . $result['pdf']);
        }

  }



  
  function download_file($fullPath )
{
  if( headers_sent() )
    die('Headers Sent');


  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');


  if( file_exists($fullPath) )
  {

    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    switch ($ext) 
    {
      case "pdf": $ctype="application/pdf"; break;
      case "doc": $ctype="application/msword"; break;      
      default: $ctype="application/force-download";
    }

    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

  } 
  else
    die('File Not Found');

}
?>



























<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>