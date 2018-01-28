<?php
/**
 * User model class
 *
 * @package Model
 */

namespace Admin\Model;

use Zend\File\Transfer\Adapter\Http;
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;

class Media
{
    /**
     * @var string
     */
    protected $em;

    const PATH_TO_SAVE_FILE = './public/images/upload/creations';
    const PATH_TO_GET_CV    = './data/Cv-Jeanne-Lesaulnier.pdf';
    const JPG_EXTENSION     = 'jpg';
    const JPEG_EXTENSION    = 'jpeg';
    const PNG_EXTENSION     = 'png';

    public function __construct($em)
    {
        $this->em                   = $em;
    }

    public function saveFiles($files)
    {
        $httpadapter = new Http();
        $filesize    = new Size(['max' => '5MB']);
        $extension   = new Extension([
            'extension' => array(
                self::JPG_EXTENSION,
                self::JPEG_EXTENSION,
                self::PNG_EXTENSION,
            ),
        ]);

        $fileName = $files['logo']['name'];
        
        $httpadapter->setValidators([$filesize, $extension], $fileName);

        if ($httpadapter->isValid()) {

            $res = $this->testDirectory();

            if ($res['success']) {

                $httpadapter->setDestination(self::PATH_TO_SAVE_FILE);

                if ($httpadapter->receive($fileName)) {

                    return true;

                } else {

                    return false;
                }

            } else {

                return $res;
            }
        }
    }

    public function testDirectory()
    {
        $success    = true;
        $message    = '';

        if (!is_dir(self::PATH_TO_SAVE_FILE)) {

            $message = 'The directory does not exist';
            $success = false;

        } elseif (!@file_put_contents(self::PATH_TO_SAVE_FILE.'/test.txt', 'test')) {

            $message = 'The directory is not writable';
            $success = false;
        }

        return array('success' => $success, 'message' => $message);
    }

    public function downloadCv()
    {
        $fileName = basename(self::PATH_TO_GET_CV);

        header("Content-type:application/pdf");
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        //$filename = 'php://output'; // Change filename to force download
        echo file_get_contents(self::PATH_TO_GET_CV);die();

    }

    public function getPathToSaveFile()
    {
        return self::PATH_TO_SAVE_FILE;
    }

}
