<?php

namespace App\HomeBundle\Controller;

use App\DataBundle\Entity\Info;
use App\DataBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    private $loggedin = false;
    private $user = null;
    public function __construct()
    {
        if(isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
            $this->loggedin = true;
        }else{
            $this->loggedin = false;
        }
    }

    public function importcsvAction(Request $request){
        if ($request->getMethod() == "POST"){
            if($_FILES['csv']['name'] != null){
                $info = pathinfo($_FILES['csv']['name']);
                $ext = $info['extension'];
                $date = date('mdYhisms', time());
                $newname = $date . '.' . $ext;
                $target = 'bundles/csv/'.$newname;
                move_uploaded_file( $_FILES['csv']['tmp_name'], "./".$target);
                $rowNo = 1;
                // $fp is file pointer to file sample.csv
                if (($fp = fopen($target, "r")) !== FALSE) {
                    while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        $num = count($row);
                        $val = explode(";",$row[0]);
                        print_r($val);
                        if(true){
                            $em = $this->getDoctrine()->getManager();
                            $info = new Info();
                            $info->setName($val[0]);
                            $info->setEmail($val[2]);
                            $info->setPhone($val[1]);
                            $info->setAddress($val[3]);
                            $user = $this->getDoctrine()->getRepository('DataBundle:User')->find($this->user->getId());
                            $info->setUser($user);
                            $em->persist($info);
                            $em->flush();
                        }
//                        echo "<p> $num fields in line $rowNo: <br /></p>\n";
                        $rowNo++;
                        /*for ($c=0; $c < $num; $c++) {
                            echo $row[$c] . "<br />\n";
                        }*/
                    }
                    fclose($fp);
                }
                unlink("./".$target);
            }
        }
        return $this->redirect($this->generateUrl('france_view'));

    }
    public function downloadcsvAction(){
        $id = $this->user->getId();
        $info = $this->getDoctrine()->getRepository('DataBundle:Info')->findBy(
            array(
                'user' => $id
            ));
        $forcsv = array();
        foreach($info as $item){
            $val = array($item->getName(),$item->getPhone(),$item->getEmail(),$item->getAddress());
            array_push($forcsv,$val);
        }
        $content = $this->generateCsv($forcsv);
        $response = new Response();
        $response->headers->set('Content-type', 'text/csv');
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-length', 1000);
        $response->headers->set('Content-Disposition', 'attachment; filename="Contacts.csv";');
        $response->sendHeaders();
        // $responseString contains csv result string
        $response->setContent($content);
        return $response;
    }

    public function generateCsv($data, $delimiter = ',', $enclosure = '"') {
        $contents = '';
        $handle = fopen('php://temp', 'r+');
        foreach ($data as $line) {
            fputcsv($handle, $line, $delimiter, $enclosure);
        }
        rewind($handle);
        while (!feof($handle)) {
            $contents .= fread($handle, 8192);
        }
        fclose($handle);
        return $contents;
    }


    public function LogoutAction(){
        if ($this->loggedin){
            unset($_SESSION['user']);
            session_destroy();
            return $this->redirect($this->generateUrl('france_login'));
        }
    }


    public function RegisterAction(Request $request){
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $user = new User();
            $user->setFname($request->get('fname'));
            $user->setLname($request->get('lname'));
            $user->setEmail($request->get('email'));
            $user->setPassword($request->get('password'));
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('france_login'));
        }
        return $this->render('HomeBundle:Default:index.html.twig');
    }


    public function LoginAction(Request $request){
        if ($request->getMethod()== "POST")
        {
            $email = $request->get('email');
            $password = $request->get('password');
            $user = $this->getDoctrine()->getRepository('DataBundle:User')->findOneBy(
                array('email' => $email, 'password' => $password)
            );
            if ($user != null){
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['user'] = $user;


                return $this->redirect($this->generateUrl('france_view',array('id' => $user->getId())));
            }else{
                return $this->redirect($this->generateUrl('france_login'));
            }
        }
        return $this->render('HomeBundle:Default:Login.html.twig');
    }





    public function ViewAction()
    {
        if ($this->loggedin){
            $info = $this->getDoctrine()->getRepository('DataBundle:Info')->findBy(
                array(
                    'user' => $this->user->getId()
                ));
            return $this->render('HomeBundle:Default:View.html.twig',
                array(
                    'Info' => $info,
                    'user' => $this->user
                ));
        }
            return $this->redirect($this->generateUrl('france_login'));
    }


    public function AddAction(Request $request)
    {
        if ($this->loggedin){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $info = new Info();
                $info->setName($request->get('name'));
                $info->setEmail($request->get('email'));
                $info->setPhone($request->get('phone'));
                $info->setAddress($request->get('address'));
                $user = $this->getDoctrine()->getRepository('DataBundle:User')->find($this->user->getId());
                $info->setUser($user);
                $em->persist($info);
                $em->flush();
                return $this->redirect($this->generateUrl('france_view'));
            }
            return $this->render('HomeBundle:Default:Add.html.twig');
        }else{
            return $this->redirect($this->generateUrl('france_login'));
        }
    }


    public function EditAction(Request $request, $id){
        if ($this->loggedin){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $info = $em->getRepository('DataBundle:Info')->find($id);
                $info->setName($request->get('name'));
                $info->setEmail($request->get('email'));
                $info->setPhone($request->get('phone'));
                $info->setAddress($request->get('address'));
                $em->flush();
                return $this->redirect($this->generateUrl('france_view'));
            }
            $info = $this->getDoctrine()->getRepository('DataBundle:Info')->find($id);
            return $this->render('HomeBundle:Default:Edit.html.twig',
                array(
                    'Info' => $info,
                    'userid' => $info->getUser()->getId()
                ));
        }else{
            return $this->redirect($this->generateUrl('france_login'));
        }
    }


    public function DeleteAction(Request $request, $id){
        if ($request->getMethod() == "GET"){
            $em = $this->getDoctrine()->getManager();
            $info = $em->getRepository('DataBundle:Info')->find($id);
            $em->remove($info);
            $em->flush();
            return $this->redirect($this->generateUrl('france_view',
                array(
                    'id' => $info->getUser()->getId()
                )));
        }
    }

}
