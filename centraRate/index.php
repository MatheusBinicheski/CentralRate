<!DOCTYPE html>
<?php
    require("../login/config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: ../login/index.php");
        die();
    }
$link = new PDO('mysql:host=localhost;dbname=asteriskcdrdb', 'root', '');
if (!$link) {
    echo 'Não foi possível conectar';
}
$pesquisa = $link->query("SELECT distinct src FROM cdr where (select substring(src,1,1)) like '%4%' and (select length(src)) < 5");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CentralRate</title>
        <link href="../login/assets/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="chosen.css">
	<link rel="stylesheet" href="datepicker.css">
        <script src"chosen.jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
      $(function() {
	$(".chosen-select").chosen()
	$("#test").on({
    	change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-1"]');
        if (theAllOption.is(":selected")) {
            element.find("option").not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-2"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4000");
            var t = document.createTextNode("4000"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4001");
	    var t = document.createTextNode("4001"); x.appendChild(t);
   	    document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4002");
            var t = document.createTextNode("4002"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4009");
            var t = document.createTextNode("4009"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    element.find('option[value="4000"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4001"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4002"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4009"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-3"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4050");
            var t = document.createTextNode("4050"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4042");
            var t = document.createTextNode("4042"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4043");
            var t = document.createTextNode("4043"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4044");
            var t = document.createTextNode("4044"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4045");
            var t = document.createTextNode("4045"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4046");
            var t = document.createTextNode("4046"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4047");
            var t = document.createTextNode("4047"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4048");
            var t = document.createTextNode("4048"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4050"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4042"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4043"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4044"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4045"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4046"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4047"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4048"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-4"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4016");
            var t = document.createTextNode("4016"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4017");
            var t = document.createTextNode("4017"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4016"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4017"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>	
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-5"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4018");
            var t = document.createTextNode("4018"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4018"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-6"]');
        if (theAllOption.is(":selected")) {
	     var x = document.createElement("OPTION"); x.setAttribute("value", "4076");
            var t = document.createTextNode("4076"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4078");
            var t = document.createTextNode("4078"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4079");
            var t = document.createTextNode("4079"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4076"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4078"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4079"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-7"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4020");
            var t = document.createTextNode("4020"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4021");
            var t = document.createTextNode("4021"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4022");
            var t = document.createTextNode("4022"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4023");
            var t = document.createTextNode("4023"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4025");
            var t = document.createTextNode("4025"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4026");
            var t = document.createTextNode("4026"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4027");
            var t = document.createTextNode("4027"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4028");
            var t = document.createTextNode("4028"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4029");
            var t = document.createTextNode("4029"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4020"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4021"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4022"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4023"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4025"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4026"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4027"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4028"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4029"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	 <script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-8"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4080");
            var t = document.createTextNode("4080"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4081");
            var t = document.createTextNode("4081"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4082");
            var t = document.createTextNode("4082"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4083");
            var t = document.createTextNode("4083"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4084");
            var t = document.createTextNode("4084"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4085");
            var t = document.createTextNode("4085"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4086");
            var t = document.createTextNode("4086"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4087");
            var t = document.createTextNode("4087"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4088");
            var t = document.createTextNode("4088"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4089");
            var t = document.createTextNode("4089"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	     var x = document.createElement("OPTION"); x.setAttribute("value", "4095");
            var t = document.createTextNode("4095"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4096");
            var t = document.createTextNode("4096"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4080"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4081"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4082"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4083"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4084"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4085"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4086"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4087"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4089"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4095"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4096"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-9"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4003");
            var t = document.createTextNode("4003"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4004");
            var t = document.createTextNode("4004"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4010");
            var t = document.createTextNode("4010"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4011");
            var t = document.createTextNode("4011"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4012");
            var t = document.createTextNode("4012"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4003"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4004"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4010"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4011"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4012"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-10"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4050");
            var t = document.createTextNode("4050"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4051");
            var t = document.createTextNode("4051"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4052");
            var t = document.createTextNode("4052"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4053");
            var t = document.createTextNode("4053"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4054");
            var t = document.createTextNode("4054"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4055");
            var t = document.createTextNode("4055"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4050"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4051"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4052"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4053"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4054"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4055"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-11"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4060");
            var t = document.createTextNode("4060"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4061");
            var t = document.createTextNode("4061"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4062");
            var t = document.createTextNode("4062"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4063");
            var t = document.createTextNode("4063"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4064");
            var t = document.createTextNode("4064"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4065");
            var t = document.createTextNode("4065"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4066");
            var t = document.createTextNode("4066"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4067");
            var t = document.createTextNode("4067"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4068");
            var t = document.createTextNode("4068"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4060"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4061"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4062"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4063"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4064"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4065"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4066"]').not(theAllOption).attr("selected","selected");
	    element.find('option[value="4068"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-12"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4070");
            var t = document.createTextNode("4070"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4071");
            var t = document.createTextNode("4071"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4072");
            var t = document.createTextNode("4072"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4073");
            var t = document.createTextNode("4073"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4074");
            var t = document.createTextNode("4074"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4075");
            var t = document.createTextNode("4075"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4076");
            var t = document.createTextNode("4076"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4077");
            var t = document.createTextNode("4077"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4070"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4071"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4072"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4073"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4074"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4075"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4077"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-13"]');
        if (theAllOption.is(":selected")) {
	    var x = document.createElement("OPTION"); x.setAttribute("value", "4090");
            var t = document.createTextNode("4090"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4091");
            var t = document.createTextNode("4091"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4092");
            var t = document.createTextNode("4092"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4093");
            var t = document.createTextNode("4093"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4090"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4091"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4092"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4093"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
	<script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-14"]');
        if (theAllOption.is(":selected")) {
            var x = document.createElement("OPTION"); x.setAttribute("value", "4030");
            var t = document.createTextNode("4030"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4031");
            var t = document.createTextNode("4031"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4032");
            var t = document.createTextNode("4032"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4033");
            var t = document.createTextNode("4033"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4034");
            var t = document.createTextNode("4034"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4035");
            var t = document.createTextNode("4035"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4050"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4051"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4052"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4053"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4054"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4055"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>
         <script>
      $(function() {
        $(".chosen-select").chosen()
        $("#test").on({
        change: function() {
        var element = $(this);
        var theAllOption = element.find('option[value="-15"]');
        if (theAllOption.is(":selected")) {
            var x = document.createElement("OPTION"); x.setAttribute("value", "4005");
            var t = document.createTextNode("4005"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4006");
            var t = document.createTextNode("4006"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4007");
            var t = document.createTextNode("4007"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4015");
            var t = document.createTextNode("4015"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            var x = document.createElement("OPTION"); x.setAttribute("value", "4020");
            var t = document.createTextNode("4020"); x.appendChild(t);
            document.getElementById("test").appendChild(x);
            element.find('option[value="4005"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4006"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4007"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4015"]').not(theAllOption).attr("selected","selected");
            element.find('option[value="4020"]').not(theAllOption).attr("selected","selected");
             $("#test").trigger("liszt:updated")
        }
    }
});
      });
    </script>	
	<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker({
        format: 'YYYY/MM/DD',
        minDate: '2010/01/01',
        maxDate: '2100/12/30',
        dateLimit: { days: 345 }
    });
});
</script>

	<title>CentralRate</title>

    <link rel="icon" href="../centralRate/logo_central.png">

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
	
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="moment.js"></script>
<script type="text/javascript" src="daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="daterangepicker-bs3.css" />

<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="http://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="http://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>

</head>
<ul class="nav pull-right">
<li><a class="btn btn-lg btn-primary btn-block" href="../login/logout.php">Sair</a></li>
</ul>
<h1 class="form-signin"><img alt="CentralRate" src="../centralRate/logo_central.png"></h1>
<div class="container">
<form class="form-signin" method="post" action="controle.php">
	<h3 class="form-signin-heading">Tipo Ligação</h3>
        <select id="ligacao" name="tipo" data-placeholder="Escolha o tipo de Ligação" class="chosen-select" tabindex="3">
	<option value="0"></option>
        <option value="4">Todos os tipos de Ligação</option>
	<option value="1">Ligações Locais</option>
        <option value="2">Ligações Nacionais</option>
        <option value="3">Ligações Celular</option>
	</select>
	<h3 class="form-signin-heading">Ramais</h3>
      </select>
	<h3 class="form-signin-heading"></h3>
		<select id="test" name="ramais[]" data-placeholder="Escolha os ramais:" class="chosen-select" multiple tabindex="3">
		<option value="-1">Todos os Setores</option>
		<option value="-2">Setor Geral</option>
		<option value="-3">Administrativo / Financeiro</option>
		<option value="-4">Assessoria de Comunicação</option>
		<option value="-5">Assessoria Jurídica</option>
		<option value="-6">CITSaúde</option>
		<option value="-7">Comercial</option>
		<option value="-8">Consultoria / Governança</option>
		<option value="-9">Diretoria</option>
		<option value="-10">DP</option>
		<option value="-11">Infraestrutura</option>
		<option value="-12">Núcleo de Atendimento e Suporte - CITSmart</option>
		<option value="-13">Qualidade</option>
		<option value="-14">RH</option>
		<option value="-15">Superintendentes</option>
      </select>
	<h3 class="form-signin-heading">Periodo de consulta</h3>
	<input type="text" name="daterange" />
	<input type="submit" class="btn btn-primary btn-block" value="Gerar Fatura" />
	</div>

</form>
</body>
</html>
