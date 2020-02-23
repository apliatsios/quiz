$(document).ready(function() {
	// Place your code here
	
      $("#login").show(); 
	 
$("button").click(function(){
	//window.location.href = "http://dev.client.com:8080/#viewProjects";
	//$("#viewProjects").show();
   
var username = $("input#username").val();
var password = $("input#password").val();  

function make_base_auth(user, password) {
  var tok = user + ':' + password;
  var hash = btoa(tok);
  return "Basic " + hash;
}
$.ajax
  ({
    type: "GET",
    url: " http://dev.server.com:8080?mode=login",
    dataType: 'text',
    async: false,
    data: '{}',
    beforeSend: function (xhr){ 
        xhr.setRequestHeader('Authorization', make_base_auth(username, password)); 
    },
    success: function (){
        window.location.href = "http://dev.client.com:8080/#viewProjects";
	$("#viewProjects").show(); 
    }
});
           
  });
  
var text = $('#test').text();

// set the item in localStorage
localStorage.setItem('test', text);
   
	// End
});

