<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/head_of_accounts.class.php';

require_once '../../classes/vendor.class.php';

require_once '../../classes/employee.class.php';

$grocery    = new HeadOfAccounts();

$vendors    = new Vendor();

$Employee   = new Employee();

if (isset($_GET["category"])) {
    $subcategory = $_GET["category"];
    if($_GET["category"] == "HFA"){
        $data =$grocery->showCategory();                          
        foreach($data as $rows){   
          
            echo '<option data-invoice="'.$subcategory.'" data-batch="'.$rows['category'].'" value="'.$rows['category_id'].'">'.$rows['category'].'</option>';
        }
    }

    if($_GET["category"] == "Vendors"){
        $vendorresult      = $vendors->vendordisplaydata();                            
        foreach ($vendorresult as $showVendor) {
            $showVen_name  = $showVendor['name'];
            $showvendor_id = $showVendor['vendor_id'];
            echo '<option data-invoice="'.$subcategory.'" data-batch="'.$showVendor.'" value="'.$showvendor_id.'">'.$showVen_name.'</option>';
        }
    }

    if($_GET["category"] == "Employee"){
        $emps =$Employee->showEmployees();
        foreach ($emps as $emp) {
            $empId   = $emp['user_id'];
            $empName = $emp['name'];
            echo '<option data-invoice="'.$subcategory.'" data-batch="'.$empName.'" value="'.$empName.'">'.$empName.'</option>';
        }
    }



    if($_GET["category"] == "VendorsNAME"){
        $vendorresult      = $vendors->vendordisplaydata();                            
        foreach ($vendorresult as $showVendor) {
            $showVen_name  = $showVendor['name'];
            echo '<option data-invoice="'.$subcategory.'" data-batch="'.$showVendor.'" value="'.$showVen_name.'">'.$showVen_name.'</option>';
        }
    }


    if($_GET["category"] == "cancel"){
      
            echo '<option data-invoice="canceldata" data-batch="canceldata" value="canceldata">Cancel Data</option>';
        
    }

    


}
?>