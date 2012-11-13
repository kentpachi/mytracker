var apiUrl = 'http://mytracker.localhost/api.php';
function getLastPosition(callbackFunc)
{
	$.ajax({
  url: apiUrl,dataType:'json'
}).done(function(data) { 
  callbackFunc(data);
  
});
}