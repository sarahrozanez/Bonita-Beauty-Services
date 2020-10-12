var targetElement;

var taskArray;
var imageArray;
var idArray;

var serv_id;

var Request = new XMLHttpRequest();

var $ = function(id) {
    return document.getElementById(id);
}

function getXML(dataSource, target, data)
{
	console.log("getting xml: dataSource" +dataSource+ "target: " +target+  "data: " +data );
  if(Request) {
		targetElement = $(target);
		Request.open("POST", dataSource);
    Request.setRequestHeader('Content-Type',
      'application/x-www-form-urlencoded');

    Request.onreadystatechange = function()
    {
      if (Request.readyState == 4 &&
          Request.status == 200) {
						alert(Request.responseText);
						var myXML = Request.responseXML;  //XML

				createOptionsAndImage(myXML, target, data);
				
      }
    }
		console.log("Request.send");
		console.log("data=" + data +"&serv_id=" + serv_id);
		//  +"&serv_id=" + serv_id
		Request.send("data=" + data +"&serv_id=" + serv_id);
		
  }
}

function createOptionsAndImage(myXML, target, data)
{
	console.log("createOptionsAndImage: target: " +target+  "data: " +data );
	//showXMLText(myXML);  //Displays XML in an alert() box
	
	if (target == "staff")
	{
		createOptionsStaff(myXML, target, data);
		
	} else {
		var XMLElements = myXML.getElementsByTagName(data);
		
		var myHTML =  "<option value='-'>-</option>";
		var myHTMLImages = '';
		
		if (target == "daytime")
		{
			for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++)
			{
				myHTML += "<option value='" + XMLElements[loopIndex].firstChild.data + "'>" + XMLElements[loopIndex].firstChild.data + "</option>";
			}
		} else {
		
			//services
			taskArray = new Array();
			imageArray = new Array();
			idArray = new Array();
			console.log(XMLElements);
		
			for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++)
			{
				idArray[loopIndex] =  XMLElements[loopIndex].getAttribute('service_id');
				taskArray[loopIndex] =  XMLElements[loopIndex].getAttribute('task');
				imageArray[loopIndex] = XMLElements[loopIndex].getAttribute('image');
		
				myHTML += "<option value='" + taskArray[loopIndex] + "'>" + XMLElements[loopIndex].firstChild.data + "</option>";


				myHTMLImages +=  
				`<div class="w3-col l3 m6 w3-margin-bottom">
						<div class="w3-display-container" style="height:300px;">
							<div class="w3-display-topleft w3-black w3-padding">${taskArray[loopIndex]}</div>
							<img id= "${idArray[loopIndex]}" src="./images/${imageArray[loopIndex]}" class="image" />
							<div class="middle">
								<a href="#booknow"></a>
								<div class="text">
									<a onclick="triggerChange(${idArray[loopIndex]})" href="#booknow">Book now!</a>
								</div>
							</div>
						</div>
					</div>`;
		
			}
		}
		
		document.getElementById("services-items").innerHTML = myHTMLImages;
		document.getElementById(target).innerHTML = myHTML;
	}

}

function createOptionsStaff(myXML, target, data)
{
	console.log("createOptionsStaff: target: " +target+  " data: " +data );
	var XMLElements = myXML.getElementsByTagName(data);
	
	var myHTML =  "<option value='-'>-</option>";
		
	staffArray = new Array();
	staffImageArray = new Array();
	staffDescriptionArray = new Array();
	staffPhoneArray = new Array();
	staffEmailArray = new Array();

	for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++)
	{
		staffArray[loopIndex] =  XMLElements[loopIndex].firstChild.data;
		staffImageArray[loopIndex] = XMLElements[loopIndex].getAttribute('image');
		staffDescriptionArray[loopIndex] = XMLElements[loopIndex].getAttribute('description');
		staffPhoneArray[loopIndex] = XMLElements[loopIndex].getAttribute('phone');
		staffEmailArray[loopIndex] = XMLElements[loopIndex].getAttribute('email');

		myHTML += "<option value='" + staffArray[loopIndex] + "'>" + staffArray[loopIndex] + "</option>";
	}
	
	document.getElementById(target).innerHTML = myHTML;
	//targetElement.innerHTML = myHTML;
}


function showXMLText(myXML)
{
	//Displays XML targetElementect's data in an alert() box

	var myXMLtext = (new XMLSerializer()).serializeToString(myXML);
	myXMLformatted = myXMLtext.replace(/</g, "\n<");
	alert(myXMLformatted);
}

//get all services from database
function getServices(){

}


var displayServiceImage = function()
{
	console.log("entering the displayServiceImage");

	var serviceTask  = $("service").value;

	var serviceImage;

	for (var index in taskArray)
	{
		if (serviceTask == taskArray[index])
		{
			serviceImage = imageArray[index];
		}
	}

	var optionServ = document.getElementById("service");
	serv_id = optionServ.selectedIndex;

	console.log("serv_id " + serv_id);

	var dataSource = "load_staff.php";
	var target = "staff";
	var data = "staff";

	getXML(dataSource, target, data);
	
	$("pickstaff").style.display = "block";

}


var displayStaffImage = function()
{
	staffName = $("staff").value;
	var staffDescription;
	var staffPhone;
	var staffEmail;

	for (var index in taskArray)
	{

		if (staffName == staffArray[index])
		{
			staffImage = staffImageArray[index];
			staffDescription = staffDescriptionArray[index];
			staffPhone = staffPhoneArray[index];
			staffEmail = staffEmailArray[index];
		}
	}
	//$("midcenter").style.visibility = 'visible';
	//$("midcenter").style.display = 'flex';
  $("stafftext_hold").style.visibility = 'visible';
	$("staffimage_hold").style.visibility = 'visible';
	$("staffinfo").style.visibility = 'visible';
	$("midcenter").style.display='inline';

	console.log(staffDescription);
	document.getElementById("stafftext_hold").innerHTML = staffName;
	document.getElementById("staffDescrip").innerHTML = staffDescription;
	document.getElementById("staffPhone").innerHTML = staffPhone;
	document.getElementById("staffEmail").innerHTML = staffEmail;
	

	$("staffimage_hold").src = "images/" + staffImage;


	var dataSource = "load_daytime.php";
	var target = "daytime";
	var data = "daytime";

	getXML(dataSource, target, data);

	$("picktime").style.display = "block";
	$("pickdate").style.display = "block";

}

var collectInformation = function()
{
	var daytime = $("daytime").value;
	var thedate = $("thedate").value;

	$("clickselectbutton").style.display = "block";

}

function triggerChange(id) {
	document.getElementById("service").options[id].selected = true;

	displayServiceImage();
}



window.onload = function () {

	console.log("entering beauty_services");

	//load services from database
	
	var dataSource = 'load_services_db.php';
	var target = "service";
	var data = "service";
	getXML(dataSource, target, data);
	
	$("optionBooks").style.visibility = 'visible';

	$("service").onchange = displayServiceImage;
	$("staff").onchange = displayStaffImage;
  $("daytime").onchange = collectInformation;
}

