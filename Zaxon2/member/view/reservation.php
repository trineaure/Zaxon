<?php
//checks if a Member Are Logged In
session_start();
if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
?>
<main>

                    <div>
                        <b><p>Reserver en time</p></b><br>
                         
                         <form action="?page=reservationComplete" method="post">
                            <p>Reservasjons Dato: <input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date_time" class="register-input" required/></p>

                            <p>EmployeeID: <input type="number"placeholder="321" name="givenEmployeeID" class="register-input" required/></p>
                           
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

           
</main>


<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/





//Viser tabellen og blocker lørdag og sønndag. 
$('#datetimepicker3').datetimepicker({
	inline:true
});
var logic = function( currentDateTime ){
	if( currentDateTime.getDay()==0 ){
		this.setOptions({
			minTime:'0:00'
		});
		this.setOptions({
			maxTime:'0:00'
		});	
	}
        else if( currentDateTime.getDay()==6 ){
        this.setOptions({
                minTime:'0:00'
        });
        this.setOptions({
                maxTime:'0:00'
        });
}

        else{
		this.setOptions({
			minTime:'10:00'
		});
		
		this.setOptions({
			maxTime:'16:01'
		});
}};
$('#datetimepicker3').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
	

});

//blocker uker 
/**
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});


//blocker en dag            
/**
 
 
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker3').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});/
*/


</script>