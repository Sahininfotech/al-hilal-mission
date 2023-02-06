$(document).ready(function(){
    $("form").submit(function (event){
        event.preventDefault()
        var student_id = document.getElementById("student_id").value
        var class_id = document.getElementById("class_id").value
        var exam_id = document.getElementById("exam_id").value
        var subject_id = document.getElementById("subject_id").value
        var marks = document.getElementById("marks").value
      

        $post("../js/assest/admin/class/subject_marks.action.php", {student_id: student_id, class_id:class_id, exam_id:exam_id, subject_id:subject_id, marks:marks}, function(data){
console.log(data)
        }

        )
    })
})


//  The plain text password to be hashed
//   $plaintext_password = "Password@123";
  
//   The hash of the password that
//   can be stored in the database
//   $hash = password_hash($plaintext_password, 
//           PASSWORD_DEFAULT);
  
//    Print the generated hash
//   echo "Generated hash: ".$hash;

  
//  Plaintext password entered by the user
//   $plaintext_password = "Password@123";
  
//  The hashed password retrieved from database
//   $hash = "$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";
  
//   Verify the hash against the password entered
//   $verify = password_verify($plaintext_password, $hash);
  
//   Print the result depending if they match
//   if ($verify) {
//       echo 'Password Verified!';
//   } else {
//       echo 'Incorrect Password!';
//   }
