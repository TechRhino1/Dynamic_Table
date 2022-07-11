<?= $this-> extend('welcome_message');?>

<?=$this->section('content');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 style="text-align: center;">History of illiness</h2>
            <div class="card">
                <div class="card-header">
                    <form  onsubmit="return false" >
                    <div class="card-tools">
                    <input type="text" name="serr" id="serr" class="form-control me-2" placeholder="Enter the Drug Name Search" onkeyup="ser();">
                            <!-- <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                 </div> -->
                            <!-- <1?php if(isset($ser)){ ?> -->
                    
                            <div class="dropdown-item" id="seldata">
                               
                            </div>
                        </div>
                       </form>
                <div class="card-body">
                <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">Drug Name</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Route</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Frequency</th>
                    <th scope="col">Frequency Mode</th>
                    <th scope="col">Qty</th>
                    </tr>
                </thead>
                <?php foreach($drug_data as $drug): ?>
                <tbody>
                   
                   
                </tbody>
                <?php endforeach; ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


            function ser()
            {
                
                var s1 = document.getElementById('serr').value; // get the value of the input field.
                $.ajax({                                       
                    method:"POST", 
                    url:"<?= base_url('home/fedata');?>",  // the url where we want to send the user_id to update the user_id in the database.
                    data:{                          // data we send to the database.
                        
                        search1:s1,
                        
                    },
                        success:function(response){   // what we want to do with the response.
                            //console.log(response);
                                   
                            document.getElementById("seldata").innerHTML=response; // update the user_id in the database.
                            
                        }
                })
            }          
           


     const formEL = document.querySelector("form"); // get the form element
     const tbodyEL = document.querySelector("tbody"); // <-- tbody element

           
           function onadd(obj,e) 
           {
               // console.log(obj);//
                tbodyEL.innerHTML +=
                `<tr>
                    <th>${obj.drug_name}</th>
                    <td>${obj.dosage}</td>
                    <td>${obj.route}</td>
                    <td>${obj.duration}</td>
                    <td>${obj.frequency}</td>
                    <td>
                        <input type="radio" name="h${obj.drug_id}" id="h${obj.drug_id}" value="${obj.frequency}">H
                        <input type="radio" name="h${obj.drug_id}" id="h${obj.drug_id}" value="${obj.frequency}">D
                        <input type="radio" name="h${obj.drug_id}" id="h${obj.drug_id}" value="${obj.frequency}">W
                    </td>
                    <td><input type="text" name="qty" value=${obj.qty}></td> 
                </tr>`;
            }
            e.preventDefault(); //prevent the default action of the form.
            formEL.addEventListener("submit", onadd); //add event listener to form elements

            function cli(id)
            {
              const obj = JSON.parse(JSON.stringify(id)); // clone object from JSONArray object
              //const obj = JSON.parse(id); //convert string to object
              onadd(obj);
               
            }
            

    </script>

<?=$this->endSection();?>