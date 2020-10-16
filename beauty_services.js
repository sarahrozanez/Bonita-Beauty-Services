var targetElement;

var taskArray;
var imageArray;
var idArray;

//<about staff_id='".$staff_id."' image='".$image_file."' description='".$description."'>".$firstname."</about>
var about_staff_idArray;
var about_imageArray;
var about_descriptionArray;
var about_firstnameArray;

var serv_id;
var staff_id;
var staff_value;
var date;
var staff_service_id;

var Request = new XMLHttpRequest();

var $ = function (id) {
	return document.getElementById(id);
}

function getXML(dataSource, target, data) {
	console.log("getting xml: dataSource" + dataSource + "target: " + target + "data: " + data);
	if (Request) {
		targetElement = $(target);
		Request.open("POST", dataSource);
		Request.setRequestHeader('Content-Type',
			'application/x-www-form-urlencoded');

		Request.onreadystatechange = function () {
			if (Request.readyState == 4 &&
				Request.status == 200) {
				//alert(Request.responseText);
				var myXML = Request.responseXML;  //XML
				console.log(myXML);
				createOptionsAndImage(myXML, target, data);

			}
		}
		console.log("Request.send");
		console.log("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date);
		Request.send("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date);

	}
}

function getXMLAbout(dataSource, target, data) {
	console.log("getting xmlABOUT: dataSource" + dataSource + "target: " + target + "data: " + data);
	if (Request) {
		targetElement = $(target);
		Request.open("POST", dataSource);
		Request.setRequestHeader('Content-Type',
			'application/x-www-form-urlencoded');

		Request.onreadystatechange = function () {
			if (Request.readyState == 4 &&
				Request.status == 200) {
				//alert(Request.responseText);
				var myXML = Request.responseXML;  //XML
				createOptionsAndImageAbout(myXML, target, data);

			}
		}
		console.log("Request.send");
		console.log("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date);
		Request.send("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date);

	}
}

function createOptionsAndImage(myXML, target, data) {
	console.log("createOptionsAndImage: target: " + target + "data: " + data);
	//showXMLText(myXML);  //Displays XML in an alert() box

	if (target == "staff") {
		createOptionsStaff(myXML, target, data);

	} else {
		console.log("Entering the services createOptionsAndImage option");
		var XMLElements = myXML.getElementsByTagName(data);

		var myHTML = "<option value='-'>-</option>";
		var myHTMLImages = '';

		if (target == "thedate" || target == "daytime") {
			for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++) {
				myHTML += "<option value='" + XMLElements[loopIndex].firstChild.data + "'>" + XMLElements[loopIndex].firstChild.data + "</option>";

				document.getElementById(target).innerHTML = myHTML;
			}
		} else {
			console.log("Entering the services createOptionsAndImage else");
			//services
			taskArray = new Array();
			imageArray = new Array();
			idArray = new Array();
			console.log(XMLElements);

			for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++) {
				idArray[loopIndex] = XMLElements[loopIndex].getAttribute('service_id');
				taskArray[loopIndex] = XMLElements[loopIndex].getAttribute('task');
				imageArray[loopIndex] = XMLElements[loopIndex].getAttribute('image');

				myHTML += "<option value='" + taskArray[loopIndex] + "'>" + XMLElements[loopIndex].firstChild.data + "</option>";


				myHTMLImages +=
					`<div class="w3-col l3 m6 w3-margin-bottom">
						<div class="w3-display-container" style="height:300px;">
							<div class="w3-display-topleft w3-black w3-padding">${taskArray[loopIndex]}</div>
							<img id= "${idArray[loopIndex]}" src="./images/${imageArray[loopIndex]}" class="image"/>
							<div class="middle">
								<a href="#booknow"></a>
								<div class="text">
									<a onclick="triggerChange(${idArray[loopIndex]})" href="#booknow">Book now!</a>
								</div>
							</div>
						</div>
					</div>`;

			}
			//if (target == "service"){
			document.getElementById("services-items").innerHTML = myHTMLImages;
			document.getElementById(target).innerHTML = myHTML;

			//}

			var dataSource = 'load_staff_db.php';
			var target = "about";
			var data = "about";
			getXMLAbout(dataSource, target, data);

		}

	}
}

function createOptionsAndImageAbout(myXML, target, data) {
	console.log("createOptionsAndImageAbout: target: " + target + "data: " + data);
	//showXMLText(myXML);  //Displays XML in an alert() box

	var XMLElements = myXML.getElementsByTagName(data);

	var myHTMLImages = '';

	about_staff_idArray = new Array();
	about_imageArray = new Array();
	about_descriptionArray = new Array();
	about_firstnameArray = new Array();

	//about  "<about staff_id='".$staff_id."' image='".$image_file."' description='".$description."'>".$firstname."</about>";
	console.log(XMLElements);

	for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++) {
		about_staff_idArray[loopIndex] = XMLElements[loopIndex].getAttribute('staff_id');
		about_descriptionArray[loopIndex] = XMLElements[loopIndex].getAttribute('description');
		about_imageArray[loopIndex] = XMLElements[loopIndex].getAttribute('image');
		//about_firstnameArray = XMLElements[loopIndex].firstChild.data;


		myHTMLImages += `<div class="w3-col l3 m6 w3-margin-bottom">
        <div class="imageContainer" style="height:300px;">
        <img class="imageAbout" src="./images/${about_imageArray[loopIndex]}" >
        </div>
        <h3>${XMLElements[loopIndex].firstChild.data}</h3>
        <p>${about_descriptionArray[loopIndex]}</p>

      </div>`;

	}

	document.getElementById("about-items").innerHTML = myHTMLImages;

}

function createOptionsStaff(myXML, target, data) {
	//staff_service_id
	console.log("createOptionsStaff: target: " + target + " data: " + data);
	var XMLElements = myXML.getElementsByTagName(data);

	var myHTML = "<option value='-'>-</option>";

	staffArray = new Array();
	staffImageArray = new Array();
	staffDescriptionArray = new Array();
	staffPhoneArray = new Array();
	staffEmailArray = new Array();
	staffIDArray = new Array();

	for (loopIndex = 0; loopIndex < XMLElements.length; loopIndex++) {
		staffArray[loopIndex] = XMLElements[loopIndex].firstChild.data;
		staffImageArray[loopIndex] = XMLElements[loopIndex].getAttribute('image');
		staffDescriptionArray[loopIndex] = XMLElements[loopIndex].getAttribute('description');
		staffPhoneArray[loopIndex] = XMLElements[loopIndex].getAttribute('phone');
		staffEmailArray[loopIndex] = XMLElements[loopIndex].getAttribute('email');
		staffIDArray[loopIndex] = XMLElements[loopIndex].getAttribute('staff_id');

		myHTML += "<option id= '" + staffIDArray[loopIndex] + "' value='" + staffArray[loopIndex] + "'>" + staffArray[loopIndex] + "</option>";
	}

	document.getElementById(target).innerHTML = myHTML;
	//targetElement.innerHTML = myHTML;
}


function showXMLText(myXML) {
	//Displays XML targetElementect's data in an alert() box

	var myXMLtext = (new XMLSerializer()).serializeToString(myXML);
	myXMLformatted = myXMLtext.replace(/</g, "\n<");
	//alert(myXMLformatted);
}


var displayServiceImage = function () {
	console.log("entering the displayServiceImage");

	var serviceTask = $("service").value;

	var serviceImage;

	for (var index in taskArray) {
		if (serviceTask == taskArray[index]) {
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

var displayStaffImage = function () {
	staffName = $("staff").value;
	var staffDescription;
	var staffPhone;
	var staffEmail;

	for (var index in taskArray) {

		if (staffName == staffArray[index]) {
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
	$("midcenter").style.display = 'inline';

	console.log(staffDescription);
	document.getElementById("stafftext_hold").innerHTML = staffName;
	document.getElementById("staffDescrip").innerHTML = staffDescription;
	document.getElementById("staffPhone").innerHTML = staffPhone;
	document.getElementById("staffEmail").innerHTML = staffEmail;


	$("staffimage_hold").src = "images/" + staffImage;


	var optionStaff = document.getElementById("staff");
	staff_value = optionStaff.value;

	console.log("staff_value " + staff_value);

	var dataSource = "load_daytime.php";
	var target = "thedate";
	var data = "thedate";

	getXML(dataSource, target, data);


	$("pickdate").style.display = "block";

}

var collectInformationDate = function () {
	var daytime = $("daytime").value;
	var thedate = $("thedate").value;

	var optionDate = document.getElementById("thedate");
	date = optionDate.value;

	console.log("date " + date);

	var dataSource = "load_time.php";
	var target = "daytime";
	var data = "daytime";

	getXML(dataSource, target, data);

	$("picktime").style.display = "block";

}

var collectInformationTime = function () {
	var daytime = $("daytime").value;
	var thedate = $("thedate").value;

	$("clickselectbutton").style.display = "block";

}

function triggerChange(id) {
	document.getElementById("service").options[id].selected = true;

	displayServiceImage();
}

function bookApt() {
	var data = 'book';
	var daytime = $("daytime").value;
	var service = $("service").value;
	var staff = $("staff").value;
	var thedate = $("thedate").value;
	var daytime = $("daytime").value;

	var requestID;
	console.log("getting book xml: dataSource load_book.php / target book / data book");
	if (Request) {

		Request.open("POST", 'load_book.php');
		Request.setRequestHeader('Content-Type',
			'application/x-www-form-urlencoded');

		Request.onreadystatechange = function () {
			if (Request.readyState == 4 &&
				Request.status == 200) {

				alert("Beauty Service " + service + " booked with the professional " + staff + " on " + thedate + " at " + daytime);
				//alert(Request.responseText);
				var myXML = Request.responseXML;  //XML

				var XMLElements = myXML.getElementsByTagName('requestID');

				requestID = XMLElements[0].firstChild.data;
				console.log("requestIDmyXML" + requestID);

				location.href = './books.php?ID=' + requestID;

				//	createOptionsAndImage(myXML, target, data);

			}
		}
		console.log("Request.send");
		console.log("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date + "&time=" + daytime);
		Request.send("data=" + data + "&serv_id=" + serv_id + "&staff_value=" + staff_value + "&date=" + date + "&time=" + daytime);

		$("pickstaff").style.display = 'none';
		$("pickdate").style.display = 'none';
		$("picktime").style.display = 'none';


	}
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
	$("thedate").onchange = collectInformationDate;
	$("daytime").onchange = collectInformationTime

	$("clickselectbutton").onclick = bookApt;
}

