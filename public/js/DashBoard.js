if (window.location.href.search("DashBoard") != -1) {

 

  function Editing(value, name, ID, Rank) {


    customer = document.getElementById(value);
    customer.innerHTML =
      `
    
    
    <form method="post" action="" >
                            <td>`+ name + `</td>
                            
                            <td> <select id="Rank`+ ID + `" name="Rank">
                            <option value="Moderator">Moderator</option>
                            <option value="User">User</option>
                          </select></td>
                            <td style="display:flex;"><a  class="btn" onclick="Delete(`+ ID + `,` + value + `);" style="background-color: #800000; color: white; font-size:15px;">Delete</a>
                            <a  class="btn" onclick="Cancel(`+ ID + `,` + value + `,'` + name + `','` + Rank + `');" style="background-color: #daa520; color: white; font-size:15px;">Cancel</a>
                            <a  class="btn confirmation" onclick="Confirm(`+ ID + `,` + value + `);" style="background-color: #006400; color: white; font-size:15px;">Confirm</a></td>
                            
                            
                        </form>
                        

        `



  }



  function Cancel(ID, valuee, name, Rankk) {

    customer = document.getElementById(valuee);
    customer.innerHTML = ` 
                          
                              <td>`+ name + `</td>
                              
                              <td>`+ Rankk + `</td>
                              <td><a  class="btn" onclick="Editing(`+ valuee + ` , '` + name + `'  , ` + ID + `,'` + Rankk + `' );" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                          
                          `;
  }

}
