<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 27.01.12
 * Time: 15:12
 * To change this template use File | Settings | File Templates.
 */
class gkh_cabxml extends gkh
{
    private $_ls = 0;

    private $_file = '';

    private $_xml = '';

    public function __construct($ls)
    {
        parent::__construct();
        $this->_ls = $ls;
    }

    public function loadFile($name)
    {
        $this->_file = $name;
        libxml_use_internal_errors(true);

        $xmlString = '';
        $fp = fopen($this->_file, "r"); // Открываем файл в режиме чтения
        if ($fp) {
            while (!feof($fp))
            {
                $xmlString .= fgets($fp, 999);
            }
        }
        fclose($fp);
        //print_r($xmlString);

        $xmlString = preg_replace('/PROJ[0-9]+/', 'PROJ', $xmlString);
        $xmlString = preg_replace('/DOLG[0-9]+/', 'DOLG', $xmlString);
        $xmlString = preg_replace('/SCH[0-9]+/', 'SCH', $xmlString);
        $xmlString = preg_replace('/USL[0-9]+/', 'USL', $xmlString);
        $xmlString = preg_replace('/PERIOD[0-9]+/', 'PERIOD', $xmlString);

        $this->_xml = simplexml_load_string($xmlString);
        //print_r($this->_xml);
        if ($this->_xml === false) {
            print_r(libxml_get_last_error());
            throw new Exception();
        }

    }

    public function getBlock($titile)
    {
        //print_r($this->_xml->Item->LS['KOD']);
        //print_r($this->_xml->xpath('//LS[@KOD="' . $this->_ls . '"]'));
        //zone[@country='Cote d\'Ivoire']

        $block = '';

        $xmlBlock = $this->_checkLS();
        if ($xmlBlock !== false) {
            //print_r($xmlBlock);
            if ($titile == 'ls') {
                return $xmlBlock->attributes();
            }

            if ($titile == 'jilci') {
                $retArray = array();
                //print_r($xmlBlock->JILCI->PROJ1);
                foreach ($xmlBlock->JILCI->PROJ as $jilci) {
                    $retArray[] = $jilci->attributes();
                }
                return $retArray;
            }

            if ($titile == 'dolg') {
                $retArray = array();
                foreach ($xmlBlock->DOLGI->DOLG as $dolg) {
                    $retArray[] = $dolg->attributes();
                }
                return $retArray;
            }

            if ($titile == 'sch') {
                $retArray = array();
                foreach ($xmlBlock->SCH->SCH as $meters) {
                    $retArray[] = $meters->attributes();
                }
                return $retArray;
            }

            if ($titile == 'nach') {
                $retArray = array();
                $i = 0;
                foreach ($xmlBlock->NACH->PERIOD as $period) {
                    $retArray[$i]['period'] = $period->attributes();
                    foreach ($period->USL as $usluga) {
                        $retArray[$i]['usluga'][] = $usluga->attributes();
                    }
                    $i++;
                }

                return array_reverse($retArray);
            }

        } else {
            return false;
        }


        foreach (libxml_get_errors() as $error) {
            print_r($error->message);
        }
    }

    public function refreshFile($ftpDir, $workDir)
    {
        ini_set('max_execution_time', '90');

        if (file_exists($ftpDir)) {

            /*
            ini_set('include_path', '.:/home/dnevnik/php');

            include_once "/home/dnevnik/php/File/Archive.php";

            print_r(File_Archive::read($ftpDir));

            $result = File_Archive::extract($src = $ftpDir . '/', $dest = $workDir); //$src = 'archive.zip/', $dest = 'dir'

            print_r($result);
*/

            include_once 'pclzip.lib.php';

            $zip = new PclZip($ftpDir);

            $result = $zip->extract(PCLZIP_OPT_PATH, $workDir);

            //print_r($result);

            //$result = rename($ftpDir, $workDir . '/import.xml');

            $result = true;

            if ($result) {
                $this->loadFile($workDir . '/IMPORT.XML');

                //<FromBase>06042012152448</FromBase>

                $tempDate = (string)$this->_xml->FromBase[0];

                $prepareDate = substr($tempDate, 0, 2) . '-' . substr($tempDate, 2, 2) . '-' . substr($tempDate, 4, 4);

                $metersDate = date('Y-m-d', strtotime('-1 month', $prepareDate));

                //print_r($metersDate);

                $temp = $this->_xml->xpath('//LS');
                if ($temp !== false) {

                    $pa = new gkh_personal_account_site();


                    foreach ($temp as $ls) {
                        $lsAttribute = $ls->attributes();
                        if ($pa->checkPA($lsAttribute['KOD']) === false) {
                            $data = array();
                            $data['fio'] = $lsAttribute['SOBSTV'];
                            $data['password'] = $lsAttribute['PASSWORD']; //123456
                            $data['ls'] = $lsAttribute['KOD'];
                            $pa->addPA($data);
                        }

                        $curPA = $pa->getPAByLS($lsAttribute['KOD']);
                        $metersPA = new gkh_meters($curPA['id']);

                        foreach ($ls->SCH->SCH as $key => $meters) {
                            //$tempML = $metersPA->getMetersListByUser();
                            //print_r($tempML);
                            //if (!empty($tempML)) {
                            $metersAttrib = $meters->attributes();
                            $data = array();
                            $mValues = array();

                            if ($metersAttrib['TYPE'] == 'Счетчик э/э') {
                                $data['meters'][1]['imp_id'] = $metersAttrib['ID'];
                                $data['meters'][1]['naim'] = $metersAttrib['NAIM'];
                                $data['meters'][1]['type'] = $metersAttrib['TYPE'];
                                $data['meters'][1]['nomer'] = $metersAttrib['NOMER'];

                                $mValues[1]['date'] = $metersDate;
                                $mValues[1]['value'] = str_replace(',', '.', str_replace(' ', '', $metersAttrib['TEKPOKAZANIE']));
                            } elseif ($metersAttrib['TYPE'] == 'Водосчетчик ХВ') {
                                $data['meters'][3]['imp_id'] = $metersAttrib['ID'];
                                $data['meters'][3]['naim'] = $metersAttrib['NAIM'];
                                $data['meters'][3]['type'] = $metersAttrib['TYPE'];
                                $data['meters'][3]['nomer'] = $metersAttrib['NOMER'];

                                $mValues[3]['date'] = $metersDate;
                                $mValues[3]['value'] = str_replace(',', '.', str_replace(' ', '', $metersAttrib['TEKPOKAZANIE']));
                            } else {
                                $data['meters'][2]['imp_id'] = $metersAttrib['ID'];
                                $data['meters'][2]['naim'] = $metersAttrib['NAIM'];
                                $data['meters'][2]['type'] = $metersAttrib['TYPE'];
                                $data['meters'][2]['nomer'] = $metersAttrib['NOMER'];

                                $mValues[2]['date'] = $metersDate;
                                $mValues[2]['value'] = str_replace(',', '.', str_replace(' ', '', $metersAttrib['TEKPOKAZANIE']));
                            }

                            $metersPA->setMetersForUser($data);
                            $metersPA->setMetersValue($mValues);
                            //}

                        }

                    }
                    //print_r($temp);
                }

            }
        }

    }

    private function _checkLS()
    {
        $temp = $this->_xml->xpath('//LS[@KOD="' . $this->_ls . '"]');
        if ($temp !== false && !empty($temp)) {
            return $temp[0];
        } else {
            return false;
        }

    }


}
