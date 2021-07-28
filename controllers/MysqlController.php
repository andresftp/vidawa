<?php


namespace Controllers;
use Db\EntidadBase;

class MysqlController extends EntidadBase
{
    public function __construct()
    {
        $table = "crm_ciudad";
        parent::__construct($table);
    }

    private function chkTableSync(){
        $con = $this->db();
        $sql = "SELECT COUNT(*) AS count FROM information_schema.tables 
                  WHERE table_schema = '".$_ENV['DB_DATABASE']."' AND table_name = 'crm_syncdb'";
        $res = $con->query($sql);
        while ($row = $res->fetch_assoc()){
            $resulset[] = $row;
        }

        return $resulset;
    }

    private function scanSqlDir($dir){
        $file  = scandir($dir);
        unset($file[0],$file[1]);

        $fileOrder = array();
        foreach($file as $files){
            $nn = explode('_',$files);
            $fileOrder[$nn[0]]=$files;
        }
        ksort($fileOrder);

        return $fileOrder;
    }

    /**
     * @param $dir
     * @throws Exception
     */
    private function readFileSql($dir){
        set_time_limit(0);
        $query = '';
        $sqlScript = file($dir);
        foreach ($sqlScript as $line)   {

            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);

            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
            }

            $query = $query . $line;
            if ($endWith == ';') {
                $this->query = ($query);
                $con = $this->db();
                $save = $con->query("SET NAMES 'utf8'");
                $save = $con->query($this->query);
                if (!$save) {
                    throw new Exception(mysqli_error($con) . "[ $this->query] dir: ".$dir);
                }
                $query= '';
            }
        }
    }

    private function insertVersionDB($vs,$file){
        $sql= "INSERT INTO crm_syncdb SET 
                fecha = NOW(),
                version = '".$vs."',
                file = '".$file."'
                ";

        $this->query = ($sql);
        $con = $this->db();
        $save = $con->query($this->query);
        if (!$save) {
            throw new Exception(mysqli_error($con) . "[ $this->query]");
        }
        return $save;
    }

    private function getLastVs(){
        $con = $this->db();
        $sql = "SELECT * FROM crm_syncdb ORDER BY id_sync DESC LIMIT 1";
        $res = $con->query($sql);
        while ($row = $res->fetch_assoc()){
            $resulset[] = $row;
        }
        return $resulset;
    }

    public function load(){
        $dirSqlV= 'sql/00_sql_version';
        $chkSync = $this->chkTableSync();
        if($chkSync[0]['count']==0){
            $files = $this->scanSqlDir($dirSqlV);
            foreach ($files AS $rowFiles){
                $vsf = explode('_',$rowFiles);
                $ext = explode('.',$rowFiles);
                if($vsf[0]=='00'&&$ext[1]=='sql'){
                    try {
                        $this->readFileSql($dirSqlV . '/' . $rowFiles);
                    } catch (Exception $e) {
                        echo $e;
                    }
                    try {
                        $this->insertVersionDB($vsf[0], $rowFiles);
                    } catch (Exception $e) {
                        echo $e;
                    }
                }
            }
        }

        $chkSync = $this->chkTableSync();
        if($chkSync[0]['count']>0){
            $lastVs=$this->getLastVs();
            $vsn =  $lastVs[0]['version'];
            $files = $this->scanSqlDir($dirSqlV);
            foreach ($files AS $rowFiles){
                $vsf = explode('_',$rowFiles);
                $ext = explode('.',$rowFiles);
                if($vsf[0]>$vsn&&$ext[1]=='sql'){
                    $this->readFileSql($dirSqlV.'/'.$rowFiles);
                    $this->insertVersionDB($vsf[0],$rowFiles);
                }
            }
        }
    }
}