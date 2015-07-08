<?php
error_reporting(E_ALL);
$path = ROOT . '/Doc/';

$URLForDocsInRepo = URLFORDOCSINREPO ;

$Render_the_Document= "Render the Document";

$Completions_Message = "Open Completions - copy from here, paste into your document, and complete:";

$Doc_Message= "Document";

$Print_Message="Print";

$Complete_Fields_Message="Edit and Complete";

$Edit_Message= "Edit";

$Text_Edit_Window_Size = TEXTEDITWINDOWSIZE ;

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = "landing";
}

if (isset($_REQUEST['file'])) {
    $dir = $_REQUEST['file'];
    $dir = str_replace('..', '', $dir);
} else {
    $dir = './';
}


switch ($_REQUEST['action']) {

    case 'list':

        include('list.php');
        break;


    case 'source':

        if (isset($_REQUEST['submit'])) {

            $file_name = $path . $dir;

            if (file_exists($file_name)) {

                if (is_writeable($file_name)) {
                    $fp = fopen($file_name, "w");
                    $data = $_REQUEST['newcontent'];
                    $data = preg_replace('/\r\n/', "\n", $data);
                    $data = trim($data);
                    fwrite($fp, $data);
                    fclose($fp);
                } else {
                    print '<span style="color: red">ERROR: File ' . $dir . ' is not write able.</style>';
                }
            } else {
                print '<span style="color: red">ERROR: File ' . $dir . ' does not exists.</style>';
            }
        }

        $content = file_get_contents($path . $dir, FILE_USE_INCLUDE_PATH);
        $contents = explode("\n", $content);
        $rootdir = pathinfo($dir);
        $filenameX = basename($dir);

        //source.php includes the formatting for the table that displays the components of a document
        include("source.php");

        break;

    case 'render':

        if (isset($_REQUEST['submit'])) {
            echo "RENDERING...........<br>";
        } else {
            echo "not rending ... <br>";
        }

        if (isset($_REQUEST['file'])) {
            echo "</div></div>";
        }
        break;

    case 'edit':

        include('edit.php');
        break;

    case 'pull':

        echo `cd /var/www/www.commonaccord.org/Alpha; git reset --hard HEAD; git pull -f 2>&1`;
        break;

    default:
        include($_REQUEST['action'] . '.php');
        break;
}

