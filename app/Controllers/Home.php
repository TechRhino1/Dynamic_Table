<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
  
    public function index()
    {
        $data['pageTitle'] = 'Home';
        $cModel = new User();
        $data['drug_data'] = $cModel->orderBy('drug_id', 'DESC')->findAll();
        return view('pages/home', $data);
    }

    public function fedata()
    {
    
        $ser=$this->request->getPost("search1");
        $cModel = new User();
        $data['drug_data'] = $cModel->like('drug_name',"$ser")->findAll(); // findAll() is a function in the User model.

               if(!empty($ser))  
                {
                    foreach ($data['drug_data'] as $drug) :
                        $data_array=array(                     
                            "drug_id"=>$drug['drug_id'],
                            "drug_name"=>$drug['drug_name'],
                            "dosage"=>$drug['dosage'],
                            "route"=>$drug['route'],
                            "duration"=>$drug['duration'],
                            "frequency"=>$drug['frequency'],
                            "frequency_mode"=>$drug['frequency_mode'],
                            "qty"=>$drug['qty'],
                           
                        );
                        $ddd=json_encode($data_array); // convert array to json string

                        echo "
                            <tbody>
                            <tr>
                            <th> <button class='btn btn-light' onclick='cli(".$ddd.");'>".$drug['drug_name']."</button>
                            </th>
                            </tr>
                            </tbody>
                            </br> ";
                      
                        endforeach;
                    } 
                    else {
                          echo "
                            <tbody>
                            <tr>
                            <th class='btn btn-light'>No Data Found</th>
                            </tr>
                            </tbody>";
                        }
             
    }
}
