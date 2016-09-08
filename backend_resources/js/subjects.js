/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function test(){
    
    alert(1);
   
    
}

function deleteSubject(id){
		
    if (confirm('Are you sure you want to delete this Subject ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/subject/deleteSubject',
            data: "id=" + id,
            success: function (msg) {
              //  alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#attr_id_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Item Types');
                }
            }

        });

    }

		
		
}