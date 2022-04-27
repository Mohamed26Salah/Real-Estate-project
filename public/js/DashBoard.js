if (window.location.href.search("DashBoard") != -1) {
  
  $(document).ready(function () {

  });

  function Editing(value , name , ID) {
    
    console.log(name);
    customer = document.getElementById(value);
    customer.innerHTML = 
    `
    
    
    <form method="post" action="" >
                            <td>`+name+`</td>
                            <td>0111000000</td>
                            <td> <select id="Rank`+ID+`" name="Rank">
                            <option value="Admin">Admin</option>
                            <option value="Moderator">Moderator</option>
                            <option value="User">User</option>
                          </select></td>
                            <td><a href="#" class="btn" onclick="Delete(`+ID+`);" style="background-color: #800000; color: white; font-size:15px;">Delete</a>
                            <a href="#" class="btn" onclick="Cancel(`+ID+`);" style="background-color: #daa520; color: white; font-size:15px;">Cancel</a>
                            <a href="#" class="btn confirmation" onclick="Confirm(`+ID+`,`+value+`);" style="background-color: #006400; color: white; font-size:15px;">Confirm</a></td>
                            
                            
                        </form>
                        

        `

 

 }

 
  


}
// function Delete(value ) {
    
//   console.log(name);
//   customer = document.getElementById(value+'+10');
//   customer.innerHTML = 
//   `
//       <tr id="$user->ID+10">
//       <form method="post" action="">
//                               <td>`+name+`</td>
//                               <td>0111000000</td>
//                               <td>`+Rank+`</td>
//                               <td><a href="" class="btn" onclick="Editing($user->ID);" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
//                           </form>
//                           </tr>
      
//       `




// }
// function Cancel(value ) {
    
//   console.log(name);
//   customer = document.getElementById(value+'+10');
//   customer.innerHTML = 
//   `
//       <tr id="$user->ID+10">
//       <form method="post" action="">
//                               <td>`+name+`</td>
//                               <td>0111000000</td>
//                               <td>`+Rank+`</td>
//                               <td><a href="" class="btn" onclick="Editing($user->ID);" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
//                           </form>
//                           </tr>
      
//       `




// }


